<?php
include_once('function.php');

if (isset($_REQUEST['signup'])) {
    $name = $_REQUEST['name'];
    $email = $_REQUEST['user_name'];
    $password = $_REQUEST['password'];
    $sql =  mysqli_query($conn, "INSERT INTO users(name, user_name, password) VALUES ('$name','$email','$password')");
if ($sql) {
  echo "account is created";
  redirect("login.php", 1000);

} else{
  echo mysqli_error($conn);
}
  }
if (isset($_REQUEST['login'])) {
    $email = $_REQUEST['user_name'];
    $password = $_REQUEST['password'];
    $query = "SELECT user_name, password FROM users WHERE user_name = '$email' AND password = '$password'";
    $result = mysqli_query($conn, $query);
    $check = mysqli_num_rows($result);
    echo $check;
if ($check == 1) {
  $_SESSION['user_name'] = $email;
$_SESSION['password'] = $password;
redirect("index.php", 1000);

}else{
  echo "invalid";
}
 
}
if (isset($_REQUEST['logout'])) {
  echo "log out";
  session_destroy();
  redirect("login.php", 1000);
}
?>
<!-- delete user -->
<?php
if (isset($_REQUEST['delete_user'])) {
  echo "deleted record";
  $id = $_REQUEST['delete_user'];
  $query ="DELETE FROM users WHERE id='$id'";
  $result = mysqli_query($conn, $query);
  if ($result) {
    $msg = "record is deleted!";
    $sts = "success";
    redirect("users.php", 1000);
  }
}

?>
<?php
if (isset($_REQUEST['addbrand'])) {
  $id = $_REQUEST['id'];
  $name = $_REQUEST['name'];
  $details = $_REQUEST['details'];
  if (empty($id)) {
    $sql =  mysqli_query($conn, "INSERT INTO brand(name, details) VALUES ('$name','$details')");
if ($sql) {
  $msg = "new brand inserted!";
  $sts = "success";
redirect("brand.php", 1000);

} else{
echo mysqli_error($conn);
}
  } else{
    $q = "UPDATE brand SET name='$name',details='$details' WHERE id = '$id'";
    $update_brand = mysqli_query($conn, $q);
    if ($update_brand) {
      $msg = "brand updated!";
      $sts = "success";
    redirect("brand.php", 1000);
    
    } else{
    echo mysqli_error($conn);
    }
  }
 
}
if (isset($_REQUEST['delete_data'])) {
  $id = $_REQUEST['delete_data'];
  $query ="DELETE FROM brand WHERE id='$id'";
  $result = mysqli_query($conn, $query);
  if ($result) {
    $msg = "record is deleted!";
   $sts = "success";
    redirect("brand.php", 1000);
  }
}

?>
<!-- category -->
<?php
if (isset($_REQUEST['add'])) {
  $id = $_REQUEST['id'];
  $name = $_REQUEST['name'];
  $parent = $_REQUEST['parent'];
   $img = $_FILES['img'];
   $imgname =$img['name'];
  $path = "assets/img/".$imgname;

  if (empty($id)) {
    if (move_uploaded_file($img['tmp_name'], $path)){
    $sql =  mysqli_query($conn, "INSERT INTO category(name, parent,img) VALUES ('$name','$parent','$imgname')");
if ($sql) {
  $msg = "category inserted!";
  $sts = "success";
redirect("category.php", 1000);
}
else {
echo "file uploading error";
}
}
 else{
echo mysqli_error($conn);
}
  }else{
    $q = "UPDATE category SET name='$name', parent='$parent' WHERE id = '$id'";
    $edit_category = mysqli_query($conn, $q);
    if ($edit_category) {
      $msg = "brand updated!";
      $sts = "success";
    redirect("category.php", 1000);
    
    } else{
    echo mysqli_error($conn);
    }
  }
 

}
if (isset($_REQUEST['delete_category'])) {
  $id = $_REQUEST['delete_category'];
  $query ="DELETE FROM category WHERE id='$id'";
  $result = mysqli_query($conn, $query);
  if ($result) {
   $msg = "record is deleted!";
   $sts = "success";
    redirect("category.php", 1000);
  }
}
?>
<!-- products -->
<?php
if (isset($_REQUEST['add_detail'])) {
  $id = $_REQUEST['id'];
  $pro_name = $_REQUEST['pro_name'];
  $pro_detail = $_REQUEST['pro_detail'];
  $brand_name = $_REQUEST['brand_name'];
  @$gender = $_REQUEST['gender'];
  $category = $_REQUEST['category'];
  $pro_size = $_REQUEST['pro_size'];
  $pro_color = $_REQUEST['pro_color'];
  $pro_price = $_REQUEST['pro_price'];
  $img = $_FILES['img'];
  $name =$img['name'];
  $path = "assets/img/".$name;
  
  if (empty($id)) {
    if (move_uploaded_file($img['tmp_name'], $path)){
    $sql =  mysqli_query($conn, "INSERT INTO products(pro_name, pro_detail, pro_price, gender, brand_name, category, pro_size, pro_color,img) VALUES ('$pro_name','$pro_detail','$pro_price','$gender','$brand_name',' $category',' $pro_size',' $pro_color','$name')");
if ($sql) {
  $msg = "product details inserted!";
  $sts = "success";
redirect("products.php", 10000);

} else{
echo mysqli_error($conn);
}
}else {
  echo "file uploading error";
}
  } else{
    $q = "UPDATE products SET pro_name='$pro_name',pro_detail='$pro_detail', brand_name='$brand_name', gender='$gender', category='$category', pro_size='$pro_size', pro_color='$pro_color', pro_price='$pro_price' WHERE id = '$id'";
    $update_details = mysqli_query($conn, $q);
    if ($update_details) {
      $msg = "new product details updated!";
      $sts = "success";
    redirect("products.php", 1000);
    
    } else{
    echo mysqli_error($conn);
    }
  }
  
}
if (isset($_REQUEST['delete_product'])) {
  $id = $_REQUEST['delete_product'];
  $query ="DELETE FROM products WHERE id='$id'";
  $result = mysqli_query($conn, $query);
  if ($result) {
    $msg = "record is deleted!";
   $sts = "success";
    redirect("products.php", 1000);
  }
}
?>