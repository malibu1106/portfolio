// ON SCROLL BORDER
window.onscroll = function () {
    // Vérifie si l'utilisateur a fait défiler au moins 1 pixel vers le bas
    if (window.scrollY > 0) {
        // Si oui, affichez votre contenu ici
        document.getElementsByTagName('header')[0].style.borderBottom = "solid rgb(59, 57, 57) 1px";
    } else {
        // Sinon, cachez le contenu si nécessaire
        document.getElementsByTagName('header')[0].style.borderBottom = "none";
    }
};

// MENU BURGER
let iconeMenuBurger = document.getElementById('burger-button');
iconeMenuBurger.addEventListener("click", showOrHideBurgerMenu);

let menuBurger = document.getElementById('menu-petit');

function showOrHideBurgerMenu() {
    document.body.className = "";
    if (document.getElementById('zone-login').style.display !== "block") {



        if (menuBurger.style.display == "none") {
            menuBurger.style.display = "block";
            menuBurger.classList.replace("menu-petit-cache", "menu-petit-visible");
            iconeMenuBurger.style.transform = "rotate(90deg)";


        }
        else {
            menuBurger.style.display = "none";
            menuBurger.classList.replace("menu-petit-visible", "menu-petit-cache");
            iconeMenuBurger.style.transform = "rotate(0deg)";

        }

    }
}


// LOGIN ZONE

function showOrHideLoginZone() {
    if (loggedIn === false) {
        if (document.getElementById('zone-login').style.display == "block") {
            document.getElementById('zone-login').style.display = "none";
        }
        else { document.getElementById('zone-login').style.display = "block" }

        if (menuBurger.classList == "menu-petit-visible") {
            menuBurger.classList.replace("menu-petit-visible", "menu-petit-cache");
            iconeMenuBurger.style.transform = "rotate(0deg)";
        }
    }
}
let loggedIn = false;
function login() {

    if (loggedIn === false) {
        loggedIn = true;
        let pseudoZone = document.getElementById('btn-login');
        let pseudo = document.getElementById('pseudologin').value;
        pseudoZone.innerHTML = "Bonjour " + pseudo + " !";
        document.getElementById('zone-login').style.display = "none";
    }
}



// PRO ZONE


let zoneProPromo = document.getElementById('zone-pro-promo');
let zoneProPromoCheckBox = document.getElementById('promoCheckbox');
if (zoneProPromoCheckBox) {
    zoneProPromoCheckBox.addEventListener("change", showOrHideZoneProPromo)
}
function showOrHideZoneProPromo() {
    if (zoneProPromo.style.display == "block") {
        zoneProPromo.style.display = "none";
    }
    else { zoneProPromo.style.display = "block" }

}

let blocParaSelector = document.getElementsByClassName('zone-pro-add-voyage-bloc-para');
let buttonBlocParaSelection = document.getElementsByClassName('ajouterPara');
let buttonRemoveBlocParaSelection = document.getElementsByClassName('retirerPara');

let paraIndex = 0;
if (blocParaSelector.length > 0) {
    buttonBlocParaSelection[paraIndex].addEventListener("click", displayNextPara)
    blocParaSelector[paraIndex].style.display = "block";
}

function displayNextPara() {
    if (paraIndex > 0) {
        buttonRemoveBlocParaSelection[paraIndex - 1].style.display = "none";
    }
    paraIndex++;
    blocParaSelector[paraIndex].style.display = "block";
    buttonBlocParaSelection[paraIndex - 1].style.display = "none";
    console.log(paraIndex)
    if (paraIndex < 3) {
        buttonBlocParaSelection[paraIndex].addEventListener("click", displayNextPara);
    }
    buttonRemoveBlocParaSelection[paraIndex - 1].addEventListener("click", removeThisPara);
}

