

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
    <?php include('inc/sidebar.php');
  
      ?>

    <!-- End Sidebar-->

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Users</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item">Users</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Users Data Table</h5>

                            <!-- Table with stripped rows -->
                            <table class="table table-striped" id="example">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                <th scope="col">Username</th>
                <th scope="col">Password</th>
                <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
$result = mysqli_query($conn, "SELECT * FROM users");
while($row = mysqli_fetch_array($result)){
      ?>
      <tr>
      <td><?=$row['id']?></td>
        <td><?=$row['name']?></td>
        <td><?=$row['user_name']?></td>
        <td><?=$row['password']?></td>
        <td><a href="?delete_user=<?=$row['id']?>" class="btn btn-sm btn-danger"><i class="bi bi-trash3"></i>Delete</a></td>
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