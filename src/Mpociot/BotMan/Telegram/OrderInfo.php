<?php namespace Mpociot\BotMan\Telegram;

/**
 * Order info
 * @package Mpociot\BotMan\Telegram
 */
class OrderInfo
{
    /**
     * User's name
     *
     * @var string
     */
    private $name;

    /**
     * User's phone number
     *
     * @var string
     */
    private $phoneNumber;

    /**
     * User's e-mail
     *
     * @var string
     */
    private $email;

    /**
     * Shipping address
     *
     * @var string
     */
    private $shippingAddress;

    public function __construct($name = '', $phoneNumber = '', $email = '', $shippingAddress = '')
    {
        $this->setName($name)->setPhoneNumber($phoneNumber)->setEmail($email)->setShippingAddress($shippingAddress);
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    /**
     * @param string $phoneNumber
     *
     * @return $this
     */
    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     *
     * @return $this
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return string
     */
    public function getShippingAddress()
    {
        return $this->shippingAddress;
    }

    /**
     * @param string $shippingAddress
     *
     * @return $this
     */
    public function setShippingAddress($shippingAddress)
    {
        $this->shippingAddress = $shippingAddress;

        return $this;
    }


}