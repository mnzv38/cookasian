// Lightbox pour l’image des recettes

document.addEventListener("DOMContentLoaded", () => {
  const image = document.querySelector(".image-zoomable");
  const lightbox = document.getElementById("lightbox");
  const lightboxImg = document.getElementById("lightboxImg");
  const lightboxClose = document.getElementById("lightboxClose");

  if (!image || !lightbox) return;

  // OUVERTURE
  image.addEventListener("click", () => {
    lightbox.classList.add("lightbox-active");
    lightboxImg.src = image.src;
    lightboxImg.alt = image.alt;
    lightboxClose.focus();
  });

  // FERMETURE PAR BOUTON
  lightboxClose.addEventListener("click", () => {
    lightbox.classList.remove("lightbox-active");
  });

  // FERMETURE PAR CLIC FOND
  lightbox.addEventListener("click", (e) => {
    if (e.target === lightbox) {
      lightbox.classList.remove("lightbox-active");
    }
  });

  // FERMETURE PAR TOUCHE ESC
  document.addEventListener("keydown", (e) => {
    if (e.key === "Escape") {
      lightbox.classList.remove("lightbox-active");
    }
  });
});
