window.addEventListener('DOMContentLoaded', ()=> {

/* *****************************************************************
HAMBURGER MENU 
***************************************************************** */

const hamburger = document.querySelector(".hamburger");
const navMenu = document.querySelector(".navMenu");

hamburger.addEventListener("click", () => {
    hamburger.classList.toggle("active");
    navMenu.classList.toggle("active");
});

// Hides hamburger menu with a click on any of the elements in menu
document.querySelectorAll(".menuLink").forEach(n => n.addEventListener("click", () => {
    hamburger.classList.remove("active");
    navMenu.classList.remove("active");
})); 

/* *****************************************************************
SCROLL TO THE TOP OF THE PAGE
***************************************************************** */
const toTop = document.querySelector(".to-top");

// Shows element when scrolled down 1000px or more
window.addEventListener("scroll", () => {
    if (window.pageYOffset > 1000) {
        toTop.classList.add("active");
    } else {
        toTop.classList.remove("active");
    }
});


/* *****************************************************************
FILTERING
***************************************************************** */

const allBtn = document.getElementById("all");

const eosmBtn = document.getElementById("eosM");
const rfBtn = document.getElementById("RF");
const eBtn = document.getElementById("E");
const zBtn = document.getElementById("Z");
const afBtn = document.getElementById("AF");

allBtn.addEventListener('click', () => {
    filterSelection('all');
});
eosmBtn.addEventListener('click', () => {
    filterSelection('eos M');
});
rfBtn.addEventListener('click', () => {
    filterSelection('RF');
});
eBtn.addEventListener('click', () => {
    filterSelection('E');
});
zBtn.addEventListener('click', () => {
    filterSelection('Z');
});
afBtn.addEventListener('click', () => {
    filterSelection('AF');
});



filterSelection("all")
function filterSelection(c) {
    let x, i;
    x = document.getElementsByClassName("productCard");
    if (c == "all") c = "";
    // Add the "show" class (display:block) to the filtered elements, and remove the "show" class from the elements that are not selected
    for (i = 0; i < x.length; i++) {
    removeClass(x[i], "show");
    if (x[i].className.indexOf(c) > -1) addClass(x[i], "show");
    }
}

// Show filtered elements
function addClass(element, name) {
    let i, arr1, arr2;
    arr1 = element.className.split(" ");
    arr2 = name.split(" ");
    for (i = 0; i < arr2.length; i++) {
        if (arr1.indexOf(arr2[i]) == -1) {
        element.className += " " + arr2[i];
        }
    }
}

// Hide elements that are not selected
function removeClass(element, name) {
    let i, arr1, arr2;
    arr1 = element.className.split(" ");
    arr2 = name.split(" ");
    for (i = 0; i < arr2.length; i++) {
        while (arr1.indexOf(arr2[i]) > -1) {
        arr1.splice(arr1.indexOf(arr2[i]), 1); 
        }
    }
    element.className = arr1.join(" ");
}


});