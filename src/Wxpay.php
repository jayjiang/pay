<?php

namespace jwfpay;

use jwfpay\wxpay\Curl;
use jwfpay\builder\wxpay\H5;

class Wxpay
{
	public $commonConfig;
	
	public function __construct($commonConfig)
	{
		$this->commonConfig = $commonConfig;
	}

	public function h5($order)
	{	
		$h5 = new H5($this->commonConfig);
		$h5->buildParams($order);
	}
}