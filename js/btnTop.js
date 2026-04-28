const btnTop = document.getElementById("btnTop");

// Mostrar el botón cuando se hace scroll
window.onscroll = function () {
  if (document.body.scrollTop > 370 || document.documentElement.scrollTop > 370) {
    btnTop.style.display = "block";
  } else {
    btnTop.style.display = "none";
  }
};

// Al hacer click, subir arriba suavemente
btnTop.addEventListener("click", function () {
  window.scrollTo({
    top: 0,
    behavior: "smooth"
  });
});