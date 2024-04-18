<?php
namespace App\Repositories;
use PDO;
use PDOException;
use App\Models\Page;

class PageEditorRepository extends Repository
{

    public function checkPageContainerExists(string $path, string $container): bool
    {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM webpages WHERE path = :path AND container = :container");
            $stmt->bindParam(':path', $path);
            $stmt->bindParam(':container', $container);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            return (bool)$row;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    //delete custom page
    public function deletePage(string $id): bool
    {
        try {
            $stmt = $this->connection->prepare("DELETE FROM webpages WHERE id = :id");
            $stmt->bindParam(':id', $id);
            return $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function updatePage(string $path, string $container, string $html): bool
    {
        try {
            $stmt = $this->connection->prepare("UPDATE webpages SET html = :html WHERE path = :path AND container = :container");
            $stmt->bindParam(':path', $path);
            $stmt->bindParam(':container', $container);
            $stmt->bindParam(':html', $html);
            return $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }

    }
    public function updatePageById(string $id, string $html): bool
    {
        try {
            $stmt = $this->connection->prepare("UPDATE webpages SET html = :html WHERE id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':html', $html);
            return $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }

    }

    public function createPage(string $path, string $container, string $html, string $name): bool
    {
        try {
            $stmt = $this->connection->prepare("INSERT INTO webpages (path, container, html, name) VALUES (:path, :container, :html, :name)");
            $stmt->bindParam(':path', $path);
            $stmt->bindParam(':container', $container);
            $stmt->bindParam(':html', $html);
            $stmt->bindParam(':name', $name);
            return $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function retrievePage($path, $container): ?string
    {
        try {
            $stmt = $this->connection->prepare("SELECT html FROM webpages WHERE path = :path AND container = :container");
            $stmt->bindParam(':path', $path);
            $stmt->bindParam(':container', $container);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            return $row['html'];
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    public function retrievePageById($id)
    {
        try {
            $stmt = $this->connection->prepare("SELECT html FROM webpages WHERE id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            return $row['html'];
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    public function getAllPagesWhereNameIsNotNull(): array|null
    {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM webpages");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_CLASS, 'App\\Models\\Page');
        } catch (PDOException $e) {
            echo $e->getMessage();
            return null;
        }
    }
}
