<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link " href="index.php">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->


        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-journal-text"></i><span>Manage</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">

                <li>
                    <a href="category.php">
                        <i class="bi bi-circle"></i><span>Category</span>
                    </a>
                </li>
                <li>
                    <a href="brand.php">
                        <i class="bi bi-circle"></i><span>Brand</span>
                    </a>
                </li>
                <li>
                    <a href="products.php">
                        <i class="bi bi-circle"></i><span>Products</span>
                    </a>
                </li>
                <li>
                    <a href="users.php">
                        <i class="bi bi-circle"></i><span>Users</span>
                    </a>
                </li>

            </ul>
        </li><!-- End Forms Nav -->


        <li class="nav-heading">Pages</li>

        </li><!-- End Contact Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="register.php">
                <i class="bi bi-card-list"></i>
                <span>Register</span>
            </a>
        </li><!-- End Register Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="login.php">
                <i class="bi bi-box-arrow-in-right"></i>
                <span>Login</span>
            </a>
        </li><!-- End Login Page Nav -->


    </ul>
    <div class="response">
            <?php
            getMessage(@$msg, @$sts);
            ?>
      </div>

</aside><!-- End Sidebar-->