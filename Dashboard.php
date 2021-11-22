<?php 

$param_pasword = sanitize($_POST["Password"]);
$param_username = sanitize($_POST["name"]);

function getname($param_username){
  $q = "SELECT username,passwords FROM registration WHERE  username='$param_username'";
  $result = $conn->query($q);

  if($result->num_rows > 0){
    $row = $result->fetch_assoc(); 
    if($row["username"]===$param_username){
        session_start();
        $_SESSION["investa_user"] = ucfirst(strtolower($_POST["username"]));
        $user = ucfirst($_SESSION["investa_user"]);
        setcookie('username',$user,time() + 60*60*24*7,'/');
}

?>
<Doctype html>
<html lang="en" class="body-style">
<head>
<!-- start meta tags-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="Sign in and start trading...." />
<!-- End of meta tags -->

<!-- SITE TITLE -->
<title>Dashboard</title>
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
<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
<!-- end of fonts -->

<!-- start of links styling-->
<link rel="stylesheet" href="css/tablet.css">
<link rel="stylesheet" href="css/desktop.css">
<link rel="stylesheet" href="css/phone.css">
<link rel="stylesheet" href="css/smart.css">
<!--end of link styling-->

<!-- javascript -->
<script type="text/javascript"> src="js/smart.js"</script>
<script type="text/javascript"> src="bootstrap-5.0.0-beta1-dist/bootstrap-5.0.0-beta1-dist/js/bootstrap.bundle.js"</script>
<script type="text/javascript"> src="bootstrap-5.0.0-beta1-dist/bootstrap-5.0.0-beta1-dist/js/bootstrap.js"</script>
<script type="text/javascript"> src="bootstrap-5.0.0-beta1-dist/bootstrap-5.0.0-beta1-dist/js/bootstrap.min.js"</script>
</head>
<body class="turning">
  <div class="wrapper-box">
      <!-- start of the sidemanu -->
         <!-- start of the sidebar -->
      <div class="sidebar">
        <div class="sidebar_profile">
          <div class="sidebar-flex" >
            <img class="Pcontrol" src="img/bitcoin.jpg" alt="profile">
            <?php 
            if(isset($_SESSION["investa_user"])){
              $user = ucfirst($_SESSION["investa_user"]);
            }
            ?>
            <span><?php echo $user; ?></span>
          </div>
        </div>
        <div class="sidebar-manus">
          <ul>
            <li>
              <a href="#"><img  class="sidebarspace" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAH1JREFUSEvtlUsOgCAMRIeTqTfXk2lMxIUGfJnYbpRtB4bXDxQFrxJ8vtINZklDg2qPTUeM6m4E60PKKjHV/QbNhJ7Nc+0imluqs2vQ66JF0ljZXAI8n+kGFN0eNIpuFzncgKLbBHQj1dlz8GGDN+ag+1TQNsW69D8Z34wKN2WtKBmr5BH3AAAAAElFTkSuQmCC"/>
              Dashboard</a>
            </li>
            <li>
              <a href="#"><i class="fa fa-user"></i>Profile</a>
            </li>
            <li>
              <a href="#"><i class="fa fa-tasks"></i>
                Active Logs</a>
            </li>
            <li>
              <a href="#"><i class="fa fa-exchange"></i>
                Deposit</a>
            </li>
            <li>
              <a href="#"><i class="fa fa-exchange"></i>
                Withdrawal</a>
            </li>
            <li>
              <a href="">
                <i class="fa fa-credit-card"></i>
                Subscription
              </a>
              
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
            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAUJJREFUSEu9le0xBEEURc9GQAhEgAzIgAjIABmQARmQgQwQARnYEIiAOlWv1avR3TO7NWOq9sdOd9/z+r6PWbHws1pYnx5gD7gEjoHDCOQdeAHugfWU4FqAuxDvabjnegxSAxjlQRx8BBTynY83uQLO042OepAhoET+FdYU4aGGIK3aCbuEVp8M0POP2GVULfEiJOQt/uy3cpIBJXoT2IxoEOZD2NU8kwHF+ynRD2/h2WouMuA7Tm3aG91zcwEsit1aluey6DWq7g/jX5O8bZlqjyVbHR2tRvsETjq9oOBz+H4L3ExptLInjwrr3BrPo8IBeJEEXTMYg+rmIC+ODTttcc9pzK0mZGxc29GOa4efogr5U1zPLU1nkutVyKZNVXOhC5kDIDRDzoCnEslcgALRzl9xX84JGP0e9D5MW68tfoMfCXxMGRHr0pcAAAAASUVORK5CYII="/>
            <input type="search" placeholder="Search...">
          </div>
        </header>
        <section>
          <div class="dash">
            <div>
              <h1>Dashboard</h1>
            </div>
            <div>
              <ol class="style">
                <li class="change1"><a href="/" style="text-decoration: none; color: black;">Home</a></li>
                <li class="change active">Dashboard</li>
              </ol>
            </div>
          </div>
        </section>
        <!-- end of the header part -->

        <!-- start of a new section for boxes -->
          <div class="dash_content">
            <!-- start of balance box -->
            <div class="box_balance">
              <div class="info_icon">
                <a href="#" class="elevation-1">
                  <i class="fa fa-money"></i>
                </a>
              </div>
              <div class="infom">
                <span class="personal_balance">Balance</span>
                <span class="money_balance">$</span>
              </div>
            </div>
            <!-- end of the balance box  -->
    
            <!-- start of profit box money -->
            <div class="box_balance2">
              <div class="info_icon">
                <a href="#" class="elevation-1">
                  <i class="fa fa-money"></i>
                </a>
              </div>
              <div class="infom">
                <span class="personal_balance">Profit Return</span>
                <span class="money balance">$</span>
              </div>
            </div>
            <!-- end of profit box -->
    
            <!-- start of bonus box -->
            <div class="box_balance3">
              <div class="info_icon">
                <a href="#" >
                  <i class="fa fa-money"></i>
                </a>
              </div>
              <div class="infom">
                <span class="personal_balance">Bonus</span>
                <span class="money balance">$</span>
              </div>
            </div>
            <!-- end of bonus box -->
    
            <!-- start of total deposit box -->
            <div  class="box_balance4">
              <div class="info_icon">
                <a href="#" >
                  <i class="fa fa-money"></i>
                </a>
              </div>
              <div class="infom">
                <span class="personal_balance">Total deposit</span>
                <span class="money balance">$</span>
              </div>
    
            </div>
            <!-- end of deposit box -->
    
            <!-- start of total withdraw box -->
            <div  class="box_balance5">
              <div class="info_icon">
                <a href="#" >
                  <i class="fa fa-money"></i>
                </a>
              </div>
              <div class="infom">
                <span class="personal_balance">Total withdrawal</span>
                <span class="money balance">$</span>
              </div>
            </div>
            <!-- end of total withdraw box -->
    
            <!-- start of deposit box -->
            <div  class="box_balance6">
              <div class="info_icon">
                <a href="#" >
                  <i class="fa fa-exchange"></i>
                </a>
              </div>
              <div class="infom">
                <span class="personal_balance">Deposit</span>
                <span class="money balance">$</span>
              </div>
            </div>
            <!-- end of deposit box -->
    
    
            <!-- start of withdrawal -->
            <div  class="box_balance7">
              <div class="info_icon">
                <a href="#" >
                  <i class="fa fa-exchange"></i>
                </a>
              </div>
              <div class="infom">
                <span class="personal_balance">Withdrawal</span>
                <span class="money balance">$</span>
              </div>
    
            </div>
            <!-- end of withdrawal -->
    
            <!-- start of subscription -->
            <div  class="box_balance8">
                  <div class="info_icon">
                    <a href="#" >
                      <i class="fa fa-credit-card"></i>
                    </a>
                  </div>
                  <div class="infom">
                    <span class="personal_balance">Subscription</span>
                    <span class="money balance">$</span>
                  </div>
            </div>
            <!-- end of subscription -->


            <!-- start of the notification -->
            <div  class="box_balance9">
              <div class="info_icon">
                <a href="#" >
                  <i class="fa fa-bullhorn"></i>
                </a>
              </div>
              <div class="infom">
                <span class="personal_balance">Notifications</span>
                <span class="money balance">$</span>
              </div>
            </div>
            <!-- end of the notification -->
          </div>
        <!-- end of a new section for boxes -->


        <!-- start of investing plan -->
        <div class="investing-BOX">
          <form class="trading1" action="#" method="post">
            <div class="header_TO">
              <span>INVESTING PLAN</span>
            </div>
            <div class="control"> 
              <div>
                <select name="live" id="cryptoforex">
                  <option value="Cryptocurrency">Cryptocurrency</option>
                  <option value="Forex">Forex</option>
                </select>
              </div>
              <div class="controlmin_2">
                <div>
                  <label for="entry">Entry Price</label><br>
                  <input type="text" name="entry" id="entry" placeholder="Enter price entry">
                </div>
                <div>
                  <label for="stoploss">Stop loss</label><br>
                  <input type="text" name="stop" id="stoploss" placeholder="Enter stop loss">
                </div>
                <div>
                  <label for="takeprofit">Take profit</label><br>
                  <input type="text" name="take" id="takeprofit" placeholder="Enter TP">
                </div>
              </div>
              <div class="select-input">
                <label for="input">Select Action</label><br>
                <select name="buyORsell" id="execute">
                  <option value="Buy">Buy</option>
                  <option value="Sell">Sell</option>
                </select>
              </div>
              <div>
                <input type="submit" class="btnsub" value="execute">
              </div>
              
            </div>
          </form>
        </div>
        <!-- end of investing plan -->

        <!-- start of wedge side -->
        <div>
          <img class="wedges" src="img/wedge.png.png" alt="wedge">
        </div>
        <!-- end of wedge side -->
        <div class="chart">
          <div class="div-chart">
            <span>BTC/USD Chart</span>
          </div>
          <div>
            <img class="btc-chart" src="img/BITCOIN.png" alt="btc/usdchart">
          </div>

        </div>

        <!-- start of the live tradings -->
        <div class="container_box">
          <form class="trading" action="#" method="post">
            <div class="header_for">
              <span>Live Trading</span>
            </div>
            <div class="control"> 
              <div>
                <select name="live" id="cryptoforex">
                  <option value="Cryptocurrency">Cryptocurrency</option>
                  <option value="Forex">Forex</option>
                </select>
              </div>
              <div class="controlmin_1">
                <div>
                  <label for="currency">Currency pair</label><br>
                  <input type="text" name="currency_pair" id="currency" placeholder="Enter currency pair for example:BTC/ETH">
                </div>
                <div>
                  <label for="lotsize">Lot size</label><br>
                  <input type="text" name="lot" id="lotsize" placeholder="Enter lotsize">
                </div>
              </div>
              <div class="controlmin_2">
                <div>
                  <label for="entry">Entry Price</label><br>
                  <input type="text" name="entry" id="entry" placeholder="Enter price entry">
                </div>
                <div>
                  <label for="stoploss">Stop loss</label><br>
                  <input type="text" name="stop" id="stoploss" placeholder="Enter stop loss">
                </div>
                <div>
                  <label for="takeprofit">Take profit</label><br>
                  <input type="text" name="take" id="takeprofit" placeholder="Enter TP">
                </div>
              </div>
              <div class="select-input">
                <label for="input">Select Action</label><br>
                <select name="buyORsell" id="execute">
                  <option value="Buy">Buy</option>
                  <option value="Sell">Sell</option>
                </select>
              </div>
              <div>
                <input type="submit" class="btnsub" value="execute">
              </div>
              
            </div>
          </form>
          <!-- end of live trading -->

          <!-- start of table -->
          <div class="h5">
            <h5>Rencent Trading History</h5>
          </div>
          <table class="table">
            <thead class="tablehead">
              <tr>
                <th>Trading Type</th>
                <th>Currency Pair</th>
                <th>Trading Action</th>
                <th>Entry Price</th>
                <th>Stop Loss</th>
                <th>Take Profit</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>FOREX</td>
                <td>USDJPY</td>
                <td></td>
                <td>125.25</td>
                <td>105.25</td>
                <td>135.25</td>
                <td></td>
                <td></td>
              </tr>
            </tbody>
          </table>
        </div>
         <!-- end of table -->

         <!-- start of crossrate table chart -->
        <div class="crossrate">
          <div class="FOREX">
            <span>fOREX-cross Rate chart</span>
          </div>
          <div>
            <img class="cross-chart" src="img/crossrate.png" alt="forex crossrate chart">
          </div>

        </div>
        <!-- end of crossrate chart -->

        <!-- start of the footer -->
      <footer class="footer">
        <strong>
          Copyright &copy
          <a href="#">SmartInvesta</a>
          .All right reseved

        </strong>

      </footer>
      <!-- end of the footer -->

      </div>
  </div>





  
</body>
</html>    