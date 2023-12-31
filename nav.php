<?php 
    session_start();
?>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
<style>
@import url('https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@100;200;500;600;900&family=Sarabun:wght@200&display=swap');
body {
  min-height: 100vh;
  overflow-x: hidden;
  font-family: 'Noto Sans Thai', sans-serif;
}
</style>
<nav class="navbar navbar-expand-lg navbar-light sticky-top" style="background-color: #f8bbd0;">
            <div class="container px-4">
            <?php
            include('config/db.php');
            $teac = $conn->prepare('SELECT * From contact where id_con = 1');
            $teac->execute();
            $teacs = $teac->fetch();

            if (!$teacs) {
                
            }else{
            ?>
                <a class="navbar-brand text-dack" href="index.php">
                <?php echo $teacs['name'];?>
                </a>
  <?php } ?>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4 justify-content-between">
                        <li class="nav-item"><a class="nav-link active text-dack" aria-current="page" href="index.php">หน้าแรก</a></li>
                        <li class="nav-item"><a class="nav-link text-dack" href="search.php">ค้นหาเพื่อนติว</a></li>
                        <li class="nav-item"><a class="nav-link text-dack" href="new_tutor.php">สมัครติวเตอร์</a></li>                        
                    </ul>
                    <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                      <?php if(!empty($_SESSION['Firstname'])) {?>
                        <a class="nav-link" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-regular fa-user"></i> สวัสดี : คุณ <?php echo $_SESSION['Firstname']?><i class="fa-solid fa-chevron-down"></i></a>
                        <ul class="dropdown-menu bg-light" aria-labelledby="navbarDropdown">
                        <?php if($_SESSION['Userlevel']==1){?>
                          <li><a class="dropdown-item" href="admin/index_admin.php"><i class="fa-solid fa-store"></i> จัดการระบบ</a></li>  
                          <li><a class="dropdown-item" href="admin/index_admin.php?p=editu&UserID=<?php echo $_SESSION['ID'];?>" ><i class="fa-solid fa-gears"></i> แก้ไขข้อมูลส่วนตัว</a></li>
                          <li><a class="dropdown-item" href="logout.php" ><i class="fa-solid fa-right-from-bracket"></i> ออกจากระบบ</a></li>
                        </ul>
                        <?php }elseif($_SESSION['Userlevel']==2){?>
                          <li><a class="dropdown-item" href="emp/EditUser.php?UserID=<?php echo $_SESSION['ID'];?>" ><i class="fa-solid fa-gears"></i> แก้ไขข้อมูลส่วนตัว</a></li>
                          <li><a class="dropdown-item" href="logout.php" ><i class="fa-solid fa-right-from-bracket"></i> ออกจากระบบ</a></li>
                        </ul>
                      <?php } }else{?>
                        <li><a class="nav-link text-dack" href="login.php" ><i class="fa-solid fa-right-from-bracket"></i> เข้าสู่ระบบ</a></li>
                      <?php } ?>
                    </li>
                    </ul>
                  </div>
                
            </div>  
        </nav>
        <div class="card">
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
  <?php
include('config/db.php');
     $stmt = $conn->prepare("SELECT* FROM slider");
     $stmt->execute();
     $result = $stmt->fetchAll();
?>
                          <div class="carousel-indicators">
                            <?php
                            //กำหนด class active เพื่อเรียกใช้ button สำหรับคลิกสไลด์
                              $i=0;
                              foreach($result as $row){
                              $actives='';
                              if($i==0){
                              $actives='active';
                              }
                              ?>
                            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="<?php echo $i;?>" class="<?php echo $actives;?>" aria-current="true" aria-label="Slide <?php echo $i;?>"></button>
                            <?php $i++; } ?>
                          </div>
                          <div class="carousel-inner">
 
                            <?php
                            //กำหนด class active สำหรับเรียกรูปมาแสดง
                              $i=0;
                              foreach($result as $row){
                              $actives='';
                              if($i==0){
                              $actives='active';
                              }
                              ?>
 
                            <div class="carousel-item <?php echo $actives;?>">
                               <a href="" target="_blank" title="คลิก">
                              <img src="admin/upload/<?php echo $row['img_slide'];?>" class="d-block w-100" alt="...">
                              </a>
                            </div>
                            <?php $i++; } ?>
 
                          </div>
 
 
                          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                          </button>
                          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                          </button>
                        </div>
 
                         <!-- // slide -->
</div>
        </div>
