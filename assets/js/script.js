function showNavBar() {
    const navBarItems = document.getElementsByClassName("nav-bar-child");
    const navBar = document.getElementsByClassName("nav-bar");
    const icon = document.querySelector(".nav-bar-child i");
    if (navBar[0].className === "nav-bar") {
        navBar[0].className += " responsive";
        for (let i = 2; i < navBarItems.length; i++) {
            navBarItems[i].style.display = "block";
            icon.className = "fa fa-times";
        }

    } else if (navBar[0].className === "nav-bar responsive") {
        navBar[0].className = "nav-bar"
        for (let i = 2; i < navBarItems.length; i++) {
            navBarItems[i].style.display = "none";
            icon.className = "fa fa-bars";
        }
    }
}

let year = document.getElementById("year");

let currentYear = new Date().getFullYear();

year.innerText = currentYear;