<?php
$id = "twitterID";
$pass = "twitterPASS";

//API接続オプション
	$option = array(
	             "http"=>array(
	                            "method"=>"GET",
	                            "header"=>"Authorization: Basic ". base64_encode($id. ":". $pass)
	                          )
	               );

//コンテクストリソース
	$context = stream_context_create($option);

//リクエストURL
	$url = "http://twitter.com/statuses/replies.xml?count=30";

//結果
	$result = file_get_contents($url, false, $context);

//扱いやすくする
	$xml = simplexml_load_string($result);

//status_numberの比較_start
	$number = fopen("./number.txt", "r");
	$hikaku = fgets($number);  // 読み込み
	$num10 = $hikaku;
	fclose($number);

//XMLからデータを取得しいじる
	$nm = 0;										//この定数はステータスナンバーを一度だけ記述するためのカウント。
	foreach( $xml->status as $value ){
	    $status_number = $value->id;
		$screen_name = $value->user->screen_name;

		settype($status_number, "float");			//ステータスナンバーを文字列から数字に変換。無くても良いけどあったらGOOD

		if ($num10 < $status_number){
			//一度だけステータスナンバーをnumber.txtに書き出す。
			if ($nm == 0){
				$status = $status_number + 1;
				$numbers = fopen("./number.txt", "w");
				fwrite($numbers, $status);
				fclose($numbers);
				$nm += 1;
			}

			$text = $value->text;

			echo "新しいリプライがありました。その内容は".$text."です。<br />";
		}
	}
?>