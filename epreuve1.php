<?php

$ch = curl_init("http://www.newbiecontest.org/epreuves/prog/prog1.php");

$coockie="SMFCookie89=; PHPSESSID=; admin=0"; //change with your coockie

curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_COOKIE, $coockie);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

$file = curl_exec($ch);

$nombre=explode(" ",$file);

$nombre = $nombre[sizeof($nombre)-1];

curl_close($ch);

header('Location: http://www.newbiecontest.org/epreuves/prog/verifpr1.php?solution='.$nombre);



?>