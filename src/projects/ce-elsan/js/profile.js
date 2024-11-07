
    // Sélection des éléments pour changer l'email
    const modifyMailButton = document.getElementById('modify_mail_button');
    const cancelMailButton = document.getElementById('cancel_mail_change');
    const mailForm = document.getElementById('change_mail_form');
    const emailInput = document.getElementById('new_email');
    const passwordInput = document.getElementById('password');

    // Sélection des éléments pour changer le mot de passe
    const modifyPasswordButton = document.getElementById('modify_password_button');
    const cancelPasswordButton = document.getElementById('cancel_password_change');
    const passwordForm = document.getElementById('change_password_form');
    const currentPasswordInput = document.getElementById('current_password');
    const newPasswordInput = document.getElementById('new_password');
    const confirmNewPasswordInput = document.getElementById('confirm_new_password');

    // Zone de suggestions
    const userSuggestions = document.getElementById('user_suggestions');

    // Fonction pour afficher le formulaire de changement d'email
    modifyMailButton.addEventListener('click', function() {
        // Vider les champs
        emailInput.value = '';
        passwordInput.value = '';

        // Afficher le formulaire et le bouton "Annuler"
        mailForm.style.display = 'flex';
        cancelMailButton.style.display = 'block';
        modifyMailButton.style.display = 'none';

        // Cacher le bouton de modification de mot de passe
        modifyPasswordButton.style.display = 'none';
        userSuggestions.style.display = 'none';
    });

    // Fonction pour annuler le changement d'email
    cancelMailButton.addEventListener('click', function() {
        mailForm.style.display = 'none';
        cancelMailButton.style.display = 'none';
        modifyMailButton.style.display = 'block';

        // Afficher le bouton de modification de mot de passe
        modifyPasswordButton.style.display = 'block';
        userSuggestions.style.display = 'block';
    });

    // Fonction pour afficher le formulaire de changement de mot de passe
    modifyPasswordButton.addEventListener('click', function() {
        // Vider les champs
        currentPasswordInput.value = '';
        newPasswordInput.value = '';
        confirmNewPasswordInput.value = '';

        // Afficher le formulaire et le bouton "Annuler"
        passwordForm.style.display = 'flex';
        cancelPasswordButton.style.display = 'block';
        modifyPasswordButton.style.display = 'none';

        // Cacher le bouton de modification d'email
        modifyMailButton.style.display = 'none';
        userSuggestions.style.display = 'none';
    });

    // Fonction pour annuler le changement de mot de passe
    cancelPasswordButton.addEventListener('click', function() {
        passwordForm.style.display = 'none';
        cancelPasswordButton.style.display = 'none';
        modifyPasswordButton.style.display = 'block';
        userSuggestions.style.display = 'block';

        // Afficher le bouton de modification d'email
        modifyMailButton.style.display = 'block';
    });


    function togglePassword(inputId, eyeIcon) {
        const passwordInput = document.getElementById(inputId);
        const img = eyeIcon.querySelector("img");
    
        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            img.src = "../images/icons/hide_password.png"; // Changer l'icône pour masquer
            img.alt = "Masquer mot de passe";
        } else {
            passwordInput.type = "password";
            img.src = "../images/icons/show_password.png"; // Changer l'icône pour afficher
            img.alt = "Afficher mot de passe";
        }
    }