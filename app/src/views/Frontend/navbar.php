<nav>
    <div>
        <span>Post</span>
        <span>.Here</span>
    </div>
    <ul>
        <!-- If user is on post -->
        <li>All articles</li>
        <!-- If one user is connected -->
        <li>Write article</li>
        <li>Account</li>
        <!-- If user -> deconnect -->
        <button>Log-In</button>
        <button>Sign-Up</button>

        <?php if($_SESSION['user_actual']){ ?>
            <!-- If one user is connected -->
            <a href="disconnect">
                <img src="assets/logout.svg"/>
            </a>
        <?php } ?>

    </ul>
</nav>