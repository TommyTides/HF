<?php
namespace App\Services;

use App\Repositories\ArtistRepository;
use App\Models\Artist;

class ArtistService
{
    private ArtistRepository $artistRepository;

    public function __construct()
    {
        $this->artistRepository = new ArtistRepository();
    }

    /**
     * Get artist by ID
     */
    public function getArtist(): Artist|null
    {
        if (isset($_GET['id'])) {
            $query = "SELECT artist_id, artist_name, first_name, last_name, biography, member_description, 
                    music_sample_1, music_sample_2, music_sample_3
                    FROM `artists`
                    WHERE artist_id = :id";

            // Get artist
            return $this->artistRepository->getArtist($query, $_GET['id']);
        } else {
            return null;
        }
    }
    /**
     * Get artists by Event ID
     */
    public function getArtistsByEvent($id): Artist|array|null
    {
        // Build query
        $query = "SELECT a.artist_id, a.artist_name, a.first_name, a.last_name
                    FROM `artists` AS a
                    INNER JOIN event_artist AS ea 
                    ON a.artist_id = ea.artist_id 
                    WHERE ea.event_id = :id";

        // Get artists
        return $this->artistRepository->getArtistsByEvent($query, $id);
    }
    function getAll()
    {
        return $this->artistRepository->getAll();
    }

    function getById($id)
    {
        return $this->artistRepository->getById($id);
    }

    function getAllAppearances($artist_name)
    {
        return $this->artistRepository->getAllAppearances($artist_name);
    }

    function getArtistPage($artist_name)
    {
        return $this->artistRepository->getArtistPage($artist_name);
    }
    function getAllSlides($artist_name)
    {
        return $this->artistRepository->getAllSlides($artist_name);
    }
    function updateArtist($artist)
    {
        return $this->artistRepository->updateArtist($artist);
    }
    function deleteArtist($artist_id)
    {
        return $this->artistRepository->deleteArtist($artist_id);
    }
    /**
     * Get artists by Event ID
     */
    public function insertArtist($artist): void
    {
        $this->artistRepository->insertArtist($artist);




        return;

    }
    public function getArtistImage($id, $imageType)
    {
        $imageType = "%" . $imageType . ".%";

        // Build query
        $query = "SELECT image FROM `artist_image` as ai
                    INNER JOIN artists as a 
                    ON ai.artist_id = a.artist_id
                    INNER JOIN images as i
                    ON ai.image_id = i.image_id
                    WHERE i.image LIKE :imageType
                    AND a.artist_id = :id";

        // Get event
        return $this->artistRepository->getArtistProfileImage($query, $id, $imageType);

    }
}