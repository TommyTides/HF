<?php

namespace App\Models;

class ArtistPage
{

	private int $id;
	private string $name;
	private string $artist_description;
	private int $slide_1;
	private int $slide_2;
	private int $slide_3;

	/**
	 * @return int
	 */
	public function getId(): int
	{
		return $this->id;
	}

	/**
	 * @param int $id 
	 * @return self
	 */
	public function setId(int $id): self
	{
		$this->id = $id;
		return $this;
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
	 * @return self
	 */
	public function setName(string $name): self
	{
		$this->name = $name;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getArtist_description(): string
	{
		return $this->artist_description;
	}

	/**
	 * @param string $artist_description 
	 * @return self
	 */
	public function setArtist_description(string $artist_description): self
	{
		$this->artist_description = $artist_description;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getSlide_1(): string
	{
		return $this->slide_1;
	}

	/**
	 * @param int $slide_1 
	 * @return self
	 */
	public function setSlide_1(string $slide_1): self
	{
		$this->slide_1 = $slide_1;
		return $this;
	}

	/**
	 * @return int
	 */
	public function getSlide_2(): int
	{
		return $this->slide_2;
	}

	/**
	 * @param int $slide_2 
	 * @return self
	 */
	public function setSlide_2(int $slide_2): self
	{
		$this->slide_2 = $slide_2;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getSlide_3(): string
	{
		return $this->slide_3;
	}

	/**
	 * @param int $slide_3 
	 * @return self
	 */
	public function setSlide_3(string $slide_3): self
	{
		$this->slide_3 = $slide_3;
		return $this;
	}
}
