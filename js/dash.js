

  //Style for change profile
  function init(){
    let profile = document.getElementsByClassName("displayers");
    for(let i =0; i<3 ; i++){
      profile[i].style.display="none";
    }
    profile[0].style.display="block";
  }
  function profile(n){
    let profile = document.getElementsByClassName("displayers");
    for(let i =0; i<3 ; i++){
      profile[i].style.display="none";
    }
    profile[n].style.display="block";
    
  }
    
function swipe(){
    var avr = document.getElementById("selectplans-period").value;
    var value1 = document.getElementsByClassName("invest-cards");
    var Amount = document.getElementById("invest1").value;

 for (let i=0; i<4; i++){
  value1[i].style.display = "none";
}
 if(avr == "Bronze"){
  value1[0].style.display = "block";

 }
 else if(avr == "Titanium"){
  value1[1].style.display = "block";
 }
 else if(avr == "Gold"){
  value1[2].style.display = "block";
}

else if(avr == "Diamond"){
    value1[3].style.display = "block";
  }
else{
  value1[0].style.display = "block";
}

}

function search(){
    let avr =  document.getElementById("search_d").value
    if(avr==""){
   alert("Search box is empty");
    }
    else{
        alert("No match link found for " + avr);
    }

}

function invest_valid(num){
let avr = document.getElementById("selectplans-period").value;
let period = document.getElementById("selectplans-period1").value;
let Amount = document.getElementById("invest1").value;
let min =0;

if(avr == "Bronze"){
    min = 30;
   }
else if(avr == "Titanium"){
    min = 50;
   }
else if(avr == "Gold"){
    min = 100;
  }
  
else if(avr == "Diamond"){
      min = 200;
    }
else{
    alert("Please select valid plan");
    return false;
  }
  if(period=="invalid"){
    alert("Please select valid period");
    return false;
  }

if(num<Amount){
    alert("Insufficient Equity");
    return false;
}
else if(min>Amount){
    alert("Your Amount is less than Min");
    return false;
}
else{
    return true;
}

    
   
  }
  
  function withdrawal(value){
    let amount = document.getElementById("amount-withdraw").value;
    if(value<amount){
      alert("Insuficient balance");
      return false;
    }
    else{
      return true;
    }

  }
  
  function withdrawal_r(value){
    let amount = document.getElementById("amount-withdraw1").value;
    if(value<amount){
      alert("Insuficient balance");
      return false;
    }
    else{
      return true;
    }

  }

  
$(document).ready(function(){
  $(".closing2").click(function(){
    $(".notification-centerbox").hide();
  });
});
 
$(document).ready(function(){
  $(".closing3").click(function(){
    $(".sidebar").hide();
  });
});

  
$(document).ready(function(){
  $(".menu-left").click(function(){
    $(".sidebar").show();
  });
});
 
$(document).ready(function(){
  $(".profile").click(function(){
    $(".profile").attr("id","button_hover1");
    $(this).attr("id","button_hover");

  });
});
function ref_link() {

  var copyText = document.getElementById("referral_link");
  copyText.select();
  copyText.setSelectionRange(0, 99999); 
  navigator.clipboard.writeText(copyText.value);
  alert("Link Copied to clipboard");

}

//Closing Investment 
function investment(type,user){

var result = confirm("Do you want to close this investment?");
if(result){
  var xmlhttp= new XMLHttpRequest();
  xmlhttp.onreadystatechange= 
  function (){
      if(this.readyState ==4 && this.status == 200){
          document.getElementById("notification_text").innerHTML=this.responseText;
          document.getElementById("notification-centerbox").style.display="block";
      }
  }
  xmlhttp.open("GET","processor.php?invest_delete="+ user+"&type=" +type,true);
  xmlhttp.send();
}
else{
  alert("Investment is not closed");
}
 

}
function deposit(){
  let value1 = document.getElementById("methods-fund").value;
  let adress =  document.getElementById("deposit_adress");
  let id =  document.getElementById("id-bitcoin");
  let inst = document.getElementsByClassName("notify-deposit");
  for(let i=0; i<3 ; i++){
    inst[i].style.display="none";

  }


  if (value1 == "Luno"){
    inst[0].style.display="block";
    adress.innerHTML="Bitcoin Address";
    id.value="3JS6xFKu6D1ZNuGEahbgcjmWVRxaiW6JRy";

  }
  else if(value1 == "Skrill"){
    inst[1].style.display="block";
    adress.innerHTML="Email Address";
    id.value="info@smartinvesta.co.za";
  }
  else if(value1 == "Perect Money"){
    inst[2].style.display="block";
    adress.innerHTML="USD Account Number";
    id.value="U34966590";

  }
  else{
    inst[0].style.display="block";
    adress.innerHTML="Email Address";
    id.value="info@smartinvesta.co.za";
  }

}

function deposit_link() {

  var copyText = document.getElementById("id-bitcoin");
  copyText.select();
  copyText.setSelectionRange(0, 99999); 
  navigator.clipboard.writeText(copyText.value);
  alert("Text Copied to clipboard");

}