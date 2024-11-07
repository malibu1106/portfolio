document.addEventListener("DOMContentLoaded", function () {
    const passwordInput = document.getElementById("su_password");
    const retypedPasswordInput = document.getElementById("su_retyped_password");
    const errorMessage = document.getElementById("login_message");
    const signupForm = document.getElementById("signup_form");
    
    // Récupérer les champs Nom et Prénom
    const lastNameInput = document.querySelector('input[name="last_name"]');
    const firstNameInput = document.querySelector('input[name="first_name"]');

    // Fonction pour vérifier la robustesse du mot de passe
    function validatePassword(password) {
        const minLength = 8;
        const containsUppercase = /[A-Z]/.test(password); // Vérifie la présence de majuscules
        const containsSpecialChar = /[!@#$%^&*(),.?":{}|<>]/.test(password); // Vérifie la présence de caractères spéciaux
        return {
            lengthValid: password.length >= minLength,
            hasUppercase: containsUppercase,
            hasSpecialChar: containsSpecialChar,
        };
    }

   // Mettre à jour les messages de validation du mot de passe
function updatePasswordFeedback() {
    // Vérifier si les champs Nom et Prénom ne sont pas vides
    if (lastNameInput.value.trim() !== "" && firstNameInput.value.trim() !== "") {
        const password = passwordInput.value;
        const validation = validatePassword(password);

        let feedbackMessage = "";

        // Vérification dans l'ordre de priorité
        if (!validation.lengthValid) {
            feedbackMessage = "Au moins 8 caractères.";
        } else if (!validation.hasUppercase) {
            feedbackMessage = "Au moins une majuscule.";
        } else if (!validation.hasSpecialChar) {
            feedbackMessage = "Au moins un caractère spécial.";
        } else if (password !== retypedPasswordInput.value) {
            feedbackMessage = "Les mots de passe ne correspondent pas.";
        }

        // Mettre à jour le message d'erreur
        errorMessage.innerHTML = feedbackMessage;
    } else {
        // Si les champs Nom ou Prénom sont vides, vider le message d'erreur
        errorMessage.innerHTML = "";
    }
}

    // Vérification en temps réel lors de la saisie
    passwordInput.addEventListener("input", updatePasswordFeedback);
    retypedPasswordInput.addEventListener("input", updatePasswordFeedback);

    // Gestion de la soumission du formulaire
    signupForm.addEventListener("submit", function (event) {
        const password = passwordInput.value;
        const retypedPassword = retypedPasswordInput.value;
        const validation = validatePassword(password);

        // Empêcher la soumission si le mot de passe n'est pas valide
        if (
            !validation.lengthValid ||
            !validation.hasUppercase ||
            !validation.hasSpecialChar ||
            password !== retypedPassword
        ) {
            event.preventDefault();
            errorMessage.textContent =
                "Veuillez corriger les erreurs dans le formulaire.";
        }
    });
});

function togglePassword(inputId, eyeIcon) {
    const passwordInput = document.getElementById(inputId);
    const img = eyeIcon.querySelector("img");

    if (passwordInput.type === "password") {
        passwordInput.type = "text";
        img.src = "images/icons/hide_password.png"; // Changer l'icône pour masquer
        img.alt = "Masquer mot de passe";
    } else {
        passwordInput.type = "password";
        img.src = "images/icons/show_password.png"; // Changer l'icône pour afficher
        img.alt = "Afficher mot de passe";
    }
}
