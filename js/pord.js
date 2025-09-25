let val=0;
let arrButton=[];
getStorge();
swiper();
let arrimg=[];
/*
todo دالة لجلب العناصر
*/
function idQ(val){
  return document.getElementById(val);
}
function classQ(val,f=false){
  if(f){
    return document.querySelector(val);
  }else{
    return document.querySelectorAll(val);

}
}
/*
! نهاية الدالة لجلب العناصر
*/
//################################
/* 
todo دالة لجلب البيانات من ملف josn
*/


async function getdata() {
  const res=await fetch("../card.json");
const data=await res.json();
return data;
}
/*
! نهاية جلب البيانات
 */
//################################
/*
 todo دالة ارسال البيانات الى صفحة html 
 */

async function sendData(){
const data=await getdata();
const parent=classQ(".main_card",true);
data.forEach(d => {
  parent.innerHTML+=`
  <div class="card_prod">
<div class="img_card">
  <img src="${d.img}" alt="" class="img_food">
</div>
<div class="title_card">
  <h3>${d.title}</h3>
</div>
<div class="price">
  <h3>${d.price}</h3>
</div>
<div class="button_card">
  <button class="add_shop" type="button">add to card</button>
</div>
</div>
  `
});
inc_num();
}
sendData();

/*
! نهاية دالة الارسال االبيانات الى صحفة html
*/
//################################
/*
todo دالة الخاصة بصفحة العربة من زيادة رقم واضافة الى السلة
*/

function inc_num(){
 arrButton=classQ(".add_shop");
arrButton.forEach(btn=>{
btn.addEventListener("click",()=>{
  let num=idQ("num");
let img=btn.closest(".card_prod").querySelector("img").src;
let title=btn.closest(".card_prod").querySelector(".title_card h3").textContent;
let price=btn.closest(".card_prod").querySelector(".price h3").textContent;
let card=classQ(".main_card_shop",true);
let found=arrimg.find(arr => arr === img);
if(found){
let alertBox=classQ(".alert",true);
alertBox?.classList.replace("d-none","show");
setTimeout(()=>{alertBox?.classList.replace("show","d-none")},1500)

  return;
}
  val++;
  localStorage.setItem("num",val);
  num.textContent=val;
card.innerHTML+=`
<div class="card_shop_user">
  <div class="img_card_shop">
    <img src="${img}" alt="" style="width: 80px;height: 80px;">
  </div>
  <div class="name_price_card_shop">
    <p>${title}  </p>
    <br>
<span>${price}</span>
  </div>
  <div class="inc_dec_num">
   <span class="inc">  <i class="fa-solid fa-circle-plus"></i></span>
   <span class="num_pord">1</span>
   <span class="dec">  <i class="fa-solid fa-circle-minus"></i></span>
  </div>
</div>
`
arrimg.push(img);

let inc=classQ(".inc");
let dec=classQ(".dec");
 inc_dec(inc,dec);
})
})

}

/* 
!     نهايو دالة زيادة الرقم واضافة المنتجات الى صفحة السلة 
*/
//################################
/*
todo localStorage دالة لحفظ العناصر في
*/

function getStorge(){
val= localStorage.getItem("num");
idQ("num").textContent=val||0;
}

/*
! localStorage دالة الانتهاء من حفظ العناصر في
*/
//################################
/*
TODO دالة للتحكم في اظهار واخفاء الدالة
*/
let shopHide=idQ("shop_hide");
let cardShop=classQ(".card_shop",true);
shopHide.addEventListener("click",()=>cardShop.classList.add("card_shop_active"));
let btnClose=idQ("close");
btnClose.addEventListener("click",()=>cardShop.classList.remove("card_shop_active"))
/*
! نهاية التحكم في الدالة من اظهار واخفاء السلة
*/
 function inc_dec(inc,dec){
inc.forEach(inc => {
  inc.addEventListener("click",()=>{
    inc.parentElement.querySelector(".num_pord").textContent++;
  })
});
dec.forEach(dec => {
  dec.addEventListener("click",()=>{
let num= dec.parentElement.querySelector(".num_pord");
num.textContent--;
     const card= dec.closest(".card_shop_user");

    const imgEl=card.querySelector("img").src;
if(num.textContent== 0 ){ 
  dec.closest(".card_shop_user").remove();
arrimg= arrimg.map(img => img!=imgEl);
}
   
  })
  
});
}

/*
todo بداية تلوين النجمات
*/
let arrStar=classQ(".star-user");

arrStar.forEach(star=>{
star.addEventListener("click",()=>{
star.classList.toggle("color-y");

})

})

/*
! نهاية تلوين النجمات
*/



/*
todo swiper دالة للتحكم في مكتبة 
*/
function swiper(){
      var swiper = new Swiper(".mySwiper", {
loop:true,
speed:500,
  autoplay: {
    delay: 500,           
    disableOnInteraction: false, 
  },
      pagination: {  
        el: ".swiper-pagination",
        clickable:true,
        type: "bullets",
      },
      navigation: {
        nextEl: "#next",
        prevEl: "#prev",
      },
    });
    var swiper = new Swiper(".user-swiper", {
      effect: "cards",
      grabCursor: true,
    cardsEffect: {
      rotate: true,

    },

    speed: 1000,
    });


}

/*
!swiper نهاية الدالة للتحكم في مكتبة 
*/













