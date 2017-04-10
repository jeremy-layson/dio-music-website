<!DOCTYPE html>
<html>
<head>
    <title><?=$genre?></title>
    <?=$css_import?>
    <?=$js_import?>
</head>
<body>
    <div class="main-body">
        <?php require_once('../view/template/navbar.php'); ?>
			<div class="genre-container">
				<div class="genre small-12">
					<div class="genre-items small-12 row">
					<?php
						foreach ($aData as $aMusic) {
					?>
						<div class="genre-item small-4 column">
							<div class="item-photo">
								<img src="/resource/upload/<?=$aMusic['m_cover']?>">
							</div>
							<div class="item-info">
								<div class="item-head">
								   <span class="item-title"><?=$aMusic['m_title']?></span>
									<span class="item-artist"><?=$aMusic['m_singers']?></span>                                 
								</div>
								<div class="item-description">
									<span class="item-desc"><?=$aMusic['m_description']?></span>
									<div class="item-button">
										<a href="/music/play?id=<?=$aMusic['m_id']?>" class="button submit">Play</a>
									</div>
								</div>
							</div>
						</div>
					<?php } ?>
					</div>
				</div>
			</div>
        </div>
    </div>
</body>
</html>