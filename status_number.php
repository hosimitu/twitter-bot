<?php
//twitteroauth.phpと設定ファイルを読み込む。パスはあなたが置いた適切な場所に変更してください
require_once('twitteroauth/twitteroauth.php');
require_once("setting.php");

//status_numberの比較_start
	$number = fopen("./number.txt", "r");
	$hikaku = fgets($number);  // 読み込み
	$num10 = $hikaku;
	fclose($number);

//OAuthオブジェクト生成
	$to = new TwitterOAuth($consumer_key,$consumer_secret,$access_token,$access_token_secret);

//API呼び出し
	$result = $to->OAuthRequest("http://api.twitter.com/1/statuses/mentions.xml", "GET", array("count"=>"30"));

//扱いやすくする
	$xml = simplexml_load_string($result);

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