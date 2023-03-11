<nav>
    <div class="nav-bar">
        <i class='bx bx-menu sidebarOpen'></i>
        <span class="logo navLogo">
            <a href="index.php">
                <img src="./assets/img/logo/logo.png" alt="mDm" />
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
                <?php
        // Define each name associated with an URL
        $urls = array(
            'Home' => 'index.php',
            'Product' => 'product.php',
            'About' => 'page.php',
            'Contact' => 'contact.php',
            '<i class="fa fa-fw fa-user" href="#loginform" data-toggle="modal">LogIn</i> ' => '#loginModal2',
            // �
        );

        foreach ($urls as $name => $url) {
            print '<li '.(($currentPage === $name) ? '  ': '').
                '><a  href="'.$url.'">'.$name.'</a></li>';
        }
                ?>
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