function removeThisPara() {
    paraIndex--;
    blocParaSelector[paraIndex + 1].style.display = "none";
    buttonBlocParaSelection[paraIndex].style.display = "block";
    if (paraIndex > 0) {
        buttonRemoveBlocParaSelection[paraIndex - 1].style.display = "block";
    }
    if (paraIndex < 4) {
        buttonRemoveBlocParaSelection[paraIndex].addEventListener("click", removeThisPara);
        buttonBlocParaSelection[paraIndex].addEventListener("click", displayNextPara);
    }

}



// RECHERCHE MASQUEE
let rechercheMobile = document.getElementById('recherche-voyage-mobile');
let rechercheMobileCachee = document.getElementById('recherche-cachee');

if (rechercheMobile) {
    rechercheMobile.addEventListener("click", showMobileSearch);
}



function showMobileSearch() {
    rechercheMobile.classList.replace("recherche-voyage-mobile-fermee", "recherche-voyage-mobile-ouverte");
    rechercheMobileCachee.style.display = "block";
    document.getElementById('trouver-mon-voyage').style.display = "none";
    let closeSearchIcon = document.getElementById('close-search-mobile-icon');
    rechercheMobile.removeEventListener("click", showMobileSearch, false);
    closeSearchIcon.addEventListener("click", hideMobileSearch);

}

function hideMobileSearch() {
    rechercheMobile.classList.replace("recherche-voyage-mobile-ouverte", "recherche-voyage-mobile-fermee");
    rechercheMobileCachee.style.display = "none";
    document.getElementById('trouver-mon-voyage').style.display = "flex";
    rechercheMobile.addEventListener("click", showMobileSearch, true);

}

// CALCUL DU PRIX

let dureeSejourInputs = document.getElementsByClassName('durée-sejour');
let nombrePersonnesInputs = document.getElementsByClassName('nb-personnes');
let prixSejourElements = document.getElementsByClassName('prix-reservation-voyage');
let prixIndex = [];

for (let i = 0; i < prixSejourElements.length; i++) {
    prixSejourElements[i].innerHTML += '€';
}

if (dureeSejourInputs.length > 0) {
    for (let i = 0; i < dureeSejourInputs.length; i++) {
        prixIndex[i] = parseFloat(prixSejourElements[i].innerHTML);
        dureeSejourInputs[i].addEventListener("change", function () {
            updatePrix(i);
        });
        nombrePersonnesInputs[i].addEventListener("change", function () {
            updatePrix(i);
        });
    }
}

function updatePrix(index) {
    let dureeSejourValue = parseFloat(dureeSejourInputs[index].value);
    let nombrePersonnesValue = parseFloat(nombrePersonnesInputs[index].value);
    let prixSejour = prixIndex[index];

    prixSejourElements[index].innerHTML = (dureeSejourValue * nombrePersonnesValue * prixSejour) + '€';
}








// BACKGROUND REGIONS

