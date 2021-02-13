<div class="nav">
    <div class='container nav__container'>
        <a class='logo' href='/4B/'>The Writer</a>
        <div class='nav__list'>
            <?php
                if (!isset($_SESSION['isLogin'])) {
                    echo '<a href="/4B/login.php">Login</a>';
                } else {
                    echo '<a href="/4B/articles.php">Your Articles</a>';
                    echo '<a href="/4B/logout.php">Logout</a>';
                }
            ?>
        </div>
    </div>
</div>