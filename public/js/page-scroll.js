const slidePage = document.querySelector(".slide-page");
const nextBtnFirst = document.querySelector(".firstNext");
const prevBtnSec = document.querySelector(".prev-1");
let max = 2;
let current = 1;

nextBtnFirst.addEventListener("click", function(){
slidePage.style.marginLeft = "-25%";
current += 1;
});

prevBtnSec.addEventListener("click", function(){
slidePage.style.marginLeft = "0%";
current -= 1;
});
