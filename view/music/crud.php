<!DOCTYPE html>
<html>
<head>
    <title>Welcome</title>
    <?=$css_import?>
    <?=$js_import?>
</head>
<body>
    <div class="main-body">
        <?php require_once('../view/template/navbar.php'); ?>
        <div class="form-container">
            <div class="form-objects small-12">
                <div class="form-header row">
                    <span class="header-text column">
                       Add new music 
                    </span>
                </div>
                <?php
                    $sClass = 'hidden';
                    $sText = '';
                    if (isset($_GET['error']) === true) {
                        $sClass = '';
                        $sText = $_GET['text'];
                    }
                ?>
                <div class="form-error row small-12 <?=$sClass?>">
                    <div class="error-text">
                        <?=$sText?>
                    </div>
                </div>
                <div class="form-body row small-12">
                    <form action="/music/crud/action" method="POST" enctype="multipart/form-data">
                        <div class="form-field row">
                            <div class="column small-3">
                                <label for="mTitle">Title:</label>
                            </div>
                            <div class="column small-9">
                                <input type="text" name="mTitle" id="mTitle">
                            </div>
                        </div>
                        <div class="form-field row">
                            <div class="column small-3">
                                <label for="mDesc">Description:</label>
                            </div>
                            <div class="column small-9">
                                <textarea type="text" name="mDesc" id="mDesc"></textarea>
                            </div>
                        </div>
                        <div class="form-field row">
                            <div class="column small-3">
                                <label for="mSinger">Singer(s):</label>
                            </div>
                            <div class="column small-9">
                                <input type="text" name="mSinger" id="mSinger">
                            </div>
                        </div>
                        <div class="form-field row">
                            <div class="column small-3">
                                <label for="mCover">Cover image:</label>
                            </div>
                            <div class="column small-9">
                                <span style="font-size: 0.7em">Ideal Size: 300x300</span>
                                <input type="file" name="mCover" id="mCover">
                            </div>
                        </div>
                        <div class="form-field row">
                            <div class="column small-3">
                                <label for="mAudio">Audio file:</label>
                            </div>
                            <div class="column small-9">
                                <input type="file" name="mAudio" id="mAudio">
                            </div>
                        </div>
                        <div class="form-field row">
                            <div class="column small-3">
                                <label for="mGenre">Genre:</label>
                            </div>
                            <div class="column small-9">
                                <select name="mGenre" id="mGenre">
                                    <option>Hiphop</option>
                                    <option>Zim Dancehall</option>
                                    <option>Urban Groove</option>
                                    <option>House Music</option>
                                    <option>Gospel</option>
                                    <option>Sungura</option>
                                    <option>Reggae</option>
                                    <option>Afro Pop</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-field row">
                            <div class="column small-3">
                            </div>
                            <div class="column small-9">
                                <input class="button submit" type="submit" value="Submit">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>