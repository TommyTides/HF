<?php
namespace App\Models;
class APIKey{
    private int $id;
    private string $api_key;
    private string $created_at;
    private int $userId;

	/**
	 * @return string
	 */
	public function getApi_key(): string {
		return $this->api_key;
	}
	
	/**
	 * @param string $api_key 
	 * @return self
	 */
	public function setApi_key(string $api_key): self {
		$this->api_key = $api_key;
		return $this;
	}

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
	 * @return int
	 */
	public function getUserId(): int {
		return $this->userId;
	}
	
	/**
	 * @param int $userId 
	 * @return self
	 */
	public function setUserId(int $userId): self {
		$this->userId = $userId;
		return $this;
	}



	/**
	 * @return 
	 */
	public function getCreated_at(): string {
		return $this->created_at;
	}
	
	/**
	 * @param  $created_at 
	 * @return self
	 */
	public function setCreated_at(string $created_at): self {
		$this->created_at = $created_at;
		return $this;
	}
}