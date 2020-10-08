function myFunction() {
    var x = document.getElementById("navzao");
    if (x.className === "topnav") {
        x.className += " responsive";
    } else {
        x.className = "topnav";
    }
}