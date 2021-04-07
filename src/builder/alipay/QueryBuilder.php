<?php

namespace jwfpay\builder\alipay;

use jwfpay\builder\alipay\BaseBuilder;

class QueryBuilder extends BaseBuilder
{
    public function getApiMethodName()
    {
        return 'alipay.trade.query';
    }
}
