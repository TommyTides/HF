<head>
    <?php include(__DIR__ . '/../general.php'); ?>
    <title>Visit Haarlem</title>
</head>
<style>
    label{
        font-weight: bold;
    }
    .form-group {
        margin-bottom: 20px;
    }
</style>

<div style="display: flex; width:100vw; height: 100%;">
    <div style="width: 16vw;">
        <?php include __DIR__ . '/../sidebar.php'; ?>
    </div>
    <div class="container mt-5">
        <div style="width: 80%; height: 80%">
            <form id="addForm" method="post" class="needs-validation" validate>
                <div class="form-group">
                    <label for="artist_name">Artist Name</label>
                    <input type="text" class="form-control" id="artist_name" name="artist_name" placeholder="Ziggy Stardust" required>
                    <div class="invalid-feedback">
                        Please provide a valid artist name.
                    </div>
                </div>
                <div class="form-group">
                    <label for="first_name">First Name</label>
                    <input type="text" class="form-control" id="first_name" name="first_name" placeholder="John">
                </div>
                <div class="form-group">
                    <label for="last_name">Last Name</label>
                    <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Smith">
                </div>
                <div class="form-group">
                    <label for="event_type">Chose event type</label>
                    <select class="form-control" id="event_type" name="event_type">
                        <option>Dance</option>
                        <option>Jazz</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="biography">Biography</label>
                    <textarea class="form-control" id="biography" name="biography" rows="3" placeholder="He was born in a hospital" required></textarea>
                </div>
                <div class="form-group">
                    <label for="member_description">Member Description</label>
                    <textarea class="form-control" id="member_description" name="member_description" rows="3" placeholder="Include a detailed member description"></textarea>
                </div>
            </form>
            <button type="submit" class="btn btn-primary" style="width: 100px;" form="addForm">Submit</button>
            <a href="/dance/index"><button type="cancel" class="btn btn-light">Cancel</button></a>
        </div>
    </div>
</div>