/* EMAIL */
let emailValid;

document.getElementById('email').addEventListener('input', function () {
    const email = this.value;
    if (email.length > 0) {
        document.getElementById('alert_message').style.opacity = "1";
        document.getElementById('alert_message').style.animation = "none";
        const xhr = new XMLHttpRequest();
        xhr.open('POST', '../elements/check_email.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onload = function () {
            if (xhr.status === 200) {
                const response = JSON.parse(xhr.responseText);


                if (response.exists) {
                    document.getElementById('alert_message').innerHTML = "L'adresse email est déjà utilisée";
                    emailValid = false;
                }

                else if (!response.exists && email.includes('@') || email.includes('.')) {
                    emailValid = true;
                    document.getElementById('alert_message').innerHTML = "Adresse email disponible";
                    document.getElementById('alert_message').style.animation = "message 4s forwards";
                }

            }
        };
        xhr.send('email=' + encodeURIComponent(email));
    }
});

/* PASSWORDS */
let passwordInput = document.getElementById('password');
// let passwordInputRetyped = document.getElementById('passwordRetyped');
const specialCharacterPattern = /[!@#$%^&*(),.?":{}|<>]/;
const uppercasePattern = /[A-Z]/;

if (passwordInput) {
    passwordInput.addEventListener("keyup", verifyPasswordSecurity);
}

function verifyPasswordSecurity() {
    let password = passwordInput.value;


    document.getElementById('alert_message').style.opacity = "1";
    document.getElementById('alert_message').style.animation = "none";

    if (password.length < 8) {

        document.getElementById('alert_message').innerHTML = "Le mot de passe doit contenir au moins 8 caractères";
        document.getElementById('signupButton').style.display = "none";

    } else if (!specialCharacterPattern.test(password)) {
        document.getElementById('alert_message').innerHTML = "Le mot de passe doit contenir au moins un caractère spécial";

        document.getElementById('signupButton').style.display = "none";

    } else if (!uppercasePattern.test(password)) {
        document.getElementById('alert_message').innerHTML = "Le mot de passe doit contenir au moins une majuscule";

        document.getElementById('signupButton').style.display = "none";
    } else if (password.length >= 8 && specialCharacterPattern.test(password) && uppercasePattern.test(password)) {
        document.getElementById('alert_message').innerHTML = "";

        document.getElementById('alert_message').style.animation = "message 4s forwards";
        document.getElementById('signupButton').style.display = "flex";

    }
}

let passwordInputSignupRetyped = document.getElementById('passwordRetyped');
passwordInputSignupRetyped.addEventListener("keyup", verifyPasswordRetyped);
function verifyPasswordRetyped() {
    document.getElementById('alert_message').style.opacity = "1";
    document.getElementById('alert_message').style.animation = "none";

    if (passwordInput.value === passwordInputSignupRetyped.value) {
        document.getElementById('signupButton').style.display = "block";
        document.getElementById('alert_message').innerHTML = "Mots de passe identiques";
        document.getElementById('alert_message').style.animation = "message 4s forwards";
    }
    else {
        document.getElementById('signupButton').style.display = "none";
        document.getElementById('alert_message').innerHTML = "Les mots de passe ne correspondent pas.";
    }
}


/* GLOBALS */

let form = document.getElementById('signupForm');
let requiredFieldsInForm = form.querySelectorAll('[required]');
let submitButton = document.getElementById('signupButton');
submitButton.style.visibility = "hidden";


// Ajoute un écouteur d'événement "keyup" à chaque champ requis
requiredFieldsInForm.forEach((field) => {
    field.addEventListener("keyup", checkFields);
});

function checkFields() {
    let notValid = 0; // Réinitialise la variable notValid pour chaque vérification

    // Vérifie la longueur de la valeur de chaque champ requis
    for (let i = 0; i < requiredFieldsInForm.length; i++) {
        if (requiredFieldsInForm[i].value.length < 2) {
            notValid++;
        }
    }

    if (document.getElementById('password').value !== document.getElementById('passwordRetyped').value) {
        notValid++;
    }

    // Affiche ou masque le bouton de soumission en fonction de la validité des champs
    if (notValid === 0 && emailValid != false) {
        submitButton.style.visibility = "visible";
    } else {
        submitButton.style.visibility = "hidden";
    }
}