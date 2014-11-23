<?php

$ch = curl_init("http://www.newbiecontest.org/epreuves/prog/prog5.php");

$coockie="SMFCookie89=; PHPSESSID=; admin=0"; //change with your coockie

curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_COOKIE, $coockie);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

$file = curl_exec($ch);

$array=explode("'",$file);

$msg=$array[1];

for($i=0;$i<strlen($msg);$i++)
	$msg[$i] = chr( ( ( ord($msg[$i]) - ord('a') - $array[3] )%26 + ord('a') ) );

	echo $msg;
	
curl_close($ch);

header('Location: http://www.newbiecontest.org/epreuves/prog/verifpr5.php?solution='.$msg);



?>