<?php
namespace App\Models;
class Artist {

    private ?int $artist_id;
    private string $artist_name;
    private ?string $first_name;
    private ?string $last_name;
    private ?string $biography;
    private ?string $member_description;
    private ?int $event_type;
	private string $artist_image;
    private ?string $music_sample_1;
    private ?string $music_sample_2;
    private ?string $music_sample_3;

    public function withAttr($artist_id, $artist_name, $first_name, $last_name, $biography, $member_description, $event_type){
        $this->artist_id = $artist_id;
        $this->artist_name = $artist_name;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->biography = $biography;
        $this->member_description = $member_description;
        $this->event_type = $event_type;
    }

    /**
     * @return int
     */
    public function getArtistId(): int
    {
        return $this->artist_id;
    }

    /**
     * @param int $artist_id
     */
    public function setArtistId(int $artist_id): void
    {
        $this->artist_id = $artist_id;
    }

    /**
     * @return string
     */
    public function getArtistName(): string
    {
        return $this->artist_name;
    }

    /**
     * @param string $artist_name
     */
    public function setArtistName(string $artist_name): void
    {
        $this->artist_name = $artist_name;
    }

    /**
     * @return string|null
     */
    public function getFirstName(): ?string
    {
        return $this->first_name;
    }

    /**
     * @param string|null $first_name
     */
    public function setFirstName(?string $first_name): void
    {
        $this->first_name = $first_name;
    }

    /**
     * @return string|null
     */
    public function getLastName(): ?string
    {
        return $this->last_name;
    }

    /**
     * @param string|null $last_name
     */
    public function setLastName(?string $last_name): void
    {
        $this->last_name = $last_name;
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
    public function getArtistImage(): string
    {
        return $this->artist_image;
    }

    /**
     * @param string $artist_image
     */
    public function setArtistImage(string $artist_image): void
    {
        $this->artist_image = $artist_image;
    }

    /**
     * @return string|null
     */
    public function getBiography(): ?string
    {
        return $this->biography;
    }

    /**
     * @param string|null $biography
     */
    public function setBiography(?string $biography): void
    {
        $this->biography = $biography;
    }

    /**
     * @return string|null
     */
    public function getMemberDescription(): ?string
    {
        return $this->member_description;
    }

    /**
     * @param string|null $member_description
     */
    public function setMemberDescription(?string $member_description): void
    {
        $this->member_description = $member_description;
    }

	/**
	 * @return int|null
	 */
	public function getEvent_type(): ?int {
		return $this->event_type;
	}
	
	/**
	 * @param int|null $event_type 
	 * @return self
	 */
	public function setEvent_type(?int $event_type): self {
		$this->event_type = $event_type;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getArtist_image(): string {
		return $this->artist_image;
	}
	
	/**
	 * @param string $artist_image 
	 * @return self
	 */
	public function setArtist_image(string $artist_image): self {
		$this->artist_image = $artist_image;
		return $this;
	}

    /**
     * @return string|null
     */
    public function getMusicSample1(): ?string
    {
        return $this->music_sample_1;
    }

    /**
     * @param string|null $music_sample_1
     */
    public function setMusicSample1(?string $music_sample_1): void
    {
        $this->music_sample_1 = $music_sample_1;
    }

    /**
     * @return string|null
     */
    public function getMusicSample2(): ?string
    {
        return $this->music_sample_2;
    }

    /**
     * @param string|null $music_sample_2
     */
    public function setMusicSample2(?string $music_sample_2): void
    {
        $this->music_sample_2 = $music_sample_2;
    }

    /**
     * @return string|null
     */
    public function getMusicSample3(): ?string
    {
        return $this->music_sample_3;
    }

    /**
     * @param string|null $music_sample_3
     */
    public function setMusicSample3(?string $music_sample_3): void
    {
        $this->music_sample_3 = $music_sample_3;
    }
}
