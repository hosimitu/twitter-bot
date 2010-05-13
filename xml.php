<?php
//twitteroauth.phpと設定ファイルを読み込む。パスはあなたが置いた適切な場所に変更してください
require_once('twitteroauth/twitteroauth.php');
require_once("setting.php");

//OAuthオブジェクト生成
	$to = new TwitterOAuth($consumer_key,$consumer_secret,$access_token,$access_token_secret);

//API呼び出し
	$result = $to->OAuthRequest("http://api.twitter.com/1/statuses/mentions.xml", "GET", array("count"=>"30"));

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