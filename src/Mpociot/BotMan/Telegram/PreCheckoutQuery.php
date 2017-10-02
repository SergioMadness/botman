<?php namespace Mpociot\BotMan\Telegram;

use Mpociot\BotMan\Message;

/**
 * Pre-checkout query
 * @package Mpociot\BotMan\Telegram
 */
class PreCheckoutQuery extends Message
{
    /**
     * Currency code
     *
     * @var string
     */
    private $currency;

    /**
     * Total amount
     *
     * @var int
     */
    private $amount;

    /**
     * Invoice payload
     *
     * @var string
     */
    private $invoice;

    /**
     * Shipping option id
     *
     * @var string
     */
    private $shippingOptionId;

    /**
     * Order info
     *
     * @var OrderInfo
     */
    private $orderInfo;

    public function __construct($user, $channel, $payload)
    {
        parent::__construct('', $user, $channel, $payload);

        $this
            ->setCurrency($payload['currency'])
            ->setAmount($payload['total_amount'])
            ->setInvoice($payload['invoice_payload'])
            ->setShippingOptionId($payload['shipping_option_id'])
            ->setOrderInfo(new OrderInfo(
                $payload['order_info']['name'],
                $payload['order_info']['phone_number'],
                $payload['order_info']['email'],
                $payload['order_info']['shipping_address']
            ));
    }

    /**
     * @return string
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * @param string $currency
     *
     * @return $this
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;

        return $this;
    }

    /**
     * @return int
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param int $amount
     *
     * @return $this
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * @return string
     */
    public function getInvoice()
    {
        return $this->invoice;
    }

    /**
     * @param string $invoice
     *
     * @return $this
     */
    public function setInvoice($invoice)
    {
        $this->invoice = $invoice;

        return $this;
    }

    /**
     * @return string
     */
    public function getShippingOptionId()
    {
        return $this->shippingOptionId;
    }

    /**
     * @param string $shippingOptionId
     *
     * @return $this
     */
    public function setShippingOptionId($shippingOptionId)
    {
        $this->shippingOptionId = $shippingOptionId;

        return $this;
    }

    /**
     * @return OrderInfo
     */
    public function getOrderInfo()
    {
        return $this->orderInfo;
    }

    /**
     * @param OrderInfo $orderInfo
     *
     * @return $this
     */
    public function setOrderInfo(OrderInfo $orderInfo)
    {
        $this->orderInfo = $orderInfo;

        return $this;
    }


}