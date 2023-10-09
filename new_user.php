<?php
    include('config/server.php');
?>

<!doctype html>
<html lang="en">
<head>
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>ลงทะเบียน</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="../assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    <!-- Required meta tags -->
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
<style>
@import url('https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@100;200;500;600;900&family=Sarabun:wght@200&display=swap');
body {
  min-height: 100vh;
  overflow-x: hidden;
  font-family: 'Noto Sans Thai', sans-serif;
}
</style>
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@100&display=swap" rel="stylesheet">
        <style> body{font-family: 'Sarabun', sans-serif;}</style>
      <title>สมัครสมาชิก</title>
</head>
<style type="text/css">
body{
  background-image: radial-gradient(white,ghostwhite);
}
</style>
<?php include"nav_cart.php"?>
		<div class="container p-5">
    <div class="row">
    <div class="card"><br>
    <h2>ลงทะเบียน</h2>
    <div class="col-md-12">
				<form class="login100-form validate-form" name ="form1" method="post" action="new_user.php" class="p-5 bg-white">
              <div class="form-group ">
                <div class="mb-3 mb-md-2">
                  <label class="font-weight-bold" for="firstname">ชื่อ-นามสกุล</label>
                  <input type="text" id="firstname" class="form-control" name="firstname" required >
                </div>
              </div>
           
              <div class="form-group ">
                <div class="mb-3 mb-md-2">

                  <label class="font-weight-bold" for="email">Email</label>
                  <input type="email" id="email" class="form-control" name="email" required >
                </div>
              </div>
              <div class="form-group ">
                <div class="mb-3 mb-md-2">
                  <label class="font-weight-bold" for="password">รหัสผ่าน</label>
                  <input type="password" id="password" class="form-control" name="password" required >
                </div>
              </div>
              <div class="form-group ">
                <div class="mb-3 mb-md-2">
                  <label class="font-weight-bold" for="password">ยืนยันรหัสผ่าน</label>
                  <input type="password" id="password2" class="form-control" name="password2" required >
                </div>
              </div>
              <div class="form-group ">
                <div class="mb-3 mb-md-2">
                  <label class="font-weight-bold" for="password">เพศ</label>
                  <?php include('config/server.php');?>
                  <select class="form-select"  name="sex" required>
                  <option selected>เลือก</option>
                
                      <option value="1">ชาย</option>
                      <option value="2">หญิง</option>
                    </select>
                
                </div>
              </div>
              <div class="form-group ">
                <div class="mb-3 mb-md-2">
                  <label class="font-weight-bold" for="password">คณะที่เรียน</label>
                  <?php include('config/server.php');?>
                  <select class="form-select"  name="category_id" required >
                  <option value="" selected>เลือก</option>
                  <?php
                    $where = "WHERE category_status ='เปิดการใช้งาน'";
                    $sql="select * from category
                    $where order by category_id";
                    $query=$conn->query($sql);
                                    
                            while($row=$query->fetch_array()){
                            ?>
                      <option value="<?php echo $row['category_id']?>"><?php echo $row['category_name']?></option>
                      <?php  } ?>  
                    </select>
                
                </div>
              </div>
              <div class="form-group ">
                <div class="mb-3 mb-md-2">
                  <label class="font-weight-bold" for="tel">เบอร์โทร</label>
                  <input type="text" id="tel" class="form-control" name="tel" required >
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-12">
                  <button type="submit" name="save" class="btn btn-primary  py-2 px-4">บันทึก</button> 
                  </center>
                </div>
              </div>
              <br>
            </form>
          </div>
          </div>
          </body>
</html>
<?php

include('config/server.php');

if(isset($_POST["save"])){ //เมื่อกดปุ่ม save
    //กำหนดตัวแปร เก็บค่าจากการ input จากฟอร์ม
   //ปิด error Notice: Undefined index: id ด้วย @ เพื่อไม่ให้ user เห็น
    $category_id = $_POST['category_id'];
    $email = $_POST['email']; 
    $password = $_POST['password'];
    $password2 = $_POST['password2'];  
    $firstname = $_POST['firstname'];
    $userlevel = 2;
    $sex = $_POST['sex'];
    $tel = $_POST['tel'];
    $pass = $password;
    
    if($pass != $password2){
      exit("<script>alert('กรุณากรอกรหัสผ่านให้ตรง');history.back();</script>");
    }else{

    $sql3 = "SELECT * FROM user WHERE email = '$email' OR (Firstname = '$firstname')";
    $qry = mysqli_query($conn,$sql3);
    $row = mysqli_num_rows($qry);
    if($row > 0) {
    exit("<script>alert('มีชื่อ - นามสกุล หรือ Email นี้แล้ว กรุณาตรวจสอบอีกครั้ง!');history.back();</script>");
    }else{

    //คำสั่ง sql
    $sql1 = "INSERT INTO user(Password,Firstname,email,sex,category_id,Tel,Userlevel)
         VALUES ('$pass','$firstname','$email','$sex','$category_id','tel','$userlevel')";
    
        if(mysqli_query($conn,$sql1)){ 
          echo "<script>alert('บันทึก');window.location='login.php';</script>";
        }
    }
  }
  }
?>






