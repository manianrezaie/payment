<?php

namespace Shetabit\Payment;

use Ramsey\Uuid\Uuid;

class InvoiceBuilder
{
    protected $uuid;

    /**
     * Amount
     *
     * @var int
     */
    protected $amount = 0;

    /**
     * invoice's transaction id
     *
     * @var string
     */
    protected $transactionId;

    /**
     * Payment details
     *
     * @var string
     */
    protected $details = [];

    /**
     * @var string
     */
    protected $driver;

    /**
     * InvoiceBuilder constructor.
     *
     * @throws \Exception
     */
    public function __construct()
    {
        $this->setUuid(Uuid::uuid4()->toString());
    }

    /**
     * Set invoice uuid
     *
     * @param $uuid
     */
    public function setUuid($uuid)
    {
        $this->uuid = $uuid;
    }

    /**
     * Get invoice uuid
     *
     * @return string
     */
    public function getUuid() {
        return $this->uuid;
    }

    /**
     * Set a piece of data to the details.
     *
     * @param $key
     * @param null $value
     * @return $this
     */
    public function detail($key, $value = null)
    {
        $key = is_array($key) ? $key : [$key => $value];

        foreach ($key as $k => $v) {
            $this->details[$k] = $v;
        }

        return $this;
    }

    /**
     * Get the value of details
     */
    public function getDetails()
    {
        return $this->details;
    }

    /**
     * Set the amount of invoice
     *
     * @param $amount
     * @return $this
     * @throws \Exception
     */
    public function amount($amount)
    {
        if (! is_int($amount)) {
            throw new \Exception('Amount value should be an integer.');
        }
        $this->amount = $amount;

        return $this;
    }

    /**
     * Get the value of invoice
     */
    public function getAmount()
    {
        return $this->amount;
    }

    public function setTransactionId($id)
    {
        $this->transactionId = $id;

        return $this;
    }

    public function getTransactionId()
    {
        return $this->transactionId;
    }

    /**
     * Set the value of driver
     *
     * @param $driver
     * @return $this
     */
    public function via($driver)
    {
        $this->driver = $driver;

        return $this;
    }

    /**
     * Get the value of driver
     */
    public function getDriver()
    {
        return $this->driver;
    }
}