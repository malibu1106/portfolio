<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <script defer="" src="js/script.js"></script>
    <link href="css/style.css" rel="stylesheet" />
    <title>Malibu</title>
</head>

<body>
    <header>
        <nav id="full_nav">
            <div class="nav_div nav_avatar">
            </div>
            <div class="nav_div nav_menu">
                <span id="menu_burger_button">☰</span>
                <ul class="menu_buttons_desktop">
                    <li><a data-translate="bouton_home" href="#">Accueil</a></li>
                    <li><a data-translate="bouton_profile" href="index.php#profile">Profil</a></li>
                    <li><a data-translate="bouton_skills" href="index.php#skills">Compétences</a></li>
                    <li><a href="index.php#portfolio">Portfolio</a></li>
                    <li><a href="index.php#contact">Contact</a></li>
                </ul>
            </div>
            <div class="nav_div nav_settings">
                <img alt="dark mode button" id="themeToggle" loading="lazy" src="img/dark-mode.png" />
                <img alt="english language settings button" id="language_switcher_button" loading="lazy"
                    src="img/english_flag.svg" />
            </div>
            <div class="burger_hidden" id="burger_menu">
                <ul class="menu_buttons_mobile">
                    <li><a data-translate="bouton_home" href="#" onclick="menuBurgerSwitcher()">Accueil</a></li>
                    <li><a data-translate="bouton_profile" href="index.php#profile"
                            onclick="menuBurgerSwitcher()">Profil</a></li>
                    <li><a data-translate="bouton_skills" href="index.php#skills"
                            onclick="menuBurgerSwitcher()">Compétences</a></li>
                    <li><a href="index.php#portfolio" onclick="menuBurgerSwitcher()">Portfolio</a></li>
                    <li><a href="index.php#contact" onclick="menuBurgerSwitcher()">Contact</a></li>
                </ul>
            </div>
        </nav>
    </header>
    <a href="#">
        <div id="arrow"></div>
    </a>
    <section class="home">
        <h1 class="opacity_anim" data-translate="title_home">Roberto De Sousa</h1>
        <h2 data-translate="description_home">Développeur Web FullStack- Intégrateur</h2>
        <a href="#profile"><button data-translate="whoiam">Qui suis-je?</button></a>
    </section>
    <section class="profile anchor" id="profile">
        <h1 data-translate="titre_profile">A propos de moi</h1>
        <div class="profile_container">
            <img alt="Photo de présentation" loading="lazy" src="img/profile.png" />
            <span>
                <p data-translate="description_profile">Je m'appelle Roberto De Sousa. Avant de me lancer pleinement
                    dans le développement web, j'ai travaillé dans différents secteurs du commerce, où j'ai acquis des
                    compétences en gestion, en stratégie et en relation client. Parallèlement, ma passion pour la
                    programmation m'a conduit à créer des sites et des jeux en autodidacte, autant pour le plaisir
                    d'apprendre que pour répondre aux besoins de quelques clients.</p>
                <p data-translate="description_profile_middle">Pour formaliser mes compétences, j'ai suivi une formation
                    en Développement Web et Web Mobile, équivalente à un Bac+2, avec Online Forma Pro. Aujourd'hui,
                    alors que je termine cette formation, je suis prêt à entamer une nouvelle étape de ma carrière. Ce
                    qui me motive, c'est de réaliser des projets sur mesure qui aident les autres à développer leur
                    activité.</p>
                <p data-translate="description_profile_end">Bien que j'aie une préférence pour le back-end, j'éprouve
                    une véritable passion pour le JavaScript, en particulier dans la création de petits jeux. À
                    l'avenir, j'ambitionne de créer un site avec une collection de jeux old school, ainsi qu'un site
                    dédié au poker, comprenant des outils comme la gestion de portefeuille, des vidéos, du coaching, et
                    des fonctionnalités pour les passionnés.</p>
            </span>
        </div>
    </section>
    <section class="skills anchor p12" id="skills">
        <h1 data-translate="bouton_skills">Compétences</h1>
        <p class="p_description" data-translate="description_skills">Elles évoluent constamment, car la beauté de ce
            métier réside dans l'apprentissage continu, surtout lorsque l'on est curieux et passionné.</p>
        <div class="skills_container">
            <div class="skills_details">
                <figure class="skills_logo">
                    <img alt="logo html" loading="lazy" src="img/logos/html.png" />
                    <figcaption>HTML</figcaption>
                </figure>
                <figure class="skills_logo">
                    <img alt="logo css" loading="lazy" src="img/logos/css.png" />
                    <figcaption>CSS</figcaption>
                </figure>
                <figure class="skills_logo">
                    <img alt="logo javascript" loading="lazy" src="img/logos/javascript.png" />
                    <figcaption>JS</figcaption>
                </figure>
                <figure class="skills_logo">
                    <img alt="logo php" loading="lazy" src="img/logos/php.png" />
                    <figcaption>PHP</figcaption>
                </figure>
                <figure class="skills_logo">
                    <img alt="logo mysql" loading="lazy" src="img/logos/mysql.png" />
                    <figcaption>My SQL</figcaption>
                </figure>
                <figure class="skills_logo">
                    <img alt="logo python" loading="lazy" src="img/logos/python.png" />
                    <figcaption>Python</figcaption>
                </figure>
                <figure class="skills_logo">
                    <img alt="logo bootstrap" loading="lazy" src="img/logos/bootstrap.png" />
                    <figcaption>Bootstrap</figcaption>
                </figure>
                <figure class="skills_logo">
                    <img alt="logo tailwind" loading="lazy" src="img/logos/tailwind.png" />
                    <figcaption>Tailwind</figcaption>
                </figure>
                <figure class="skills_logo">
                    <img alt="logo aws" loading="lazy" src="img/logos/aws.png" />
                    <figcaption>AWS</figcaption>
                </figure>
            </div>
            <div class="skills_cv">
                <a href="docs/CV_Roberto_De Sousa.pdf" target="_blank"><img alt="CV de Roberto De Sousa" id="cv_image"
                        loading="lazy" src="img/cv.png" /></a>
                <button alt="Télécharger le CV">
                    <a data-translate="download_resume" download="" href="docs/CV_Roberto_De Sousa.pdf">
                        Télécharger mon CV
                    </a>
                </button>
            </div>
        </div>
    </section>
    <section class="portfolio anchor p12" id="portfolio">
        <h1 data-translate="portfolio_title">Portfolio</h1>
        <p class="p_description" data-translate="portfolio_description">Ci-dessous, quelques exemples de réalisations
            effectuées durant la formation, le stage et plus encore :</p>
        <div class="portfolio_container">
            <h2 class="project_title anchor project_slide" id="jadoo">Jadoo</h2>
            <article class="project border">
                <div class="figure_links">
                    <figure class="project_slide">
                        <a href="projects.php?project=jadoo">
                            <img alt="Image du projet jadoo" loading="lazy" src="projects/jadoo.png" /></a>
                    </figure>
                    <div class="project_links_container project_slide_reverse">
                        <div class="project_links_block">
                            <div class="project_links_logo local">
                            </div>
                            <p><a data-translate="see_project" href="projects.php?project=jadoo">Voir le projet</a></p>
                        </div>
                        <div class="project_links_block">
                            <div class="project_links_logo github">
                            </div>
                            <p><a data-translate="see_github" href="https://github.com/malibu1106/html-css-jadoo">Voir
                                    le github</a></p>
                        </div>
                    </div>
                </div>
                <div class="project_details">
                    <h3 class="project_links project_slide" data-translate="used_languages">Langages utilisés</h3>
                    <p class="project_slide_reverse">CSS</p>
                    <div class="progress-bar project_slide">
                        <div class="progress project_slide" style="width: 50%;"></div>
                    </div>
                    <p class="project_slide_reverse">HTML</p>
                    <div class="progress-bar project_slide">
                        <div class="progress project_slide" style="width: 44%;"></div>
                    </div>
                    <p class="project_slide_reverse">JS</p>
                    <div class="progress-bar project_slide">
                        <div class="progress project_slide" style="width: 6%;"></div>
                    </div>
                    <h3 class="project_links project_slide" data-translate="info">Informations</h3>
                    <ul>
                        <li class="project_slide_reverse" data-translate="training_project">Projet de formation</li>
                        <li class="project_slide_reverse" data-translate="jadoo_info_2">Réalisé depuis une maquette
                            complète
                        </li>
                        <li class="project_slide_reverse" data-translate="jadoo_info_3">Animations majoritairement en
                            CSS</li>
                        <li class="project_slide_reverse" data-translate="jadoo_info_4">Menu burger et quelques
                            animations en
                            JS</li>
                        <li class="project_slide_reverse">Responsive</li>
                    </ul>
                </div>
            </article>
            <h2 class="project_title anchor project_slide" id="projet-voyage">Bleu Blanc Bouge</h2>
            <article class="project anchor border">
                <div class="figure_links">
                    <figure class="project_slide">
                        <a href="projects.php?project=projet-voyage">
                            <img alt="Image du projet Bleu Blanc Bouge" loading="lazy"
                                src="projects/bleu-blanc-bouge.png" />
                        </a>
                    </figure>
                    <div class="project_links_container project_slide_reverse">
                        <div class="project_links_block">
                            <div class="project_links_logo local">
                            </div>
                            <p><a data-translate="see_project" href="projects.php?project=projet-voyage">Voir le
                                    projet</a></p>
                        </div>
                        <div class="project_links_block">
                            <div class="project_links_logo github">
                            </div>
                            <p><a data-translate="see_github"
                                    href="https://github.com/malibu1106/projet-voyage-fab-roberto">Voir le github</a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="project_details">
                    <h3 class="project_links project_slide" data-translate="used_languages">Langages utilisés</h3>
                    <p class="project_slide_reverse">HTML</p>
                    <div class="progress-bar project_slide">
                        <div class="progress" style="width: 40%;"></div>
                    </div>
                    <p class="project_slide_reverse">PHP</p>
                    <div class="progress-bar project_slide">
                        <div class="progress" style="width: 40%;"></div>
                    </div>
                    <p class="project_slide_reverse">CSS</p>
                    <div class="progress-bar project_slide">
                        <div class="progress" style="width: 12%;"></div>
                    </div>
                    <p class="project_slide_reverse">JS</p>
                    <div class="progress-bar project_slide">
                        <div class="progress" style="width: 8%;"></div>
                    </div>
                    <h3 class="project_links project_slide" data-translate="info">Informations</h3>
                    <ul>
                        <li class="project_slide_reverse" data-translate="training_project">Projet de formation</li>
                        <li class="project_slide_reverse" data-translate="bbb_info_2">Réalisation de la maquette &amp;
                            du
                            site</li>
                        <li class="project_slide_reverse" data-translate="bbb_info_3">Recherche filtrée en JS</li>
                        <li class="project_slide_reverse" data-translate="bbb_info_4">Back-office full PHP</li>
                        <li class="project_slide_reverse">Responsive</li>
                    </ul>
                    <h3 class="project_links project_slide">Collaboration</h3>
                    <ul>
                        <li class="project_slide_reverse"><span data-translate="design_help">Aide pour le design</span>
                            : <a href="#"><strong>cy-fa</strong></a></li>
                    </ul>
                </div>
            </article>
            <h2 class="project_title anchor project_slide" id="infinitea">InfiniTea</h2>
            <article class="project anchor border">
                <div class="figure_links">
                    <figure class="project_slide">
                        <a href="projects/infinitea/">
                            <img alt="Image du projet Infinitea" loading="lazy" src="projects/infinitea.png" />
                        </a>
                    </figure>
                    <div class="project_links_container project_slide_reverse">
                        <div class="project_links_block">
                            <div class="project_links_logo local">
                            </div>
                            <p><a data-translate="see_project" href="projects/infinitea/">Voir le projet</a></p>
                        </div>
                        <div class="project_links_block">
                            <div class="project_links_logo github">
                            </div>
                            <p><a data-translate="see_github" href="https://github.com/malibu1106/InfiniTea">Voir le
                                    github</a></p>
                        </div>
                    </div>
                    <p class="project_slide_reverse" data-translate="infos_infinitea">
                        Utilisez ces identifiants pour voir toutes les fonctionnalités</p><br />
                    <p class="project_slide_reverse">ID : superuser@infinitea.com<br />
                        PSWD : superuser</p>
                </div>
                <div class="project_details">
                    <h3 class="project_links project_slide" data-translate="used_languages">Langages utilisés</h3>
                    <p class="project_slide_reverse">PHP - SQL</p>
                    <div class="progress-bar project_slide">
                        <div class="progress" style="width: 45%;"></div>
                    </div>
                    <p class="project_slide_reverse">HTML - Tailwind</p>
                    <div class="progress-bar project_slide">
                        <div class="progress" style="width: 40%;"></div>
                    </div>
                    <p class="project_slide_reverse">JS</p>
                    <div class="progress-bar project_slide">
                        <div class="progress" style="width: 10%;"></div>
                    </div>
                    <p class="project_slide_reverse">CSS</p>
                    <div class="progress-bar project_slide">
                        <div class="progress" style="width: 5%;"></div>
                    </div>
                    <h3 class="project_links project_slide" data-translate="info">Informations</h3>
                    <ul>
                        <li class="project_slide_reverse" data-translate="training_project">Projet de formation</li>
                        <li class="project_slide_reverse" data-translate="cart_management">Gestion de panier</li>
                        <li class="project_slide_reverse" data-translate="product_management">Gestion des produits</li>
                        <li class="project_slide_reverse" data-translate="order_management">Gestion des commandes</li>
                        <li class="project_slide_reverse" data-translate="user_management">Gestion des utilisateurs
                        </li>
                        <li class="project_slide_reverse" data-translate="">Responsive</li>
                    </ul>
                    <h3 class="project_links project_slide">Collaboration</h3>
                    <ul>
                        <li class="project_slide_reverse"><span data-translate="infinitea_collab">Design et choix des
                                ressources</span> <span data-translate="by">par</span> <a
                                href="https://github.com/mathildejrdn"><strong>Mathilde Jourden</strong></a></li>
                        <li class="project_slide_reverse">HTML-Tailwind <span data-translate="by">par</span> <a
                                href="https://github.com/mathildejrdn"><strong>Mathilde Jourden</strong></a></li>
                    </ul>
                </div>
            </article>
            <h2 class="project_title anchor project_slide" id="color-simon">Color Memo</h2>
            <article class="project anchor border">
                <div class="figure_links">
                    <figure class="project_slide">
                        <a href="projects.php?project=color-simon">
                            <img alt="Image du projet Color Memo" loading="lazy" src="projects/color-simon.png" />
                        </a>
                    </figure>
                    <div class="project_links_container project_slide_reverse">
                        <div class="project_links_block">
                            <div class="project_links_logo local">
                            </div>
                            <p><a data-translate="see_project" href="projects.php?project=color-simon">Voir le
                                    projet</a></p>
                        </div>
                        <div class="project_links_block">
                            <div class="project_links_logo github">
                            </div>
                            <p><a data-translate="see_github" href="https://github.com/malibu1106/js-color-simon">Voir
                                    le github</a></p>
                        </div>
                    </div>
                </div>
                <div class="project_details">
                    <h3 class="project_links project_slide" data-translate="user_languages">Langages utilisés</h3>
                    <p class="project_slide_reverse">JS</p>
                    <div class="progress-bar project_slide">
                        <div class="progress" style="width: 60%;"></div>
                    </div>
                    <p class="project_slide_reverse">CSS</p>
                    <div class="progress-bar project_slide">
                        <div class="progress" style="width: 26%;"></div>
                    </div>
                    <p class="project_slide_reverse">HTML</p>
                    <div class="progress-bar project_slide">
                        <div class="progress" style="width: 14%;"></div>
                    </div>
                    <h3 class="project_links project_slide" data-translate="info">Informations</h3>
                    <ul>
                        <li class="project_slide_reverse" data-translate="perso_project">Projet personnel</li>
                        <li class="project_slide_reverse" data-translate="game_logic_development">Développement de la
                            logique de
                            jeu</li>
                        <li class="project_slide_reverse" data-translate="difficulty_management">Gestion de la
                            difficulté</li>
                        <li class="project_slide_reverse" data-translate="gameplay_optimization">Optimisation du
                            gameplay</li>
                    </ul>
                    <h3 class="project_links project_slide">Collaboration</h3>
                    <ul>
                        <li class="project_slide_reverse"><span data-translate="improved">Amélioration du CSS</span>
                            <span data-translate="by">par</span> <a
                                href="https://github.com/mathildejrdn"><strong>Mathilde Jourden</strong></a>
                        </li>
                    </ul>
                </div>
            </article>
            <h2 class="project_title anchor project_slide" id="elsan">CE Elsan</h2>
            <article class="project anchor border">
                <div class="figure_links">
                    <figure class="project_slide">
                        <a href="projects/ce-elsan/">
                            <img alt="Image du projet CE Elsan" loading="lazy" src="projects/elsan.png" />
                        </a>
                    </figure>
                    <div class="project_links_container project_slide_reverse">
                        <div class="project_links_block">
                            <div class="project_links_logo local">
                            </div>
                            <p><a data-translate="see_project" href="projects/ce-elsan/">Voir le projet</a></p>
                        </div>
                        <div class="project_links_block">
                            <div class="project_links_logo github">
                            </div>
                            <p><a data-translate="see_github" href="https://github.com/malibu1106/ce-elsan">Voir le
                                    github</a></p>
                        </div>
                    </div>
                    <p class="project_slide_reverse" data-translate="infos_infinitea">
                        Utilisez ces identifiants pour voir toutes les fonctionnalités</p><br />
                    <p class="project_slide_reverse">ID : superuser@elsan.com<br />
                        PSWD : superuser</p>
                </div>
                <div class="project_details">
                    <h3 class="project_links project_slide" data-translate="used_languages">Langages utilisés</h3>
                    <p class="project_slide_reverse">PHP - SQL</p>
                    <div class="progress-bar project_slide">
                        <div class="progress" style="width: 75%;"></div>
                    </div>
                    <p class="project_slide_reverse">HTML - Tailwind</p>
                    <div class="progress-bar project_slide">
                        <div class="progress" style="width: 20%;"></div>
                    </div>
                    <p class="project_slide_reverse">JS - Ajax</p>
                    <div class="progress-bar project_slide">
                        <div class="progress" style="width: 5%;"></div>
                    </div>
                    <h3 class="project_links project_slide" data-translate="info">Informations</h3>
                    <ul>
                        <li class="project_slide_reverse" data-translate="perso_project">Projet personnel</li>
                        <li class="project_slide_reverse" data-translate="mobile_interface">Interface orientée mobile
                        </li>
                        <li class="project_slide_reverse" data-translate="bbb_info_2">Réalisation de la maquette &amp;
                            du
                            site</li>
                        <li class="project_slide_reverse" data-translate="mcd">Réalisation du MCD</li>
                    </ul>
                    <h3 class="project_links project_slide" data-translate="user">Utilisateurs</h3>
                    <ul>
                        <li class="project_slide_reverse" data-translate="inscriptions">Inscription</li>
                        <li class="project_slide_reverse" data-translate="submit_suggestions">Soumission de suggestions
                        </li>
                        <li class="project_slide_reverse" data-translate="edit_profile">Edition du profil</li>
                    </ul>
                    <h3 class="project_links project_slide" data-translate="admin">Administrateurs</h3>
                    <ul>
                        <li class="project_slide_reverse" data-translate="valid_inscript">Validation des inscriptions
                        </li>
                        <li class="project_slide_reverse" data-translate="valid_suggestions">Validation des suggestions
                        </li>
                        <li class="project_slide_reverse" data-translate="user_management">Gestion des utilisateurs</li>
                        <li class="project_slide_reverse" data-translate="content_management_plus">Gestion et modération
                            du
                            contenu :</li>
                        <ul style="margin-left:25px; list-style-type: square;">
                            <li class="project_slide_reverse" data-translate="permanences">Permanences</li>
                            <li class="project_slide_reverse" data-translate="actualites">Actualités</li>
                            <li class="project_slide_reverse" data-translate="suggestions">Suggestions</li>
                            <li class="project_slide_reverse" data-translate="avantages">Avantages</li>
                            <li class="project_slide_reverse" data-translate="demandes">Demandes</li>
                        </ul>
                    </ul>
                </div>
            </article>
            <h2 class="project_title anchor project_slide" id="circle">Circle (en cours)</h2>
            <article class="project anchor">
                <div class="figure_links">
                    <figure class="project_slide">
                        <video controls="" src="projects/circle.mp4">
                        </video>
                    </figure>
                </div>
                <div class="project_details">
                    <h3 class="project_links project_slide" data-translate="used_languages">Langages utilisés</h3>
                    <p class="project_slide_reverse">JS</p>
                    <div class="progress-bar project_slide">
                        <div class="progress" style="width: 60%;"></div>
                    </div>
                    <p class="project_slide_reverse">CSS</p>
                    <div class="progress-bar project_slide">
                        <div class="progress" style="width: 20%;"></div>
                    </div>
                    <p class="project_slide_reverse">HTML</p>
                    <div class="progress-bar project_slide">
                        <div class="progress" style="width: 10%;"></div>
                    </div>
                    <p class="project_slide_reverse">Kotlin</p>
                    <div class="progress-bar project_slide">
                        <div class="progress" style="width: 10%;"></div>
                    </div>
                    <h3 class="project_links project_slide" data-translate="info">Informations</h3>
                    <ul>
                        <strong>
                            <li class="project_slide_reverse" data-translate="android_app">Application Android</li>
                        </strong>
                        <li class="project_slide_reverse" data-translate="perso_project">Projet personnel</li>
                        <li class="project_slide_reverse" data-translate="responsive_interface">Création d'une interface
                            responsive</li>
                        <li class="project_slide_reverse" data-translate="shared_preferences">Utilisation des
                            SharedPreferences
                            Android</li>
                        <li class="project_slide_reverse" data-translate="sound_service">Création d'un service pour la
                            bande
                            sonore</li>
                        <li class="project_slide_reverse" data-translate="level_creation">Création des niveaux :</li>
                        <ul style="margin-left:25px; list-style-type:square;">
                            <li class="project_slide_reverse" data-translate="level_designs">Designs</li>
                            <li class="project_slide_reverse" data-translate="level_rules">Règles</li>
                            <li class="project_slide_reverse" data-translate="game_logic">Logiques de jeu</li>
                            <li class="project_slide_reverse" data-translate="difficulty_variables">Variables
                                d'ajustement
                                difficulté</li>
                        </ul>
                    </ul>
                </div>
            </article>
        </div>
    </section>
    <section class="contact anchor" id="contact">
        <h1 data-translate="contact_title">Contactez-moi</h1>
        <p class="p_description" data-translate="contact_description">N'hésitez pas à me contacter, je vous répondrai
            dans les plus brefs délais.</p>
        <div class="contact_container">
            <form action="formulaire.php" method="POST">
                <div class="form_double_input">
                    <div class="form_double_input_block">
                        <label data-translate="form_input_name" for="name">Nom</label>
                        <input class="double_input" name="name" type="text" />
                    </div>
                    <div class="form_double_input_block">
                        <label data-translate="form_input_firstname" for="firstname">Prénom</label>
                        <input class="double_input" name="firstname" type="text" />
                    </div>
                </div>
                <div class="form_double_input">
                    <div class="form_double_input_block">
                        <label for="mail">Email *</label>
                        <input name="mail" required="" type="mail" />
                    </div>
                    <div class="form_double_input_block">
                        <label data-translate="form_input_tel" for="tel">Téléphone</label>
                        <input name="tel" type="tel" />
                    </div>
                </div>
                <div class="form_temp">
                    <label data-translate="form_input_object" for="object">Objet</label>
                    <input name="object" type="text" />
                    <label for="message">Message *</label>
                    <textarea name="message" required=""></textarea>
                </div>
                <p>Champs obligatoires *</p>
                <button data-translate="form_send_button">Envoyer</button>
            </form>
            <h1 data-translate="contact_others" id="titremin">Ou contactez-moi par :</h1>
            <div class="contact_others">
                <a class="" href="tel:0650555911"><button class="button_contact">Tel:<br />06 50 55 59 11</button></a>
                <a class="" href="mailto:malibu1106@gmail.com"><button
                        class="button_contact">Mail:<br />malibu1106@gmail.com</button></a>
            </div>
        </div>
    </section>
    <footer>
        <p>© Copyright 2024 - Roberto De Sousa. <span data-translate="arr">Tous droits réservés.</span></p>
        <p><a data-translate="site_map" href="#">Plan du site</a> |
            <a data-translate="legal_mentions" href="#">Mentions légales</a><br /><br />
            <a data-translate="privacy_policy" href="#">Ce site n'utilise aucun cookie et ne collecte aucune donnée
                personnelle.</a>
        </p>
    </footer>
</body>

</html>