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
                    <video controls="" autoplay="true" name="media"><source src="/resource/upload/<?=$data['m_music_file']?>" type="audio/mpeg"></video>
                    </div>
                </div>
            </div>
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
