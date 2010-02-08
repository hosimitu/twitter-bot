<?php
//get_text_start
	$name = "text.txt";
	$tlshutoku = fopen($name, "r");

	$sentence = array();
	$i = 0;

	//read text.txt
	if ($tlshutoku) {
		while( ! feof($tlshutoku) ) {
		    $text = fgets($tlshutoku);
		    $sentence[$i] = $text;
		    $i++;
	    }
	    fclose($tlshutoku);
	}

	for ($j = 0 ; $j < $i; $j++) {
		echo $sentence[$j]."<br /><br />";
	}

	$k = mt_rand(0, $i-1);
	$l = $k + 1;
	echo "<br />ランダムに取り出したるは".$l."番目の文章だ。<br />".$sentence[$k];

?>