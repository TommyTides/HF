<?php
namespace App\Models;

class DanceLocation
{
    private int $id;
    private string $name;
    private string $address;
    private bool $wheelchair_access;
    private string $image;
    private string $opening_time;
    private string $closing_time;

    /**
	 * @return int
	 */
	public function getId(): int {
		return $this->id;
	}
	
	/**
	 * @param int $id 
	 * @return self
	 */
	public function setId(int $id): self {
		$this->id = $id;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getName(): string {
		return $this->name;
	}
	
	/**
	 * @param string $name 
	 * @return self
	 */
	public function setName(string $name): self {
		$this->name = $name;
		return $this;
	}
    
	/**
	 * @return string
	 */
	public function getAddress(): string {
		return $this->address;
	}
	
	/**
	 * @param string $address 
	 * @return self
	 */
	public function setAddress(string $address): self {
		$this->address = $address;
		return $this;
	}

	/**
	 * @return bool
	 */
	public function getWheelchair_access(): bool {
		return $this->wheelchair_access;
	}
	
	/**
	 * @param bool $wheelchair_access 
	 * @return self
	 */
	public function setWheelchair_access(bool $wheelchair_access): self {
		$this->wheelchair_access = $wheelchair_access;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getImage(): string {
		return $this->image;
	}
	
	/**
	 * @param string $image 
	 * @return self
	 */
	public function setImage(string $image): self {
		$this->image = $image;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getOpening_time(): string {
		return $this->opening_time;
	}
	
	/**
	 * @param string $opening_time 
	 * @return self
	 */
	public function setOpening_time(string $opening_time): self {
		$this->opening_time = $opening_time;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getClosing_time(): string {
		return $this->closing_time;
	}
	
	/**
	 * @param string $closing_time 
	 * @return self
	 */
	public function setClosing_time(string $closing_time): self {
		$this->closing_time = $closing_time;
		return $this;
	}
}