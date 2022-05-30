let mobileMenu = document.getElementById("mobileMenu");

function OpenMenu(){
    mobileMenu.style.height = "200px";
    mobileMenu.style.transition = "all 1s";
}

function CloseMenu(){
    mobileMenu.style.height = "0px";
    mobileMenu.style.transition = "all 1s";
}