<?php

$ch = curl_init("http://www.newbiecontest.org/epreuves/prog/prog4.php");

$coockie="SMFCookie89=; PHPSESSID=; admin=0"; //change with your coockie

curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_COOKIE, $coockie);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

$file = curl_exec($ch);

//on récupére les nombres
preg_match_all('#[0-9]+#',$file,$nombre);


//on calcul
$result = round(sqrt($nombre[0][0]) * pow( $nombre[0][1] , $nombre[0][2] ) + $nombre[0][3] , 0 );

curl_close($ch);

header('Location: http://www.newbiecontest.org/epreuves/prog/verifpr4.php?solution='.$result);



?>