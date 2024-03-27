<?php

namespace App\Models;

class Image
{
    private string $image;
    private int $image_id;

    /**
     * @return int
     */
    public function getImage_id(): int
    {
        return $this->image_id;
    }

    /**
     * @param int $image_id 
     * @return self
     */
    public function setImage_id(int $image_id): self
    {
        $this->image_id = $image_id;
        return $this;
    }

    /**
     * @return string
     */
    public function getImage(): string
    {
        return $this->image;
    }

    /**
     * @param string $image 
     * @return self
     */
    public function setImage(string $image): self
    {
        $this->image = $image;
        return $this;
    }
}
