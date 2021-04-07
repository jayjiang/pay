<?php 

namespace jwfpay;
require_once './alipay/wappay/service/AlipayTradeService.php';
require_once './alipay/wappay/buildermodel/AlipayTradeWapPayContentBuilder.php';
require_once './alipay/wappay/service/AlipayTradeService.php';
require_once './alipay/wappay/buildermodel/AlipayTradeQueryContentBuilder.php';

class Alipay
{
	
	private $commonConfig;

	public function __construct($commonConfig)
	{
		$this->commonConfig = $commonConfig;
	}
	
	public function wap($order)
	{
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
		$out_trade_no = trim($order['out_trade_no']??null);

       //支付宝交易号，和商户订单号二选一
	    $trade_no = trim($order['trade_no']??null);
	    if(empty($out_trade_no) && empty($trade_no)){
	    	new Exception();
	    }

	    $RequestBuilder = new AlipayTradeQueryContentBuilder();
	    $RequestBuilder->setTradeNo($trade_no);
	    $RequestBuilder->setOutTradeNo($out_trade_no);

	    $Response = new AlipayTradeService($config);
	    $result=$Response->Query($RequestBuilder);
	    return ;
	}
}