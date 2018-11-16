<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class CI_Benchmark {

	
	public $Vjtpdnckniid = array();

	
	public function mark($Vaclaigdbtoo)
	{
		$this->marker[$Vaclaigdbtoo] = microtime(TRUE);
	}

	

	
	public function elapsed_time($V0242fp0scf3 = '', $Vyhpyz235ao3 = '', $Vzigvlwjgbxk = 4)
	{
		if ($V0242fp0scf3 === '')
		{
			return '{elapsed_time}';
		}

		if ( ! isset($this->marker[$V0242fp0scf3]))
		{
			return '';
		}

		if ( ! isset($this->marker[$Vyhpyz235ao3]))
		{
			$this->marker[$Vyhpyz235ao3] = microtime(TRUE);
		}

		return number_format($this->marker[$Vyhpyz235ao3] - $this->marker[$V0242fp0scf3], $Vzigvlwjgbxk);
	}

	

	
	public function memory_usage()
	{
		return '{memory_usage}';
	}

}
