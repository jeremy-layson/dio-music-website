<!DOCTYPE html>
<html>
<head>
    <title><?=$data['m_title']?></title>
    <?=$css_import?>
    <?=$js_import?>
</head>
<body>
    <div class="main-body">
        <?php require_once('../view/template/navbar.php'); ?>
        
        <div class="play-container">
            <div class="info-container row">
                <div class="thumbnail small-4 column">
                    <img src="/resource/upload/<?=$data['m_cover']?>">
                </div>
                <div class="details small-8 column">
                    <div class="title">
                        <span class="text">
                            <?=$data['m_title']?>
                        </span>
                    </div>
                    <div class="singer">
                        <span class="text">
                            <?=$data['m_singers']?>
                        </span>
                    </div>
                    <div class="description">
                        <span class="text">
                            <?=$data['m_description']?>
                        </span>
                    </div>
                    <div class="music">
                    <audio controls>
                        <source src="/resource/upload/<?=$data['m_music_file']?>">
                    </audio>
                    </div>
                </div>
            </div>

            <div class="row small-12">
                <iframe width="100%" height="315" src="https://www.youtube.com/embed/iq_d8VSM0nw" frameborder="0" allowfullscreen></iframe>
            </div>

            <?php
                if (isset($_SESSION['current_user']) === true) {
                    if (($_SESSION['current_user']['u_type'] == 'Admin') ||
                        (($_SESSION['current_user']['u_type'] == 'Artist') &&
                        ($_SESSION['current_user']['u_id'] == $data['m_uploader']) )) {
            ?>
            <div class="row small-12">
                <a href="/music/delete?id=<?=$data['m_id']?>" class="button warning delete-button">Delete</a>
            </div>
            <?php
                    }
                }
            ?>
        </div>

        <div class="genre-container">
            <div class="genre small-12">
                <div class="genre-title column">
                    You might also like
                </div>
            <?php
                for ($i=0; $i < count($suggestion); $i++) {
                    $item = $suggestion[$i];
            ?>
                <div class="genre-item small-6 column">
                    <a href="/music/play?id=<?=$item['m_id']?>">
                        <div class="top-item">
                            <div class="top-title">
                                <?=$item['m_title']?>
                            </div>
                            <div class="top-singer">
                                <?=$item['m_singers']?>
                            </div>    
                        </div>
                    </a>
                </div>
            <?php
                }
            ?>
            </div>
        </div>
    </div>
</body>
</html>
