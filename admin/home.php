<style>
@import url('https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@100;200;500;600;900&family=Sarabun:wght@200&display=swap');
body {
  min-height: 100vh;
  overflow-x: hidden;
  font-family: 'Noto Sans Thai', sans-serif;
}
</style>

<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- bootstrap -->
        
        <!-- datatable -->
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
        <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>

    </head>
    <?php 
if (empty($_SESSION["ID"]) || $_SESSION["Userlevel"] != 1 ){  
  echo "<script>
  alert('โปรดเข้าสู่ระบบ  ');
  window.location.replace('../login.php');
  </script>";
}else{?>

    <div class="row">

    <div class="col-sm-12 col-sm-6 p-3">
    <h2>Dashboard</h2>
    <hr>
    <div class="row">
          <div class="col-sm-3" style="margin-top: 1rem;">
            <div class="card bg-light border-success">
              <div class="card-body">
                <h5 class="card-title">รายการนัดที่รอยืนยัน</h5>
                <?php
			          include('../config/server.php');
                $sql1="select count(*) AS sum_ppid from purchase
                where stu = 0";
                $query1=$conn->query($sql1);
                $row1=$query1->fetch_array();
                ?>
                <?php if(isset($row1['sum_ppid'])){;?>
                    <h1 class="card-text"><?php echo $row1['sum_ppid'];?> รายการ</h1>
                <?php }else{?>
                    <h1 class="card-text"><?php echo '0';?> รายการ</h1>  
                <?php } ?>
            </div>
            </div>
          </div>
         
          <div class="col-sm-3" style="margin-top: 1rem;">
            <div class="card bg-light border-warning">
              <div class="card-body">
                <h5 class="card-title">รายการนัดที่ถูกยกเลิก</h5>
                <?php
			          include('../config/server.php');
                $sql3="select count(*) AS sum_ppid from purchase
                where stu = 5";
                $query3=$conn->query($sql3);
                $row3=$query3->fetch_array();
                ?>
                <?php if(isset($row3['sum_ppid'])){;?>
                    <h1 class="card-text"><?php echo $row3['sum_ppid'];?> รายการ</h1>
                <?php }else{?>
                    <h1 class="card-text"><?php echo '0';?> รายการ</h1>  
                <?php } ?>
              </div>
            </div>
          </div>
          
    </div>
    <div class="row">
   
<?php } ?>   
<script>
const dateInput = document.getElementById('date');

dateInput.value = formatDate();

console.log(formatDate());

function padTo2Digits(num) {
  return num.toString().padStart(2, '0');
}

function formatDate(date = new Date()) {
  return [
    date.getFullYear(),
    padTo2Digits(date.getMonth() + 1),
    padTo2Digits(date.getDate()),
  ].join('-');
}
</script>

<script>
const dateInput01 = document.getElementById('date01');

dateInput01.value = formatDate();

console.log(formatDate());

function padTo2Digits(num) {
  return num.toString().padStart(2, '0');
}

function formatDate(date = new Date()) {
  return [
    date.getFullYear(),
    padTo2Digits(date.getMonth() + 1),
    padTo2Digits(date.getDate()),
  ].join('-');
}
</script>