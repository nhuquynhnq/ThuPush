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
            <h1 class="text-white font-weight-bold">CÔNG VIỆC</h1>
            <div class="custom-breadcrumbs">
              <a href="#">Trang chủ</a> <span class="mx-2 slash">/</span>
              <span class="text-white"><strong>CÔNG VIỆC</strong></span>
            </div>
          </div>
        </div>
      </div>
    </section>

   <section class="site-section" id="next">
      <div class="container">

        <div class="row mb-5 justify-content-center">
          <div class="col-md-7 text-center">
            <h2 class="section-title mb-2">Công việc gần đây</h2>
          </div>
        </div>
          <?php
               
               $query="SELECT  COUNT(ID) AS TOTAL FROM JOBS";
               $run=oci_parse($conn,$query);
               oci_execute($run);
               $total=0;
               while($row=oci_fetch_row($run)){
                $total=$row[0];
               }
               $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
               $limit = 10;
 
// BƯỚC 4: TÍNH TOÁN TOTAL_PAGE VÀ START
// tổng số trang
                $total_page = ceil($total / $limit);
 
// Giới hạn current_page trong khoảng 1 đến total_page
             if ($current_page > $total_page){
                 $current_page = $total_page;
              }
                  else if ($current_page < 1){
                  $current_page = 1;
              }
 
// Tìm Start
            $start = ($current_page-1)*$limit+1;
            $end=$start
            +9;
            $que="select * from (
    select 
     ID,TITLE,NAMEIMG,LOCATION,JOB_TYPE_ID,
     row_number() over
    (order by ID) rn
        from JOBS)
    where rn between '$start' and '$end'
        order by rn";
            $result = oci_parse($conn, $que);
             oci_execute($result);
              $name="";
               $dem=0;
            // PHẦN HIỂN THỊ TIN TỨC
                echo '<ul class="job-listings mb-5">';
            while ($row = oci_fetch_row($result)){
            $id=$row[0];
            echo '<li class="job-listing d-block d-sm-flex pb-3 pb-sm-0 align-items-center">';
            echo  '<a href="chitiet.php?id='.$row[0].'"></a>  ';
            echo '<div class="job-listing-logo">';
            echo '<img src='.$row[2].' class="img-fluid">';
            echo '</div>';
            echo '<div class="job-listing-about d-sm-flex custom-width w-100 justify-content-between mx-4">';
            echo   '<div class="job-listing-position custom-width w-50 mb-3 mb-sm-0">';
             echo'   <h2>'.$row[1].'</h2>';
              echo '</div>';
              echo '<div class="job-listing-location mb-3 mb-sm-0 custom-width w-25">';
             echo '<span class="icon-room">'.$row[3].'</span>';
              echo '</div>';
              echo '<div class="job-listing-meta">';
              //  echo '<li>' . $row[0] . '</li>';
              $job_id=$row[4];
              if($job_id!=0){
              $query="SELECT JOB_TYPE FROM JOB_TYPES WHERE ID = $job_id";
            $kq=oci_parse($conn, $query);
            oci_execute($kq);
           
           while($row=oci_fetch_row($kq)){
               $name=$row[0];
               }

         }
         
               echo '<span class="badge badge-danger">'.$name,'</span>';
             echo ' </div>';
            echo '</div>';
            
          echo '</li>';

          
             }
             echo "</ul>";
            ?>
        </div>
        <div class="pagination">
           <?php 
            // PHẦN HIỂN THỊ PHÂN TRANG
           if ($current_page > 1 && $total_page > 1){
                echo '<a href="phantrang.php?page='.($current_page-1).'">Prev</a> | ';
            }
 
            // Lặp khoảng giữa
            for ($i = 1; $i <= $total_page; $i++){
                // Nếu là trang hiện tại thì hiển thị thẻ span
                // ngược lại hiển thị thẻ a
                if ($i == $current_page){
                    echo '<span>'.$i.'</span> | ';
                }
                else{
                    echo '<a href="phantrang.php?page='.$i.'">'.$i.'</a> | ';
                }
            }
 
            // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
            if ($current_page < $total_page && $total_page > 1){
                echo '<a href="phantrang.php?page='.($current_page+1).'">Next</a> | ';
            }
           
           ?>
        </div>
         </div>
       </div>
     </section>

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