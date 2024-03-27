<?php
namespace App\Models;
class Event{
    private int $event_id;
    private ?int $event_type;
    private string $name;
    private ?string $description;
    private string $start_time;
    private string $end_time;
    private string $sub_description;
    private int $no_of_seats;

    /**
     * @return int
     */
    public function getEventId(): int
    {
        return $this->event_id;
    }

    /**
     * @param int $event_id
     */
    public function setEventId(int $event_id): void
    {
        $this->event_id = $event_id;
    }

    /**
     * @return int|null
     */
    public function getEventType(): ?int
    {
        return $this->event_type;
    }

    /**
     * @param int|null $event_type
     */
    public function setEventType(?int $event_type): void
    {
        $this->event_type = $event_type;
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
     * @return string
     */
    public function getSubDescription(): string
    {
        return $this->sub_description;
    }

    /**
     * @param string $sub_description
     */
    public function setSubDescription(string $sub_description): void
    {
        $this->sub_description = $sub_description;
    }

	/**
	 * @return int
	 */
	public function getNoOfSeats(): int {
		return $this->no_of_seats;
	}
	
	/**
	 * @param int $no_of_seats 
	 * @return self
	 */
	public function setNo_of_seats(int $no_of_seats): self {
		$this->no_of_seats = $no_of_seats;
		return $this;
	}
}