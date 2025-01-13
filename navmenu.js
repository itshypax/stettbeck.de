const navbarOffcanvasLg = document.querySelector("#navbarOffcanvasLg");
const topNav = document.querySelector("#topNav");
const menuIcon = document.querySelector("#menuIcon");
const navToggler = document.querySelector("#navToggler");

if (window.innerWidth <= 768) {
  topNav.addEventListener("click", function () {
    if (navbarOffcanvasLg.classList.contains("show")) {
      topNav.classList.add("bg-sh-blue");
      topNav.classList.remove("bg-sh-red");
      menuIcon.classList.add("fa-bars");
      menuIcon.classList.remove("fa-xmark");
      navToggler.classList.toggle("toggled");
    } else {
      topNav.classList.remove("bg-sh-blue");
      topNav.classList.add("bg-sh-red");
      menuIcon.classList.remove("fa-bars");
      menuIcon.classList.add("fa-xmark");
      navToggler.classList.toggle("toggled");
    }
  });
}

// FLyOut navigation

const flyoutTrigger = document.querySelector("#flyoutTrigger");
const flyOutNav = document.querySelector("#flyoutNav");
const flyoutChev = document.querySelector("#flyoutChev");

flyoutTrigger.addEventListener("click", function () {
  if (flyOutNav.style.display === "block") {
    flyOutNav.style.display = "none";
    flyoutChev.classList.remove("fa-chevron-up");
    flyoutChev.classList.add("fa-chevron-down");
  } else {
    flyOutNav.style.display = "block";
    flyoutChev.classList.remove("fa-chevron-down");
    flyoutChev.classList.add("fa-chevron-up");
  }
});

document.addEventListener("click", function (event) {
  if (
    !flyOutNav.contains(event.target) &&
    event.target !== flyOutNav &&
    event.target !== flyoutTrigger
  ) {
    flyOutNav.style.display = "none";
    flyoutChev.classList.remove("fa-chevron-up");
    flyoutChev.classList.add("fa-chevron-down");
  }
});

// FLyOut navigation 2

const flyoutTrigger2 = document.querySelector("#flyoutTrigger2");
const flyOutNav2 = document.querySelector("#flyoutNav2");
const flyoutChev2 = document.querySelector("#flyoutChev2");

flyoutTrigger2.addEventListener("click", function () {
  if (flyOutNav2.style.display === "block") {
    flyOutNav2.style.display = "none";
    flyoutChev2.classList.remove("fa-chevron-up");
    flyoutChev2.classList.add("fa-chevron-down");
  } else {
    flyOutNav2.style.display = "block";
    flyoutChev2.classList.remove("fa-chevron-down");
    flyoutChev2.classList.add("fa-chevron-up");
  }
});

document.addEventListener("click", function (event) {
  if (
    !flyOutNav2.contains(event.target) &&
    event.target !== flyOutNav2 &&
    event.target !== flyoutTrigger2
  ) {
    flyOutNav2.style.display = "none";
    flyoutChev2.classList.remove("fa-chevron-up");
    flyoutChev2.classList.add("fa-chevron-down");
  }
});
