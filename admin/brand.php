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
            <h1>Brand Page</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item">Forms</li>
                   
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <section class="section">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Brand Form</h5>

                            <!-- No Labels Form -->
                            <?php
  if (isset($_REQUEST['edit_data'])) {
    $id = $_REQUEST['edit_data'];
    $edit = mysqli_query($conn, "SELECT * FROM brand WHERE id = '$id'");
    @$brand_record =  mysqli_fetch_array($edit);
  }
  ?>
                            <form class="row g-3" method="posts">
                                <div class="col-md-12">
                                <label for="name" class="form-label">Brand Name</label>
                <input type="text" class="form-control" name="name" id="name" value="<?=@$brand_record['name']?>" required>
                                </div>
                                <div class="col-md-12">
                                <label for="exampleFormControlTextarea1"  class="form-label">Details</label>
            <textarea class="form-control" name="details" value="<?=@$brand_record['details']?>" id="exampleFormControlTextarea1" rows="3"><?=@$brand_record['details']?></textarea>
                                </div>
                                <input type="hidden" name= "id" value= "<?=@$brand_record['id']?>">
                                <div class="text-center">
                                    <button type="submit" name="addbrand" class="btn btn-primary">Add Brand</button>
                                    
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
                            <h5 class="card-title">Brand Form Data</h5>

                            <!-- Table with stripped rows -->
                            <table class="table table-striped"  id="example">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Brand Name</th>
                                        <th scope="col">Details</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
$result = mysqli_query($conn, "SELECT * FROM brand");
while($row = mysqli_fetch_array($result)){
      ?>
      <tr>
      <td><?=$row['id']?></td>
      <td><?=$row['name']?></td>
        <td><?=$row['details']?></td>
        <td><a href="?delete_data=<?=$row['id']?>" class="btn btn-sm btn-danger"><i class="bi bi-trash3"></i>Delete</a>
        <a href="?edit_data=<?=$row['id']?>" class="btn btn-sm btn-warning"><i class="bi bi-pencil-square"></i>edit</a></td>
        
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