<nav class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 px-4 mb-4 border-bottom bg-dark text-white">
    <div class="fw-bold fs-5">
        <span>Post</span>
        <span class="text-primary">.Here</span>
    </div>
    <ul class="d-flex list-unstyled gap-4 mb-0">
        <!-- If user is on post -->
        <li>All articles</li>

        <?php if($_SESSION['user_actual']['admin'] == 1) { ?>
            <!-- If user is on post -->
            <a href="listuser">List User</a>
        <?php } ?>

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
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-right text-white" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"/>
                    <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                </svg>
            </a>
        <?php } ?>

    </ul>
</nav>