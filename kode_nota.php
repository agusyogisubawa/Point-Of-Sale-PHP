<?php

	function kode_random($lenght) {
		$data = '12345';
		$string = 'UD-';

		for ($i=0; $i < $lenght; $i++) { 
			$pos = rand(0, strlen($data)-1);
			$string .= $data{$pos};
		}

		return $string;
	}

	$kode = kode_random(5);


?>