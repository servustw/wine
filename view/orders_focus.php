
<?php  
 //login_success.php  
 session_start();  
 if(isset($_SESSION["userid"]) && isset($_COOKIE["cookie_item"]))  
 {  
  $dsn = "mysql:dbname=lusweets;host=localhost;port=3306";
  $username = "root";
  $password = ""; 
  $user_id = $_SESSION["userid"];
  $select = $_COOKIE["cookie_item"];
  //echo $_COOKIE["cookie_item"];
 }  
 else  
 {  
      header("location:/view/login.php");  
 }  
 ?>  <!--
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
  <meta charset="utf-8" /> 
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
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="//cdn.jsdelivr.net/chartist.js/latest/chartist.min.css">
  <script src="//cdn.jsdelivr.net/chartist.js/latest/chartist.min.js"></script>
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
          <li class="nav-item active">
            <a class="nav-link" href="./orders.php">
              <i class="material-icons">library_books</i>
              <p>訂單管理系統</p>
            </a>
          </li>
          <li class="nav-item ">
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
            <a class="navbar-brand" href="javascript:;">訂單管理系統</a>
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
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title">訂單管理系統</h4>
              <p class="card-category">在倉或是已完成</p>
            </div>
            <div class="card-body">
              <button type="now-orders" class="btn pull-left" name ="update" id="instock" >持有品項</button>
              <button type="pre-orders" class="btn btn-warning pull-left" name ="update" id="prestock">商品資訊</button>
              <!--在倉中 -->
              <div class="table-responsive active" id="instock_table" style="display:none">
                    <table class="table" id="instock_tb">
                      <thead class=" text-primary">
                        <th>
                          類型
                        </th>
                        <th>
                          編號
                        </th>
                        <th>
                          名稱
                        </th>
                        <th>
                          年代
                        </th>
                        <th>
                          產區
                        </th>
                        <th>
                          現價(USD)
                        </th>
                        <th>
                          平均成本(USD)
                        </th>
                        <th>
                          總數量
                        </th>
                        <th>
                          總成本(USD)
                        </th>
                        <th>
                          現值(USD)
                        </th>
                        <th>
                          現投報額(USD)
                        </th>
                        <th>
                          投報率
                        </th>
                      </thead>
                      <tbody>
                        <?php
                            try {
                            // 建立MySQL伺服器連接和開啟資料庫 
                            //echo "進入tbody";
                            $link = new PDO($dsn, $username, $password);
                            // 指定PDO錯誤模式和錯誤處理
                            $link->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION); 
                            $sql = "SELECT p.product_type ,p.product_id ,p.product_name, p.product_year ,p.product_place ,p.product_price, round(cast(sum(o.order_price*o.order_num) as float)/sum(o.order_num),2) as avg_price, sum(o.order_num) as num_sum FROM product p LEFT JOIN ordered o on (o.product_id = p.product_id and o.user_id ='$user_id') WHERE (o.order_num IS NOT NULL) group by p.product_id";
                            //echo $sql;
                            $statement = $link->prepare($sql);
                            $statement -> execute();
                            $data = $statement->fetchAll(PDO::FETCH_ASSOC);
                            foreach($data as $row){
                              $product_type = $row['product_type'];
                              $product_id = $row['product_id'];
                              $product_name = $row['product_name'];
                              $product_year = $row['product_year'];
                              $product_place = $row['product_place'];
                              $product_price = $row['product_price'];
                              $avg_price = $row['avg_price'];
                              $num_sum = $row['num_sum'];
                              #echo '<tr data-bs-whatever="';
                              echo '<tr id="';
                              echo      $product_id;
                              echo '">';
                              #echo '" data-bs-toggle="modal" data-bs-target="#exampleModal">';
                              echo '  <td>';
                              echo      $product_type;
                              echo '  </td>';
                              echo '  <td>';
                              echo      $product_id;
                              echo '  </td>';
                              echo '  <td class="text-primary" id="';
                              echo      $product_id;
                              echo '">';
                              echo      $product_name;
                              echo '  </td>';
                              echo '  <td>';
                              echo      $product_year;
                              echo '  </td>';
                              echo '  <td>';
                              echo      $product_place;
                              echo '  </td>';
                              echo '  <td class="text-primary">';
                              echo      $product_price;
                              echo '  </td>';
                              echo '  <td>';
                              echo      $avg_price;
                              echo '  </td>';
                              echo '  <td>';
                              echo      $num_sum;
                              echo '  </td>';
                              echo '  <td>';
                              echo      $avg_price*$num_sum;
                              echo '  </td>';
                              echo '  <td>';
                              echo      $product_price*$num_sum;
                              echo '  </td>';
                              echo '  <td>';
                              echo      ($product_price-$avg_price)*$num_sum;
                              echo '  </td>';
                              echo '  <td>';
                              echo      (($product_price-$avg_price)/$avg_price)*100;
                              echo '%';
                              echo '  </td>';
                              echo '</tr>';
                            }
                            $json_string_product = json_encode($data,JSON_UNESCAPED_UNICODE);
                            //echo $json_string_product;

                          } catch (PDOException $e) {
                            echo "連接失敗: " . $e->getMessage();
                          }
                            
                            
                          ?>
                      </tbody>
                    </table>
                  </div>
                  <!--過去倉-->
                  <div class="table-responsive" id="prestock_table" style="display:">
                  <div class="col-lg-12 col-md-12">
              <div class="card">
                <div class="card-header card-header-info">
                  <h4 class="card-title">目前酒品實際狀態</h4>
                  <p class="card-category">在倉中狀態</p>
                </div>
                <div class="card-body table-responsive">
                <table class="table" id="instock_tb">
                      <thead class=" text-primary">
                        <th>
                          類型
                        </th>
                        <th>
                          編號
                        </th>
                        <th>
                          名稱
                        </th>
                        <th>
                          年代
                        </th>
                        <th>
                          產區
                        </th>
                        <th>
                          現價(USD)
                        </th>
                        <th>
                          平均成本(USD)
                        </th>
                        <th>
                          總數量
                        </th>
                        <th>
                          總成本(USD)
                        </th>
                        <th>
                          現值(USD)
                        </th>
                        <th>
                          現投報額(USD)
                        </th>
                        <th>
                          投報率
                        </th>
                      </thead>
                      <tbody>
                        <?php
                            try {
                            // 建立MySQL伺服器連接和開啟資料庫 
                            //echo "進入tbody";
                            $link = new PDO($dsn, $username, $password);
                            // 指定PDO錯誤模式和錯誤處理
                            $link->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION); 
                            $sql = "SELECT p.product_type ,p.product_id ,p.product_name, p.product_year ,p.product_place ,p.product_price, round(cast(sum(o.order_price*o.order_num) as float)/sum(o.order_num),2) as avg_price, sum(o.order_num) as num_sum FROM product p LEFT JOIN ordered o on (o.product_id = p.product_id and o.user_id ='$user_id' and o.product_id = '$select') WHERE (o.order_num IS NOT NULL) group by p.product_id";
                            //echo $sql;
                            $statement = $link->prepare($sql);
                            $statement -> execute();
                            $data = $statement->fetchAll(PDO::FETCH_ASSOC);
                            foreach($data as $row){
                              $product_type = $row['product_type'];
                              $product_id = $row['product_id'];
                              $product_name = $row['product_name'];
                              $product_year = $row['product_year'];
                              $product_place = $row['product_place'];
                              $product_price = $row['product_price'];
                              $avg_price = $row['avg_price'];
                              $num_sum = $row['num_sum'];
                              #echo '<tr data-bs-whatever="';
                              echo '<tr id="';
                              echo      $product_id;
                              echo '">';
                              #echo '" data-bs-toggle="modal" data-bs-target="#exampleModal">';
                              echo '  <td>';
                              echo      $product_type;
                              echo '  </td>';
                              echo '  <td>';
                              echo      $product_id;
                              echo '  </td>';
                              echo '  <td class="text-primary" id="';
                              echo      $product_id;
                              echo '">';
                              echo      $product_name;
                              echo '  </td>';
                              echo '  <td>';
                              echo      $product_year;
                              echo '  </td>';
                              echo '  <td>';
                              echo      $product_place;
                              echo '  </td>';
                              echo '  <td class="text-primary">';
                              echo      $product_price;
                              echo '  </td>';
                              echo '  <td>';
                              echo      $avg_price;
                              echo '  </td>';
                              echo '  <td>';
                              echo      $num_sum;
                              echo '  </td>';
                              echo '  <td>';
                              echo      $avg_price*$num_sum;
                              echo '  </td>';
                              echo '  <td>';
                              echo      $product_price*$num_sum;
                              echo '  </td>';
                              echo '  <td>';
                              echo      ($product_price-$avg_price)*$num_sum;
                              echo '  </td>';
                              echo '  <td>';
                              echo      (($product_price-$avg_price)/$avg_price)*100;
                              echo '%';
                              echo '  </td>';
                              echo '</tr>';
                            }
                            $json_string_product = json_encode($data,JSON_UNESCAPED_UNICODE);
                            //echo $json_string_product;

                          } catch (PDOException $e) {
                            echo "連接失敗: " . $e->getMessage();
                          }
                            
                            
                          ?>
                      </tbody>
                    </table>
                </div>
              </div>
            </div>
                  <div class="col-md-12">
              <div class="card card-chart">
                <div class="card-header card-header-info" style="height: 400px">
                  <div class="ct-chart1" style="height: 380px"></div>
                    <script>
                        var chart = new Chartist.Line('.ct-chart1', {
                        labels: ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12'],
                        series: [
                          [12, 9, 7, 8, 5, 4, 6, 2, 3, 3, 4, 6],
                          
                        ]
                      }, {
                        low: 0
                      });

                      // Let's put a sequence number aside so we can use it in the event callbacks
                      var seq = 0,
                        delays = 80,
                        durations = 500;

                      // Once the chart is fully created we reset the sequence
                      chart.on('created', function() {
                        seq = 0;
                      });

                      // On each drawn element by Chartist we use the Chartist.Svg API to trigger SMIL animations
                      chart.on('draw', function(data) {
                        seq++;

                        if(data.type === 'line') {
                          // If the drawn element is a line we do a simple opacity fade in. This could also be achieved using CSS3 animations.
                          data.element.animate({
                            opacity: {
                              // The delay when we like to start the animation
                              begin: seq * delays + 1000,
                              // Duration of the animation
                              dur: durations,
                              // The value where the animation should start
                              from: 0,
                              // The value where it should end
                              to: 1
                            }
                          });
                        } else if(data.type === 'label' && data.axis === 'x') {
                          data.element.animate({
                            y: {
                              begin: seq * delays,
                              dur: durations,
                              from: data.y + 100,
                              to: data.y,
                              // We can specify an easing function from Chartist.Svg.Easing
                              easing: 'easeOutQuart'
                            }
                          });
                        } else if(data.type === 'label' && data.axis === 'y') {
                          data.element.animate({
                            x: {
                              begin: seq * delays,
                              dur: durations,
                              from: data.x - 100,
                              to: data.x,
                              easing: 'easeOutQuart'
                            }
                          });
                        } else if(data.type === 'point') {
                          data.element.animate({
                            x1: {
                              begin: seq * delays,
                              dur: durations,
                              from: data.x - 10,
                              to: data.x,
                              easing: 'easeOutQuart'
                            },
                            x2: {
                              begin: seq * delays,
                              dur: durations,
                              from: data.x - 10,
                              to: data.x,
                              easing: 'easeOutQuart'
                            },
                            opacity: {
                              begin: seq * delays,
                              dur: durations,
                              from: 0,
                              to: 1,
                              easing: 'easeOutQuart'
                            }
                          });
                        } else if(data.type === 'grid') {
                          // Using data.axis we get x or y which we can use to construct our animation definition objects
                          var pos1Animation = {
                            begin: seq * delays,
                            dur: durations,
                            from: data[data.axis.units.pos + '1'] - 30,
                            to: data[data.axis.units.pos + '1'],
                            easing: 'easeOutQuart'
                          };

                          var pos2Animation = {
                            begin: seq * delays,
                            dur: durations,
                            from: data[data.axis.units.pos + '2'] - 100,
                            to: data[data.axis.units.pos + '2'],
                            easing: 'easeOutQuart'
                          };

                          var animations = {};
                          animations[data.axis.units.pos + '1'] = pos1Animation;
                          animations[data.axis.units.pos + '2'] = pos2Animation;
                          animations['opacity'] = {
                            begin: seq * delays,
                            dur: durations,
                            from: 0,
                            to: 1,
                            easing: 'easeOutQuart'
                          };

                          data.element.animate(animations);
                        }
                      });

                      // For the sake of the example we update the chart every time it's created with a delay of 10 seconds
                      chart.on('created', function() {
                        if(window.__exampleAnimateTimeout) {
                          clearTimeout(window.__exampleAnimateTimeout);
                          window.__exampleAnimateTimeout = null;
                        }
                        window.__exampleAnimateTimeout = setTimeout(chart.update.bind(chart), 12000);
                      });


                    </script>
                </div>
                <div class="card-body">
                  <h4 class="card-title">酒品: <?php echo $select; ?></h4>
                  <p class="card-category">
                    <span class="text-success"><i class="fa fa-long-arrow-up"></i> -20% </span> increase in today sales.</p>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">access_time</i> 於4分鐘前更新
                  </div>
                </div>
              </div>
            </div>

            
            <div class="row">
            <div class="col-lg-6 col-md-12">
              <div class="card">
                <div class="card-header card-header-success">
                  <h4 class="card-title">買進訂單</h4>
                  <p class="card-category">最近五筆訂單</p>
                </div>
                <div class="card-body table-responsive">
                  <table class="table table-hover">
                    <thead class="text-warning">
                      <th>時間</th>
                      <th>數量</th>
                      <th>價格</th>
                      <th>總價</th>
                      <th>目前投報率</th>
                      <th>投報額</th>
                    </thead>
                    <tbody>
                      <tr>
                        <td>2021-09-01 17:36:44</td>
                        <td>2</td>
                        <td>$390000</td>
                        <td>$780000</td>
                        <td>21%</td>
                        <td>$3000</td>
                      </tr>
                      <tr>
                        <td>2021-09-01 17:36:44</td>
                        <td>2</td>
                        <td>$390000</td>
                        <td>$780000</td>
                        <td>20%</td>
                        <td>$3000</td>
                      </tr>
                      <tr>
                        <td>2021-09-01 17:36:44</td>
                        <td>2</td>
                        <td>$390000</td>
                        <td>$780000</td>
                        <td>19%</td>
                        <td>$3000</td>
                      </tr>
                      <tr>
                        <td>2021-09-01 17:36:44</td>
                        <td>2</td>
                        <td>$390000</td>
                        <td>$780000</td>
                        <td>18%</td>
                        <td>$3000</td>
                      </tr>
                      <tr>
                        <td>2021-09-01 17:36:44</td>
                        <td>2</td>
                        <td>$390000</td>
                        <td>$780000</td>
                        <td>17%</td>
                        <td>$3000</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-md-12">
              <div class="card">
                <div class="card-header card-header-danger">
                  <h4 class="card-title">賣出訂單</h4>
                  <p class="card-category">最近五筆訂單</p>
                </div>
                <div class="card-body table-responsive">
                  <table class="table table-hover">
                    <thead class="text-warning">
                      <th>時間</th>
                      <th>數量</th>
                      <th>平均價格</th>
                      <th>總價</th>
                      <th>已實現投報率</th>
                      <th>已實現投報額</th>
                    </thead>
                    <tbody>
                    <tr>
                        <td>2021-09-01 17:36:44</td>
                        <td>2</td>
                        <td>$390000</td>
                        <td>$780000</td>
                        <td>21%</td>
                        <td>$3000</td>
                      </tr>
                      <tr>
                        <td>2021-09-01 17:36:44</td>
                        <td>2</td>
                        <td>$390000</td>
                        <td>$780000</td>
                        <td>20%</td>
                        <td>$3000</td>
                      </tr>
                      <tr>
                        <td>2021-09-01 17:36:44</td>
                        <td>2</td>
                        <td>$390000</td>
                        <td>$780000</td>
                        <td>19%</td>
                        <td>$3000</td>
                      </tr>
                      <tr>
                        <td>2021-09-01 17:36:44</td>
                        <td>2</td>
                        <td>$390000</td>
                        <td>$780000</td>
                        <td>18%</td>
                        <td>$3000</td>
                      </tr>
                      <tr>
                        <td>2021-09-01 17:36:44</td>
                        <td>2</td>
                        <td>$390000</td>
                        <td>$780000</td>
                        <td>17%</td>
                        <td>$3000</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            </div>
                  <!-- Modal -->
                  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <form>
                          <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Recipient:</label>
                            <input type="text" class="form-control" id="recipient-name" >
                          </div>
                          <div class="mb-3">
                            <label for="message-text" class="col-form-label">Message:</label>
                            <textarea class="form-control" id="message-text"></textarea>
                          </div>
                        </form>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Send message</button>
                      </div>
                    </div>
                  </div>
            </div>
          </div>
        </div>
      </div>
      <footer class="footer">
        <div class="container-fluid">
          <div class="copyright float-middle">
            &copy;
            <script>
              document.write(new Date().getFullYear())
            </script> Servus team
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
  <script src="../assets/js/core/jquery.min.js"></script>
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
    function parseCookie() {
    var cookieObj = {};
    var cookieAry = document.cookie.split(';');
    var cookie;
    
    for (var i=0, l=cookieAry.length; i<l; ++i) {
        cookie = jQuery.trim(cookieAry[i]);
        cookie = cookie.split('=');
        cookieObj[cookie[0]] = cookie[1];
        }
        
        return cookieObj;
    }


    function getCookieByName(name) {
        var value = parseCookie()[name];
        if (value) {
            value = decodeURIComponent(value);
        }

        return value;
    }






    //跳轉頁面
    var test
    $(function(){
        //用jQuery获取table中td值
        $("#instock_tb td").click(function(){
            //alert("table td值："+$(this).text());
            //alert($(this).parent().attr("id"))
            test = $(this).parent().attr("id");
            document.cookie = 'cookie_item='+test;
            //alert("test = "+test)
            //alert(getCookieByName('cookie_item'));
            //document.cookie = "cookie_item" + escape(getCookieByName('cookie_item'));
            //$_cookie(getCookieByName('cookie_item'));
            //alert("coole");
            window.location.href='orders_focus.php';
        });
        
        //jQuery获取table中点击位置所在行的id
        $("#instock_tb td").click(function() {
            //td的id 
            //alert($(this).attr("id"));
            //tr的id  
            //alert($(this).parent().attr("id"));
        });
        
    });
    //以下是Modal寫法
    var exampleModal = document.getElementById('exampleModal')
    exampleModal.addEventListener('show.bs.modal', function (event) {
     
    // Button that triggered the modal
    var button = event.relatedTarget
    // Extract info from data-bs-* attributes
    var recipient = button.getAttribute('data-bs-whatever')
    
    // If necessary, you could initiate an AJAX request here
    // and then do the updating in a callback.
    //
    // Update the modal's content.
    var modalTitle = exampleModal.querySelector('.modal-title')
    var modalBodyInput = exampleModal.querySelector('.modal-body input')
    //alert($(this).parent().attr("id"))
    modalTitle.textContent = recipient
    modalBodyInput.value = recipient
  })
