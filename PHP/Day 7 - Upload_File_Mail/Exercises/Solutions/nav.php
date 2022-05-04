<nav>
    <ul>
        <li>
            <a href="index.php">Home</a>
        </li>

        <?php if (!isset($_COOKIE['login'])) : ?>
            <li>
                <a href="register.php">Register</a>
            </li>
            <li>
                <a href="login.php">Login</a>
            </li>
        <?php endif; ?>

    </ul>
</nav>