/*Menu burger */
let menuBurgerButton = document.getElementById('menu_burger_button')
let menuBurger = document.getElementById('burger_menu')

if (menuBurgerButton) {
    menuBurgerButton.addEventListener('click', menuBurgerSwitcher)
}
function menuBurgerSwitcher() {
    if (menuBurger.classList.contains('burger_show')) {
        menuBurger.classList.remove('burger_show');
        menuBurger.classList.add('burger_hidden');
        menuBurgerButton.innerHTML = "☰";
        if (window.scrollY > 0) {
            nav.style.boxShadow = "0px 5px 5px 0px rgba(0,0,0,0.5)";
        }

    } else {
        menuBurger.classList.remove('burger_hidden');
        menuBurger.classList.add('burger_show');
        nav.style.boxShadow = "none";
        menuBurgerButton.innerHTML = "X";

    }
}

/* Dark/Light mode switcher */
// Sélectionne l'élément du DOM avec l'ID 'themeToggle' (par exemple, un bouton ou une icône)
let themeToggle = document.getElementById('themeToggle');

// Fonction pour basculer entre les modes clair et sombre
function toggleTheme() {
    // Vérifie si l'attribut 'data-theme' sur <html> est actuellement défini sur 'theme-dark'
    if (document.documentElement.getAttribute('data-theme') === 'theme-dark') {
        // Si le thème actuel est sombre, supprime l'attribut 'data-theme' pour revenir au thème clair
        document.documentElement.removeAttribute('data-theme');

        // Met à jour l'icône du bouton pour représenter le mode sombre activable
        themeToggle.src = "img/dark-mode.png"; // Chemin de l'image pour le bouton du mode sombre
        themeToggle.alt = "dark mode button"; // Texte alternatif pour l'accessibilité
    } else {
        // Sinon, applique 'theme-dark' comme valeur de l'attribut 'data-theme' pour activer le mode sombre
        document.documentElement.setAttribute('data-theme', 'theme-dark');

        // Met à jour l'icône du bouton pour représenter le mode clair activable
        themeToggle.src = "img/light-mode.png"; // Chemin de l'image pour le bouton du mode clair
        themeToggle.alt = "light mode button"; // Texte alternatif pour l'accessibilité
    }
}

// Ajoute un écouteur d'événement sur l'élément 'themeToggle'
// La fonction `toggleTheme` sera appelée chaque fois que l'élément est cliqué
document.getElementById('themeToggle').addEventListener('click', toggleTheme);


/* Language switcher */
let language = 'french'; // Valeur initiale en français
let languageSwitcher = document.getElementById('language_switcher_button');

// Fonction pour charger les traductions depuis le fichier JSON
async function loadTranslations() {
    try {
        const response = await fetch('translations.json');
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        const translations = await response.json();
        return translations;
    } catch (error) {
        console.error('Failed to load translations:', error);
        return {};
    }
}

// Fonction pour mettre à jour les textes en fonction de la langue sélectionnée
function updateTexts(language, translations) {
    const langKey = language === 'english' ? 'en' : 'fr';

    document.querySelectorAll('[data-translate]').forEach(el => {
        const key = el.getAttribute('data-translate');
        if (translations[langKey][key] !== undefined) {
            el.innerText = translations[langKey][key];
        }
    });


}

// Fonction pour changer la langue
async function switchLanguage() {
    if (language === 'french') {
        language = 'english';
        languageSwitcher.src = 'img/french_flag.svg';
        languageSwitcher.alt = 'French language settings button';
        nav.style.position = 'absolute';
    } else {
        language = 'french';
        languageSwitcher.src = 'img/english_flag.svg';
        languageSwitcher.alt = 'English language settings button';
        nav.style.position = 'absolute';
    }

    const translations = await loadTranslations();
    updateTexts(language, translations);
}

// Événement pour changer la langue lorsque le bouton est cliqué
if (languageSwitcher) {
    languageSwitcher.addEventListener('click', switchLanguage);
}

// Chargement initial des traductions en français
(async function () {
    const translations = await loadTranslations();
    updateTexts('french', translations);
})();


// Background nav on scroll
let nav = document.getElementById('full_nav');

window.addEventListener('scroll', function () {
    if (window.scrollY > 0 && (menuBurger.classList.contains('burger_hidden'))) {
        nav.style.boxShadow = "0px 5px 5px 0px rgba(0,0,0,0.5)";
    } else {
        nav.style.boxShadow = "none";
    }
});


// return to top
let arrow = document.getElementById('arrow');
window.addEventListener('scroll', function () {
    if (window.scrollY > window.innerHeight) {
        arrow.style.display = "block";
    } else {
        arrow.style.display = "none";
    }
});


// hide nav when scroll down, show when scroll up
let lastScrollTop = 0;

window.addEventListener('scroll', function () {
    let currentScroll = document.documentElement.scrollTop;

    if (currentScroll > lastScrollTop) {
        nav.style.position = 'absolute';
    } else {
        nav.style.position = 'fixed';
    }

    lastScrollTop = currentScroll;
});

// Fonction pour vérifier si une partie de l'élément est visible dans la fenêtre
function isElementPartiallyInViewport(el) {
    const rect = el.getBoundingClientRect();
    return (
        rect.top < (window.innerHeight || document.documentElement.clientHeight) &&
        rect.bottom > 0
    );
}

// Fonction pour gérer l'état des éléments au défilement
function handleScroll() {
    // Sélectionner les éléments avec les classes project_slide et project_slide_reverse
    const elements = document.querySelectorAll('.project_slide, .project_slide_reverse');
    elements.forEach(el => {
        if (isElementPartiallyInViewport(el)) {
            el.classList.add('slide-in'); // Ajoute la classe pour afficher l'élément
        } else {
            el.classList.remove('slide-in'); // Retire la classe pour cacher l'élément
        }
    });
}

// Lancer la vérification lors du scroll
window.addEventListener('scroll', handleScroll);

// Vérifier immédiatement au chargement de la page
window.addEventListener('DOMContentLoaded', handleScroll);
