<?php
  include "dbconnect.php";
  session_start();
?>
<!doctype html>
<html lang="en">
  <head>
    <title>JobBoard &mdash; Free Website Template by Free-Template.co</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="Free-Template.co" />
    <link rel="shortcut icon" href="ftco-32x32.png">
    <link rel="stylesheet" href="css/custom-bs.css">
    <link rel="stylesheet" href="css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="css/bootstrap-select.min.css">
    <link rel="stylesheet" href="fonts/icomoon/style.css">
    <link rel="stylesheet" href="fonts/line-icons/style.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="css/quill.snow.css">
    <!-- MAIN CSS -->
    <link rel="stylesheet" href="css/style.css">    
  </head>
  <body id="top">

  <div id="overlayer"></div>
  <div class="loader">
    <div class="spinner-border text-primary" role="status">
      <span class="sr-only">Loading...</span>
    </div>
  </div>
    

<div class="site-wrap">

    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div> <!-- .site-mobile-menu -->
    

    <!-- NAVBAR -->
    <header class="site-navbar mt-3">
      <div class="container-fluid">
        <div class="row align-items-center">
          <div class="site-logo col-6"><a href="index.html">JobBoard</a></div>

          <nav class="mx-auto site-navigation">
            <ul class="site-menu js-clone-nav d-none d-xl-block ml-0 pl-0">
              <li><a href="index.php" class="nav-link active">Trang chủ</a></li>
              <li><a href="about.php">Thông tin</a></li>
              <li class="has-children">
                <a href="job-listings.html">Danh sách</a>
                <ul class="dropdown">
                 
                  <li><a href="job-single.php">Công việc</a></li>
                  <li><a href="post-job.php">Đăng việc</a></li>
                </ul>
              </li>
              <li class="has-children">
                <a href="services.html">Trang</a>
                <ul class="dropdown">
                  <li><a href="services.html">Các dịch vụ</a></li>
                  <li><a href="service-single.html">Dịch vụ đơn</a></li>
                  <li><a href="blog-single.html">Blog</a></li>
                  <li><a href="portfolio.html">Danh mục đầu tư</a></li>
                  <li><a href="portfolio-single.html">Danh mục đầu tư đơn</a></li>
                  <li><a href="testimonials.html">Chứng thực</a></li>
                  <li><a href="faq.html">Đặt câu hỏi thường xuyên</a></li>
                  <li><a href="gallery.php">Thư viện</a></li>
                </ul>
              </li>
              <li><a href="blog.php">Blog</a></li>
              <li><a href="contact.php">Liên hệ</a></li>
               <?php
              if(isset($_SESSION['is_login'])){
              $login = $_SESSION['is_login']; 
                echo "<li>";
                echo 'Xin chào'.' '.$login;
                echo "</li>";
                echo '<li class="d-lg-none"><a href="post-job.php"><span class="mr-2">+</span> Đăng việc</a></li>';
              }else{
                      echo '<li class="d-lg-none"><a href="login.php">Đăng nhập</a></li>';
              }
            
              ?>
            <!--  <li class="d-lg-none"><a href="post-job.php"><span class="mr-2">+</span> Đăng việc</a></li>-->
              
            </ul>
          </nav>
          
          <div class="right-cta-menu text-right d-flex aligin-items-center col-6">
            <div class="ml-auto">
              <?php
              if(isset($_SESSION['is_login'])){
                 echo "<form action='logout.php'>
                 <button> Đăng xuất </button>
                 </form>";
           
               echo '<a href="post-job.php" class="btn btn-outline-white border-width-2 d-none d-lg-inline-block"><span class="mr-2 icon-add"></span>Đăng việc</a>';
              }else{
                  echo '<a href="login.php" class="btn btn-primary border-width-2 d-none d-lg-inline-block"><span class="mr-2 icon-lock_outline"></span>Đăng nhập</a>';
              }
            
              ?>
            </div>
            <a href="#" class="site-menu-toggle js-menu-toggle d-inline-block d-xl-none mt-lg-2 ml-3"><span class="icon-menu h3 m-0 p-0 mt-2"></span></a>
          </div>

        </div>
      </div>
    </header>
    <!-- HOME -->
    <?php
         if(isset($_POST['languages'])){
          $id1=$id2=$id3=$leid1=$leid2=$leid3=$idus=0;
          $language1=$_POST['language1'];
          $language2=$_POST['language2'];
          $language3=$_POST['language3'];
          $level1=$_POST['level1'];
          $level2=$_POST['level2'];
          $level3=$_POST['level3'];
          //Lay user id
          $email=$_SESSION['email'];
          $sel="SELECT ID FROM USERS WHERE EMAIL='$email'";
          $dem=0;
          $kqq=oci_parse($conn,$sel);
          oci_execute($kqq);
          while($row=oci_fetch_row($kqq)){
                $idus=$row[0];
          }
           if($language1!=""){
            //Lay id languages
                       if($language1=='English'){
                        $id1=44;
                       }else if($language1=='Chinese'){
                        $id1=31;
                       }else if($language1=='Frence'){
                        $id1=51;
                       }else if($language1=='Japanese'){
                        $id1=79;
                       }else if($language1=='Indonesia'){
                           $id1=72;
                       }else if($language1=='Malay'){
                          $id1=108;
                       }
              //Lay id levels
                       if($level1=='Beginner'){
                                $leid1=1;
                       }else if($level1=='Intermediate'){
                              $leid1=2;
                       }else if($level3=='Expert'){
                            $leid1=3;
                       }
              //Insert vo database
                       $query="INSERT INTO PROFILE_LANGUAGES(USER_ID,LANGUAGE_ID,LANGUAGE_LEVEL_ID)"."VALUES('$idus','$id1','$leid1')";
                       $run=oci_parse($conn, $query);
       
                       if(oci_execute($run)){
                           $dem++;
                       }
                         

           }
            if($language2!=""){
              if($language2=='English'){
                        $id2=44;
                       }else if($language2=='Chinese'){
                        $id2=31;
                       }else if($language2=='Frence'){
                        $id2=51;
                       }else if($language2=='Japanese'){
                        $id2=79;
                       }else if($language2=='Indonesia'){
                           $id2=72;
                       }else if($language2=='Malay'){
                          $id2=108;
                       }
                       //Lay id levels
                       if($level2=='Beginner'){
                                $leid2=1;
                       }else if($level2=='Intermediate'){
                              $leid2=2;
                       }else if($level2=='Expert'){
                            $leid2=3;
                       }

                       $query="INSERT INTO PROFILE_LANGUAGES(USER_ID,LANGUAGE_ID,LANGUAGE_LEVEL_ID)"."VALUES('$idus','$id2','$leid2')";
                       $run=oci_parse($conn, $query);
       
                       if(oci_execute($run)){
                           $dem++;
                       }
                         
           }
            if($language3!=""){
              if($language3=='English'){
                        $id3=44;
                       }else if($language3=='Chinese'){
                        $id3=31;
                       }else if($language3=='Frence'){
                        $id3=51;
                       }else if($language3=='Japanese'){
                        $id3=79;
                       }else if($language3=='Indonesia'){
                           $id3=72;
                       }else if($language3=='Malay'){
                          $id3=108;
                       }
                       //Lay id levels
                       if($level3=='Beginner'){
                                $leid3=1;
                       }else if($level3=='Intermediate'){
                              $leid3=2;
                       }else if($level3=='Expert'){
                            $leid3=3;
                       }
                       $query="INSERT INTO PROFILE_LANGUAGES(USER_ID,LANGUAGE_ID,LANGUAGE_LEVEL_ID)"."VALUES('$idus','$id3','$leid3')";
                       $run=oci_parse($conn, $query);
                       if(oci_execute($run)){
                           $dem++;
                       }
                         
           }
           if($dem>0){
            echo "<script type='text/javascript'>";
            echo "alert('Lưu thành công!');";
            echo "</script>";
           }
             oci_close($conn);

         }

         if(isset($_POST['Save'])){
              $name=$_POST['name'];
              $title=$_POST['position'];
              $time=$_POST['time'];
              $province=$_POST['province'];
              $country=$_POST['countries'];
               $email=$_SESSION['email'];
               //Lay ID user
              $sel="SELECT ID FROM USERS WHERE EMAIL='$email'";
              $dem=0;
              $kqq=oci_parse($conn,$sel);
              oci_execute($kqq);
          while($row=oci_fetch_row($kqq)){
                $idus=$row[0];
          }
          //Lay countries_id
          $countries_id=0;
          $query="SELECT COUNTRY_ID FROM COUNTRIES WHERE COUNTRY='$country'";
          $kq=oci_parse($conn, $query);
          oci_execute($kq);
          while($row=oci_fetch_row($kq)){
               $countries_id=$row[0];
           }
           //Insert
          $ins="INSERT INTO PROFILE_EXPERIENCES(USER_ID,TITLE,COMPANY,COUNTRY_ID,CITY,TOTAL_TIME)"."VALUES('$idus','$title','$name','$countries_id','$province','$time')";
          $run=oci_parse($conn, $ins);
          if(oci_execute($run)){

                echo "<script type='text/javascript'>";
            echo "alert('Lưu thành công!');";
            echo "</script>";
          }
           oci_close($conn);
         }




    ?>
    <section class="section-hero overlay inner-page bg-image" style="background-image: url('images/hero_1.jpg');" id="home-section">
      <div class="container">
        <div class="row">
          <div class="col-md-7">
            <h1 class="text-white font-weight-bold">Đăng kí việc làm</h1>
            <div class="custom-breadcrumbs">
              <a href="index.php">Trang chủ</a> <span class="mx-2 slash">/</span>
              <span class="text-white"><strong>Đăng kí việc làm</strong></span>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="site-section" id="next-section">
      <div class="container">
        <div>
          <h3 style="color:red">NGOẠI NGỮ</h3>
          <form method="post">
            <table>
            <tr><td><label>Ngoại ngữ 1:</label></td><td><select name="language1"><option value="English">English</option><option value="Chinese">Chinese</option><option value="Frence">Frence</option ><option value="Japanese">Japanese</option><option value="Indonesia">Indonesia</option><option value="Malay">Malay</option><option value="">...</option ></select></td><td><Select name="level1"><option value="Beginner">Beginner</option><option value="Intermediate">Intermediate</option><option name="Expert">Expert</option>
            <option value="">...</option ></Select></td></tr>
            <tr><td><label>Ngoại ngữ 2:</label></td><td><select name="language2"><option value="English">English</option><option value="Chinese">Chinese</option><option value="Frence">Frence</option ><option value="Japanese">Japanese</option><option value="Indonesia">Indonesia</option><option value="Malay">Malay</option><option value="">...</option ></select></td><td><Select name="level2"><option value="Beginner">Beginner</option><option value="Intermediate">Intermediate</option><option name="Expert">Expert</option><option value="">...</option ></Select></td></tr>
            <tr><td><label>Ngoại ngữ 3:</label></td><td><select name="language3"><option value="English">English</option><option value="Chinese">Chinese</option><option value="Frence">Frence</option ><option value="Japanese">Japanese</option><option value="Indonesia">Indonesia</option><option value="Malay">Malay</option><option value="">...</option ></select></td><td><Select name="level3"><option value="Beginner">Beginner</option><option value="Intermediate">Intermediate</option><option name="Expert">Expert</option><option value="">...</option ></Select></td></tr>
            <tr><td></td><td><input style="color:green" type="submit" value="Lưu" name="languages"/></td><td></td></tr>
          </table>
          </form>
        </div>
      </div>
      <hr/>
      <div class="container">
        <div>
          <h3 style="color:red">KINH NGHIỆM</h3>
          <form method="post">
            <table>
              <tr><td><label>Tên công ty:</label></td><td><input type="text" name="name" /></td></tr>
              <tr><td><label>Vị trí:</label></td><td><input type="text" name="position" /></td></tr>
              <tr><td><label>Thời gian:</label></td><td><input type="text" name="time" /></td></tr>
              <tr><td><label>Tỉnh/Thành phố:</label></td><td><input type="text" name="province" /></td></tr>
              <tr><td>Quốc gia:</td><td><select class="selectpicker border rounded" id="job-region" data-style="btn-black" data-width="100%" data-live-search="true" title="Select Countries" name="countries">
                      <option value="Argentina">Argentina</option>
                      <option value="Australia">Australia</option>
                      <option value="Belgium">Belgium</option>
                      <option value="Canada">Canada</option>
                      <option value="Switzerland">Switzerland</option>
                      <option value="China">China</option>
                      <option value="Germany">Germany</option>
                       <option value="Denmark">Denmark</option>
                        <option value="Egypt">Egype</option>
                        <option value="Israel">Israel</option>
                        <option value="India">India</option>
                        <option value="Italy">Italy</option>
                        <option value="Japan">Japan</option>
                        <option value="Netherlands">Netherlands</option>
                        <option value="Singapore">Singapore</option>
                        <option value="United Kingdom">United Kingdom</option>
                        <option value="United States of America">United States of America</option>
                        <option value="Zambia">Zambia</option>
                        <option value="Zimbabwe">Zimbabwe</option>
                    </select></td></tr>
                    
               <tr><td></td><td><input style="color:green" type="submit" value="Lưu" name="Save"/></td><td></td></tr>
            </table>
          </form>
          <div >  <a  style="color:red" href='taohs3.php' class="btn btn-block ">Next</a></div>
        </div>
      </div>
    </section>
    
    <footer class="site-footer">

      <a href="#top" class="smoothscroll scroll-top">
        <span class="icon-keyboard_arrow_up"></span>
      </a>

      <div class="container">
        <div class="row mb-5">
          <div class="col-6 col-md-3 mb-4 mb-md-0">
            <h3>Xu hướng tìm kiếm </h3>
            <ul class="list-unstyled">
              <li><a href="#">Web Design</a></li>
              <li><a href="#">Graphic Design</a></li>
              <li><a href="#">Web Developers</a></li>
              <li><a href="#">Python</a></li>
              <li><a href="#">HTML5</a></li>
              <li><a href="#">CSS3</a></li>
            </ul>
          </div>
          <div class="col-6 col-md-3 mb-4 mb-md-0">
            <h3>Công ty</h3>
            <ul class="list-unstyled">
              <li><a href="#">Thông tin</a></li>
              <li><a href="#">Bằng cấp</a></li>
              <li><a href="#">Blog</a></li>
              <li><a href="#">Nguồn</a></li>
            </ul>
          </div>
          <div class="col-6 col-md-3 mb-4 mb-md-0">
            <h3>Ủng hộ</h3>
            <ul class="list-unstyled">
              <li><a href="#">Ủng hộ</a></li>
              <li><a href="#">Riêng tư</a></li>
              <li><a href="#">Điều khoản dịch vụ</a></li>
            </ul>
          </div>
          <div class="col-6 col-md-3 mb-4 mb-md-0">
            <h3>Liên hệ</h3>
            <div class="footer-social">
              <a href="#"><span class="icon-facebook"></span></a>
              <a href="#"><span class="icon-twitter"></span></a>
              <a href="#"><span class="icon-instagram"></span></a>
              <a href="#"><span class="icon-linkedin"></span></a>
            </div>
          </div>
        </div>

        <div class="row text-center">
          <div class="col-12">
            <p class="copyright">
            <!-- Link back to Free-Template.co can't be removed. Template is licensed under CC BY 3.0. -->
            <small class="block">&copy; <script>document.write(new Date().getFullYear());</script> <strong class="text-white">Jobboard</strong> Nhom 4. All Rights Reserved. <br> Designed &amp; Developed by Nhom 4</small> 
            </p>
          </div>
        </div>
      </div>
    </footer>
  
  
  </div>

    <!-- SCRIPTS -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/isotope.pkgd.min.js"></script>
    <script src="js/stickyfill.min.js"></script>
    <script src="js/jquery.fancybox.min.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/jquery.animateNumber.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/quill.min.js"></script>
    
    
    <script src="js/bootstrap-select.min.js"></script>
    
    <script src="js/custom.js"></script>
   
   
     
  </body>
</html>