<!DOCTYPE html>
<html>
<head>
    <?php include(__DIR__ . '/general.php'); ?>
    <script src="https://cdn.tiny.cloud/1/emhhp6a4y93dpg1ws8u21xuqesaymzxz6jwv0rktrmbbb1p3/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script type="text/javascript" src="/js/components/tinymce-init.js"></script>
    <script type="text/javascript" src="/js/admin/createCustomPage.js"></script>
    <script type="text/javascript" src="/js/components/tinymce-functions.js" defer></script>
    <title>Page Editor</title>
</head>
<section id="page-menu" class="d-flex flex-row m-1">

    <button type="button" class="btn btn-danger m-1" data-bs-toggle="modal" data-bs-target="#confirmModal">Add New Page</button>

    <button class="btn btn-primary m-1" value="/home/activities" data-value2="#data-container"
            onclick="loadPage(this.value, this.getAttribute('data-value2'), this)">Activities</button>
    <button class="btn btn-primary m-1" value="/home/history" data-value2="#data-container"
            onclick="loadPage(this.value, this.getAttribute('data-value2'), this)">History</button>
    <button class="btn btn-primary m-1" value="/home/index" data-value2="#data-container"
            onclick="loadPage(this.value, this.getAttribute('data-value2'), this)">Home - Index</button>
    <button class="btn btn-primary m-1" value="/astrollthroughhistory/index" data-value2="#featured-locations"
            onclick="loadPage(this.value, this.getAttribute('data-value2'), this)">History - Featured Locations</button>
    <button class="btn btn-primary m-1" value="/home/performances" data-value2="#data-container"
            onclick="loadPage(this.value, this.getAttribute('data-value2'), this)">Performances</button>
    <button class="btn btn-primary m-1" value="/dance/index" data-value2="#landing-container"
            onclick="loadPage(this.value, this.getAttribute('data-value2'), this)">Dance-Landing-Info</button>
    <button class="btn btn-primary m-1" value="/dance/index" data-value2="#ticket-container"
            onclick="loadPage(this.value, this.getAttribute('data-value2'), this)">Dance-Tickets</button>
    <button class="btn btn-primary m-1" value="/jazz/index" data-value2="#introduction"
            onclick="loadPage(this.value, this.getAttribute('data-value2'), this)">Jazz - Intro</button>

    <?php foreach($customPages as $page){?>
        <button class="btn btn-primary m-1" value="<?=$page->getPath()?>" data-value2="#data-container" data-value3="<?=$page->getId()?>"
                onclick="loadCustomPage(this.value, this.getAttribute('data-value2'), this.getAttribute('data-value3'), this)"><?=$page->getName()?></button>
        <button onclick="deletePage(this.value)" class="btn btn-danger m-1" value="<?=$page->getId()?>">X</button>
    <?php } ?>

</section>
<form id="editor-form" method="post">
    <textarea id="tiny"></textarea>
    <input type="submit" value="Save changes" class="btn btn-primary" onclick="savePage()">
</form>
<div id="data-container"></div>

<div class="modal" id="confirmModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create New Page</h5>
            </div>
            <div class="modal-body">
                <label for="pageName">Page Name:</label>
                <input type="text" required id="pageName" class="form-control">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" id="confirm-button" data-bs-dismiss="" onclick="createCustomPage()" class="btn btn-primary">Confirm</button>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>

<?php include(__DIR__ . '/../footer.php'); ?>


