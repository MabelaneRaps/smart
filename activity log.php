<?php

session_start();

if (isset($_SESSION["investa_user"])){

  $user = $_SESSION["investa_user"];
 
}
else{
  $err = "Please login before you access dashboard";
header("Location:login.php?user2=$err");

}

?>
<?php 
require_once "connect.php";
$date_reg = "";
$sql_d = "SELECT date_reg FROM registration WHERE username = '$user'";
$result_d = $conn->query($sql_d);
if($result_d !== FALSE && $result_d->num_rows >0){
  $row = $result_d->fetch_assoc();
  $date_reg = $row["date_reg"];
} 

?>

<!DOCTYPE html>
  <html lang="en">
  <head>
  <!-- start meta tags-->
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Sign in and start trading...." />
  <!-- End of meta tags -->
  
  <!-- SITE TITLE -->
  <title>Activitylogs</title>
  <!-- Latest Bootstrap min CSS -->
  <link rel="stylesheet" type="text/css" href="bootstrap-5.0.0-beta1-dist/bootstrap-5.0.0-beta1-dist/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="bootstrap-5.0.0-beta1-dist/bootstrap-5.0.0-beta1-dist/css/bootstrap.min.css">
  
   <!--start of fonts -->
   <link rel="stylesheet" href="fonts/css/all.css">
  <link rel="stylesheet" href="fonts/css/all.min.css">
  <link rel="stylesheet" href="fonts/css/brands.css">
  <link rel="stylesheet" href="fonts/css/brands.min.css">
  <link rel="stylesheet" href="fonts/css/fontawesome.css">
  <link rel="stylesheet" href="fonts/css/regular.css">
  <link rel="stylesheet" href="fonts/css/regular.min.css">
  <link rel="stylesheet" href="fonts/css/solid.css">
  <link rel="stylesheet" href="fonts/css/svg-with-js.css">
  <link rel="stylesheet" href="fonts/css/svg-with-js.min.css">
  <link rel="stylesheet" href="fonts/css/v4-shims.css">
  <link rel="stylesheet" href="fonts/css/v4-shims.min.css">
  <link rel="shortcut icon" href="img/smart.investa.logo2.png" />
  <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
  <!-- end of fonts -->
  
  <!-- start of links styling-->
  <link rel="stylesheet" href="css/tablet.css">
  <link rel="stylesheet" href="css/desktop.css">
  <link rel="stylesheet" href="css/phone.css">
  <link rel="stylesheet" href="css/smart.css">
  <!--end of link styling-->
 
  <!-- javascript -->
  <script type="text/javascript" src="bootstrap-5.0.0-beta1-dist/bootstrap-5.0.0-beta1-dist/js/bootstrap.bundle.js"></script>
  <script type="text/javascript" src="bootstrap-5.0.0-beta1-dist/bootstrap-5.0.0-beta1-dist/js/bootstrap.js"></script>
  <script type="text/javascript" src="bootstrap-5.0.0-beta1-dist/bootstrap-5.0.0-beta1-dist/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>
  <script type="text/javascript" src="js/dash.js"></script>
  
  </head>
  <body class="turning">
        <div class="wrapper-box">
            <!-- start of the sidemanu -->
            <!-- start of the sidebar -->
            <div class="sidebar">
            <div class="closing2 closing3">
              <i class="fa fa-close"></i>
            </div> 
            <div class="sidebar_profile">
                <div class="sidebar-flex" >
                <img class="Pcontrol" src="img/BITCOIN.png" alt="profile">

                <span><?php echo "Hi ".$user; ?></span>

                
                </div>
            </div>
            <div class="sidebar-manus">
            <ul>
              <li>
                <a href="Dashboard.php"><i class="fa fa-home"></i>
                Dashboard</a>
              </li>
              <li>
                <a href="profile.php"><i class="fa fa-user"></i>Profile</a>
              </li>
              <li id="sidebar_active">
                <a href="activity log.php"><i class="fa fa-tasks"></i>
                  Active Logs</a>
              </li>
              <li>
                <a href="deposit.php"><i class="fa fa-exchange"></i>
                  Deposit</a>
              </li>
              <li>
                <a href="withdrawal.php"><i class="fa fa-exchange"></i>
                  Withdrawal</a>
              </li>
              <li>
                <a href="refferal.php"><i class="fa fa-users"></i>  Referral</a>
                </li>
              <li>
                <a href="#">
                  <i class="fa fa-credit-card"></i>
                  Subscription
                </a>
                
              </li>
              <li>
                <a href="logout.php"><i class="fa fa-sign-out"></i>Log out</a>
              </li>
  
            </ul>
          </div>
        </div>
  
        <!-- start of the hearder part -->
        <div class="w-box" >
          <header class="header-dash">
            <div>
              <a href="#"><img src="img/smart.investa.logo2.png" class="logo_1" alt="logo"></a>
            </div>
            <div class="search">
              <i class="fas fa-search" onclick="search()"></i>
              <input type="search" name="search_d" id="search_d" placeholder="Search...">
            </div>
            <div class="menu-left manu-right">
              <div class="bars"></div>
              <div class="bars"></div>
              <div class="bars"></div>
            </div>
          </header>
            <section>
                <div class="dash">
                <div>
                    <h1>Activity logs</h1>
                </div>
                <div>
                    <ul class="style">
                    <li class="change1"><a href="index.html" style="text-decoration: none; color: blue; padding-right: 5px;">Home</a></li>
                    <li class="change active">Activity logs</li>
                    </ul>
                </div>
                </div>
            </section>
            <!-- end of the header part -->

            <!-- start of the new section table -->
            <!-- start section for table -->
            <section>
                <div class="history-deposit">
                    <div class="history-head">
                        <h4>Activity Logs History</h4>
                    </div>
                    <div class="entry-search">
                        <div class="select-entry">
                            Show
                            <select name="entries" id="entries">
                                <option value="10">10</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                            </select>
                            entries
                        </div>
                        <div class="search-btn">
                            <label for="search" >
                                Search:
                                <input type="search" >
                            </label>
                        </div>
                    </div>
                    <div class="table-table">
                        <table class="table-ta">
                            <thead class="tablehead2">
                                <tr>
                                    <th>Activity Description</th>
                                    <th>Activity Created at</th>
                                </tr>
                            </thead>
                            <tbody class="tbody">
                                <tr>
                                    <td>Registration</td>
                                    <td><?php echo $date_reg; ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="end-part">
                        <div class="end-shift">
                            Showing 0 to 0 0f 0 entries 
                        </div>
                        <div class="prev-next">
                            <ul>
                                <li>
                                    <a href="#">Previous</a>
                                </li>
                                <li>
                                    <a href="#">Next</a>
                                </li>
                            </ul>

                        </div>
                    </div>
                </div>

            </section>
            <!-- end secton for table -->
            </section>
                <!-- start section for the footer -->
                 <!-- start of the footer -->
                 <footer class="footer">
                    <strong>
                    Copyright &copy
                    <a href="#">SmartInvesta</a>
                    .All right reseved

                    </strong>

                </footer>
                <!-- end of the footer -->

                <!-- end section for the footer -->   
            <!-- end of new table section table -->
            </div>
        </div>
    </body>
  </html>