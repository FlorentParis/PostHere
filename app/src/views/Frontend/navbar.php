<nav>
    <div>
        <span>Post</span>
        <span>.Here</span>
    </div>
    <ul>
        <!-- If user is on post -->
        <li>All articles</li>

        <?php if($_SESSION['user_actual']){ ?>
            <!-- If one user is connected -->
            <li>Write article</li>
            <li>Account</li>
        <?php } ?>

        <?php if($_SESSION['user_actual'] == null){ ?>
            <!-- If user -> deconnect -->
            <a href="connexion">Log-In</a>
            <a href="inscription">Sign-Up</a>
        <?php } ?>

        <?php if($_SESSION['user_actual']){ ?>
            <!-- If one user is connected -->
            <a href="disconnect">
                <img src="assets/logout.svg"/>
            </a>
        <?php } ?>

    </ul>
</nav>