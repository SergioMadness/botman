<?php namespace Mpociot\BotMan\Telegram;

class Invoice
{
    //<editor-fold desc="variables">
    /**
     * Product name
     *
     * @var string
     */
    private $title;

    /**
     * Product description
     *
     * @var string
     */
    private $description;

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
     * Total price in the smallest units of the currency (integer, not float/double).
     * For example, for a price of US$ 1.45 pass amount = 145.
     *
     * @var int
     */
    private $amount;
    //</editor-fold>


    /**
     * @param mixed $price
     * @param int   $exp
     *
     * @return int
     */
    public static function preparePrice($price, $exp = 2)
    {
        $price = (float)$price;
        $main = floor($price);
        $fraction = substr($price - $main, 0, $exp);
        for ($i = 0; $i < $exp - strlen($fraction); $i++) {
            $fraction .= '0';
        }

        return (int)($main . $fraction);
    }

    public function toArray()
    {
        return [
            'title'           => $this->getTitle(),
            'description'     => $this->getDescription(),
            'start_parameter' => $this->getDeepLinkingCommand(),
            'currency'        => $this->getCurrency(),
            'total_amount'    => $this->getAmount(),
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
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     *
     * @return $this
     */
    public function setDescription($description)
    {
        $this->description = $description;

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
    //</editor-fold>

}