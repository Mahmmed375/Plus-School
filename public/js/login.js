
let showpass=document.querySelectorAll(".showpass"),
input=document.querySelectorAll("input");

showpass[0].onclick=()=>{

    if (showpass[0].value == "on") {
        input[2].setAttribute("type","text")
    }

}
