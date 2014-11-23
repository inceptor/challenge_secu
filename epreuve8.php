<?php

//EN COUR DE RESOLUTION

$ch = curl_init("http://www.newbiecontest.org/epreuves/prog/prog10.php");

$coockie="SMFCookie89=; PHPSESSID=; admin=0"; //change with your coockie

curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_COOKIE, $coockie);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

$file = curl_exec($ch);

//obtenir l'image
$img=fopen('img.png','w+');
fputs($img,$file);

//on trouve la chaine de caractère
//system("dir");
exec("cd C:\Program Files (x86)\EasyPHP-DevServer-14.1VC11\data\localweb\projects\Attaque-site");
system("C:\Program Files (x86)\Tesseract-OCR\tesseract.exe img.png out");


curl_close($ch);

//header('http://www.newbiecontest.org/epreuves/prog/verifpr10.php?chaine='.$nombre);



?>