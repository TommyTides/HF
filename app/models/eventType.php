<?php
namespace App\Models;

class EventType{
    private string $event_type;
    private int $event_type_id;

	/**
	 * @return string
	 */
	public function getEvent_type(): string {
		return $this->event_type;
	}
	
	/**
	 * @param string $event_type 
	 * @return self
	 */
	public function setEvent_type(string $event_type): self {
		$this->event_type = $event_type;
		return $this;
	}


	/**
	 * @return int
	 */
	public function getEventType_id(): int {
		return $this->event_type_id;
	}
	
	/**
	 * @param int $eventType_id 
	 * @return self
	 */
	public function setEventType_id(int $eventType_id): self {
		$this->event_type_id = $eventType_id;
		return $this;
	}
}