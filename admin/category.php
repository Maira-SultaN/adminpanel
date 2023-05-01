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
      <h1>Category Page</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item">Form</li>
   
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row justify-content-center">
        <div class="col-lg-8">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Category</h5>

              <!-- No Labels Form -->
              <?php
  if (isset($_REQUEST['edit_category'])) {
    $id = $_REQUEST['edit_category'];
    $edit = mysqli_query($conn, "SELECT * FROM category WHERE id = '$id'");
    @$pro_record =  mysqli_fetch_array($edit);
  }
  ?>
              <form class="row g-3" method="post" enctype="multipart/form-data">
                <div class="col-md-12">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" id="name" value="<?=@$pro_record['name']?>" required>
                </div>
                <div class="col-md-12">
                <label for="inputState" class="form-label">Parent</label>
               <select id="inputState" name="parent" value="<?=@$pro_record['parent']?>" class="form-select">
                 <option value="0">Select Category</option>
                 <?php
                 $cat = mysqli_query($conn,"SELECT * FROM category WHERE parent = 0 ");
                 while ($data = mysqli_fetch_assoc($cat)) {
                ?>
                <option value="<?= $data['name']?>"<?php if (@$pro_record['parent']== $data['name']) {echo "selected";}?>><?= $data['name']?></option>
                <?php
                 }
                 ?>
                 
              </select>
                </div>
                <div class="col-md-12">
             <label for="img" class="form-label">Product image</label>
              <input type="file" class="form-control" name="img">
          </div>
      <input type="hidden" name= "id" value= "<?=@$pro_record['id']?>">
                <div class="text-center">
                  <button type="submit" name="add" class="btn btn-primary">Add Category</button>
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
              <h5 class="card-title">Category data</h5>

              <!-- Table with stripped rows -->
              <table class="table table-striped" id="example">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Image</th>
                    <th scope="col">Name</th>
                    <th scope="col">Parent</th>
                    <th scope="col">Action</th>

                  </tr>
                </thead>
                <tbody>
                <?php
$result = mysqli_query($conn, "SELECT * FROM category");
while($row = mysqli_fetch_array($result)){
      ?>
      <tr>
      <td><?=$row['id']?></td>
      <td>
        <img src="assets/img/<?=$row['img']?>" alt="" width="50" class="img-responsive rounded">
        
     </td>
     <td><?=$row['name']?></td>
     
        <td><?=$row['parent']?></td>
        <td><a href="?delete_category=<?=$row['id']?>" class="btn btn-sm btn-danger"><i class="bi bi-trash3"></i>Delete</a>
        <a href="?edit_category=<?=$row['id']?>" class="btn btn-sm btn-warning"><i class="bi bi-pencil-square"></i>edit</a></td>
      </tr>
      <?php
    }
    ?>

                </tbody>
              </table>
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