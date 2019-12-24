

          <?php 
          include "dbconnect.php";
          session_start();
    
       $email=$_POST['txtmail'];
      $_SESSION['email']=$email;
       $pass=$_POST['txtpass'];
       $pass=md5($pass);
    $query='SELECT NAME FROM USERS WHERE EMAIL=:email and PASSWORD=:pass';
    $compiled = oci_parse($conn, $query);
    oci_bind_by_name($compiled, ':email', $email);
    oci_bind_by_name($compiled, ':pass', $pass);
     $value="";
     oci_execute($compiled);
     while($row=oci_fetch_row($compiled)){
            $value=$row[0];
          }
    if ($value!=''){
       
       $_SESSION['is_login'] = $value;
        Header( "Location: http://localhost/jobboard/jobboard/index.php" );
    }
    else{
        echo "Email hoặc mật khẩu chưa đúng!. <a href='login.php'>Thử lại</a>";
    }
      
           
          ?>
          