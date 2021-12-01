<?php
//Tasks to be Completed

// Must create table for live trading with following columns : username, currency_type, currency_pair, lot_size, 
//take_profit, stop_loss, entry_price and action_select(be careful of datatypes)-- User Evidence
//Extend table of investment(Amount)
//Select Bal and deposit

// Create table for Recent trading history -- user Evidence
// Create php functions for live trading -- user Belmiro

session_start();
if (isset($_SESSION["investa_user"])){

  $user = $_SESSION["investa_user"];

}
else{

  $err = "Please login as Administrator";
  header("Location:login.php?user2=$err");
  
}
/*if($_SESSION["investa_user"] != "Admin"){
  header("Location:index.html");
}*/
require_once "connect.php";
 
$deposit="";
$balance="";
$Bal = $nwBal = "";
$Proft = "";
$amount = "";
//Fix this function, remember how compounds works, take the current bal
function balance(int $A,int $i,int $n) {
    $Bal = $A * (1 + $i);
   return $Bal;
}
function Nwbalance(int $Bal,int $rowB){
  $nwBal = $rowB + $Bal;
  return $nwBal;
}
function profit(int $B, int $d){
   $Proft = $B - $d ;
   return $Proft;
}
$sql="SELECT balance, deposit FROM dashboard WHERE  username='$user' ";
$result = $conn->query($sql);
if($result->num_rows> 0){
  $row = $result->fetch_assoc();
  $balance =  $row["balance"];
$deposit = $row["deposit"];
}

    $sql="SELECT typeOfInv,periods,user,amount FROM investment";
    $result1 = $conn->query($sql);
    
if($result1->num_rows> 0){ 

    While($type = $result1->fetch_assoc() ){
      $amount = $type["amount"];
           $typeOfinv = $type["typeOfInv"];
            $user = $type["user"];
           
  
          if($typeOfinv=="Bronze"){
            $i = 0.03;
            $n=1; 
            $Bal = balance($amount,0.03,1);
            $nwBal = Nwbalance($Bal,$balance);
            $Proft = profit($Bal,$deposit);
            
            $sql ="UPDATE dashboard SET balance = $Bal , profit_return = $Proft
            WHERE username = '$user'";

         }else if($typeOfinv=="Titanium"){
            $i = 0.05;
            $n=1;
            $Bal = balance($amount,0.05,1);
            $nwBal = Nwbalance($Bal,$balance);
            $Proft = profit($Bal,$deposit);
            $sql ="UPDATE dashboard SET balance = $Bal , profit_return = $Proft
            WHERE username = '$user'";
            
          }else if($typeOfinv=="Gold"){
            $i = 0.10;
            $n=1;
            $Bal = balance($amount,0.10,1);
            $nwBal = Nwbalance($Bal,$balance);
            $Proft = profit($Bal,$deposit);
            $sql ="UPDATE dashboard SET balance = $Bal , profit_return = $Proft
            WHERE username = '$user'";
            
          }elseif($typeOfinv=="Diamond"){
            $i = 0.20;
            $n=1;
            $Bal = balance($amount,0.20,1);
            $nwBal = Nwbalance($Bal,$balance);
            $Proft = profit($Bal,$deposit);
            $sql ="UPDATE dashboard SET balance = $Bal , profit_return = $Proft
            WHERE username = '$user'";
          }

    }


}

?>

<Doctype html>
  <html lang="en">
  <head>
  <!-- start meta tags-->
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Adminitration Site" />
  <meta http-equiv="refresh" content="">
  <!-- End of meta tags -->

  <title>Compound</title>
  
  
  </head>
  <body  >

</body>


</html>

