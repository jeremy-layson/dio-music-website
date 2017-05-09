<script type="text/javascript" src="/resource/js/nav.js"></script>
<script type="text/javascript" src="/resource/js/jquery.reveal.js"></script>


<link href="/resource/css/reveal.css" rel="stylesheet">

<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">

<div class="top-bar">
    <div class="top-bar-left">
        <ul class="menu">
            <li><a href="/">Home</a></li>
        </ul>
    </div>
    <div class="top-bar-right">
        <ul class="menu">
            <?php
                if (isset($_SESSION['current_user']) === true) {
            ?>
                <li><a href="/account/front">Account</a></li>
                
                <?php
                    if ($_SESSION['current_user']['u_type'] == 'Artist' ||
                        $_SESSION['current_user']['u_type'] == 'Admin') {
                ?>
                    <li><a href="/admin/home">Admin</a></li>
                    <li><a href="/music/crud/front">Upload</a></li>
                <?php } else { ?>
                    <li><a href="/music/crud/front">Upload</a></li>
                <?php } ?>

                <li><a href="/account/logout">Logout</a></li>
                <?php } else { ?>
                <li><a href="#" data-reveal-id="loginModal">Login</a></li>
                <li><a href="/account/front">Register</a></li>
            <?php } ?>
        </ul>
    </div>
</div>

<div id="loginModal" class="reveal-modal" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
<h2 id="modalTitle">Login</h2>

<form method="POST" action="/account/login">
    <div class="row">
        <div class="large-12 columns">
            <label>Username
                <input type="text" placeholder="Username"  name="username"/>
            </label>
        </div>
    </div>
    <div class="row">
        <div class="large-12 columns">
            <label>Password
                <input type="password" name="password" placeholder="Password" />
            </label>
        </div>
    </div>
    <div class="row">
        <div class="large-12 columns">
            <input type="submit" value="Login" class="button expand success">
        </div>
    </div>
</form>

<a class="close-reveal-modal" aria-label="Close">&#215;</a>
</div>

