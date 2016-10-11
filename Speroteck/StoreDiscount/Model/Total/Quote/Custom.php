<?php
namespace Speroteck\StoreDiscount\Model\Total\Quote;
use Magento\Framework\App\Action\Context;
/**
 * Class Custom
 * @package Speroteck\StoreDiscount\Model\Total\Quote
 */
class Custom extends \Magento\Quote\Model\Quote\Address\Total\AbstractTotal
{
    /**
     * @var \Magento\Framework\Pricing\PriceCurrencyInterface
     */
    protected $_priceCurrency;
    protected $_logger;
    protected $_context;
    /**
     * Custom constructor.
     * @param \Magento\Framework\Pricing\PriceCurrencyInterface $priceCurrency
     */
    public function __construct(
        Context $context,
        \Magento\Framework\Pricing\PriceCurrencyInterface $priceCurrency,
        \Speroteck\CustomLogger\Logger\Logger $logger
    ){
        $this->_priceCurrency = $priceCurrency;
        $this->_logger = $logger;
        $logger->info("context\n");
        $logger->info($context->getRequest());
        $logger->info("context\n");
    }
    /**
     * @param \Magento\Quote\Model\Quote $quote
     * @param \Magento\Quote\Api\Data\ShippingAssignmentInterface $shippingAssignment
     * @param \Magento\Quote\Model\Quote\Address\Total $total
     * @return $this|bool
     */
    public function collect(
        \Magento\Quote\Model\Quote $quote,
        \Magento\Quote\Api\Data\ShippingAssignmentInterface $shippingAssignment,
        \Magento\Quote\Model\Quote\Address\Total $total
    ) {
        parent::collect($quote, $shippingAssignment, $total);

        $address             = $shippingAssignment->getShipping()->getAddress();
        $label               = 'Store Discount';
        $discountAmount      = -10;
        $appliedCartDiscount = 0;
        if($total->getDiscountDescription()) {
            // If a discount exists in cart and another discount is applied, the add both discounts.
            $appliedCartDiscount = $total->getDiscountAmount();
            $discountAmount      = $total->getDiscountAmount()+$discountAmount;
            $label               = $total->getDiscountDescription().', '.$label;
        }

        $total->setDiscountDescription($label);
        $total->setDiscountAmount($discountAmount);
        $total->setBaseDiscountAmount($discountAmount);
        $total->setSubtotalWithDiscount($total->getSubtotal() + $discountAmount);
        $total->setBaseSubtotalWithDiscount($total->getBaseSubtotal() + $discountAmount);

        $this->_logger->info($total->convertToJson());
        if(isset($appliedCartDiscount)) {
            $total->addTotalAmount($this->getCode(), $discountAmount - $appliedCartDiscount);
            $total->addBaseTotalAmount($this->getCode(), $discountAmount - $appliedCartDiscount);
        } else {
            $total->addTotalAmount($this->getCode(), $discountAmount);
            $total->addBaseTotalAmount($this->getCode(), $discountAmount);
        }

        return $this;
    }
}
