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
              <li><a href="index.html" class="nav-link active">Trang chủ</a></li>
              <li><a href="about.html">Thông tin</a></li>
              <li class="has-children">
                <a href="job-listings.html">Danh sách</a>
                <ul class="dropdown">
                  <?php
            include "dbconnect.php";
          ?>
                  <li><a href="job-single.html">Công việc</a></li>
                  <li><a href="post-job.html">Đăng việc</a></li>
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
                  <li><a href="gallery.html">Thư viện</a></li>
                </ul>
              </li>
              <li><a href="blog.html">Blog</a></li>
              <li><a href="contact.html">Liên hệ</a></li>
              <li class="d-lg-none"><a href="post-job.html"><span class="mr-2">+</span> Đăng việc</a></li>
              <li class="d-lg-none"><a href="login.html">Đăng nhập</a></li>
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

        </div>
      </div>
    </header>
    <!-- HOME -->
    <section class="section-hero overlay inner-page bg-image" style="background-image: url('images/hero_1.jpg');" id="home-section">
      <div class="container">
        <div class="row">
          <div class="col-md-7">
            <h1 class="text-white font-weight-bold">CHI TIẾT</h1>
            <div class="custom-breadcrumbs">
              <a href="#">Trang chủ</a> <span class="mx-2 slash">/</span>
              <span class="text-white"><strong>CHI TIẾT</strong></span>
            </div>
          </div>
        </div>
      </div>
    </section>

   <section class="site-section" id="next">
      <div class="container">

        <div class="row mb-5 justify-content-center">
          <div class="col-md-7 text-center">
            <h2 class="section-title mb-2">Chi tiết</h2>
          </div>
        </div>
          <?php
           $current_id = $_GET['id'];
           $find="SELECT COUNTRY_ID,WEBSITE,COMPANY_ID,JOBDESCRIPTION FROM JOBS WHERE ID=:current_id";
           $comp=oci_parse($conn,$find);
           oci_bind_by_name($comp, ":current_id", $current_id);
           oci_execute($comp);
           $website=$country_id=$jobdc="";
           $cmp_id=0;
           while($row=oci_fetch_row($comp)){
                    $country_id=$row[0];
                    $website=$row[1];
                    $cmp_id=$row[2];
                    $jobdc=$row[3];
                    
           }

           //find country
           $find="SELECT COUNTRY FROM COUNTRIES WHERE COUNTRY_ID = :country_id";
        $kq=oci_parse($conn,$find);
        oci_bind_by_name($kq, ":country_id", $country_id);
       
         $country="";
        if(oci_execute($kq)){
         
           while($row=oci_fetch_row($kq)){
                    $country=$row[0];
           }
              
          
        }

            
           $query="SELECT NAMEIMG,EMAIL,TITLE,LOCATION,JOB_TYPE_ID,HIDE_SALARY FROM JOBS WHERE ID='$current_id'";
           $run=oci_parse($conn,$query);
             
          if(oci_execute($run)){
             echo '<div class="container">';
        echo '<div class="row align-items-center mb-5">';
         echo '<div class="col-lg-8 mb-4 mb-lg-0">';
          echo '<div class="d-flex align-items-center">';
             echo '<div class="border p-2 d-inline-block mr-3 rounded">';
           while($row=oci_fetch_row($run)){
          $img=$row[0];
          $email=$row[1];
           $location=$row[3];
            $job_id=$row[4];
            $salary=$row[5];
             echo '</div>';
              echo '<div>';
                echo '<h2>'.$row[2].'</h2>';
                echo '<div>';
                  echo '<span class="ml-0 mr-2 mb-2"><span class="icon-briefcase mr-2"></span>'.$location.'</span>';
                  $country="";
                 
                  if($country_id!=""){
                    $select ="SELECT COUNTRY FROM COUNTRIES WHERE COUNTRY_ID='$country_id'";
                    $kq=oci_parse($conn,$select);
                    oci_execute($kq);
                    while($row=oci_fetch_row($kq)){
                      $country=$row[0];
                    }
                  }
                  echo '<span class="m-2"><span class="icon-room mr-2"></span>'.$country.'</span>';
                  
                   $name="sdsa";
              if($job_id!=0){
              $query="SELECT JOB_TYPE FROM JOB_TYPES WHERE ID = $job_id";
            $kq=oci_parse($conn, $query);
            oci_execute($kq);
           
           while($row=oci_fetch_row($kq)){
               $name=$row[0];
               }
             }
          
             

                  echo '<span class="m-2"><span class="icon-clock-o mr-2"></span><span class="text-primary">'.$name.'</span></span>';
                echo '</div>';
              echo '</div>';
           echo '</div>';
          echo '</div>';
          echo '<div class="col-lg-4">';
            echo '<div class="row">';
              
            echo '</div>';
          echo '</div>';
        echo '</div>';
        echo '<div class="row">';
          echo '<div class="col-lg-8">';
            echo '<div class="mb-5">';
               echo '<img src='.$img.' class="img-fluid">';
              echo '<h3 class="h5 d-flex align-items-center mb-4 text-primary"><span class="icon-align-left mr-3"></span>Mô tả công việc</h3>';
             echo '<p>';
              echo $jobdc;
             echo '</p>';
            echo '</div>';
            echo '<div class="mb-5">
              <h3 class="h5 d-flex align-items-center mb-4 text-primary"><span class="icon-rocket mr-3"></span>Trách nhiệm</h3>';
              echo '<ul class="list-unstyled m-0 p-0">
                <li class="d-flex align-items-start mb-2"><span class="icon-check_circle mr-2 text-muted"></span><span>Necessitatibus quibusdam facilis</span></li>
                <li class="d-flex align-items-start mb-2"><span class="icon-check_circle mr-2 text-muted"></span><span>Velit unde aliquam et voluptas reiciendis n Velit unde aliquam et voluptas reiciendis non sapiente labore</span></li>
                <li class="d-flex align-items-start mb-2"><span class="icon-check_circle mr-2 text-muted"></span><span>Commodi quae ipsum quas est itaque</span></li>
                <li class="d-flex align-items-start mb-2"><span class="icon-check_circle mr-2 text-muted"></span><span>Lorem ipsum dolor sit amet, consectetur adipisicing elit</span></li>
                <li class="d-flex align-items-start mb-2"><span class="icon-check_circle mr-2 text-muted"></span><span>Deleniti asperiores blanditiis nihil quia officiis dolor</span></li>
              </ul>
            </div>';

            echo '<div class="mb-5">
              <h3 class="h5 d-flex align-items-center mb-4 text-primary"><span class="icon-book mr-3"></span>Lương</h3>
              <ul class="list-unstyled m-0 p-0">
                <li class="d-flex align-items-start mb-2"><span class="icon-check_circle mr-2 text-muted"></span><span>'.$salary.'</span></li>';
                
             echo '</ul>
            </div>';

            echo '<div class="mb-5">
              <h3 class="h5 d-flex align-items-center mb-4 text-primary"><span class="icon-turned_in mr-3"></span>Lợi ích khác</h3>
              <ul class="list-unstyled m-0 p-0">
                <li class="d-flex align-items-start mb-2"><span class="icon-check_circle mr-2 text-muted"></span><span>Necessitatibus quibusdam facilis</span></li>
                <li class="d-flex align-items-start mb-2"><span class="icon-check_circle mr-2 text-muted"></span><span>Velit unde aliquam et voluptas reiciendis non sapiente labore</span></li>
                <li class="d-flex align-items-start mb-2"><span class="icon-check_circle mr-2 text-muted"></span><span>Commodi quae ipsum quas est itaque</span></li>
                <li class="d-flex align-items-start mb-2"><span class="icon-check_circle mr-2 text-muted"></span><span>Lorem ipsum dolor sit amet, consectetur adipisicing elit</span></li>
                <li class="d-flex align-items-start mb-2"><span class="icon-check_circle mr-2 text-muted"></span><span>Deleniti asperiores blanditiis nihil quia officiis dolor</span></li>
              </ul>';
              echo '<div class="mb-5">
              <h3 class="h5 d-flex align-items-center mb-4 text-primary"><span class="icon-turned_in mr-3"></span>Thông tin liên lạc</h3>
              <ul class="list-unstyled m-0 p-0">
                <li class="d-flex align-items-start mb-2"><span class="icon-check_circle mr-2 text-muted"></span><span>'.$email.'</span></li>';
               echo '</div>

            <div class="row mb-5">
              <div class="col-6">
                <a href="luuviec.php?id='.$current_id.'"> <span class="icon-heart-o mr-2 text-danger"></span>Lưu việc</a>
              </div>';
                if(isset($_SESSION['is_login'])){
                       $login = $_SESSION['is_login']; 
                      
              echo '<div class="col-6">';
                      echo '<a href="dangkiviec.php?email='.$email.'">Đăng kí ngay</a>';
                      echo '</div>';
                  
                
              }else{
                  echo "<a href='login.php' class='btn btn-block btn-primary btn-md'>Đăng ký ngay</a>";
              }
          
            }
          }
            
              
              
            
          
              ?>

           
                
             

            



       
         
        
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