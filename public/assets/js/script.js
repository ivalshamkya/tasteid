window.onscroll = function () {
  scrollFunction();
};

function scrollFunction() {
  if (document.body.scrollTop > 80 || document.documentElement.scrollTop > 80) {
    document.getElementById("navbar").style.backgroundColor = "#bb9356";
    document.getElementById("navbar").style.transition =
      "background-color 200ms linear";
    document.getElementById("colored").style.color = "white";
  } else {
    document.getElementById("navbar").style.backgroundColor = "transparent";
    document.getElementById("navbar").style.transition =
      "background-color 200ms linear";
    document.getElementById("colored").style.color = "#bb9356";
  }
}

function cekLogin() {
  if (confirm("Login terlebih dahulu")) {
    location.href = "login.php";
  }
}

function Logout() {
  if (confirm("Konfirmasi Log Out?")) {
    location.href = "./include/logout.php";
  }
}

function showPassword() {
  var fpass = document.getElementById("Password");
  if (fpass.type == "password") {
    fpass.type = "text";
  } else {
    fpass.type = "password";
  }
}

// Next/previous controls
function plusSlides(n) {
  showSlides((slideIndex += n));
}

// Thumbnail image controls
function currentSlide(n) {
  showSlides((slideIndex = n));
}

var slideIndex = 0;
showSlides();

function showSlides(n) {
  clearTimeout(0);
  var i = n;
  console.log(i);
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  slideIndex++;
  if (slideIndex > slides.length) {
    slideIndex = 1;
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex - 1].style.display = "block";
  dots[slideIndex - 1].className += " active";
  setTimeout(showSlides, 5000); // Change image every 2 seconds
}

function addFields() {
  // Number of inputs to create
  var number = document.getElementById("member").value;
  // Container <div> where dynamic content will be placed
  var container = document.getElementById("container");
  // Clear previous contents of the container
  while (container.hasChildNodes()) {
    container.removeChild(container.lastChild);
  }
  for (i = 0; i < number; i++) {
    // Append a node with a random text
    container.appendChild(document.createTextNode("Member " + (i + 1)));
    // Create an <input> element, set its type and name attributes
    var input = document.createElement("input");
    input.type = "text";
    input.name = "member" + i;
    container.appendChild(input);
    // Append a line break
    container.appendChild(document.createElement("br"));
  }
}
