// Lightbox pour afficher l'image en grand
document.addEventListener("DOMContentLoaded", function () {
  // Je récupère les éléments dont j'ai besoin
  const image = document.querySelector(".image-zoomable");
  const lightbox = document.getElementById("lightbox");
  const lightboxImg = document.getElementById("lightboxImg");
  const closeBtn = document.getElementById("lightboxClose");

  // Si jamais l'image n'existe pas, je ne fais rien
  if (!image) {
    return;
  }

  // Quand on clique sur l'image, j'affiche la lightbox
  image.addEventListener("click", function () {
    lightboxImg.src = image.src;
    lightboxImg.alt = image.alt;
    lightbox.classList.add("lightbox-active");
    closeBtn.focus(); // pour l’accessibilité
  });

  // Bouton pour fermer
  closeBtn.addEventListener("click", function () {
    lightbox.classList.remove("lightbox-active");
  });

  // Clic à l'extérieur de l'image → ferme aussi
  lightbox.addEventListener("click", function (e) {
    if (e.target === lightbox) {
      lightbox.classList.remove("lightbox-active");
    }
  });

  // Touche Escape → ferme la lightbox
  document.addEventListener("keydown", function (e) {
    if (e.key === "Escape") {
      lightbox.classList.remove("lightbox-active");
    }
  });
});
