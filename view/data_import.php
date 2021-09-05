<?php  
 //login_success.php  
 session_start();  
 if(isset($_SESSION["userid"])){ 
  $dsn = "mysql:dbname=lusweets;host=localhost;port=3306";
  $username = "root";
  $password = ""; 
  try {
  // 建立MySQL伺服器連接和開啟資料庫 
  $link = new PDO($dsn, $username, $password);
  // 指定PDO錯誤模式和錯誤處理
  $link->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION); 
  } catch (PDOException $e) {
  //echo "連接失敗: " . $e->getMessage();
  }
  //echo '連線成功 <br />'; 
  $userid = $_SESSION["userid"];
  $sql = "SELECT * FROM product";
  //echo $sql;
  $statement = $link->prepare($sql);
  $statement -> execute();
  $data = $statement->fetchAll(PDO::FETCH_ASSOC);

  foreach($data as $row){
      $product_id = $row['product_id'];
      $product_name = $row['product_name'];
      $product_price = $row['product_price'];
      $product_type = $row['product_type'];
      $product_place = $row['product_place'];
      $product_year = $row['product_year'];
      $product_information = $row['product_information'];
  }

  try{
    $link = new PDO($dsn, $username, $password);
    // 指定PDO錯誤模式和錯誤處理
    $link->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    //echo '準備連線'; 
    
    if(isset($_POST["import"])){ 
      if(empty($_POST["selled_id"])){
        $_POST["selled_id"] = '0'; 
        $_POST["selled_time"] = '';
        $_POST["selled_price"] = '';
      }
      /*
      echo $_POST["product_id"];
      echo '<br>';
      echo $_POST["order_time"];
      echo '<br>';
      echo $_POST["order_price"];
      echo '<br>';
      echo $_POST["product_brand"];
      echo '<br>';
      echo $_POST["order_num"];
      echo '<br>';
      echo $_POST["selled_id"]; 
      echo '<br>';
      echo $_POST["selled_time"];
      echo '<br>';
      echo $_POST["selled_price"];
*/


      //echo '連線成功<br/>'; 

        if(empty($_POST["order_time"]) || empty($_POST["order_num"])|| empty($_POST["order_price"]))  
         {  
              $message = '<label>All fields are required</label>'; 
         }  
        else{
          $query = "INSERT INTO ordered (order_id, order_date, order_num, order_price,product_id,user_id, status) VALUES  ('',:order_time,:order_num,:order_price,:product_id,'$userid',:sell)";
          try{
            $statement = $link->prepare($query);
            $statement -> execute(
                array(
                  'order_time'     =>     $_POST["order_time"],  
                  'order_num'     =>     $_POST["order_num"],
                  'order_price'     =>     $_POST["order_price"],
                  'product_id'     =>     $_POST["product_id"],
                  'sell'     =>     $_POST["selled_id"]
              )  
            );
            /*
            echo $_POST["product_id"];
            echo '<br>';
            echo $_POST["order_time"];
            echo '<br>';
            echo $_POST["order_price"];
            echo '<br>';
            echo $_POST["product_brand"];
            echo '<br>';
            echo $_POST["order_num"];
            echo '<br>';
            echo $_POST["selled_id"]; 
            echo '<br>';
            echo $_POST["selled_time"];
            echo '<br>';
            echo $_POST["selled_price"];
*/
            //echo("<meta http-equiv='refresh' content='0.1'>");
          } catch (PDOException $e) {
            //echo "連接失敗: " . $e->getMessage();
          }
            echo("<meta http-equiv='refresh'content='0.1'>");
          }
         }  


    /******************************************* */
    if(isset($_POST["import_csv"])){ 
      echo $_POST["connectmap_sql"];
      
      /*
      echo '<br>';
      echo $_POST["order_time"];
      echo '<br>';
      echo $_POST["order_price"];
      echo '<br>';
      echo $_POST["product_brand"];
      echo '<br>';
      echo $_POST["order_num"];
      echo '<br>';
      echo $_POST["selled_id"]; 
      echo '<br>';
      echo $_POST["selled_time"];
      echo '<br>';
      echo $_POST["selled_price"];
      */

    if(empty($_POST["connectmap_sql"])){  
          $message = '<label>All fields are required</label>'; 
    }else{
      $query = $_POST["connectmap_sql"];
      try{
        $statement = $link->prepare($query);
        $statement -> execute(
            array(
              'userid'     =>     $_SESSION["userid"],  
          )  
        );
            /*
            echo $_POST["product_id"];
            echo '<br>';
            echo $_POST["order_time"];
            echo '<br>';
            echo $_POST["order_price"];
            echo '<br>';
            echo $_POST["product_brand"];
            echo '<br>';
            echo $_POST["order_num"];
            echo '<br>';
            echo $_POST["selled_id"]; 
            echo '<br>';
            echo $_POST["selled_time"];
            echo '<br>';
            echo $_POST["selled_price"];
*/
            //echo("<meta http-equiv='refresh' content='0.1'>");
            
        } catch (PDOException $e) {
            echo "連接失敗: " . $e->getMessage();
      }
        echo("<meta http-equiv='refresh'content='0.1'>");
      }
    }  

  } catch(PDOException $error){  
    $message = $error->getMessage();  
  }
 

 }  
 else{  
      header("location:/view/login.php");  
 }  

 ?>    
