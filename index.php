<?php
include('inc/header.php');
?>

<body>
    <?php
    include('inc/navbar.php');
    ?>
      <main>
    <div class="container">
      <h1>New Arrivals</h1><hr>
    <div class="row">
         <?php
                 $product = mysqli_query($conn,"SELECT * FROM products ORDER BY ID DESC LIMIT 3 ");
                 while ($productdata = mysqli_fetch_assoc($product)) {
                ?>
      <div class="col-md-4">
      <div  class="card" style="width: 18rem;">
    <img src="admin/assets/img/<?=$productdata['img'];?>" class="card-img-top" alt="image" height="300px">
  <div class="card-body">
    <h5 class="card-title"><?=$productdata['pro_name'];?></h5>
    <span>Rs:<?=$productdata['pro_price'];?></span>
    <p class="card-text"><?=$productdata['pro_detail'];?></p>
   <!-- modal -->
   <!-- Button trigger modal -->
<button type="button" class="btn btn-md btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal<?=$productdata['id'];?>">
  Quick View
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal<?=$productdata['id'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel"><?=$productdata['pro_name'];?></h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <img src="admin/assets/img/<?=$productdata['img'];?>" class="card-img-top" alt="image" height="300px">
        <p><?=$productdata['pro_detail'];?></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-md btn-secondary" data-bs-dismiss="modal">View Description</button>
        <button type="button" class="btn btn-md btn-primary">Add to Cart</button>
      </div>
    </div>
  </div>
</div>
  </div>
</div>
</div>
      <?php } ?>
      </div>

</div>
    </div>
    <br><br>
    <div class="container">
      <h1>For Men</h1><hr>
    <div class="row">
         <?php
                 $product = mysqli_query($conn,"SELECT * FROM products where gender = 'male'");
                 while ($productdata = mysqli_fetch_assoc($product)) {
                ?>
      <div class="col-md-4">
      <div  class="card" style="width: 18rem;">
    <img src="admin/assets/img/<?=$productdata['img'];?>" class="card-img-top" alt="image" height="300px">
  <div class="card-body">
    <h5 class="card-title"><?=$productdata['pro_name'];?></h5>
    <span>Rs:<?=$productdata['pro_price'];?></span>
    <p class="card-text"><?=$productdata['pro_detail'];?></p>
    <button type="button" class="btn btn-md btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal<?=$productdata['id'];?>">
  Quick View
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal<?=$productdata['id'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel"><?=$productdata['pro_name'];?></h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p><?=$productdata['pro_detail'];?></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-md btn-secondary" data-bs-dismiss="modal">View Description</button>
        <button type="button" class="btn btn-md btn-primary">Add to Cart</button>
      </div>
    </div>
  </div>
</div>
  </div>
</div>
</div>
      <?php } ?>
      </div>

</div>
    </div>
    <br><br>
    <div class="container">
      <h1>For Women</h1><hr>
    <div class="row">
         <?php
                 $product = mysqli_query($conn,"SELECT * FROM products where gender = 'female'");
                 while ($productdata = mysqli_fetch_assoc($product)) {
                ?>
      <div class="col-md-4">
      <div  class="card" style="width: 18rem;">
    <img src="admin/assets/img/<?=$productdata['img'];?>" class="card-img-top" alt="image" height="300px">
  <div class="card-body">
    <h5 class="card-title"><?=$productdata['pro_name'];?></h5>
    <span>Rs:<?=$productdata['pro_price'];?></span>
    <p class="card-text"><?=$productdata['pro_detail'];?></p>
    <button type="button" class="btn btn-md btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal<?=$productdata['id'];?>">
  Quick View
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal<?=$productdata['id'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel"><?=$productdata['pro_name'];?></h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <img src="admin/assets/img/<?=$productdata['img'];?>" class="card-img-top" alt="image" height="300px">

      <?=$productdata['pro_detail'];?>      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-md btn-secondary" data-bs-dismiss="modal">View Description</button>
        <button type="button" class="btn btn-md btn-primary">Add to Cart</button>
      </div>
    </div>
  </div>
</div>
  </div>
</div>
</div>
      <?php } ?>
      </div>

</div>
    </div><br>
    <div class="container">
        <h1>Our Categories</h1><hr>
    <div class="row">
         <?php
                 $category = mysqli_query($conn,"SELECT * FROM category where parent = '0'");
                 while ($categorydata = mysqli_fetch_assoc($category)) {
                ?>
            <div class="col-md-4">
               <div  class="card" style="width: 18rem;">
                   <img src="admin/assets/img/<?=$categorydata['img'];?>" class="card-img-top" alt="image" height="300px">
               <div class="card-body">
  <h5 class="card-title"><?=$categorydata['name'];?></h5>
                                              <span>Category<?=$categorydata['parent'];?></span>
                      <button type="button" class="btn btn-md btn-primary">
                                               Quick View
                        </button>
                       </div>
               </div>
               </div>

               <?php } ?>
     </div>
    </div>
  </main>
    <?php
include('inc/footer.php');
?>
  </body>

</html>
