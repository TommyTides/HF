<?php

namespace App\Models;

class Product
{
    protected int $product_id;
    protected int $product_type;
    protected ?int $event_id;
    protected string $name;
    protected string $description;
    protected float $price_exc_vat;
    protected float $vat;
    protected ?string $image;
    protected ?string $event_type;
    protected ?string $date;
    protected ?string $time;
    protected ?string $language;
    protected ?int $amount;
    protected ?int $no_of_seats;

    /**
     * @return int
     */
    public function getProductId(): int
    {
        return $this->product_id;
    }

    /**
     * @param int $product_id
     */
    public function setProductId(int $product_id): void
    {
        $this->product_id = $product_id;
    }

    /**
     * @return int
     */
    public function getProductType(): int
    {
        return $this->product_type;
    }

    /**
     * @param int $product_type
     */
    public function setProductType(int $product_type): void
    {
        $this->product_type = $product_type;
    }

    /**
     * @return int|null
     */
    public function getEventId(): ?int
    {
        return $this->event_id;
    }

    /**
     * @param int|null $event_id
     */
    public function setEventId(?int $event_id): void
    {
        $this->event_id = $event_id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return float
     */
    public function getPriceExcVat(): float
    {
        return $this->price_exc_vat;
    }

    /**
     * @param float $price_exc_vat
     */
    public function setPriceExcVat(float $price_exc_vat): void
    {
        $this->price_exc_vat = $price_exc_vat;
    }

    /**
     * @return float
     */
    public function getVat(): float
    {
        return $this->vat;
    }

    /**
     * @param float $vat
     */
    public function setVat(float $vat): void
    {
        $this->vat = $vat;
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return round($this->getPriceExcVat() * (1 + ($this->getVat() / 100)), 2);
    }

    /**
     * @return string|null
     */
    public function getImage(): ?string
    {
        return $this->image;
    }

    /**
     * @param string|null $image
     */
    public function setImage(?string $image): void
    {
        $this->image = $image;
    }

    /**
     * @return string|null
     */
    public function getEventType(): ?string
    {
        return $this->event_type;
    }

    /**
     * @param string|null $event_type
     */
    public function setEventType(?string $event_type): void
    {
        $this->event_type = $event_type;
    }

    /**
     * @return string|null
     */
    public function getDate(): ?string
    {
        return $this->date;
    }

    /**
     * @param string|null $date
     */
    public function setDate(?string $date): void
    {
        $this->date = $date;
    }

    /**
     * @return string|null
     */
    public function getTime(): ?string
    {
        return $this->time;
    }

    /**
     * @param string|null $time
     */
    public function setTime(?string $time): void
    {
        $this->time = $time;
    }

    /**
     * @return string|null
     */
    public function getLanguage(): ?string
    {
        return $this->language;
    }

    /**
     * @param string|null $language
     */
    public function setLanguage(?string $language): void
    {
        $this->language = $language;
    }

    /**
     * @return int|null
     */
    public function getAmount(): ?int
    {
        return $this->amount;
    }

    /**
     * @param int|null $amount
     */
    public function setAmount(?int $amount): void
    {
        $this->amount = $amount;
    }

    /**
     * @return int|null
     */
    public function getNoOfSeats(): ?int
    {
        return $this->no_of_seats;
    }

    /**
     * @param int|null $no_of_seats
     */
    public function setNoOfSeats(?int $no_of_seats): void
    {
        $this->no_of_seats = $no_of_seats;
    }
}
