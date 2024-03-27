<?php

namespace App\Models;

class Location
{
    private int $location_id;
    private string $name;
    private ?string $sublocation;
    private ?string $description;
    private ?string $motto;
    private ?string $email;
    private ?string $phone_number;
    private ?string $phone_number_2;
    private ?string $website;
    private ?string $address_1;
    private ?string $postal_code;
    private ?string $city;
    private ?string $schedule;

    /**
     * @return int
     */
    public function getLocationId(): int
    {
        return $this->location_id;
    }

    /**
     * @param int $location_id
     */
    public function setLocationId(int $location_id): void
    {
        $this->location_id = $location_id;
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
     * @return string|null
     */
    public function getSublocation(): ?string
    {
        return $this->sublocation;
    }

    /**
     * @param string|null $sublocation
     */
    public function setSublocation(?string $sublocation): void
    {
        $this->sublocation = $sublocation;
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
     * @return string|null
     */
    public function getMotto(): ?string
    {
        return $this->motto;
    }

    /**
     * @param string|null $motto
     */
    public function setMotto(?string $motto): void
    {
        $this->motto = $motto;
    }

    /**
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param string|null $email
     */
    public function setEmail(?string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return string|null
     */
    public function getPhoneNumber(): ?string
    {
        return $this->phone_number;
    }

    /**
     * @param string|null $phone_number
     */
    public function setPhoneNumber(?string $phone_number): void
    {
        $this->phone_number = $phone_number;
    }

    /**
     * @return string|null
     */
    public function getPhoneNumber2(): ?string
    {
        return $this->phone_number_2;
    }

    /**
     * @param string|null $phone_number_2
     */
    public function setPhoneNumber2(?string $phone_number_2): void
    {
        $this->phone_number_2 = $phone_number_2;
    }

    /**
     * @return string|null
     */
    public function getWebsite(): ?string
    {
        return $this->website;
    }

    /**
     * @param string|null $website
     */
    public function setWebsite(?string $website): void
    {
        $this->website = $website;
    }

    /**
     * @return string|null
     */
    public function getAddress1(): ?string
    {
        return $this->address_1;
    }

    /**
     * @param string|null $address_1
     */
    public function setAddress1(?string $address_1): void
    {
        $this->address_1 = $address_1;
    }

    /**
     * @return string|null
     */
    public function getPostalCode(): ?string
    {
        return $this->postal_code;
    }

    /**
     * @param string|null $postal_code
     */
    public function setPostalCode(?string $postal_code): void
    {
        $this->postal_code = $postal_code;
    }

    /**
     * @return string|null
     */
    public function getCity(): ?string
    {
        return $this->city;
    }

    /**
     * @param string|null $city
     */
    public function setCity(?string $city): void
    {
        $this->city = $city;
    }


    /**
     * @return string|null
     */
    public function getSchedule(): ?string
    {
        return $this->schedule;
    }

    /**
     * @param string|null $schedule 
     * @return self
     */
    public function setSchedule(?string $schedule): self
    {
        $this->schedule = $schedule;
        return $this;
    }
}
