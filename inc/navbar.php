<nav>
    <div class="nav-bar">
        <i class='bx bx-menu sidebarOpen'></i>
        <span class="logo navLogo">
            <a href="index.php">
                <img src="../assets/img/logo/logo.png" alt="mDm" />
            </a>
        </span>

        <div class="menu">
            <div class="logo-toggle">
                <span class="logo">
                    <a href="index.php">
                        <img src="../assets/img/logo/logo.png" alt="mDm" />
                    </a>
                </span>
                <i class='bx bx-x siderbarClose'></i>
            </div>

            <ul class="nav-links">
                <li><a href="index.php">Home</a></li>
                <li>
                    <a href="product.php">Product</a>
                </li>
                <li>
                    <a href="contact.php">Contact</a>
                </li>
                <?php
                if (isset($_SESSION['user_session'])) {  ?>
                    <li><h1 class="navbar-text navbar-right"><?= $returned_row['FullName']; ?> &nbsp;</h1></li>
                    <li><a href="logout.php">Logout</a></li>
                <?php } else { ?>
                <li href="#loginform" data-toggle="modal">
                    <a href="#loginModal">Login</a>
                </li>
                <?php } ?>
            </ul>
        </div>

        <div class="cartBox">
            <div class="cartToggle">
                <i class='bx bx-x cancel'></i>
                <i class='bx bx-cart cart'></i>
            </div>

            <div class="cart-field">
                <input type="text" placeholder="cart..." />
                <i class='bx bx-cart'></i>
            </div>
        </div>
    </div>
</nav>