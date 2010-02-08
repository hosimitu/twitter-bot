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

//リクエストURL(このURLを色々変更すると色々なAPIが使える)
	$url = "http://twitter.com/statuses/replies.xml?count=30";

//結果
	$result = file_get_contents($url, false, $context);

//扱いやすくする
	$xml = simplexml_load_string($result);

//XMLからデータを取得しいじる
	$kaiseki = array();						//この配列にxmlから取り出したモノを入れる
	foreach( $xml->status as $value ){
		$status_number = $value->id;				//ステータスナンバーを$status_numberに挿入
		$screen_name = $value->user->screen_name;	//userIDを$screen_nameに挿入
		$hatugen = $value->text;					//発言内容を$hatugenに挿入

		$text = $screen_name."のステータスナンバー".$status_number."の内容は".$hatugen."です。";

		array_push($kaiseki, $text);
	}

//いろいろいじった$kaisekを出力する
	foreach ($kaiseki as $value){
		echo $value."<br />";
	}
?>