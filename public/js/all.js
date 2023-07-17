
let procl =document.querySelectorAll(".clicks");




procl.forEach( e => {
    e.addEventListener("click",()=>{
              let id =e.getAttribute("id");
              let type=e.children[0].getAttribute("id");
              document.cookie=`ids=${id}`;
              document.cookie=`types=${type}`;
              console.log(type);
            })
          });



