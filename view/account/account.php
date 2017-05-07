<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
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
                       Register
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
                <div class="form-body small-12">
                    <form action="/account/action" method="POST">
                        <div class="form-field row">
                            <div class="column small-3">
                                <label for="uName">Name:</label>
                            </div>
                            <div class="column small-9">
                                <input type="hidden" name="mode" value="<?=$data['mode']?>">
                                <input type="hidden" name="u_id" value="<?=$data['u_id']?>">
                                
                                <input type="text" name="uName" id="uName" value="<?=$data['u_name']?>">
                            </div>
                        </div>
                        <div class="form-field row">
                            <div class="column small-3">
                                <label for="uUserName">Username:</label>
                            </div>
                            <div class="column small-9">
                                <input type="text" name="uUserName" id="uUserName" value="<?=$data['u_username']?>" <?=$data['u_user_enabled']?>>
                            </div>
                        </div>
                        <div class="form-field row">
                            <div class="column small-3">
                                <label for="uPassword">Password:</label>
                            </div>
                            <div class="column small-9">
                                <input type="password" name="uPassword" id="uPassword">
                            </div>
                        </div>
                        <div class="form-field row">
                            <div class="column small-3">
                                <label for="uRepass">Re-type:</label>
                            </div>
                            <div class="column small-9">
                                <input type="password" name="uRepass" id="uRepass">
                            </div>
                        </div>
                        <div class="form-field row">
                            <div class="column small-3">
                                <label for="uEmail">Email:</label>
                            </div>
                            <div class="column small-9">
                                <input type="text" name="uEmail" id="uEmail" value="<?=$data['u_email']?>">
                            </div>
                        </div>
                        <div class="form-field row">
                            <div class="column small-3">
                                <label for="uType">Account Type:</label>
                            </div>
                            <div class="column small-9">
                                <select name="uType" id="uType">
                                    <option <?=$data['fan']?>>Fan</option>
                                    <option <?=$data['artist']?>>Artist</option>
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