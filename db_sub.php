<?php
//twitteroaAuth.phpと設定ファイルを読み込む。パスはあなたが置いた適切な場所に変更してください
require_once("twitteroauth.php");
require_once("setting.php");

//テキストを取得_start
	$name = "bunsho.txt";
	$tlshutoku = fopen($name, "r");

	$sentence = array();
	$i = 0;

	//bunsho.txtファイルが開けたならその文章を読み込む。
	if ($tlshutoku) {
		while( ! feof($tlshutoku) ) {	//ファイルの最後まで読み込む。
		    $text = fgets($tlshutoku);
		    $sentence[$i] = $text;
		    $i++;
	    }
	    fclose($tlshutoku);				//開いていたファイルを閉じる。
	}
	
//ここから文章を表示する
	for ($j = 0 ; $j < $i; $j++) {
		echo $sentence[$j]."<br /><br />";
	}

//ランダムに一行取りだし出力する
	$k = mt_rand(0, $i-1);
	$l = $k + 1;
	echo "<br />ランダムに取り出したるは".$l."番目の文章だ。<br />".$sentence[$k];

//OAuthオブジェクト生成
//	$to = new TwitterOAuth($consumer_key,$consumer_secret,$access_token,$access_token_secret);
//投稿
//	$req = $to->OAuthRequest("https://twitter.com/statuses/update.xml","POST",array("status"=>$sentence[$k]));

?>