<?php

	function kode_random2($lenght) {
		$data = '12345';
		$string = 'KR-';

		for ($i=0; $i < $lenght; $i++) { 
			$pos = rand(0, strlen($data)-1);
			$string .= $data{$pos};
		}

		return $string;
	}

	$no_kartu = kode_random2(5);


?>