</script>
<!--
<script type="text/javascript">
    $(function(){
        //用jQuery获取table中td值
        $("#instock_tb td").click(function(){
            alert("table td值："+$(this).text());
            alert($(this).parent().attr("id"));
            showModal();
        });
        /*
        //jQuery获取table中点击位置所在行的id
        $("#instock_tb td").click(function() {
            //td的id 
            alert($(this).attr("id"));
            //tr的id  
            alert($(this).parent().attr("id"));
        });
        */
    });
  </script>
-->
  <script>

    document.getElementById("instock").addEventListener("click", instock_table_func);
    document.getElementById("prestock").addEventListener("click", prestock_table_func);

    function instock_table_func() {
      instock_table.style.display = '';
      prestock_table.style.display = 'none';
      document.getElementById("prestock").className = "btn  pull-left";
      document.getElementById("instock").className = "btn btn-warning pull-left";

    }
    function prestock_table_func() {
      instock_table.style.display = 'none';
      prestock_table.style.display = '';
      document.getElementById("instock").className = "btn  pull-left";
      document.getElementById("prestock").className = "btn btn-warning pull-left";

    }
//    $('#selectIds').val("");
//      var table = document.getElementById("tb_table");//獲取第一個表格 
//      var array = table.getElementsByTagName("tr");//所有tr
//      for(var i = 1; i < array.length; i  ) {
//       var id = array[i].children;
//       var idtext = id[1].innerHTML;
//       if(i == 1){
//         $('#selectIds').val($('#selectIds').val()   ""   idtext); 
//       }else{
//         $('#selectIds').val($('#selectIds').val()   ","   idtext);
//       }
//       }
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