window.onscroll = function() {moveNav()};
window.onload = function () {checkScrollBar()}

function moveNav() {
    document.getElementById("nav").style.backgroundColor = "rgba(2,2,2,0.7)";
  }

function checkScrollBar() {
    if (window.scrollY !== 0) {
        document.getElementById("nav").style.backgroundColor = "rgba(2,2,2,0.7)";
    }
}

function toogleBurger() {
    const element = document.getElementById("navbar");
    if (element.className === "active") {
        element.className = "";
    } else {
        element.className = "active";
    }
}