<?php

	$fractions = array();

	for ($n=1; $n<=12; $n++) {
	for ($d=1; $d<=12; $d++) {
/*
		if ($n <= $d)
			$fractions[$n.'_'.$d] = floor($n / $d * 100000) / 1000;
*/

		if ($n <= $d) {
			$percentbleh = floor($n / $d * 100000);
			if (empty($fractions[$percentbleh]))
				$fractions[$percentbleh][] = $n.'_'.$d;
			else
				$fractions[$percentbleh][] = $n.'_'.$d; 
		}

	}
	}
	
/*
	$fractionscomp = array();

	foreach ($fractions as $fraction => $percent) {
		$thisPercent = $percent;
		$thisFraction = $percent;
		$fractions 
		foreach ($fractions as $fraction => $percent) {
			if ($thisPercent == $percent && $thisFraction != $fraction)
				echo "<br />.$fraction { ".$percent."% }";
		}
		

	}


	echo '<pre>';print_r($fractions);

	foreach ($fractions as $fraction => $percent) {
		echo "<br />.section--$fraction { ".$percent."% }";
	}
*/



	echo '<pre>';print_r($fractions);

	echo "<textarea style='width:500px;height:500px;'>/* Generated by bootstrap_grid-wrapper_grid.php (Myke) */\n";
	echo '.col {';
	foreach ($fractions as $percentbleh => $fractionarray) {
		$count = 0;
		foreach ($fractionarray as $fraction) {
			if ($count>0) echo ',';
			echo "\n\t&.col-$fraction";
			$count++;
		}
		echo "\n\t{ width: ".($percentbleh/1000)."% }";
	}
	echo "\n}";


?>