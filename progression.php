<?php

/**

	Скрипт может определить является ли последовательность символов арифметическо-геометрической прогрессией.	
*/

if (count($argv) < 2) {
	echo 'empty sequence';
	return;
}

$seq = array();

$strSeq = explode(',', $argv[1]);
foreach ($strSeq as $symbols) {
	if (!is_numeric($symbols)) {
		echo 'NO';
	}

	$seq[] = $symbols + 0;
}

function isProgression( $seq = array() )
{
	$seqLength = count($seq);
	if ($seqLength <= 2) {
		return true;		
	}

	$q = 0;
	$d = 0;

	foreach ($seq as $number) {
		if ($number == 0) {
			$q = 1;
			break;
		}
	}

	if ($q == 0) {
		if ($seq[1] != $seq[0]) {
			$d = ($seq[1]*$seq[1]-$seq[0]*$seq[2]) / ($seq[1]-$seq[0]);
			$q = ($seq[1] - $d) / $seq[0];
		}	
	} else {
		$d = $seq[1]-$seq[0];
	}

	for ($i = 1; $i < $seqLength - 1; $i++) {
		if ($seq[$i+1] != $seq[$i] * $q  + $d) {
			return false;
		}
	}

	return true;
}

echo isProgression($seq) ? 'YES' : 'NO';