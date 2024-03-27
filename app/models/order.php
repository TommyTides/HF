<?php

namespace App\Models;

class Order{
    private int $order_id;
    private string $mollie_id;
    private string $status;
    private string $email;
    private string $phone_number;
    private string $billing_first_name;
    private string $billing_last_name;
    private string $billing_street;
    private string $billing_house_number;
    private string $billing_postal_code;
    private string $billing_city;
    private string $billing_state;
    private string $billing_country;
    private string $timestamp;
    private ?string $checkout_url;
    private ?string $description;
    private ?string $method;
    private ?float $amount;
    private ?string $currency;

    /**
     * @return int
     */
    public function getOrderId(): int
    {
        return $this->order_id;
    }

    /**
     * @param int $order_id
     */
    public function setOrderId(int $order_id): void
    {
        $this->order_id = $order_id;
    }

    /**
     * @return string
     */
    public function getMollieId(): string
    {
        return $this->mollie_id;
    }

    /**
     * @param string $mollie_id
     */
    public function setMollieId(string $mollie_id): void
    {
        $this->mollie_id = $mollie_id;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getPhoneNumber(): string
    {
        return $this->phone_number;
    }

    /**
     * @param string $phone_number
     */
    public function setPhoneNumber(string $phone_number): void
    {
        $this->phone_number = $phone_number;
    }

    /**
     * @return string
     */
    public function getBillingFirstName(): string
    {
        return $this->billing_first_name;
    }

    /**
     * @param string $billing_first_name
     */
    public function setBillingFirstName(string $billing_first_name): void
    {
        $this->billing_first_name = $billing_first_name;
    }

    /**
     * @return string
     */
    public function getBillingLastName(): string
    {
        return $this->billing_last_name;
    }

    /**
     * @param string $billing_last_name
     */
    public function setBillingLastName(string $billing_last_name): void
    {
        $this->billing_last_name = $billing_last_name;
    }

    /**
     * @return string
     */
    public function getBillingStreet(): string
    {
        return $this->billing_street;
    }

    /**
     * @param string $billing_street
     */
    public function setBillingStreet(string $billing_street): void
    {
        $this->billing_street = $billing_street;
    }

    /**
     * @return string
     */
    public function getBillingHouseNumber(): string
    {
        return $this->billing_house_number;
    }

    /**
     * @param string $billing_house_number
     */
    public function setBillingHouseNumber(string $billing_house_number): void
    {
        $this->billing_house_number = $billing_house_number;
    }

    /**
     * @return string
     */
    public function getBillingPostalCode(): string
    {
        return $this->billing_postal_code;
    }

    /**
     * @param string $billing_postal_code
     */
    public function setBillingPostalCode(string $billing_postal_code): void
    {
        $this->billing_postal_code = $billing_postal_code;
    }

    /**
     * @return string
     */
    public function getBillingCity(): string
    {
        return $this->billing_city;
    }

    /**
     * @param string $billing_city
     */
    public function setBillingCity(string $billing_city): void
    {
        $this->billing_city = $billing_city;
    }

    /**
     * @return string
     */
    public function getBillingState(): string
    {
        return $this->billing_state;
    }

    /**
     * @param string $billing_state
     */
    public function setBillingState(string $billing_state): void
    {
        $this->billing_state = $billing_state;
    }

    /**
     * @return string
     */
    public function getBillingCountry(): string
    {
        return $this->billing_country;
    }

    /**
     * @param string $billing_country
     */
    public function setBillingCountry(string $billing_country): void
    {
        $this->billing_country = $billing_country;
    }

    /**
     * @return string
     */
    public function getTimestamp(): string
    {
        return $this->timestamp;
    }

    /**
     * @param string $timestamp
     */
    public function setTimestamp(string $timestamp): void
    {
        $this->timestamp = $timestamp;
    }

    /**
     * @return string|null
     */
    public function getCheckoutUrl(): ?string
    {
        return $this->checkout_url;
    }

    /**
     * @param string|null $checkout_url
     */
    public function setCheckoutUrl(?string $checkout_url): void
    {
        $this->checkout_url = $checkout_url;
    }

    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string|null $description
     */
    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @param string $status
     */
    public function setStatus(string $status): void
    {
        $this->status = $status;
    }

    /**
     * @return string|null
     */
    public function getMethod(): ?string
    {
        return $this->method;
    }

    /**
     * @param string|null $method
     */
    public function setMethod(?string $method): void
    {
        $this->method = $method;
    }

    /**
     * @return float|null
     */
    public function getAmount(): ?float
    {
        return $this->amount;
    }

    /**
     * @param float|null $amount
     */
    public function setAmount(?float $amount): void
    {
        $this->amount = $amount;
    }

    /**
     * @return string|null
     */
    public function getCurrency(): ?string
    {
        return $this->currency;
    }

    /**
     * @param string|null $currency
     */
    public function setCurrency(?string $currency): void
    {
        $this->currency = $currency;
    }
}