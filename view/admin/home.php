<!DOCTYPE html>
<html>
<head>
    <title>Administration Panel</title>
    <?=$css_import?>
    <?=$js_import?>
</head>
<body>
<?php require_once('../view/template/navbar.php'); ?>
    <div class="row segment">
        <br/><br/>

        <div class="column small-12">
            <div class="row">
                <div class="column small-6">
                    <h3>User accounts</h3>
                </div>
                <div class="column small-6">
                    <form action="/admin/home">
                        <div class="row">
                            <div class="column small-6">
                                <input type="text" name="search" placeholder="Search">
                            </div>
                            <div class="column small-6">
                                <input class="button default" type="submit" value="Search">
                            </div>
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="column small-12">
            <table>
                <thead>
                    <tr>
                        <th width="10%">Active</th>
                        <th width="30%">Name</th>
                        <th width="auto">Username</th>
                        <th width="10%">Type</th>
                        <th width="20%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data['accounts'] as $account) { ?>
                        <tr>
                            <td class="no-padding">
                                <div class="switch large">
                                    <input class="switch-input" id="largeSwitch_<?=$account['u_id']?>" data-type="account" data-id="<?=$account['u_id']?>" type="checkbox" <?=$account['u_activated'] == '1' ? 'checked':''?>>
                                    <label class="switch-paddle" for="largeSwitch_<?=$account['u_id']?>">
                                        <span class="show-for-sr">Activate Account</span>
                                    </label>
                                </div>
                            </td>
                            <td class="no-padding"><?=$account['u_name']?></td>
                            <td class="no-padding"><?=$account['u_username']?></td>
                            <td class="no-padding"><?=$account['u_type']?></td>
                            <td class="no-padding">
                                <a href="/account/front?id=<?=$account['u_id']?>" class="button success">Edit</a>
                                <a href="#" class="button warning delete-button">Delete</a>
                            </td>
                            
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <ul class="pagination text-center" role="navigation" aria-label="Pagination">
                <?php if ($data['u_offset'] == '0') { ?>
                    <li class="pagination-previous disabled">Previous</li>
                <?php } else { ?>
                    <li class="pagination-previous"><a href="/admin/home?u_offset=<?=$data['u_offset']-1?>&search=<?=$data['search']?>&m_offset=<?=$data['m_offset']?>&m_search=<?=$data['m_search']?>" aria-label="Previous page">Previous</a></li>
                <?php } ?>

                <?php for($i=$data['u_start']; $i<=$data['u_end']; $i++) { ?>
                    <li <?=$i == ($data['u_offset']+1) ? 'class="current"':''?>><a href="/admin/home?u_offset=<?=$i-1?>&search=<?=$data['search']?>&m_offset=<?=$data['m_offset']?>&m_search=<?=$data['m_search']?>" aria-label="Page <?=$i?>"><?=$i?></a></li>
                <?php } ?>

              <li class="pagination-next"><a href="/admin/home?u_offset=<?=$data['u_offset']+1?>&search=<?=$data['search']?>&m_offset=<?=$data['m_offset']?>&m_search=<?=$data['m_search']?>" aria-label="Next page">Next</a></li>
            </ul>
        </div>
    </div>

    <div class="row segment">
        <br/><br/>

        <div class="column small-12">
            <div class="row">
                <div class="column small-6">
                    <h3>Music</h3>
                </div>
                <div class="column small-6">
                    <form action="/admin/home">
                        <div class="row">
                            <div class="column small-6">
                                <input type="text" name="search" placeholder="Search">
                            </div>
                            <div class="column small-6">
                                <input class="button default" type="submit" value="Search">
                            </div>
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="column small-12">
            <table>
                <thead>
                    <tr>
                        <th width="10%">Approved</th>
                        <th width="30%">Title</th>
                        <th width="auto">Singers</th>
                        <th width="10%">Release Date</th>
                        <th width="20%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data['musics'] as $music) { ?>
                        <tr>
                            <td class="no-padding">
                                <div class="switch large">
                                    <input class="switch-input" id="largeSwitch_m_<?=$music['m_id']?>" data-type="music" data-id="<?=$music['m_id']?>" type="checkbox" <?=$music['m_approved'] == '1' ? 'checked':''?>>
                                    
                                    <label class="switch-paddle" for="largeSwitch_m_<?=$music['m_id']?>">
                                        <span class="show-for-sr">Activate Account</span>
                                    </label>
                                </div>
                            </td>
                            <td class="no-padding"><?=$music['m_title']?></td>
                            <td class="no-padding"><?=$music['m_singers']?></td>
                            <td class="no-padding"><?=date('F Y', strtotime($music['m_uploaded']))?></td>
                            <td class="no-padding">
                                <a href="#" class="button success">Edit</a>
                                <a href="#" class="button warning delete-button">Delete</a>
                            </td>
                            
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <ul class="pagination text-center" role="navigation" aria-label="Pagination">
                <?php if ($data['m_offset'] == '0') { ?>
                    <li class="pagination-previous disabled">Previous</li>
                <?php } else { ?>
                    <li class="pagination-previous"><a href="/admin/home?u_offset=<?=$data['u_offset']?>&search=<?=$data['search']?>&m_offset=<?=$data['m_offset']-1?>&m_search=<?=$data['m_search']?>" aria-label="Previous page">Previous</a></li>
                <?php } ?>

                <?php for($i=$data['m_start']; $i<=$data['m_end']; $i++) { ?>
                    <li <?=$i == ($data['m_offset']+1) ? 'class="current"':''?>><a href="/admin/home?u_offset=<?=$data['u_offset']?>&search=<?=$data['search']?>&m_offset=<?=$i-1?>&m_search=<?=$data['m_search']?>" aria-label="Page <?=$i?>"><?=$i?></a></li>
                <?php } ?>

              <li class="pagination-next"><a href="/admin/home?u_offset=<?=$data['u_offset']?>&search=<?=$data['search']?>&m_offset=<?=$data['m_offset']+1?>&m_search=<?=$data['m_search']?>" aria-label="Next page">Next</a></li>
            </ul>
        </div>
    </div>

</body>
</html>