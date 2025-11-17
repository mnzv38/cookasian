// SVG oeil ouvert
const svgEye = `
<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
  <path d="M2.062 12.348a1 1 0 0 1 0-.696 10.75 10.75 0 0 1 19.876 0 1 1 0 0 1 0 .696 10.75 10.75 0 0 1-19.876 0"/>
  <circle cx="12" cy="12" r="3"/>
</svg>
`;

// SVG oeil barré
const svgEyeOff = `
<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
  <path d="M10.733 5.076a10.744 10.744 0 0 1 11.205 6.575 1 1 0 0 1 0 .696 10.747 10.747 0 0 1-1.444 2.49"/>
  <path d="M14.084 14.158a3 3 0 0 1-4.242-4.242"/>
  <path d="M17.479 17.499a10.75 10.75 0 0 1-15.417-5.151 1 1 0 0 1 0-.696 10.75 10.75 0 0 1 4.446-5.143"/>
  <path d="m2 2 20 20"/>
</svg>
`;

// Toggle mot de passe en cliquant sur l’icône
document.addEventListener("click", (e) => {
  const icone = e.target.closest(".icone-mdp");
  if (!icone) return;

  const container = icone.closest(".champ-mdp-container");
  const input = container.querySelector(".champ-mdp");

  if (!input) return;

  if (input.type === "password") {
    input.type = "text";
    icone.innerHTML = svgEyeOff;
  } else {
    input.type = "password";
    icone.innerHTML = svgEye;
  }
});

// --------------------------
// VALIDATION FORMULAIRE
// --------------------------

document.addEventListener("submit", function (e) {
  const form = e.target;
  if (!form.classList.contains("formulaire-auth")) return;

  const pwd = form.querySelector('input[name="mot_de_passe"]');
  const conf = form.querySelector('input[name="confirmation"]');
  const policy = form.querySelector('input[name="accept_policy"]');

  if (!pwd || !conf) return; // page connexion → ne rien faire

  const errors = [];
  const v = pwd.value;

  if (v.length < 8) errors.push("Mot de passe : 8 caractères min.");
  if (!/[A-Z]/.test(v)) errors.push("Au moins une majuscule.");
  if (!/\d/.test(v)) errors.push("Au moins un chiffre.");
  if (!/[\W_]/.test(v)) errors.push("Au moins un caractère spécial.");
  if (pwd.value !== conf.value)
    errors.push("La confirmation ne correspond pas.");
  if (policy && !policy.checked)
    errors.push("Vous devez accepter la politique de confidentialité.");

  if (errors.length) {
    e.preventDefault();
    alert(errors.join("\n"));
  }
});
