// Toggle "voir/cacher" mot de passe pour tous les .btn-oeil
document.addEventListener("click", function (e) {
  const btn = e.target.closest(".btn-oeil");
  if (!btn) return;

  const group = btn.closest(".groupe-champ");
  if (!group) return;

  const input = group.querySelector(".champ-mdp");
  if (!input) return;

  if (input.type === "password") {
    input.type = "text";
    btn.textContent = "🙈";
  } else {
    input.type = "password";
    btn.textContent = "👁️";
  }
});

// Validation côté client (douce) sur la page d'inscription
document.addEventListener("submit", function (e) {
  const form = e.target;
  if (!form.classList.contains("formulaire-auth")) return;

  // On ne bloque que pour l'inscription (présence du champ confirmation)
  const pwd = form.querySelector('input[name="mot_de_passe"]');
  const conf = form.querySelector('input[name="confirmation"]');
  const policy = form.querySelector('input[name="accept_policy"]');

  if (!pwd || !conf) return; // c'est la page connexion -> rien à faire

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
