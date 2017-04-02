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
                <div class="form-body small-12">
                    <form action="/account/action" method="POST">
                        <div class="form-field row">
                            <div class="column small-3">
                                <label for="uName">Name:</label>
                            </div>
                            <div class="column small-9">
                                <input type="text" name="uName" id="uName">
                            </div>
                        </div>
                        <div class="form-field row">
                            <div class="column small-3">
                                <label for="uUserName">Username:</label>
                            </div>
                            <div class="column small-9">
                                <input type="text" name="uUserName" id="uUserName">
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
                                <input type="text" name="uEmail" id="uEmail">
                            </div>
                        </div>
                        <div class="form-field row">
                            <div class="column small-3">
                                <label for="uType">Account Type:</label>
                            </div>
                            <div class="column small-9">
                                <select name="uType" id="uEmail">
                                    <option>Fan</option>
                                    <option>Artist</option>
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