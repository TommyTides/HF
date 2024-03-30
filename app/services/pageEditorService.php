<?php
namespace App\Services;

use App\Repositories\PageEditorRepository;

class PageEditorService
{
    private PageEditorRepository $pageEditorRepository;

    public function __construct()
    {
        $this->pageEditorRepository = new PageEditorRepository();
    }

    //delete custom page
    public function deletePage($id): bool
    {
        return $this->pageEditorRepository->deletePage($id);
    }
    public function updatePage(): bool
    {
        // Check if page exists
        $exists = $this->pageEditorRepository->checkPageContainerExists($_POST['path'], $_POST['container']);

        if(isset($_POST['id']) && $_POST['id'] != null){
            return $this->pageEditorRepository->updatePageById($_POST['id'], $_POST['html']);
        }
        if ($exists) {
            // Update page
            return $this->pageEditorRepository->updatePage($_POST['path'], $_POST['container'], $_POST['html']);
        } else {
            // Create page
            return $this->pageEditorRepository->createPage($_POST['path'], $_POST['container'], $_POST['html'], $_POST['name']);
        }
    }

    public function retrievePage($path, $container): ?string
    {
        return $this->pageEditorRepository->retrievePage($path, $container);
    }
    public function retrievePageById($id): ?string
    {
        return $this->pageEditorRepository->retrievePageById($id);
    }

    public function getAllPagesWhereNameIsNotNull()
    {
        return $this->pageEditorRepository->getAllPagesWhereNameIsNotNull();
    }

    public function createPage($path, $container, $html, $name): bool
    {
        return $this->pageEditorRepository->createPage($path, $container, $html, $name);
    }
}
