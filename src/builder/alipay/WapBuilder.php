<?php

namespace jwfpay\builder\alipay;

use jwfpay\util\DataParse;
use jwfpay\builder\alipay\BaseBuilder;

class WapBuilder extends BaseBuilder
{
    public function __construct($commonConfig)
    {
        parent::__construct($commonConfig);
    }

    public function getApiMethodName()
    {
        return 'alipay.trade.wap.pay';
    }
}
