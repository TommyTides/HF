<?php
namespace App\Models;

class JazzProduct extends Product
{
    private string $start_time;
    private string $end_time;
    private int $location_id;
    private string $location;
    private ?string $sublocation;

    /**
     * @return string
     */
    public function getStartTime(): string
    {
        return $this->start_time;
    }

    /**
     * @param string $start_time
     */
    public function setStartTime(string $start_time): void
    {
        $this->start_time = $start_time;
    }

    /**
     * @return string
     */
    public function getEndTime(): string
    {
        return $this->end_time;
    }

    /**
     * @param string $end_time
     */
    public function setEndTime(string $end_time): void
    {
        $this->end_time = $end_time;
    }

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
    public function getLocation(): string
    {
        return $this->location;
    }

    /**
     * @param string $location
     */
    public function setLocation(string $location): void
    {
        $this->location = $location;
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
}
