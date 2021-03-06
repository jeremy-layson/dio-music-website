<!DOCTYPE html>
<html>
<head>
    <title>Welcome</title>
    <?=$css_import?>
    <?=$js_import?>
</head>
<body>

<div class="top-12">
    <div class="small-12">
        <div class="genre-title column">
            Weekly Top 12
        </div>
        <div class="genre-items small-12 row">
            <hr/>

            <?php
                for ($i=0; $i < count($hot); $i++) {
                    $item = $hot[$i];
            ?>
                <div class="genre-item small-12 column">
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
    <div class="main-body">
        <?php require_once('../view/template/navbar.php'); ?>
        <div class="content">
            <!-- <div class="ads-container">
                <div class="ads">
                    <span class="sign">
                        Advertisement
                    </span>
                    <a href="#"><img src="/resource/img/sample_ads.png"></a>
                </div>
            </div> -->
            <div class="content-nav">
                <div class="logo">
                    <a href="/home"><img src="/resource/img/main_logo.png" /></a>
                </div>
            </div>

            <?php
                if (count($hot) >= 4) {
            ?>
            <div class="hot-container">
                <div class="hot-list">
                    <div class="hot-items">
                        <?php
                            for ($i=0; $i < 4; $i++) {
                                $item = $hot[$i];
                                echo '<div class="hot-item small-3 no-padding"><a href="/music/play?id=' . $item['m_id'] . '"><img src="/resource/upload/' . $item['m_cover'] . '"></a></div>';
                            }
                        ?>
                        
                    </div>
                </div>
            </div>
            <?php
                }
            ?>

            <?php
                foreach ($aData as $sGenre => $aContent) {
            ?>
            <div class="genre-container">
                <div class="genre small-12">
                    <div class="genre-title column">
                        <a href="/music/genre?category=<?=$sGenre?>"><?=$sGenre?></a>
                        
                    </div>
                    <div class="genre-items small-12 row">
                        <?php
                            foreach ($aContent as $aMusic) {
                        ?>
                        <div class="genre-item small-4 column">
                            <div class="item-photo">
                                <a href="/music/play?id=<?=$aMusic['m_id']?>">
                                    <img src="/resource/upload/<?=$aMusic['m_cover']?>">
                                </a>
                                <div class="item-info">
                                    <div class="item-head">
                                        <div class="item-title"><?=$aMusic['m_title']?></div>
                                        <div class="item-artist"><?=$aMusic['m_singers']?></div>                                 
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <?php } ?>
                    </div>
					<hr/>
					<div class="more-button column">
						<a href="/music/genre?category=<?=$sGenre?>" class="more button">Discover more</a>
					</div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function(){
            var first = $('.genre-container').first();
            $('.top-12').css(first.offset());
            $('.top-12').css('right', '0px');
            $('.top-12').css('left', '');
             
        });
    </script>
</body>
</html>