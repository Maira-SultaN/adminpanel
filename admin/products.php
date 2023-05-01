<!DOCTYPE html>
<html lang="en">
<?php include('inc/head.php'); 
if ($_SESSION['user_name']) {
?>

<body>
    <!-- ======= Header ======= -->
    <?php include('inc/header.php'); ?>

    <!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <?php include('inc/sidebar.php'); ?>

    <!-- End Sidebar-->

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Project Form Page</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item">Form</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Products Form</h5>
                            <?php
  if (isset($_REQUEST['edit_data'])) {
    $id = $_REQUEST['edit_data'];
    $edit = mysqli_query($conn, "SELECT * FROM products WHERE id = '$id'");
    @$pro_record =  mysqli_fetch_array($edit);
  }
  ?>
                            <!-- No Labels Form -->
                            <form class="row g-3" method="post" enctype="multipart/form-data" >
                                <div class="col-md-6">
                                <label for="pro_name" class="form-label">Product Name</label>
          <input type="text" class="form-control" name="pro_name" id="pro_name" value="<?=@$pro_record['pro_name']?>" required>
                                </div>
                                <div class="col-md-6">
                                <label for=" brand_name" class="form-label">Brand Name</label>
          <input type="text" class="form-control" name="brand_name" id="brand_name" value="<?=@$pro_record['brand_name']?>" required>
                                </div>
                                <div class="col-md-6">
                                <label for="pro_size" class="form-label">Product Size</label>
              <input type="text" class="form-control" name="pro_size" id="pro_size" value="<?=@$pro_record['pro_size']?>" required>
                                </div>
                                <div class="col-6">
                                <label for="pro_color" class="form-label">Product Color</label>
                     <input type="text" class="form-control" name="pro_color" id="pro_color" value="<?=@$pro_record['pro_color']?>" required>
                                </div>
                                <div class="col-md-6">
                                <label for="pro_price" class="form-label">Product Price</label>
                     <input type="" class="form-control" name="pro_price" id="pro_price" value="<?=@$pro_record['pro_price']?>" required>
                                </div>
                               
                                <div class="col-md-6">
                                <label for="inputState" class="form-label">category</label>
    <select id="inputState" name="category" value="<?=@$pro_record['category']?>" class="form-select">
    <option value="0">Select Category</option>
                 <?php
                 $cat = mysqli_query($conn,"SELECT * FROM category ");
                 while ($data = mysqli_fetch_assoc($cat)) {
                ?>
                <option value="<?= $data['id']?>" <?php if (@$pro_record['category']== $data['name']) {echo "selected";}?>><?= $data['name']?></option>
                <?php
                 }
                 ?>
    </select>

    </div>
                                <div class="col-md-12">
                                <label for="exampleFormControlTextarea1"  class="form-label">Product Detail</label>
            <textarea class="form-control" name="pro_detail" value="<?=@$pro_record['pro_detail']?>" id="exampleFormControlTextarea1" rows="3"><?=@$pro_record['pro_detail']?></textarea>
                                </div>

                                <div class="col-md-6">
                                    <h6>Select Gender</h6>
                                <div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="gender" id="male" value="male"  <?php if(@$pro_record['gender']== "male") {echo "checked";}?>>
  <label class="form-check-label" for="male">
    Male
  </label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="gender" id="female" value="female" <?php if(@$pro_record['gender']== "female") {echo "checked";}?>>
  <label class="form-check-label" for="female">
    Female
  </label>
</div>

                                </div>  
                                <div class="mb-3">
             <label for="img" class="form-label">Product image</label>
              <input type="file" class="form-control" name="img">
          </div>
      <input type="hidden" name= "id" value= "<?=@$pro_record['id']?>">
                                <div class="text-center">
                                    <button type="submit" name="add_detail" class="btn btn-primary">Add Products</button>
                                </div>
                            </form><!-- End No Labels Form -->

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Products Data Table</h5>

                            <!-- Table with stripped rows -->
                            <div class="table-responsive">
                            <table class="table table-striped" id="example">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th>Image</th>
                                        <th scope="col">Name</th>
                                           <th scope="col">Detail</th>
                                             <th scope="col">Price</th>
                                                 <th scope="col">Category</th>
                                              <th scope="col">Gender</th>
                                                  <th scope="col">Brand</th>
                                                <th scope="col">Size</th>
                                                      <th scope="col">Color</th>
                                                         <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
$result = mysqli_query($conn, "SELECT * FROM products");
while($row = mysqli_fetch_array($result)){
      ?>
      <tr>
      <td><?=$row['id']?></td>
      <td>        <img src="assets/img/<?=$row['img']?>" alt="" width="50" class="img-responsive rounded">
</td>
      <td>
      <?=$row['pro_name']?>
    </td>
        <td><?=$row['pro_detail']?></td>
        <td><?=$row['pro_price']?></td>
        <td><?=$row['category']?></td>
        <td><?=$row['gender']?></td>
        <td><?=$row['brand_name']?></td>
        <td><?=$row['pro_size']?></td>
        <td><?=$row['pro_color']?></td>
        <td>
            <div class="btn-group">
            <a href="?delete_product=<?=$row['id']?>" class="btn btn-sm btn-danger"><i class="bi bi-trash3"></i>Delete</a>
        <a href="?edit_data=<?=$row['id']?>" class="btn btn-sm btn-warning"><i class="bi bi-pencil-square"></i>Edit</a></td>
            </div>
       
      </td>
      </tr>
      <?php
    }
    ?>
                                </tbody>
                            </table>
</div>
                            <!-- End Table with stripped rows -->

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main><!-- End #main -->

    <?php include('inc/footer.php'); ?>
</body>

</html>
<?php
}else{
   echo "You are  not allowed";
}
?>