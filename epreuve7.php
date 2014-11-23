<?php

$ch = curl_init("http://www.newbiecontest.org/epreuves/prog/prog9/epreuve9.php");

$coockie="SMFCookie89=; PHPSESSID=; admin=0"; //change with your coockie

//création tableau ram et proco
$ram = array( "32 Mo SDRAM" =>0,
				"64 Mo SDRAM" =>0,
				"128 Mo SDRAM" =>0,
				"256 Mo SDRAM" =>0,
				"512 Mo SDRAM" =>0,
				"256 Mo DDRAM" =>0,
				"512 Mo DDRAM" =>0,
				"1024 Mo DDRAM" =>0,
				"2048 Mo DDRAM" =>0);

$proco = array ( "166 MHz" =>0,
				"433 MHz" =>0,
				"933 MHz" =>0,
				"1.0 GHz" =>0,
				"1.6 GHz" =>0,
				"1.7 GHz" =>0,
				"1.8 GHz" =>0,
				"2.4 GHz" =>0,
				"2.8 GHz" =>0,
				"3.4 GHz" =>0);


curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_COOKIE, $coockie);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

$file = curl_exec($ch);

//on subdivise le total en sous tableau tel que $text[name] $text[ram] $text[proco]
preg_match_all('#(?P<name>\w+) a un processeur de (?P<proco>(...) \w+) et dispose de (?P<ram>\d+ \w+ \w+)#',$file,$text);

//On récupére les prix du tableau
preg_match_all('#<td>\w+</td>#',$file,$prix);

//on affecte les prix a notre tableau
for($i=0;(current($ram)) !== FALSE;$i++) {
	$ram[key($ram)]= intval(substr($prix[0][$i],4));
    next($ram);
}

for($i=7;(current($proco)) !== FALSE;$i++) {
	$proco[key($proco)]= intval(substr($prix[0][$i],4));
    next($proco);
}	

//on retrouve les prix et le gagnant
$gagnant[0]=0;
$gagnant[1]="NULL";
for($i=0;$i<count($text["name"]);$i++)
{
	if( $gagnant[0] < $ram[$text["ram"][$i]]+$proco[$text["proco"][$i]] )
	{
		$gagnant[0]= $ram[$text["ram"][$i]]+$proco[$text["proco"][$i]];
		$gagnant[1] = $text["name"][$i];
	}
}

curl_close($ch);
header('Location: http://www.newbiecontest.org/epreuves/prog/prog9/verifpr9.php?prenom='.$gagnant[1].'&prix='.$gagnant[0]);



?>