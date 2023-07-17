let naxt1=document.getElementById("next1"),
    back1=document.getElementById("back1"),
    show1=document.getElementById("show1"),
    show2=document.getElementById("show2"),
    stps=document.getElementById("ab"),
    stps2=document.getElementById("ac"),
    stps3=document.getElementById("aa"),
    input=document.querySelectorAll("input"),
    ero =document.querySelectorAll(".errors"),
    back2=document.getElementById("back2"),
    buttons=document.querySelectorAll("button"),
    showpass=document.querySelectorAll(".showpass"),
    sud=document.getElementsByClassName("sud"),
    sing_up1 =document.querySelectorAll("#a"),
    sing_up2=document.querySelectorAll("#b");







naxt1.onclick=()=> {

    if (input[1].value != ""  && input[2].value != "" && input[3].value != ""  ) {
        if (input[1].value.length >= 15 ) {
            if (input[2].value.length >= 1 ) {



                show2.setAttribute("style","top:0'");
                show1.setAttribute("style","position: absolute;z-index:-20;opacity:0;top:0;'");
                stps2.classList.add("staps-color");



            }else{
                ero[1].innerHTML="  يجب ان  لا يكون الحقل فارغ";
                ero[0].innerHTML="";
                ero[2].innerHTML="";
            }
        }else{
            ero[0].innerHTML="  يجب ان يحتوي الحقل على الاقل  15  من احرف";
            ero[1].innerHTML="";
            ero[2].innerHTML="";
        }



    }else{
      ero[2].innerHTML="الرجاء ملاء البيانات";
      ero[0].innerHTML="";
      ero[1].innerHTML="";
    }

};












back1.onclick=()=> {

    show1.setAttribute("style","  top:0");
    show2.setAttribute("style"," position: absolute;z-index:-20;opacity:0;top:0;'");
    stps2.classList.remove("staps-color");

};








showpass[0].onclick=()=>{

        if (showpass[0].value == "on") {
            input[5].setAttribute("type","text")
            input[6].setAttribute("type","text")


        }
        if(showpass[0].value == ""){
            input[6].setAttribute("type","password")
            input[5].setAttribute("type","password")
            showpass[0].value="on";
        }

}










sud[0].onclick=()=>{

    if ((input[4].value, input[5].value , input[6].value)!=='' ) {



        if (input[4].value.length >= 10){



            if (input[5].value.length >= 12) {



                    if (input[5].value === input[6].value ) {



                        sud[0].setAttribute("type","submi")


                    } else {
                        ero[5].innerHTML="  كلمات المرور متطابقة";
                        ero[4].innerHTML="";
                        ero[3].innerHTML=""
                        }


            } else {
                    ero[4].innerHTML="  يجب ان  يتكون كلمة السر على الاقل من 12 حرف وارقام ورموز";
                    ero[3].innerHTML="";
                    ero[5].innerHTML=""
                    }


        }else{
            ero[3].innerHTML="  يجب ان يحتوي الحقل على الاقل 10 من الاحرف";
            ero[4].innerHTML="";
            ero[5].innerHTML=""
        }

    }else{
        ero[4].innerHTML="";
        ero[3].innerHTML="";
        ero[5].innerHTML="الرجاء ملاء البيانات";
    }
}






if(ero[0].getAttribute("id")== "2") {
    show1.setAttribute("style","  top:0");
    show2.setAttribute("style"," position: absolute;z-index:-20;opacity:0;top:0;'");
    stps2.classList.add("staps-color");
};

if(ero[3].getAttribute("id")== "4") {

    show2.setAttribute("style","top:0'");
    show1.setAttribute("style","position: absolute;z-index:-20;opacity:0;top:0;'");

    stps2.classList.remove("staps-color");

};
