<script type="text/javascript" src="/resource/js/nav.js"></script>
<div class="nav-top-bar">
    <div class="socials">
        <a href="/">Home</a>
    </div>
    <?php
        if (isset($_SESSION['current_user']) === true) {
    ?>
    <div class="accounts row">
            <div class="small-12 column no-padding">
                <a href="/account/front">Account</a>
                <?php
                    if ($_SESSION['current_user']['u_type'] == 'Artist' ||
                        $_SESSION['current_user']['u_type'] == 'Admin') {
                ?>
                    <span>|</span>
                    <a href="/music/crud/front">Upload</a> 
                <?php
                    }
                ?>
                <span>|</span>
                <a href="/account/logout">Logout</a>   
            </div>
        </form>
    </div>
    <?php } else { ?>
    <div class="accounts row">
        <form class="column accounts-form" action="/account/login" method="POST">
            <div class="small-6 column no-padding">
                    <div class="column small-6 login-input">
                        <input type="text" name="username" placeholder="Username">
                    </div>
                    <div class="column small-6 login-input">
                        <input type="password" name="password" placeholder="Password">
                    </div>
            </div>
            <div class="small-6 column no-padding">
                <a class="submit-button">Submit</a>
                <span>|</span>
                <a href="/account/front">Register</a>    
            </div>
        </form>
    </div>
    <?php } ?>
</div>