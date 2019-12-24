<?php
  include "dbconnect.php";
  session_start();
  
  $td=$_GET['email'];
  $_SESSION['mailtd']=$td;

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
        <?php 
             //Lay id user
        $email=$_SESSION['email'];
           $sel="SELECT ID FROM USERS WHERE EMAIL='$email'";
           $kqq=oci_parse($conn,$sel);
           oci_execute($kqq);
           $idus=0;
            while($row=oci_fetch_row($kqq)){
               $idus=$row[0];
            }

              $query="SELECT CV_FILE FROM PROFILE_CVS WHERE ID=$idus";
              $run=oci_parse($conn,$query);
              oci_execute($run);
              $cv="";
            while($row=oci_fetch_row($run)){
               $cv=$row[0];
            }
            
            if($cv==""){
               echo '<div>
          <h3 style="text-align: center">Bạn chưa tạo hồ sơ trên Jobboard. Mời bạn gửi hồ sơ bằng 1 trong hai cách này</h3>
          <div>Cách 1: Tạo mới hồ sơ</div>
          <form action="taohs.php">
              <input type="submit" value="TẠO HỒ SƠ MỚI"/>
          </form>
      
          <div>Cách 2: Nộp đơn có sẵn</div>
          <form action="nopfile.php"  method="post" enctype="multipart/form-data">
            <table>
              <tr><td><input type="file" name="file" value="Chọn hồ sơ"/></td></tr>
              <tr><td><input type="submit" name="upload" value="NỘP HỒ SƠ"/></td></tr>
            </table>
          </form>';
            }else{
              echo '<div>
          <h3 style="text-align: center">Bạn đã tạo hồ sơ trên Jobboard. Mời bạn gửi hồ sơ bằng 1 trong hai cách này</h3>
          <div>Cách 1: Tạo mới hồ sơ</div>
          <form action="taohs.php">
              <input type="submit" value="TẠO HỒ SƠ MỚI"/>
          </form>
      
          <div>Cách 2: Nộp đơn có sẵn</div>
          <a href="laycv.php">Xem CV</a>';

            }

         ?>
       
          <!-- <div class="col-lg-6 mb-4">
            <div class="block__87154">
              <blockquote>
                <p>&ldquo;Ipsum harum assumenda in eum vel eveniet numquam cumque vero vitae enim cupiditate deserunt eligendi officia modi consectetur. Expedita tempora quos nobis earum hic ex asperiores quisquam optio nostrum sit&rdquo;</p>
              </blockquote>
              <div class="block__91147 d-flex align-items-center">
                <figure class="mr-4"><img src="images/person_1.jpg" alt="Free Website Template by Free-Template.co" class="img-fluid"></figure>
                <div>
                  <h3>Elisabeth Smith</h3>
                  <span class="position">Creative Director</span>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-6 mb-4">
            <div class="block__87154">
              <blockquote>
                <p>&ldquo;Ipsum harum assumenda in eum vel eveniet numquam, cumque vero vitae enim cupiditate deserunt eligendi officia modi consectetur. Expedita tempora quos nobis earum hic ex asperiores quisquam optio nostrum sit&rdquo;</p>
              </blockquote>
              <div class="block__91147 d-flex align-items-center">
                <figure class="mr-4"><img src="images/person_2.jpg" alt="Free Website Template by Free-Template.co" class="img-fluid"></figure>
                <div>
                  <h3>Chris Peter</h3>
                  <span class="position">Web Designer</span>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-6 mb-4">
            <div class="block__87154">
              <blockquote>
                <p>&ldquo;Ipsum harum assumenda in eum vel eveniet numquam cumque vero vitae enim cupiditate deserunt eligendi officia modi consectetur. Expedita tempora quos nobis earum hic ex asperiores quisquam optio nostrum sit&rdquo;</p>
              </blockquote>
              <div class="block__91147 d-flex align-items-center">
                <figure class="mr-4"><img src="images/person_3.jpg" alt="Free Website Template by Free-Template.co" class="img-fluid"></figure>
                <div>
                  <h3>Benjamin Lewis</h3>
                  <span class="position">Creative Director</span>
                </div>
              </div>
            </div>
          </div> -->

          <!-- <div class="col-lg-6 mb-4">
            <div class="block__87154">
              <blockquote>
                <p>&ldquo;Ipsum harum assumenda in eum vel eveniet numquam, cumque vero vitae enim cupiditate deserunt eligendi officia modi consectetur. Expedita tempora quos nobis earum hic ex asperiores quisquam optio nostrum sit&rdquo;</p>
              </blockquote>
              <div class="block__91147 d-flex align-items-center">
                <figure class="mr-4"><img src="images/person_4.jpg" alt="Free Website Template by Free-Template.co" class="img-fluid"></figure>
                <div>
                  <h3>Pippa Cooper</h3>
                  <span class="position">Web Designer</span>
                </div>
              </div>
            </div>
          </div> -->

          <!-- <div class="col-lg-12 mb-4">
            <div class="block__87154 bg-primary">
              <blockquote>
                <p class="text-white">&ldquo;Ipsum harum assumenda in eum vel eveniet numquam, cumque vero vitae enim cupiditate deserunt eligendi officia modi consectetur. Expedita tempora quos nobis earum hic ex asperiores quisquam optio nostrum sit&rdquo;</p>
              </blockquote>
              <div class="block__91147 d-flex align-items-center">
                <figure class="mr-4"><img src="images/person_4.jpg" alt="Free Website Template by Free-Template.co" class="img-fluid"></figure>
                <div>
                  <h3 class="text-white">Pippa Cooper</h3>
                  <span class="position position-2">Web Designer</span>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-6 mb-4">
            <div class="block__87154">
              <blockquote>
                <p>&ldquo;Ipsum harum assumenda in eum vel eveniet numquam cumque vero vitae enim cupiditate deserunt eligendi officia modi consectetur. Expedita tempora quos nobis earum hic ex asperiores quisquam optio nostrum sit&rdquo;</p>
              </blockquote>
              <div class="block__91147 d-flex align-items-center">
                <figure class="mr-4"><img src="images/person_1.jpg" alt="Free Website Template by Free-Template.co" class="img-fluid"></figure>
                <div>
                  <h3>Elisabeth Smith</h3>
                  <span class="position">Creative Director</span>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-6 mb-4">
            <div class="block__87154">
              <blockquote>
                <p>&ldquo;Ipsum harum assumenda in eum vel eveniet numquam, cumque vero vitae enim cupiditate deserunt eligendi officia modi consectetur. Expedita tempora quos nobis earum hic ex asperiores quisquam optio nostrum sit&rdquo;</p>
              </blockquote>
              <div class="block__91147 d-flex align-items-center">
                <figure class="mr-4"><img src="images/person_2.jpg" alt="Free Website Template by Free-Template.co" class="img-fluid"></figure>
                <div>
                  <h3>Chris Peter</h3>
                  <span class="position">Web Designer</span>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-6 mb-4">
            <div class="block__87154">
              <blockquote>
                <p>&ldquo;Ipsum harum assumenda in eum vel eveniet numquam cumque vero vitae enim cupiditate deserunt eligendi officia modi consectetur. Expedita tempora quos nobis earum hic ex asperiores quisquam optio nostrum sit&rdquo;</p>
              </blockquote>
              <div class="block__91147 d-flex align-items-center">
                <figure class="mr-4"><img src="images/person_3.jpg" alt="Free Website Template by Free-Template.co" class="img-fluid"></figure>
                <div>
                  <h3>Benjamin Lewis</h3>
                  <span class="position">Creative Director</span>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-6 mb-4">
            <div class="block__87154">
              <blockquote>
                <p>&ldquo;Ipsum harum assumenda in eum vel eveniet numquam, cumque vero vitae enim cupiditate deserunt eligendi officia modi consectetur. Expedita tempora quos nobis earum hic ex asperiores quisquam optio nostrum sit&rdquo;</p>
              </blockquote>
              <div class="block__91147 d-flex align-items-center">
                <figure class="mr-4"><img src="images/person_4.jpg" alt="Free Website Template by Free-Template.co" class="img-fluid"></figure>
                <div>
                  <h3>Pippa Cooper</h3>
                  <span class="position">Web Designer</span>
                </div>
              </div>
            </div>
          </div> -->

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