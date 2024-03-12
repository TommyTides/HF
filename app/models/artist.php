<?php
namespace App\Models;

class Artist {
    public int $artist_id;
    public ?string $artist_name = null;
    public ?string $first_name = null;
    public ?string $last_name = null;
    public ?string $biography = null;
    public ?string $member_description = null;
    public ?int $event_type = null;   
    public ?string $music_sample_1 = null;
    public ?string $music_sample_2 = null;
    public ?string $music_sample_3 = null;
}

?>