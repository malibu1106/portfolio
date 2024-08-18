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

    } else {
        menuBurger.classList.remove('burger_hidden');
        menuBurger.classList.add('burger_show');
        menuBurgerButton.innerHTML = "X";

    }
}

/* Dark/Light mode switcher */
let themeToggle = document.getElementById('themeToggle');

function toggleTheme() {
    const body = document.body;
    if (document.documentElement.getAttribute('data-theme') === 'theme-dark') {
        document.documentElement.removeAttribute('data-theme');
        themeToggle.src = "img/dark-mode.png"
        themeToggle.alt = "dark mode button"

    } else {
        document.documentElement.setAttribute('data-theme', 'theme-dark');
        themeToggle.src = "img/light-mode.png"
        themeToggle.alt = "light mode button"
    }
}

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

    document.title = translations[langKey].title;
}

// Fonction pour changer la langue
async function switchLanguage() {
    if (language === 'french') {
        language = 'english';
        languageSwitcher.src = 'img/french_flag.svg';
        languageSwitcher.alt = 'French language settings button';
    } else {
        language = 'french';
        languageSwitcher.src = 'img/english_flag.svg';
        languageSwitcher.alt = 'English language settings button';
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