<?php 

namespace jwfpay;
require_once dirname ( __FILE__ ).DIRECTORY_SEPARATOR.'alipay/wappay/service/AlipayTradeService.php';
require_once dirname ( __FILE__ ).DIRECTORY_SEPARATOR.'alipay/wappay/buildermodel/AlipayTradeWapPayContentBuilder.php';
use jwfpay\builder\alipay\WapBuilder;
use jwfpay\builder\alipay\QueryBuilder;

class Alipay
{
	
	private $commonConfig;

	public function __construct($commonConfig)
	{
		$this->commonConfig = $commonConfig;
	}
	
	public function wap($order)
	{
		//$wap = new WapBuilder($this->commonConfig);
		//return $wap->buildParams($order);
		 //超时时间
	    $timeout_express="1m";

	    $payRequestBuilder = new AlipayTradeWapPayContentBuilder();
	    $payRequestBuilder->setBody($body);
	    $payRequestBuilder->setSubject($subject);
	    $payRequestBuilder->setOutTradeNo($out_trade_no);
	    $payRequestBuilder->setTotalAmount($total_amount);
	    $payRequestBuilder->setTimeExpress($timeout_express);

	    $payResponse = new AlipayTradeService($this->commonConfig);
	    $result=$payResponse->wapPay($payRequestBuilder,$this->commonConfig['return_url'],$this->commonConfig['notify_url']);

	    return ;
	}

	public function query($order)
	{
		$query = new QueryBuilder($this->commonConfig);
		return $query->run($order);
	}
}