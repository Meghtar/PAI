function burgerButton() {
    var x = document.getElementById("mynav");
    if (x.className === "navbar") {
      x.className += " responsive";
    } else {
      x.className = "navbar";
    }
  }