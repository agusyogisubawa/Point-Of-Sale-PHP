<?php

	function kode_random1($lenght) {
		$data = '12345';
		$string = 'PT-';

		for ($i=0; $i < $lenght; $i++) { 
			$pos = rand(0, strlen($data)-1);
			$string .= $data{$pos};
		}

		return $string;
	}

	$kode_faktur = kode_random1(5);


?>