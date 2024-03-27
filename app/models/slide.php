<?php

namespace App\Models;

class Slide
{

	private int $id;
	private string $title;
	private string $sub_title;
	private string $content;
	private int $artist_id;

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
	public function getTitle(): string
	{
		return $this->title;
	}

	/**
	 * @param string $title 
	 * @return self
	 */
	public function setTitle(string $title): self
	{
		$this->title = $title;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getSub_title(): string
	{
		return $this->sub_title;
	}

	/**
	 * @param string $sub_title 
	 * @return self
	 */
	public function setSub_title(string $sub_title): self
	{
		$this->sub_title = $sub_title;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getContent(): string
	{
		return $this->content;
	}

	/**
	 * @param int $content 
	 * @return self
	 */
	public function setContent(int $content): self
	{
		$this->content = $content;
		return $this;
	}
}
