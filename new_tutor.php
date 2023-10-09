<?php
    include('config/server.php');
?>

<!doctype html>
<html lang="en">
<head>
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>สมัครติวเตอร์</title>
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
            <p style="color: orange;">Email/Password เข้าสู่ระบบ</p>
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

            <p style="color: orange;">ข้อมูลผู้ติว</p>
              <div class="form-group ">
                <div class="mb-3 mb-md-2">
                  <label class="font-weight-bold" for="nickname">ชื่อเล่น</label>
                  <input type="text" id="nickname" class="form-control" name="nickname" required placeholder="ภาษาไทย">
                </div>
              </div>
              <div class="form-group ">
                <div class="mb-3 mb-md-2">
                  <label class="font-weight-bold" for="firtname">ชื่อ-นามสกุล</label>
                  <input type="text" id="firtname" class="form-control" name="firtname" required placeholder="ภาษาไทย">
                </div>
              </div>
              <div class="form-group ">
                <div class="mb-3 mb-md-2">
                  <label class="font-weight-bold" for="gender">เพศ</label>
                  <?php include('config/server.php');?>
                  <select class="form-select"  name="sex" required>
                  <option selected>เลือก</option>
                
                      <option value="1">ชาย</option>
                      <option value="2">หญิง</option>
                      <option value="3">LGBTQ+</option>
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
                  <label class="font-weight-bold" for="class">ชั้นปี</label>
                  <?php include('config/server.php');?>
                  <select class="form-select"  name="class" required>
                  <option selected>เลือก</option>
                
                      <option value="1">ปี1</option>
                      <option value="2">ปี2</option>
                      <option value="3">ปี3</option>
                      <option value="3">ปี4</option>
                    </select>               
                </div>
              </div>
              <div class="form-group ">
                <div class="mb-3 mb-md-2">
                  <label class="font-weight-bold" for="tel">ประสบการณ์สอน</label>
                  <br/><br/>
                  <textarea style="width: 100%; higt: 100%: margin: auto;" placeholder="กรุณากรอกรายละเอียด คลอสการติวการสอนหรือแนะนำตัวเองคร่าวๆ"></textarea>
                </div>
              </div>
              <div class="form-group ">
                <div class="mb-3 mb-md-2">
                  <label class="font-weight-bold" for="tel">วิชาที่เปิดติว</label><br>                   
                <p style="color: orange;">หมวดวิทยาศาสตร์</p>
                  <input type="checkbox" id="subject1" name="subject1" value="Physics">
                  <label for="subject1"> ฟิสิกส์ทั่วไป</label><br>
                  <input type="checkbox" id="subject2" name="subject2" value="Biology">
                  <label for="subject2">  ชีววิทยาเบื้องต้น</label><br>
                  <input type="checkbox" id="subject3" name="subject3" value="Chemistry">
                  <label for="subject3"> เคมีทั่วไป</label>
                  <br></br>
                <p style="color: orange;">หมวดคณิตศาสตร์</p>
                  <input type="checkbox" id="subject4" name="subject4" value="Statistical">
                  <label for="subject4"> สถิติวิเคราะห์</label><br>
                  <input type="checkbox" id="subject5" name="subject5" value="Calculus">
                  <label for="subject5"> แคลคูลัส</label><br>
                  <input type="checkbox" id="subject6" name="subject6" value="Linear">
                  <label for="subject6"> พีชคณิตเชิงเส้นและการประยุกต์</label>
                  <br></br>
                <p style="color: orange;">หมวดภาษา</p>
                  <input type="checkbox" id="subject7" name="subject7" value="English">
                  <label for="subject7"> ภาษาอังกฤษพื้นฐาน</label><br>
                  <input type="checkbox" id="subject8" name="subject8" value="Korean">
                  <label for="subject8"> ภาษาเกาหลี</label><br>
                  <input type="checkbox" id="subject9" name="subject9" value="Chinese">
                  <label for="subject9"> ภาษาจีน</label>
                  <br></br>
                </div>
              </div>
              <div class="form-group ">
                <div class="mb-3 mb-md-2">
                  <label class="font-weight-bold" for="price">ราคาต่อชั่วโมง</label>
                  <input type="number" id="price" class="form-control" name="price" required placeholder="ระบุราคาเป็นจำนวนเต็ม">
                </div>
              </div>
              <div class="form-group ">
                <div class="mb-3 mb-md-2">
                  <label class="font-weight-bold" for="Date_time">วันและเวลาที่สะดวกติว</label>
                  <textarea style="width: 100%; higt: 100%: margin: auto;" placeholder=""></textarea>
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-12">
                <center><button type="submit" name="save" class="btn btn-primary  py-2 px-4">บันทึก</button></center>
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