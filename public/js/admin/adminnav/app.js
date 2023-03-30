var 
openBtn = document.getElementById("nav-open")
closeBtn = document.getElementById("nav-close")
navWrapper = document.getElementById("nav-wrapper")
navLatteral = document.getElementById("nav-latteral")
;

const openNav = () => {
    navWrapper.classList.add("active");
    navLatteral.style.left = "0";

};

const closeNav = () => {
    navWrapper.classList.remove("active");
    navLatteral.style.left= "-100%";
}

openBtn.addEventListener("click", openNav);
closeBtn.addEventListener("click", closeNav);