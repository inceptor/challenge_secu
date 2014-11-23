<?php

$ch = curl_init("http://www.newbiecontest.org/epreuves/prog/prog6.php");

$coockie="SMFCookie89=; PHPSESSID=; admin=0"; //change with your coockie

curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_COOKIE, $coockie);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

$file = curl_exec($ch);

//trouve l'équation

//on récupére les nombres
preg_match_all('#[0-9]x+|[0-9]+#',$file,$equation);

//puis les signes
preg_match_all('#\-+|\++#',$file,$signe);

//On formate pour obtenir a,b et c
for($i=0;$i<count($equation[0])-1;$i++)
{
	if($i<2)
	{
		if($equation[0][$i]=="x")
			$equation[0][$i]=1;
		else
			$equation[0][$i]=intval($equation[0][$i]);
		
	}
	
	if($i>0)
	{
		$equation[0][$i]*=($signe[0][$i-1]=="-") ? -1 : 1;
	}
}

$a=$equation[0][0];
$b=$equation[0][1];
$c=$equation[0][2];

//calcul

//on trouve le delta
$delta=pow($b,2) - 4*$a*$c;

//On trouve les solutions
if($delta>0)
{
	$x1 = ( (-1*$b) - sqrt($delta) ) / (2 *$a);
	$x2 = ( (-1*$b) + sqrt($delta) ) / (2 *$a);
	
	$nombre = ($x1>$x2) ? round($x1,2,PHP_ROUND_HALF_DOWN) : round($x2,2,PHP_ROUND_HALF_DOWN);
}
elseif($delta==0)
{
	$x1 = -1 * ( $b / (2 *$a) );
	
	$nombre = round($x1,2,PHP_ROUND_HALF_DOWN);
}
else
	echo "error";

curl_close($ch);

header('Location: http://www.newbiecontest.org/epreuves/prog/verifpr6.php?solution='.$nombre);



?>