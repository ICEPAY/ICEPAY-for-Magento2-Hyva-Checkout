<?php

declare(strict_types=1);

namespace Icepay\HyvaCheckout;

use Hyva\Checkout\Model\Magewire\Payment\AbstractOrderData;
use Hyva\Checkout\Model\Magewire\Payment\AbstractPlaceOrderService;
use Magento\Framework\Url;
use Magento\Quote\Api\CartManagementInterface;
use Magento\Quote\Model\Quote;

class IcepayPlaceOrder extends AbstractPlaceOrderService
{
    public function __construct(
        CartManagementInterface $cartManagement,
        private readonly Url $urlBuilder,
        AbstractOrderData $orderData = null
    ) {
        parent::__construct($cartManagement, $orderData);
    }


    public function getRedirectUrl(Quote $quote, ?int $orderId = null): string
    {
        return $this->urlBuilder->getUrl('icepay/payment/redirect');
    }
}
