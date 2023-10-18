<?php
      include('config/db.php');
?>

<?php
session_start();

// ตรวจสอบว่ามีการล็อกอินหรือไม่
if (!isset($_SESSION['email']) || $_SESSION['Userlevel'] !== '2') {
  header("Location: login.php");
  exit();
}
?>

<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>ลงข้อมูลผู้ติว</title>
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
<body>
<?php include('nav_cart.php')?>
		<div class="container p-5">
    <div class="row">
    <div class="card"><br>
    <center><h2>ลงข้อมูลผู้ติว</h2></center>
    <div class="col-md-12">
				<form class="login100-form validate-form" name ="form1" method="post" action="new_tutor.php"  enctype="multipart/form-data" class="p-5 bg-white">           
              <div class="form-group ">
                <div class="mb-3 mb-md-2">
                  <label class="font-weight-bold" for="nickname">ชื่อเล่น</label>
                  <input type="text" id="nickname" class="form-control" name="nickname" required placeholder="ภาษาไทย">
                </div>
              </div>
              <div class="form-group ">
                <div class="mb-3 mb-md-2">
                  <label class="font-weight-bold" for="class">ชั้นปี</label>
                  <?php include('config/server.php');?>
                  <select class="form-select"  name="class" required>
                  <option selected>เลือก</option>
                
                      <option value="ปี1">ปี1</option>
                      <option value="ปี2">ปี2</option>
                      <option value="ปี3">ปี3</option>
                      <option value="ปี4">ปี4</option>
                    </select>               
                </div>
              </div>
              <div class="form-group ">
                <div class="mb-3 mb-md-2">
                  <label class="font-weight-bold" for="details">ประสบการณ์สอน</label>
                  <textarea type="text" id="details" class="form-control" name="details" style="width: 100%; higt: 100%: margin: auto;" placeholder="กรุณากรอกรายละเอียด คลอสการติวการสอนหรือแนะนำตัวเองคร่าวๆ"></textarea>
                </div>
              </div>
              <div class="form-group ">
                <div class="mb-3 mb-md-2">
                  <label class="font-weight-bold" for="subject">วิชาที่เปิดติว</label>
                  <?php include('config/server.php');?>
                  <select class="form-select"  name="subject" required>
                  <option selected>เลือก</option>
                
                      <option value="ฟิสิกส์ทั่วไป">ฟิสิกส์ทั่วไป</option>
                      <option value="ชีววิทยาเบื้องต้น">ชีววิทยาเบื้องต้น</option>
                      <option value="เคมีทั่วไป">เคมีทั่วไป</option>
                      <option value="สถิติวิเคราะห์">สถิติวิเคราะห์</option>
                      <option value="แคลคูลัส">แคลคูลัส</option>
                      <option value="พีชคณิตเชิงเส้นและการประยุกต์">พีชคณิตเชิงเส้นและการประยุกต์</option>
                      <option value="ภาษาอังกฤษพื้นฐาน">ภาษาอังกฤษพื้นฐาน</option>
                      <option value="ภาษาเกาหลี">ภาษาเกาหลี</option>
                      <option value="ภาษาจีน">ภาษาจีน</option>
                    </select>                   
        
                </div>
              </div>
              <div class="form-group ">
              <label for="price">ราคาต่อชั่วโมง*</label>
                    <div class='form-group'>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="priceBaht">฿</span>
                            </div>
                            <input required aria-describedby="priceHelp" type="number" min="0" step="1" placeholder="ราคา" class="form-control" name='price' id="price">
                            <div class="invalid-feedback">
                                โปรดระบุราคาต่อชั่วโมงเป็นจำนวนเต็ม !
                            </div>
                        </div>
                        <small id="priceHelp" class="form-text text-muted">โปรดระบุราคาเป็นจำนวนเต็มเท่านั้น</small>
                    </div>
              </div>
              <div class="form-group ">
                <div class="mb-3 mb-md-2">
                  <label class="font-weight-bold" for="date_time">วันและเวลาที่สะดวกติว</label>
                  <textarea type="text" id="date_time" class="form-control" name="date_time" style="width: 100%; higt: 100%: margin: auto;" placeholder="เสาร์-อาททิตย์ เวลา 9.00-12.00 น."></textarea>
                </div>
              </div>
              <div class="form-group ">
                <div class="mb-3 mb-md-2">
                  <label class="font-weight-bold" for="location">สถานที่ติวหนังสือ (หากสะดวกติวออนไลน์ ให้พิมพ์ "ออนไลน์")</label>
                  <input type="text" id="location" class="form-control" name="location" required placeholder="NU Canteen / ออนไลน์">
                </div>
              </div>
              <div class="form-group ">
                <div class="mb-3 mb-md-2">
                  <label class="font-weight-bold" for="contact">ช่องทางการติดต่อ</label>
                  <input type="text" id="contact" class="form-control" name="contact" required placeholder="Line ID / Fackbook">
                </div>
              </div>
              <div class="form-group ">
              <div class='row'>
                <div style='margin-top:10px;' class='col-12'>
                  <h6 style='font-weight:400;'>แนบรูปถ่าย*</h6>
                  <div class="uploadButton custom-file">
                  <input required type="file" class="custom-file-input" accept="image/gif, image/jpeg, image/png" name='picture' id="picture">
                  </div>
                <small id="priceHelp" class="form-text text-muted">กรุณาแนบรูปถ่ายตนเองที่เห็นหน้าชัดเจน ไม่ใช่ภาพโปรโมท</small>
                <img hidden id="uploadPreview" src="#" />
                <input type='hidden' name='croppedImage' id='croppedImage'>
                </div>
              </div>
              </div>
              <div class="form-group">
                <div class="col-md-12">
                <center><button type="submit" name="submit" class="btn btn-primary  py-2 px-4">บันทึก</button></center>
                </div>
              </div>
              <br>
            </form>
          </div>
          </div>
          </body>
</html>


<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nickname = $_POST['nickname'];
    $class = $_POST['class'];
    $details = $_POST['details'];
    $subject = $_POST['subject'];
    $price = $_POST['price'];
    $date_time = $_POST['date_time'];
    $location = $_POST['location'];
    $contact = $_POST['contact'];
    $picture = $_POST['picture'];

    $sql = "INSERT INTO tutor (nickname, class, details, subject, price, date_time, location, contact, picture) 
    VALUES ('$nickname', '$class', '$details', '$subject', '$price', '$date_time', '$location', '$contact', '$picture')";

  if(mysqli_query($conn,$sql)){ 
   echo "<script>alert('บันทึก');window.location='search.php';</script>";
  }
}    
?>
