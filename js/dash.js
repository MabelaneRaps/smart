var avr = document.getElementById("selectplans-period").value;
var min = 0;
var value1 = document.getElementsByClassName("invest-cards");
var Amount = document.getElementById("invest1").value;
function swipe(){
 for (let i=0; i<4; i++){
  value1[i].style.display = "none";
}
 if(avr == "Bronze"){
  value1[0].style.display = "block";
  min = 30;
 }
 else if(avr == "Titanium"){
  value1[1].style.display = "block";
  min = 50;
 }
 else if(avr == "Gold"){
  value1[2].style.display = "block";
  min = 100;
}

else if(avr == "Diamond"){
    value1[3].style.display = "block";
    min = 200;
  }
else{
  value1[0].style.display = "block";
  min = 0;
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

if(num<Amount){
    alert("Insufficient balance");
    return false;
}
else if(min>Amount){
    alert("Your Amount is less than Min");
    return false;
}

    return true;
   
  }
    