<!--
=========================================================
Material Dashboard - v2.1.2
=========================================================

Product Page: https://www.creative-tim.com/product/material-dashboard
Copyright 2020 Creative Tim (https://www.creative-tim.com)
Coded by Creative Tim

=========================================================
The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. -->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8"/>
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Material Dashboard by Creative Tim
  </title>
  <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="../assets/css/material-dashboard.css?v=2.1.2" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../assets/demo/demo.css" rel="stylesheet" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="../assets/js/csv importer/papaparse.js" charset="utf-8"></script>
  <script src="../assets/js/csv importer/reading-csv-file-using-javascript.js" charset="utf-8"></script>
  
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
    <div class="logo"><a href="/index.html" class="simple-text logo-normal">
          投資運算平台
        </a></div>
      <div class="sidebar-wrapper">
        <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="./dashboard.php">
              <i class="material-icons">dashboard</i>
              <p>狀態儀表板</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="./user.php">
              <i class="material-icons">person</i>
              <p>個人資料</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="./products.php">
              <i class="material-icons">content_paste</i>
              <p>商品管理系統</p>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./orders.php">
              <i class="material-icons">library_books</i>
              <p>訂單管理系統</p>
            </a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="./data_import.php">
              <i class="material-icons">unarchive</i>
              <p>數據匯入系統</p>
            </a>
          </li>
    <!--
          <li class="nav-item ">
            <a class="nav-link" href="./notifications.php">
              <i class="material-icons">notifications</i>
              <p>所有通知</p>
            </a>
          </li>

-->
          <!--
          <li class="nav-item ">
            <a class="nav-link" href="./map.php">
              <i class="material-icons">location_ons</i>
              <p>Maps</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="./rtl.php">
              <i class="material-icons">language</i>
              <p>RTL Support</p>
            </a>
          </li>
          <li class="nav-item active-pro ">
            <a class="nav-link" href="./upgrade.php">
              <i class="material-icons">unarchive</i>
              <p>Upgrade to PRO</p>bubble_chart
            </a>
          </li>
          -->
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="javascript:;">數據匯入系統</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
            <form class="navbar-form">
              <div class="input-group no-border">
                <input type="text" value="" class="form-control" placeholder="Search...">
                <button type="submit" class="btn btn-white btn-round btn-just-icon">
                  <i class="material-icons">search</i>
                  <div class="ripple-container"></div>
                </button>
              </div>
            </form>
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="javascript:;">
                  <i class="material-icons">dashboard</i>
                  <p class="d-lg-none d-md-block">
                    Stats
                  </p>
                </a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">notifications</i>
                  <span class="notification">5</span>
                  <p class="d-lg-none d-md-block">
                    Some Actions
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="#">Mike John responded to your email</a>
                  <a class="dropdown-item" href="#">You have 5 new tasks</a>
                  <a class="dropdown-item" href="#">You're now friend with Andrew</a>
                  <a class="dropdown-item" href="#">Another Notification</a>
                  <a class="dropdown-item" href="#">Another One</a>
                </div>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link" href="javascript:;" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">person</i>
                  <p class="d-lg-none d-md-block">
                    Account
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                  <a class="dropdown-item" href="#">Profile</a>
                  <a class="dropdown-item" href="#">Settings</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="/view/logout.php">Log out</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <div class="container-fluid">
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title">數據匯入系統</h4>
                <p class="card-category">Data import system
                  <!-- <a target="_blank" href="https://design.google.com/icons/">Google</a> -->
                </p>
              </div>
                <div class="card-body">
                <div class="row">
                  <div class="col-md-6">
                    <h4 class="card-title">手動匯入選項</h4>
                    <div >
                      <form method="post">
                        <div class="row">
                          <div class="col-lg-6">
                            <div class="form-group">
                              <label class="bmd-label-floating">商品選擇</label>
                              <select class = "dropdown-item"  name = "product_id">
                                <?php
                                  foreach($data as $row){
                                    $product_id = $row['product_id'];
                                    $product_name = $row['product_name'];
                                    echo "<option value = '$product_id'>$product_name</option>";
                                    $product_price = $row['product_price'];
                                    $product_brand = $row['product_brand'];
                                  }
                                ?>
                              </select>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="button">訂單時間</label>
                              <input type="date" class="form-control" name = "order_time">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="bmd-label-floating">價格</label>
                              <input type="text" class="form-control" name = "order_price">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="bmd-label-floating">年分</label>
                              <select class =" dropdown-item " name = "product_brand">
                                <?php
                                  foreach($data as $row){
                                    $product_year = $row['product_year'];
                                    echo "<option class ='dropdown-item'>$product_year</option>";
                                  }
                                ?>
                              </select>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="bmd-label-floating">數量</label>
                              <input type="text" class="form-control" name = "order_num">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="bmd-label-floating">賣</label>
                              <input type="checkbox" class="btn btn-primary pull-left" name = "selled_id" id ="selled_id">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="button">訂單賣出時間</label>
                              <input type="date" class="form-control" name = "selled_time"  id = "selled_time" disabled>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="bmd-label-floating">賣出價格</label>
                              <input type="text" class="form-control" name = "selled_price"  id = "selled_price" disabled>
                            </div>
                          </div>
                        </div>
                        <input type="submit" class="btn btn-primary pull-right" name ="import" value="匯入新資料">
                        <div class="clearfix"></div>
                      </form>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <h4 class="card-title">Excel匯入訂單</h4>
                        請加入逗號分隔CSV：<a href="../test.csv" target="_blank" rel="nofollow"> 範例檔</a>
                    <div class="main">
                      <form class="form-inline" method = "post">
                        <div class="row">
                          <input type="file" class="btn" name ="files" id = 'files' required accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" onchange="checkfile(this);" />
                            <div class="col-md-6">
                              <div class="form-group">
                              <button type="submit" id="submit" class="btn btn-primary">預覽資料</button>  
                              </div>
                            </div>
                        </div>
                        <div class="row">
                          <div id="connectnote" style="text-align:center;display:none">
                            <button id="connectmap_sql" class="btn btn-danger" name ="connectmap_sql" value = "">匯入CSV資料</button>
                            <button id="connectmap" class="btn btn-danger"name = "import_csv">匯入CSV資料</button>
                          </div>
                        </div>
                      </form>
                      <!---->
                      <div id="appsql" style="font-size:smaller"></div>
                      <div id="app" style="font-size:smaller"></div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <h4 class="card-title">資料爬蟲</h4>
                    <input type="submit" class="btn btn-primary pull-left" name ="update" value="開啟">

                     <?php 
                      //echo "exec";
                      //exec("C:/Users/_/AppData/Local/Microsoft/WindowsApps/python.exe  ./cawler.py");
                      //exec('cawler.py', $output, $return_var);
                    
                    ?>
                  </div>
                </div>
            </div>
            
              <div class="row">
                <div class="col-md-12">
                  <div class="card-body">
                    <div class="iframe-container d-none d-lg-block">
                      <iframe src="">
                        <p>Your browser does not support iframes.</p>
                      </iframe>
                    </div>
                    <div class="col-md-12 d-none d-sm-block d-md-block d-lg-none d-block d-sm-none text-center ml-auto mr-auto">
                      <h5>The icons are visible on Desktop mode inside an iframe. Since the iframe is not working on Mobile and Tablets please visit the icons on their original page on Google. Check the
                        <a href="https://design.google.com/icons/" target="_blank">Material Icons</a>
                      </h5>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <footer class="footer">
        <div class="container-fluid">
          <nav class="float-left">
            <ul>
              <li>
                <a href="https://www.creative-tim.com">
                  Creative Tim
                </a>
              </li>
              <li>
                <a href="https://creative-tim.com/presentation">
                  About Us
                </a>
              </li>
              <li>
                <a href="http://blog.creative-tim.com">
                  Blog
                </a>
              </li>
              <li>
                <a href="https://www.creative-tim.com/license">
                  Licenses
                </a>
              </li>
            </ul>
          </nav>
          <div class="copyright float-right">
            &copy;
            <script>
              document.write(new Date().getFullYear())
            </script>, made with <i class="material-icons">favorite</i> by
            <a href="https://www.creative-tim.com" target="_blank">Creative Tim</a> for a better web.
          </div>
        </div>
      </footer>
    </div>
  </div>
  <!--
  <div class="fixed-plugin">
    <div class="dropdown show-dropdown">
      <a href="#" data-toggle="dropdown">
        <i class="fa fa-cog fa-2x"> </i>
      </a>
      <ul class="dropdown-menu">
        <li class="header-title"> Sidebar Filters</li>
        <li class="adjustments-line">
          <a href="javascript:void(0)" class="switch-trigger active-color">
            <div class="badge-colors ml-auto mr-auto">
              <span class="badge filter badge-purple" data-color="purple"></span>
              <span class="badge filter badge-azure" data-color="azure"></span>
              <span class="badge filter badge-green" data-color="green"></span>
              <span class="badge filter badge-warning" data-color="orange"></span>
              <span class="badge filter badge-danger" data-color="danger"></span>
              <span class="badge filter badge-rose active" data-color="rose"></span>
            </div>
            <div class="clearfix"></div>
          </a>
        </li>
        <li class="header-title">Images</li>
        <li class="active">
          <a class="img-holder switch-trigger" href="javascript:void(0)">
            <img src="../assets/img/sidebar-1.jpg" alt="">
          </a>
        </li>
        <li>
          <a class="img-holder switch-trigger" href="javascript:void(0)">
            <img src="../assets/img/sidebar-2.jpg" alt="">
          </a>
        </li>
        <li>
          <a class="img-holder switch-trigger" href="javascript:void(0)">
            <img src="../assets/img/sidebar-3.jpg" alt="">
          </a>
        </li>
        <li>
          <a class="img-holder switch-trigger" href="javascript:void(0)">
            <img src="../assets/img/sidebar-4.jpg" alt="">
          </a>
        </li>
        <li class="button-container">
          <a href="https://www.creative-tim.com/product/material-dashboard" target="_blank" class="btn btn-primary btn-block">Free Download</a>
        </li>
        <!-- <li class="header-title">Want more components?</li>
            <li class="button-container">
                <a href="https://www.creative-tim.com/product/material-dashboard-pro" target="_blank" class="btn btn-warning btn-block">
                  Get the pro version
                </a>
            </li>
        <li class="button-container">
          <a href="https://demos.creative-tim.com/material-dashboard/docs/2.1/getting-started/introduction.html" target="_blank" class="btn btn-default btn-block">
            View Documentation
          </a>
        </li>
        <li class="button-container github-star">
          <a class="github-button" href="https://github.com/creativetimofficial/material-dashboard" data-icon="octicon-star" data-size="large" data-show-count="true" aria-label="Star ntkme/github-buttons on GitHub">Star</a>
        </li>
        <li class="header-title">Thank you for 95 shares!</li>
        <li class="button-container text-center">
          <button id="twitter" class="btn btn-round btn-twitter"><i class="fa fa-twitter"></i> &middot; 45</button>
          <button id="facebook" class="btn btn-round btn-facebook"><i class="fa fa-facebook-f"></i> &middot; 50</button>
          <br>
          <br>
        </li>
      </ul>
    </div>
  </div>
                                -->
  <!--   Core JS Files   -->
   <!-- <script src="../assets/js/core/jquery.min.js"></script> -->
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap-material-design.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!-- Plugin for the momentJs  -->
  <script src="../assets/js/plugins/moment.min.js"></script>
  <!--  Plugin for Sweet Alert -->
  <script src="../assets/js/plugins/sweetalert2.js"></script>
  <!-- Forms Validations Plugin -->
  <script src="../assets/js/plugins/jquery.validate.min.js"></script>
  <!-- Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
  <script src="../assets/js/plugins/jquery.bootstrap-wizard.js"></script>
  <!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
  <script src="../assets/js/plugins/bootstrap-selectpicker.js"></script>
  <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
  <script src="../assets/js/plugins/bootstrap-datetimepicker.min.js"></script>
  <!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->
  <script src="../assets/js/plugins/jquery.dataTables.min.js"></script>
  <!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
  <script src="../assets/js/plugins/bootstrap-tagsinput.js"></script>
  <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
  <script src="../assets/js/plugins/jasny-bootstrap.min.js"></script>
  <!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
  <script src="../assets/js/plugins/fullcalendar.min.js"></script>
  <!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
  <script src="../assets/js/plugins/jquery-jvectormap.js"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="../assets/js/plugins/nouislider.min.js"></script>
  <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
  <!-- Library for adding dinamically elements -->
  <script src="../assets/js/plugins/arrive.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chartist JS -->
  <script src="../assets/js/plugins/chartist.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="../assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/material-dashboard.js?v=2.1.2" type="text/javascript"></script>
  <!-- Material Dashboard DEMO methods, don't include it in your project! -->
  <script src="../assets/demo/demo.js"></script>
  <script>
        function checkfile(sender) {
            // 可接受的附檔名
            var validExts = new Array(".csv");
            var fileExt = sender.value;
            fileExt = fileExt.substring(fileExt.lastIndexOf('.'));
            if (validExts.indexOf(fileExt) < 0) {
                alert("檔案類型錯誤，可接受的副檔名有：" + validExts.toString());
                sender.value = null;
                return false;
            }
            else return true;
        }
  </script>
  <script>
    var selled_id_checkbox = document.getElementById("selled_id");
    var selled_time = document.getElementById("selled_time");
    var selled_price = document.getElementById("selled_price");

    selled_id_checkbox.addEventListener("change", function(event) {
      if (event.target.checked) {
        selled_time.disabled = false;
        selled_price.disabled = false;
      } else {
        selled_time.disabled = true;
        selled_price.disabled = true;
        selled_time.value = '';
        selled_price.value = '';
      }
    }, false);
  </script>
  <script>
    $(document).ready(function() {
      $().ready(function() {
        $sidebar = $('.sidebar');

        $sidebar_img_container = $sidebar.find('.sidebar-background');

        $full_page = $('.full-page');

        $sidebar_responsive = $('body > .navbar-collapse');

        window_width = $(window).width();

        fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();

        if (window_width > 767 && fixed_plugin_open == 'Dashboard') {
          if ($('.fixed-plugin .dropdown').hasClass('show-dropdown')) {
            $('.fixed-plugin .dropdown').addClass('open');
          }

        }

        $('.fixed-plugin a').click(function(event) {
          // Alex if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active
          if ($(this).hasClass('switch-trigger')) {
            if (event.stopPropagation) {
              event.stopPropagation();
            } else if (window.event) {
              window.event.cancelBubble = true;
            }
          }
        });

        $('.fixed-plugin .active-color span').click(function() {
          $full_page_background = $('.full-page-background');

          $(this).siblings().removeClass('active');
          $(this).addClass('active');

          var new_color = $(this).data('color');

          if ($sidebar.length != 0) {
            $sidebar.attr('data-color', new_color);
          }

          if ($full_page.length != 0) {
            $full_page.attr('filter-color', new_color);
          }

          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.attr('data-color', new_color);
          }
        });

        $('.fixed-plugin .background-color .badge').click(function() {
          $(this).siblings().removeClass('active');
          $(this).addClass('active');

          var new_color = $(this).data('background-color');

          if ($sidebar.length != 0) {
            $sidebar.attr('data-background-color', new_color);
          }
        });

        $('.fixed-plugin .img-holder').click(function() {
          $full_page_background = $('.full-page-background');

          $(this).parent('li').siblings().removeClass('active');
          $(this).parent('li').addClass('active');


          var new_image = $(this).find("img").attr('src');

          if ($sidebar_img_container.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
            $sidebar_img_container.fadeOut('fast', function() {
              $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
              $sidebar_img_container.fadeIn('fast');
            });
          }

          if ($full_page_background.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
            var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

            $full_page_background.fadeOut('fast', function() {
              $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
              $full_page_background.fadeIn('fast');
            });
          }

          if ($('.switch-sidebar-image input:checked').length == 0) {
            var new_image = $('.fixed-plugin li.active .img-holder').find("img").attr('src');
            var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

            $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
            $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
          }

          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.css('background-image', 'url("' + new_image + '")');
          }
        });

        $('.switch-sidebar-image input').change(function() {
          $full_page_background = $('.full-page-background');

          $input = $(this);

          if ($input.is(':checked')) {
            if ($sidebar_img_container.length != 0) {
              $sidebar_img_container.fadeIn('fast');
              $sidebar.attr('data-image', '#');
            }

            if ($full_page_background.length != 0) {
              $full_page_background.fadeIn('fast');
              $full_page.attr('data-image', '#');
            }

            background_image = true;
          } else {
            if ($sidebar_img_container.length != 0) {
              $sidebar.removeAttr('data-image');
              $sidebar_img_container.fadeOut('fast');
            }

            if ($full_page_background.length != 0) {
              $full_page.removeAttr('data-image', '#');
              $full_page_background.fadeOut('fast');
            }

            background_image = false;
          }
        });

        $('.switch-sidebar-mini input').change(function() {
          $body = $('body');

          $input = $(this);

          if (md.misc.sidebar_mini_active == true) {
            $('body').removeClass('sidebar-mini');
            md.misc.sidebar_mini_active = false;

            $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar();

          } else {

            $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar('destroy');

            setTimeout(function() {
              $('body').addClass('sidebar-mini');

              md.misc.sidebar_mini_active = true;
            }, 300);
          }

          // we simulate the window Resize so the charts will get updated in realtime.
          var simulateWindowResize = setInterval(function() {
            window.dispatchEvent(new Event('resize'));
          }, 180);

          // we stop the simulation of Window Resize after the animations are completed
          setTimeout(function() {
            clearInterval(simulateWindowResize);
          }, 1000);

        });
      });
    });
  </script>
</body>

</html>