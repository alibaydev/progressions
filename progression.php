<?php

/**

	Скрипт может определить является ли последовательность символов арифметической или геометрической прогрессией.	
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

function isArithmeticProgression( $seq = array() )
{
	$seqLength = count($seq);
	if ($seqLength <= 2) {
		return true;		
	}

	$step = $seq[1] - $seq[0];

	for ($i = 1; $i < $seqLength - 1; $i++) {
		if ($seq[$i+1] - $seq[$i] != $step) {
			return false;
		}
	}

	return true;
}

function isGeometricProgression( $seq = array() )
{
	foreach ($seq as $number) {
		if ($number == 0) {
			return false;
		}
	}

	$seqLength = count($seq);
	if ($seqLength <= 2) {
		return true;		
	}

	$denominator = $seq[1] / $seq[0];

	for ($i = 1; $i < $seqLength - 1; $i++) {
		if ($seq[$i+1] / $seq[$i] != $denominator) {
			return false;
		}
	}

	return true;
}


echo isArithmeticProgression($seq) || isGeometricProgression($seq) ? 'YES' : 'NO';