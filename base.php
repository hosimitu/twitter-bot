<?php
//twitteroaAuth.phpと設定ファイルを読み込む。パスはあなたが置いた適切な場所に変更してください
require_once('twitteroauth/twitteroauth.php');
require_once("setting.php");

//OAuthオブジェクト生成
$to = new TwitterOAuth($consumer_key,$consumer_secret,$access_token,$access_token_secret);

//ここから投稿する文章制作
$mes = "こんにちは！世界！";

//投稿
$req = $to->OAuthRequest("https://twitter.com/statuses/update.xml","POST",array("status"=>$mes));
?>