let sectionRegion = document.getElementById('background-regions');
let backgroundIndex = 0;
let regions = ["auvergne", "bourgogne", "bretagne", "centre", "corse", "grandest", "hdf", "idf", "normandie", "aquitaine", "occitanie", "loire", "paca"];
let titreRegions = ["L'Auvergne", "La Bourgogne", "La Bretagne", "Le Centre-Val de Loire", "La Corse", "Le Grand Est", "Les Hauts-de-France", "L'Île-de-France", "La Normandie", "La Nouvelle-Aquitaine", "L'Occitanie", "Les Pays de la Loire", "La Provence-Alpes-Côté d'Azur"];
let texteRegions = ["Laissez-vous séduire par la beauté brute des volcans endormis et des vastes étendues verdoyantes de l'Auvergne, une région où la nature règne en maître.",
    "Vivez l'art de vivre à la bourguignonne en déambulant dans les ruelles médiévales des villes historiques et en dégustant les délices culinaires de cette région emblématique.",
    "Embarquez pour un voyage au cœur de la Bretagne, où les falaises escarpées, les plages de sable fin et les légendes celtiques vous transportent dans un monde de mystère et de magie.",
    "Explorez la douceur de vivre du Centre-Val de Loire, entre vignobles renommés, villages pittoresques et forêts mystérieuses. Ici, vivre est une véritable expression d'harmonie.",
    "Partez à la découverte de la Corse, une île aux mille visages, où l'authenticité des traditions corses se mêle à la splendeur des plages de sable fin et des eaux cristallines.",
    "Découvrez la magie du Grand Est, une terre d'accueil où les traditions ancestrales se perpétuent et où la gastronomie raffinée se marie à la convivialité légendaire.",
    "Explorez les trésors cachés des Hauts-de-France, entre cités fortifiées, vastes plages de sable fin et traditions ancestrales, une région où chaque coin recèle des merveilles à découvrir.",
    "Découvrez la diversité des visages de l'Île-de-France, entre art de vivre urbain et espaces naturels préservés, offrant aux voyageurs une expérience contrastée et captivante.",
    "Explorez les paysages envoûtants de la Normandie, entre plages immenses, villages authentiques et vestiges médiévaux, une région où l'art de vivre prend tout son sens au rythme des marées.",
    "Découvrez la Nouvelle-Aquitaine, une terre d'aventure et de contrastes, où la convivialité du sud-ouest se mêle à la douceur de vivre des régions côtières, promettant une escapade inoubliable.",
    "Embarquez pour un voyage envoûtant au cœur de l'Occitanie, où les vignobles infinis, les cités médiévales et les paysages préservés vous transportent dans un univers de raffinement et de dépaysement.",
    "Plongez dans la douceur de vivre des Pays de la Loire, où les châteaux majestueux, les jardins luxuriants et les bords de Loire paisibles vous invitent à une escapade hors du temps.",
    "Embarquez pour un voyage sensoriel en Provence-Alpes-Côte d'Azur, où les champs de lavande parfumés, les sommets enneigés des Alpes et les eaux scintillantes de la Méditerranée vous offrent un spectacle époustouflant à chaque tournant."];
let zoneCarteRegions = document.getElementById('carte-region-img');
let zoneTitreRegion = document.getElementById('titre-region');
let zoneTexteRegion = document.getElementById('texte-region');
let lienRegion = document.getElementById('lienRegion');
let autoRegionInterval; // Déclarez une variable globale pour stocker l'ID de l'intervalle

function nextRegion() {
    if (backgroundIndex < regions.length - 1) {
        backgroundIndex++;
    } else {
        backgroundIndex = 0;
    }
    let regionBackground = `url("img/regions/${regions[backgroundIndex]}.jpg")`;
    let carteRegionBackground = `img/regions/cartefr/carte-${regions[backgroundIndex]}.png`;
    sectionRegion.style.backgroundImage = regionBackground;
    zoneCarteRegions.src = carteRegionBackground;
    zoneTitreRegion.innerHTML = titreRegions[backgroundIndex];
    zoneTexteRegion.innerHTML = texteRegions[backgroundIndex];
    lienRegion.href = `index.php?region=${regions[backgroundIndex]}`;
    clearInterval(autoRegionInterval);
    autoRegionInterval = setInterval(nextRegion, 4000);
}

function prevRegion() {
    if (backgroundIndex == 0) {
        backgroundIndex = 12;
    } else {
        backgroundIndex--;
    }
    let regionBackground = `url("img/regions/${regions[backgroundIndex]}.jpg")`;
    let carteRegionBackground = `img/regions/cartefr/carte-${regions[backgroundIndex]}.png`;
    sectionRegion.style.backgroundImage = regionBackground;
    zoneCarteRegions.src = carteRegionBackground;
    zoneTitreRegion.innerHTML = titreRegions[backgroundIndex];
    zoneTexteRegion.innerHTML = texteRegions[backgroundIndex];
    clearInterval(autoRegionInterval);
    autoRegionInterval = setInterval(nextRegion, 4000);
}

function autoNextRegion() {
    autoRegionInterval = setInterval(nextRegion, 4000);
}
if (sectionRegion) {
    autoNextRegion();
}

