var minute = 14;
var second = 60;

setInterval(function(){
  if(minute == 0 && second == 1){
    document.getElementById("counter").innerHTML = "00:00";
  }else{
    second--;
    if(second == 0){
      minute--;
      second = 60;
      if(minute == 0){
        minute = minute;
      }
    }
    if(second.toString().length==1){
     second = "0"+second;
    }
    if(minute.toString().length==1){
      minute = "0"+minute;
    }
    document.getElementById("counter").innerHTML = minute + ":" + second;
  }
},1000)



/*
const submit = document.querySelector('.submit-btn');
const popup = document.querySelector('.PopUp');
const close = document.querySelector('.Close-btn');

console.log(submit);
submit.addEventListener('click',() => {
  popup.classList.add('open-popup')
})

close.addEventListener('click',() => {
  popup.classList.remove('open-popup')
})*/

const form =  document.getElementById("frm1");
const namecard =  document.getElementById("NameCard-Box");
const numbercard =  document.getElementById("NumberCard-Box");
const expire =  document.getElementById("Expire-Box");
const secur =  document.getElementById("pwd");
const Promocode =  document.getElementById("Code-Promo-Box");

function inputCode() {
  if(document.getElementById("Code-Promo-Box").style.opacity == 0) {
    document.getElementById("Code-Promo-Box").style.opacity = 1;
    document.getElementById("Code-Promo-Box").style.zIndex = "1";
    document.getElementById("clear-value").style.opacity = 1;
    document.getElementById("clear-value").style.zIndex = "1";
    const Promocode =  document.getElementById("Code-Promo-Box");
  }
}

function payPopUp() {
    const namecard_val =  namecard.value;
    const numbercard_val =  numbercard.value;
    const expire_val = expire.value;
    const secur_val = secur.value;
  if(document.getElementById("Popup").style.opacity == 0 && namecard_val !=='' &&  numbercard_val !==''&&expire_val !==''&& secur_val !=='' ) {
    document.getElementById("Popup").style.opacity = 1;
    document.getElementById("Popup").style.zIndex = "1";
  }
}

function closePopUp() {
  if(document.getElementById("Popup").style.opacity == 1) {
    document.getElementById("Popup").style.opacity = 0;
    document.getElementById("Popup").style.zIndex = "-1";
    window.location.href = 'home.php';
  }
}

function ClearValue(){
  const  Promocode_val = Promocode.value;
  if(Promocode_val !==''){
    document.getElementById("Code-Promo-Box").value = document.getElementById("Code-Promo-Box").defaultValue;
  }
}

/*------------ Admin slidebar ---------------*/


