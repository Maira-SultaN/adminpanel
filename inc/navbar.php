<header>
    <nav class="navbar navbar-expand-lg bg-body-info">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="index.php">Home</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Category
                </a>
                <ul class="dropdown-menu">
                <?php
                 $cat = mysqli_query($conn,"SELECT * FROM category WHERE parent = '0' ");
                 while ($data = mysqli_fetch_assoc($cat)) {
                ?>
                <li class="nav-item">
           <a class="nav-link active" aria-current="page" href="products.php?product=<?= $data['id']?>"><?= $data['name']?></a>
        </li>
                <?php
                 }?>
                </ul>
              </li>
          </div>
        </div>
      </nav>
  </header>