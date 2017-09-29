<?php namespace Mpociot\BotMan\Telegram;

use Mpociot\BotMan\Messages\Message;

/**
 * Receipt for goods
 * @package Mpociot\BotMan
 */
class ReceiptMessage extends Message
{
    //<editor-fold desc="variables">
    /**
     * Product name
     *
     * @var string
     */
    private $title;

    /**
     * Bot-defined invoice payload, 1-128 bytes.
     * This will not be displayed to the user, use for your internal processes.
     *
     * @var string
     */
    private $payload;

    /**
     * Payments provider token, obtained via Botfather
     *
     * @var string
     */
    private $providerToken;

    /**
     * Unique deep-linking parameter that can be used to generate this invoice when used as a start parameter
     *
     * @var string
     */
    private $deepLinkingCommand;

    /**
     * Three-letter ISO 4217 currency code, see more on currencies
     *
     * @var string
     */
    private $currency;

    /**
     * Portion label
     *
     * @var string
     */
    private $priceLabel;

    /**
     * Price of the product in the smallest units of the currency (integer, not float/double).
     * For example, for a price of US$ 1.45 pass amount = 145.
     *
     * @var int
     */
    private $priceAmount;

    /**
     * See the exp parameter in currencies.json,
     * it shows the number of digits past the decimal point for each currency (2 for the majority of currencies).
     *
     * @var int
     */
    private $priceExp = 2;

    /**
     * Pass True, if you require the user's full name to complete the order
     *
     * @var bool
     */
    private $needName = false;

    /**
     * Pass True, if you require the user's phone number to complete the order
     *
     * @var bool
     */
    private $needPhoneNumber = false;

    /**
     * Pass True, if you require the user's email to complete the order
     *
     * @var bool
     */
    private $needEmail = false;

    /**
     * Pass True, if you require the user's shipping address to complete the order
     *
     * @var bool
     */
    private $needShippingAddress = false;

    /**
     * Pass True, if the final price depends on the shipping method
     *
     * @var bool
     */
    private $isFlexible = false;

    /**
     * Sends the message silently. Users will receive a notification with no sound.
     *
     * @var bool
     */
    private $disableNotification = false;

    //</editor-fold>

    public function toArray()
    {
        return [
            'title'                 => $this->getTitle(),
            'description'           => $this->getMessage(),
            'payload'               => $this->getPayload(),
            'provider_token'        => $this->getProviderToken(),
            'start_parameter'       => $this->getDeepLinkingCommand(),
            'currency'              => $this->getCurrency(),
            'prices'                => json_encode([
                [
                    'label'  => $this->getPriceLabel(),
                    'amount' => Invoice::preparePrice($this->getPriceLabel(), $this->getPriceExp()),
                ],
            ]),
            'photo_url'             => $this->getImage(),
            'need_name'             => $this->isNeedName(),
            'need_phone_number'     => $this->isNeedPhoneNumber(),
            'need_email'            => $this->isNeedEmail(),
            'need_shipping_address' => $this->isNeedShippingAddress(),
            'is_flexible'           => $this->isFlexible(),
            'disable_notification'  => $this->isDisableNotification(),
        ];
    }

    //<editor-fold desc="getters and setters">
    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     *
     * @return $this
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return string
     */
    public function getPayload()
    {
        return $this->payload;
    }

    /**
     * @param string $payload
     *
     * @return $this
     */
    public function setPayload($payload)
    {
        $this->payload = $payload;

        return $this;
    }

    /**
     * @return string
     */
    public function getProviderToken()
    {
        return $this->providerToken;
    }

    /**
     * @param string $providerToken
     *
     * @return $this
     */
    public function setProviderToken($providerToken)
    {
        $this->providerToken = $providerToken;

        return $this;
    }

    /**
     * @return string
     */
    public function getDeepLinkingCommand()
    {
        return $this->deepLinkingCommand;
    }

    /**
     * @param string $deepLinkingCommand
     *
     * @return $this
     */
    public function setDeepLinkingCommand($deepLinkingCommand)
    {
        $this->deepLinkingCommand = $deepLinkingCommand;

        return $this;
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
     * @return string
     */
    public function getPriceLabel()
    {
        return $this->priceLabel;
    }

    /**
     * @param string $priceLabel
     *
     * @return $this
     */
    public function setPriceLabel($priceLabel)
    {
        $this->priceLabel = $priceLabel;

        return $this;
    }

    /**
     * @return int
     */
    public function getPriceAmount()
    {
        return $this->priceAmount;
    }

    /**
     * @param int $priceAmount
     *
     * @return $this
     */
    public function setPriceAmount($priceAmount)
    {
        $this->priceAmount = $priceAmount;

        return $this;
    }

    /**
     * @return int
     */
    public function getPriceExp()
    {
        return $this->priceExp;
    }

    /**
     * @param int $priceExp
     *
     * @return $this
     */
    public function setPriceExp($priceExp)
    {
        $this->priceExp = $priceExp;

        return $this;
    }

    /**
     * @return boolean
     */
    public function isNeedName()
    {
        return $this->needName;
    }

    /**
     * @param boolean $needName
     *
     * @return $this
     */
    public function setNeedName($needName)
    {
        $this->needName = $needName;

        return $this;
    }

    /**
     * @return boolean
     */
    public function isNeedPhoneNumber()
    {
        return $this->needPhoneNumber;
    }

    /**
     * @param boolean $needPhoneNumber
     *
     * @return $this
     */
    public function setNeedPhoneNumber($needPhoneNumber)
    {
        $this->needPhoneNumber = $needPhoneNumber;

        return $this;
    }

    /**
     * @return boolean
     */
    public function isNeedEmail()
    {
        return $this->needEmail;
    }

    /**
     * @param boolean $needEmail
     *
     * @return $this
     */
    public function setNeedEmail($needEmail)
    {
        $this->needEmail = $needEmail;

        return $this;
    }

    /**
     * @return boolean
     */
    public function isNeedShippingAddress()
    {
        return $this->needShippingAddress;
    }

    /**
     * @param boolean $needShippingAddress
     *
     * @return $this
     */
    public function setNeedShippingAddress($needShippingAddress)
    {
        $this->needShippingAddress = $needShippingAddress;

        return $this;
    }

    /**
     * @return boolean
     */
    public function isFlexible()
    {
        return $this->isFlexible;
    }

    /**
     * @param boolean $isFlexible
     *
     * @return $this
     */
    public function setIsFlexible($isFlexible)
    {
        $this->isFlexible = $isFlexible;

        return $this;
    }

    /**
     * @return boolean
     */
    public function isDisableNotification()
    {
        return $this->disableNotification;
    }

    /**
     * @param boolean $disableNotification
     *
     * @return $this
     */
    public function setDisableNotification($disableNotification)
    {
        $this->disableNotification = $disableNotification;

        return $this;
    }
    //</editor-fold>
}