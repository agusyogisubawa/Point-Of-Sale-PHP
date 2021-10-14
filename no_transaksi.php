<?php

	function kode_random3($lenght) {
		$data = '12345';
		$string = 'JU';

		for ($i=0; $i < $lenght; $i++) { 
			$pos = rand(0, strlen($data)-1);
			$string .= $data{$pos};
		}

		return $string;
	}

	$no_transaksi = kode_random3(5);


?>