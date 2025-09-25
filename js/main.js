function dom(id){
    return document.getElementById(id);
}
function domQ(tag,f=false){
if(f===true){
    return document.querySelectorAll(tag);
}
else{
    return document.querySelector(tag);

}
}
let form=domQ(".form");
let flip=domQ(".flip",true);
let Arrinput=domQ("body .container .form input",true);





/* التحكم في input*/ 
flip.forEach(btn=>{
btn.addEventListener("click",()=>{
    form.classList.toggle("rotate");
})
})

Arrinput.forEach(input=>{
input.addEventListener("focus",()=>{
    let label=input.parentElement.querySelector("label");
    label.style.top="-15px";
})
input.addEventListener("blur",()=>{
        let label=input.parentElement.querySelector("label");
   if(input.value.trim() === ""){
     label.style.top="21px";
   }
})

   input.addEventListener("input",()=>{
let label=input.parentElement.querySelector("label");
if(input.value.trim() === ""){
    label.style.top="21px";
}else{
    label.style.top="-13px";
}
   })
})

/*نهاية التحكم في input */
/* بداية التحكم في ~password*/
let passwordList=domQ(".passwordList");
let list=domQ(".passwordList ul li",true);
let spans=domQ(".passwordList ul li span",true);
let passwordAccount=dom("passwordAccount");
let rPasswordAccount=dom("rPasswordAccount");
let textPassword=dom("textPassword");
let btn_send=dom("btn_sned");
passwordAccount.addEventListener("focus",()=>{
    passwordList.classList.remove("d-none");
})
passwordAccount.addEventListener("blur",()=>{
    passwordList.classList.add("d-none");
})
let reg=/^(?=.*\d)(?=.*[A-Z])(?=.*[a-z])(?=.*[!*%$]).{8,}$/;
passwordAccount.addEventListener("input",()=>{

    if(!reg.test(passwordAccount.value) && passwordAccount.value.trim() !==""){
     
  spans[0].style.color = /[A-Za-z]/.test(passwordAccount.value) ? "#060" : "#fff"; 
  spans[1].style.color = /[0-9]/.test(passwordAccount.value)    ? "#060" : "#fff";
  spans[2].style.color = /[!*%$]/.test(passwordAccount.value)   ? "#060" : "#fff"; 
   passwordAccount.style.border="2px solid #f00";

}
else if(passwordAccount.value.length >= 8 && reg.test(passwordAccount.value)){
passwordAccount.style.border="none";
spans.forEach(span => span.style.color="#060");
}
  else {       
        passwordAccount.style.border="none";
    }
      if(passwordAccount.value.trim() === ""){
        spans.forEach(spans=> spans.style.color="#fff");
    }
})
rPasswordAccount.addEventListener("input",()=>{
    console.log(passwordAccount.value);
    if(rPasswordAccount.value!== passwordAccount.value){
        rPasswordAccount.style.border="2px solid #f00";
        btn_send.style.pointerEvents="none";
    }else{
        btn_send.style.pointerEvents="auto";
        rPasswordAccount.style.border="none";


    }
})


/* نهاية التحكم في password*/