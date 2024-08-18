/* BURGER MENU */
let menuBurger = document.getElementById('burger'); // LE MENU EN LUI MEME > BALISE <ul>
let menuBurgerButton = document.getElementById('burgerButton'); // LE BOUTON POUR OUVRIR LE BURGER

if (menuBurgerButton) { // ON VERIFIE LA PRESENCE DU BOUTON POUR EVITER LES ERREURS DE JS
    menuBurgerButton.addEventListener('click', openMenu);
}

/*Fonction openMenu*/
function openMenu() {
    menuBurger.classList.add('scrolled');
    if (menuBurger.style.display != "flex") {
        menuBurger.style.display = "flex";
        menuBurgerButton.style.display = "none";
    }
}

function refreshWindowWidth() {
    windowWidth = window.innerWidth;
}

setInterval(refreshWindowWidth, 100);
/* Ecoute du click sur la page pour fermer le menu si l'utilisateur clique en dehors */
let menuHeight = 150; //TEMP
document.addEventListener('click', function (event) {
    if (event.clientY > menuHeight && windowWidth <= 768) { // SI L'UTILISATEUR CLIQUE A UNE HAUTEUR SUPERIEURE A CELLE DU BURGER
        closeMenu();
    }
});

/*Fonction closeMenu*/
function closeMenu() {
    menuBurger.style.display = "none";
    menuBurgerButton.style.display = "flex";
}


/* BACK OFFICE - EDIT PRODUCT */
/*AFFICHER OU MASQUER INPUT FILE SELON EDIT IMAGE OU NON*/
document.querySelectorAll('.edit_image').forEach(el => el.style.display = "none");

let checkboxEditImage = document.getElementById('helper-checkbox');
if (checkboxEditImage) {
    checkboxEditImage.addEventListener('change', displayEditImageElements);
}

function displayEditImageElements() {
    let displayStyle = checkboxEditImage.checked ? "flex" : "none";
    document.querySelectorAll('.edit_image').forEach(el => el.style.display = displayStyle);
}

/*BACK OFFICE DELETE CONFIRMATION*/
// Sélectionner tous les boutons de suppression
let deleteButtons = document.querySelectorAll('.deleteButton');

// Sélectionner tous les boutons de confirmation de suppression
let deleteConfirmationButtons = document.querySelectorAll('.deleteConfirmationButton');

if (deleteButtons) {
    // Parcourir tous les boutons de suppression
    deleteButtons.forEach((deleteButton, index) => {
        // Ajouter un écouteur d'événement pour le clic sur chaque bouton de suppression
        deleteButton.addEventListener('click', () => {
            // Masquer le bouton de confirmation de suppression correspondant
            if (deleteConfirmationButtons[index]) {
                deleteButtons[index].style.display = 'none';
                deleteConfirmationButtons[index].style.display = 'inline';
            }
        });
    });
}

/* SLIDER HIGHLIGHTS */
let highlightsProducts = document.querySelectorAll('.highlights_products');
let autoProductInterval;
let nextArrow = document.getElementById('right_arrow');
if (nextArrow) { nextArrow.addEventListener('click', nextProduct) }
let prevArrow = document.getElementById('left_arrow');
if (prevArrow) { prevArrow.addEventListener('click', prevProduct) }

if (highlightsProducts) {
    highlightsProducts.forEach((product, index) => {
        if (index !== 0) {
            product.classList.add("opacityDown");
        }
    });
}
let index = 0;
function nextProduct() {
    highlightsProducts[index].classList.remove("opacityUp");
    highlightsProducts[index].classList.add("opacityDown");
    index++;
    if (index === highlightsProducts.length) { index = 0; }
    highlightsProducts[index].classList.remove("opacityDown");
    highlightsProducts[index].classList.add("opacityUp");
    clearInterval(autoProductInterval);
    autoProductInterval = setInterval(nextProduct, 3000);
}

function prevProduct() {
    highlightsProducts[index].classList.remove("opacityUp");
    highlightsProducts[index].classList.add("opacityDown");
    if (index === 0) { index = highlightsProducts.length - 1; }
    else { index--; }

    highlightsProducts[index].classList.remove("opacityDown");
    highlightsProducts[index].classList.add("opacityUp");
    clearInterval(autoProductInterval);
    autoProductInterval = setInterval(nextProduct, 3000);
}
/*AUTO SLIDE*/
function autoNextProduct() {
    autoProductInterval = setInterval(nextProduct, 3000);
}
if (highlightsProducts.length > 0) {
    autoNextProduct();
}

/* DISPLAY CATEGORIES */
let categoriesButtons = document.querySelectorAll('.categoryButton');
if (categoriesButtons) {
    // Parcourir tous les boutons
    categoriesButtons.forEach((categoriesButton, index) => {
        // Ajouter un écouteur d'événement pour le clic sur chaque bouton
        categoriesButton.addEventListener('click', () => {
            console.log('click');

            // Récupérer l'ID du bouton cliqué
            let buttonId = categoriesButton.id;
            // Construire l'ID de la div correspondante
            let divId = buttonId + '2';
            // Sélectionner la div correspondante
            let targetDiv = document.getElementById(divId);
            // Masquer toutes les divs de catégories
            document.querySelectorAll('.categoryDiv').forEach(div => {
                div.querySelectorAll('.displayedProduct').forEach(product => {
                    product.classList.remove('displayedProduct');
                    product.classList.add('hiddenProduct'); // Réinitialiser l'état des produits
                });
                div.style.display = 'none';
            });
            // Afficher la div correspondante et faire défiler vers elle
            if (targetDiv) {
                targetDiv.style.display = 'block';
                // Utiliser un léger délai pour permettre au navigateur de reconnaître les changements
                setTimeout(() => {
                    displayProducts(targetDiv);
                }, 50);

                if (window.innerWidth <= 768) {
                    targetDiv.scrollIntoView({ behavior: 'smooth' });
                }
            }
        });
    });
}

/* DISPLAY PRODUCT */

function displayProducts(targetDiv) {
    console.log('display product');
    let gap = 0.2;
    let base = 0.2;

    let productsToBeDisplayed = targetDiv.querySelectorAll('.hiddenProduct');
    productsToBeDisplayed.forEach(product => {
        let currentGap = gap; // Capture la valeur actuelle de gap

        // Utiliser setTimeout pour permettre au navigateur de peindre la nouvelle position avant de déclencher la transition
        setTimeout(() => {
            product.style.transition = "transform " + (base + currentGap) + "s";
            product.classList.remove('hiddenProduct');
            product.classList.add('displayedProduct'); // Appliquer la transformation pour l'animation
        }, 50); // Délai léger pour forcer le reflow

        gap += 0.2;
    });
}


/* SCROLL BACKGROUND */
// JavaScript to add the 'scrolled' class on scroll
document.addEventListener('scroll', () => {

    if (window.innerWidth <= 768) {
        menuBurger.classList.add('scrolled');
    } else if (window.scrollY > 0 && window.innerWidth > 768) {
        menuBurger.classList.add('scrolled');
    } else {
        menuBurger.classList.remove('scrolled');
    }
});