// RECHERCHE FILTREE
let searchRegion = document.getElementById('regions');
if (searchRegion) {
    document.getElementById('regions').addEventListener('change', function () {
        let selectedRegion = this.value;
        let enviesDropdown = document.getElementById('envies');
        let enviesOptions = enviesDropdown.options;


        for (let i = 0; i < enviesOptions.length; i++) {
            let envie = enviesOptions[i];
            let envieValue = envie.value;


            envie.style.display = 'none';


            if (isEnvieAvailableInRegion(envieValue, selectedRegion)) {
                envie.style.display = 'block';
            }
        }
        pushResearchLink();
    });
}

let enviesDisponiblesParRegion = {
    'allregions': ['allenvies', 'sommets', 'bienetre', 'marine', 'gourmande', 'harmonie', 'plage', 'sentiers', 'sport', 'culture', 'eco'],
    'auvergne': ['allenvies', 'bienetre', 'sport'],
    'bourgogne': ['allenvies', 'gourmande', 'eco'],
    'bretagne': ['allenvies', 'marine', 'culture'],
    'centre': ['allenvies', 'harmonie', 'culture'],
    'corse': ['allenvies', 'plage', 'sentiers'],
    'grandest': ['allenvies', 'gourmande', 'harmonie', 'culture'],
    'hdf': ['allenvies', 'marine', 'sport'],
    'idf': ['allenvies', 'culture', 'eco'],
    'normandie': ['allenvies', 'bienetre', 'eco'],
    'aquitaine': ['allenvies', 'sentiers', 'culture'],
    'occitanie': ['allenvies', 'sommets', 'sport'],
    'loire': ['allenvies', 'harmonie', 'eco'],
    'paca': ['allenvies', 'sommets', 'plage']
};


function isEnvieAvailableInRegion(envie, region) {

    return enviesDisponiblesParRegion[region].includes(envie);

}
let searchEnvie = document.getElementById('envies');
if (searchEnvie) {
    document.getElementById('envies').addEventListener('change', function () {
        let selectedEnvie = this.value;
        let regionsDropdown = document.getElementById('regions');
        let regionsOptions = regionsDropdown.options;


        for (let i = 0; i < regionsOptions.length; i++) {
            let region = regionsOptions[i];
            let regionValue = region.value;


            region.style.display = 'none';


            if (isRegionAvailableForEnvie(selectedEnvie, regionValue)) {
                region.style.display = 'block';
            }
        }

    }
    );
}

function isRegionAvailableForEnvie(envie, region) {
    let regionsDisponiblesParEnvie = {};

    for (const [regionKey, envies] of Object.entries(enviesDisponiblesParRegion)) {
        if (envies.includes(envie)) {
            regionsDisponiblesParEnvie[regionKey] = true;
        }
    }

    // Mettre à jour les options des régions et appeler pushResearchLink une seule fois
    pushResearchLink();

    return regionsDisponiblesParEnvie[region];
}

function pushResearchLink() {
    searchIcon = document.getElementById('search-mobile-icon');
    if (searchIcon) {
        document.getElementById('search-mobile-icon').addEventListener('click', function () {

            let selectedRegion = document.getElementById('regions').value;
            let selectedEnvie = document.getElementById('envies').value;
            let lien;

            if (selectedEnvie === "allenvies" && selectedRegion === "allregions") {
                alert("Selectionnez au moins une région ou une envie")
            }
            else if (selectedEnvie === "allenvies" && selectedRegion != "allregions") {
                lien = 'index.php?region=' + selectedRegion;
                document.getElementById('researchLink').href = lien;
            }
            else if (selectedEnvie != "allenvies" && selectedRegion === "allregions") {
                lien = 'index.php?envie=' + selectedEnvie;
                document.getElementById('researchLink').href = lien;
            }
            else if (selectedEnvie != "allenvies" && selectedRegion != "allregions") {
                lien = 'index.php?region=' + selectedRegion + '&envie=' + selectedEnvie;
                document.getElementById('researchLink').href = lien;
            }
            else { alert('Erreur dans la recherche') }


        });
    }

}

pushResearchLink();
