<?php

$ch1 = curl_init("http://www.newbiecontest.org/epreuves/prog/prog3_1.php");
$ch2 = curl_init("http://www.newbiecontest.org/epreuves/prog/prog3_2.php");

$coockie="SMFCookie89=; PHPSESSID=; admin=0"; //change with your coockie

//pour la chaine1
curl_setopt($ch1, CURLOPT_HEADER, 0);
curl_setopt($ch1, CURLOPT_COOKIE, $coockie);
curl_setopt($ch1, CURLOPT_RETURNTRANSFER, 1);

//pour la chaine2
curl_setopt($ch2, CURLOPT_HEADER, 0);
curl_setopt($ch2, CURLOPT_COOKIE, $coockie);
curl_setopt($ch2, CURLOPT_RETURNTRANSFER, 1);

$file = curl_exec($ch1);
$file2 = curl_exec($ch2);

//traitement de l'info
$nombre=explode(" ",$file);
$nombre2=explode(" ",$file2);

$nombre=$nombre[sizeof($nombre)-1];
$nombre2=$nombre2[sizeof($nombre2)-1];

//calcul résultat de l'epreuve
$result=round(sqrt($nombre)*$nombre2,0);

curl_close($ch1);
curl_close($ch2);

header('Location: http://www.newbiecontest.org/epreuves/prog/verifpr3.php?solution='.$result);

?>