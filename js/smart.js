//Closing Manu
$(document).ready(function(){
    $(".closing").click(function(){
      $(".menu_content").hide();
    });
  });


  //closing pop up

$(document).ready(function(){
    $(".response_cancel").click(function(){
      $(".response").hide();
    });
  });

//====Loader Function======//

function Loading(){
    document.getElementById("slide1").classList.add("animate_slide1");
    document.getElementById("slide2").classList.add("animate_slide2") ;
    setTimeout(fade,3000);
    setInterval(Count,50);
    }

function fade(){
    document.getElementById("rotation").style.display="none";
    document.getElementById("Loading").style.display="none";
   
}
//=====End of Loader Function====//

//Change header backgroung color when scrolling

function swipe(){
   
  document.getElementById("header").style.backgroundColor="black";

}


//=====Count the Invested Amount=====//
var count1 = 100;
var count2 = 0.01;
var count3 = 100000;

function Count(){
  
      if(count1<56144.93){
        document.getElementById("BTC1").innerHTML = count1 + count2+  " BTC";
        count1 = count1 + 170;
        count2 = count2 + 0.01;
        let fill2 = (count1/count3)*100;
        let wids = "width:" + fill2 + "%;";
        document.getElementById("fill1").setAttribute('style',wids);
        Math.round(fill2);
        document.getElementById("fill1").innerHTML = fill2  + "%";
      }
      else{
        clearInterval(setInterval(Count,50));
      }
    
      
}

