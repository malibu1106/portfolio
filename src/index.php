<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="js/script.js" defer></script>
    <link rel="stylesheet" href="css/style.css">
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
                    <li><a href="#" data-translate="bouton_home">Accueil</a></li>
                    <li><a href="index.php#profile" data-translate="bouton_profile">Profil</a></li>
                    <li><a href="index.php#skills" data-translate="bouton_skills">Compétences</a></li>
                    <li><a href="index.php#portfolio">Portfolio</a></li>
                    <li><a href="index.php#contact">Contact</a></li>
                </ul>
            </div>
            <div class="nav_div nav_settings">
                <img id="themeToggle" alt="dark mode button" src="img/dark-mode.png">
                <img id="language_switcher_button" alt="english language settings button" src="img/english_flag.svg">
            </div>

            <div id="burger_menu" class="burger_hidden">
                <ul class="menu_buttons_mobile">
                    <li><a href="#" data-translate="bouton_home" onclick="menuBurgerSwitcher()">Accueil</a></li>
                    <li><a href="index.php#profile" data-translate="bouton_profile" onclick="menuBurgerSwitcher()">Profil</a></li>
                    <li><a href="index.php#skills" data-translate="bouton_skills" onclick="menuBurgerSwitcher()">Compétences</a></li>
                    <li><a href="index.php#portfolio" onclick="menuBurgerSwitcher()">Portfolio</a></li>
                    <li><a href="index.php#contact" onclick="menuBurgerSwitcher()">Contact</a></li>
                </ul>
            </div>

        </nav>
    </header>
    <a href="#"><div id="arrow"></div></a>



    <section class="home">
        <h1 class="opacity_anim" data-translate="title_home">Roberto De Sousa</h1>
        <h2 data-translate="description_home">Développeur Web FullStack- Intégrateur</h2>
        <a href="#profile"><button data-translate="whoiam">Qui suis-je?</button></a>
    </section>
    <section id="profile" class="profile anchor">
        <h1 data-translate="titre_profile">A propos de moi</h1>
        <div class="profile_container">
            <img src="img/profile.png" alt="Photo de présentation">
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
    <section id="skills" class="skills anchor p12">
        <h1 data-translate="bouton_skills">Compétences</h1>
        <p data-translate="description_skills" class="p_description">Elles évoluent constamment, car la beauté de ce
            métier réside dans l'apprentissage continu, surtout lorsque l'on est curieux et passionné.</p>
        <div class="skills_container">
            <div class="skills_details">
                <figure class="skills_logo">
                    <img alt="logo html" src="img/logos/html.png">
                    <figcaption>HTML</figcaption>
                </figure>
                <figure class="skills_logo">
                    <img alt="logo css" src="img/logos/css.png">
                    <figcaption>CSS</figcaption>
                </figure>
                <figure class="skills_logo">
                    <img alt="logo javascript" src="img/logos/javascript.png">
                    <figcaption>JS</figcaption>
                </figure>
                <figure class="skills_logo">
                    <img alt="logo php" src="img/logos/php.png">
                    <figcaption>PHP</figcaption>
                </figure>
                <figure class="skills_logo">
                    <img alt="logo mysql" src="img/logos/mysql.png">
                    <figcaption>My SQL</figcaption>
                </figure>
                <figure class="skills_logo">
                    <img alt="logo bootstrap" src="img/logos/bootstrap.png">
                    <figcaption>Bootstrap</figcaption>
                </figure>
                <figure class="skills_logo">
                    <img alt="logo tailwind" src="img/logos/tailwind.png">
                    <figcaption>Tailwind</figcaption>
                </figure>
                <figure class="skills_logo">
                    <img alt="logo python" src="img/logos/python.png">
                    <figcaption>Python</figcaption>
                </figure>
            </div>



            <div class="skills_cv">

                <a href="docs/CV_Roberto_De Sousa.pdf" target="_blank"><img id="cv_image" src="img/cv.png"
                        alt="CV de Roberto De Sousa"></a>
                <button alt="Télécharger le CV">
                    <a href="docs/CV_Roberto_De Sousa.pdf" download data-translate="download_resume">
                        Télécharger mon CV
                    </a>

                </button>
            </div>
        </div>
    </section>
    <section id="portfolio" class="portfolio anchor p12">
        <h1 data-translate="portfolio_title">Portfolio</h1>
        <p data-translate="portfolio_description" class="p_description">Ci-dessous, quelques exemples de réalisations
            effectuées durant la formation, le stage et plus encore :</p>
        <div class="portfolio_container">

            <h2 id="jadoo" class="project_title anchor">Jadoo</h2>
            <article class="project border">
                <div class="figure_links">
                    <figure>
                        <a href="projects.php?project=jadoo">


                            <img src="projects/jadoo.png" alt="Image du projet jadoo"></a>
                    </figure>
                    <div class="project_links_container">
                        <div class="project_links_block">
                            <div class="project_links_logo local">
                            </div>
                            <p><a href="projects.php?project=jadoo" data-translate="see_project">Voir le projet</a></p>
                        </div>
                        <div class="project_links_block">
                            <div class="project_links_logo github">
                            </div>
                            <p><a href="https://github.com/malibu1106/html-css-jadoo" data-translate="see_github">Voir
                                    le github</a></p>
                        </div>
                    </div>
                </div>

                <div class="project_details">


                    <h3 class="project_links" data-translate="used_languages">Langages utilisés</h3>
                    <p>CSS</p>
                    <div class="progress-bar">
                        <div class="progress" style="width: 50%;"></div>
                    </div>
                    <p>HTML</p>
                    <div class="progress-bar">
                        <div class="progress" style="width: 44%;"></div>
                    </div>

                    <p>JS</p>
                    <div class="progress-bar">
                        <div class="progress" style="width: 6%;"></div>
                    </div>
                    <h3 class="project_links" data-translate="info">Informations</h3>
                    <ul>
                        <li data-translate="training_project">Projet de formation</li>
                        <li data-translate="jadoo_info_2">Réalisé depuis une maquette complète</li>
                        <li data-translate="jadoo_info_3">Animations majoritairement en CSS</li>
                        <li data-translate="jadoo_info_4">Menu burger et quelques animations en JS</li>
                        <li>Responsive</li>
                    </ul>


                </div>
            </article>

            <h2 id="projet-voyage" class="project_title anchor">Bleu Blanc Bouge</h2>
            <article class="project anchor border">
                <div class="figure_links">
                    <figure>
                        <a href="projects.php?project=projet-voyage">
                            <img src="projects/bleu-blanc-bouge.png" alt="Image du projet Bleu Blanc Bouge">

                        </a>

                    </figure>
                    <div class="project_links_container">
                        <div class="project_links_block">
                            <div class="project_links_logo local">
                            </div>
                            <p><a href="projects.php?project=projet-voyage" data-translate="see_project">Voir le
                                    projet</a></p>
                        </div>
                        <div class="project_links_block">
                            <div class="project_links_logo github">
                            </div>
                            <p><a href="https://github.com/malibu1106/projet-voyage-fab-roberto"
                                    data-translate="see_github">Voir le github</a></p>
                        </div>
                    </div>
                </div>

                <div class="project_details">


                    <h3 class="project_links" data-translate="used_languages">Langages utilisés</h3>
                    <p>HTML</p>
                    <div class="progress-bar">
                        <div class="progress" style="width: 40%;"></div>
                    </div>
                    <p>PHP</p>
                    <div class="progress-bar">
                        <div class="progress" style="width: 40%;"></div>
                    </div>
                    <p>CSS</p>
                    <div class="progress-bar">
                        <div class="progress" style="width: 12%;"></div>
                    </div>
                    <p>JS</p>
                    <div class="progress-bar">
                        <div class="progress" style="width: 8%;"></div>
                    </div>

                    <h3 class="project_links" data-translate="info">Informations</h3>
                    <ul>
                        <li data-translate="training_project">Projet de formation</li>
                        <li data-translate="bbb_info_2">Réalisation de la maquette & du site</li>
                        <li data-translate="bbb_info_3">Recherche filtrée en JS</li>
                        <li data-translate="bbb_info_4">Back-office full PHP</li>
                        <li>Responsive</li>
                    </ul>
                    <h3 class="project_links">Collaboration</h3>
                    <ul>
                        <li><span data-translate="design_help">Aide pour le design</span> : <a
                                href="#"><strong>cy-fa</strong></a></li>
                    </ul>
                </div>
            </article>

            <h2 id="infinitea" class="project_title anchor">InfiniTea</h2>
            <article class="project anchor border">
                <div class="figure_links">
                    <figure>
                        <a href="projects/infinitea/">
                            <img src="projects/infinitea.png" alt="Image du projet Infinitea">

                        </a>

                    </figure>
                    <div class="project_links_container">
                        <div class="project_links_block">
                            <div class="project_links_logo local">
                            </div>
                            <p><a href="projects/infinitea/" data-translate="see_project">Voir le projet</a></p>
                        </div>
                        <div class="project_links_block">
                            <div class="project_links_logo github">
                            </div>
                            <p><a href="https://github.com/malibu1106/InfiniTea" data-translate="see_github">Voir le
                                    github</a></p>
                        </div>
                    </div>
                    <p data-translate="infos_infinitea">
                    Utilisez ces identifiants pour voir toutes les fonctionnalités</p><br>
                    ID : superuser@infinitea.com<br>
                    PSWD : superuser
                    
                </div>

                <div class="project_details">


                    <h3 class="project_links" data-translate="used_languages">Langages utilisés</h3>
                    <p>PHP - SQL</p>
                    <div class="progress-bar">
                        <div class="progress" style="width: 45%;"></div>
                    </div>
                    <p>HTML - Tailwind</p>
                    <div class="progress-bar">
                        <div class="progress" style="width: 40%;"></div>
                    </div>
                    <p>JS</p>
                    <div class="progress-bar">
                        <div class="progress" style="width: 10%;"></div>
                    </div>
                    <p>CSS</p>
                    <div class="progress-bar">
                        <div class="progress" style="width: 5%;"></div>
                    </div>


                    <h3 class="project_links" data-translate="info">Informations</h3>
                    <ul>
                        <li data-translate="training_project">Projet de formation</li>
                        <li data-translate="cart_management">Gestion de panier</li>
                        <li data-translate="product_management">Gestion des produits</li>
                        <li data-translate="order_management">Gestion des commandes</li>
                        <li data-translate="user_management">Gestion des utilisateurs</li>
                        <li data-translate="">Responsive</li>
                    </ul>
                    <h3 class="project_links">Collaboration</h3>
                    <ul>
                        <li><span data-translate="infinitea_collab">Design et choix des ressources</span> <span
                                data-translate="by">par</span> <a
                                href="https://github.com/mathildejrdn"><strong>Mathilde Jourden</strong></a></li>
                        <li>HTML-Tailwind <span data-translate="by">par</span> <a
                                href="https://github.com/mathildejrdn"><strong>Mathilde Jourden</strong></a></li>
                    </ul>
                </div>
            </article>


            <h2 id="color-simon" class="project_title anchor">Color Memo</h2>
            <article class="project anchor border">
                <div class="figure_links">
                    <figure>
                        <a href="projects.php?project=color-simon">
                            <img src="projects/color-simon.png" alt="Image du projet Color Memo">
                        </a>

                    </figure>
                    <div class="project_links_container">
                        <div class="project_links_block">
                            <div class="project_links_logo local">
                            </div>
                            <p><a href="projects.php?project=color-simon" data-translate="see_project">Voir le
                                    projet</a></p>
                        </div>
                        <div class="project_links_block">
                            <div class="project_links_logo github">
                            </div>
                            <p><a href="https://github.com/malibu1106/js-color-simon" data-translate="see_github">Voir
                                    le github</a></p>
                        </div>
                    </div>
                </div>

                <div class="project_details">


                    <h3 class="project_links" data-translate="user_languages">Langages utilisés</h3>
                    <p>JS</p>
                    <div class="progress-bar">
                        <div class="progress" style="width: 60%;"></div>
                    </div>
                    <p>CSS</p>
                    <div class="progress-bar">
                        <div class="progress" style="width: 26%;"></div>
                    </div>
                    <p>HTML</p>
                    <div class="progress-bar">
                        <div class="progress" style="width: 14%;"></div>
                    </div>


                    <h3 class="project_links" data-translate="info">Informations</h3>
                    <ul>
                        <li data-translate="perso_project">Projet personnel</li>
                        <li data-translate="game_logic_development">Développement de la logique de jeu</li>
                        <li data-translate="difficulty_management">Gestion de la difficulté</li>
                        <li data-translate="gameplay_optimization">Optimisation du gameplay</li>
                    </ul>
                    <h3 class="project_links">Collaboration</h3>
                    <ul>
                        <li><span data-translate="improved">Amélioration du CSS</span> <span
                                data-translate="by">par</span> <a
                                href="https://github.com/mathildejrdn"><strong>Mathilde Jourden</strong></a></li>
                    </ul>
                </div>
            </article>

            <h2 id="elsan" class="project_title anchor">CE Elsan</h2>
            <article class="project anchor border">
                <div class="figure_links">
                    <figure>
                        <a href="projects/ce-elsan/">
                            <img src="projects/elsan.png" alt="Image du projet CE Elsan">

                        </a>

                    </figure>
                    <div class="project_links_container">
                        <div class="project_links_block">
                            <div class="project_links_logo local">
                            </div>
                            <p><a href="projects/ce-elsan/" data-translate="see_project">Voir le projet</a></p>
                        </div>
                        <div class="project_links_block">
                            <div class="project_links_logo github">
                            </div>
                            <p><a href="https://github.com/malibu1106/ce-elsan" data-translate="see_github">Voir le
                                    github</a></p>
                        </div>
                    </div>
                    <p data-translate="infos_infinitea">
                    Utilisez ces identifiants pour voir toutes les fonctionnalités</p><br>
                    ID : superuser@elsan.com<br>
                    PSWD : superuser
                    
                </div>

                <div class="project_details">


                    <h3 class="project_links" data-translate="used_languages">Langages utilisés</h3>
                    <p>PHP - SQL</p>
                    <div class="progress-bar">
                        <div class="progress" style="width: 75%;"></div>
                    </div>
                    <p>HTML - Tailwind</p>
                    <div class="progress-bar">
                        <div class="progress" style="width: 20%;"></div>
                    </div>
                    <p>JS - Ajax</p>
                    <div class="progress-bar">
                        <div class="progress" style="width: 5%;"></div>
                    </div>



                    <h3 class="project_links" data-translate="info">Informations</h3>
                    <ul>
                    <li data-translate="perso_project">Projet personnel</li>
                    
                        

                        <li data-translate="mobile_interface">Interface orientée mobile</li>
                        <li data-translate="bbb_info_2">Réalisation de la maquette & du site</li>
                        <li data-translate="mcd">Réalisation du MCD</li>
                    </ul>

                    <h3 class="project_links" data-translate="user">Utilisateurs</h3>
                    <ul>
                    <li data-translate="inscriptions">Inscription</li>
                    <li data-translate="submit_suggestions">Soumission de suggestions</li>
                    <li data-translate="edit_profile">Edition du profil</li>

                    </ul>

                    <h3 class="project_links" data-translate="admin">Administrateurs</h3>
                    <ul>
                    <li data-translate="valid_inscript">Validation des inscriptions</li>
                    <li data-translate="valid_suggestions">Validation des suggestions</li>
                    <li data-translate="user_management">Gestion des utilisateurs</li>
                    <li data-translate="content_management_plus">Gestion et modération du contenu :</li>
                        <ul style="margin-left:25px; list-style-type: square;">
                        <li data-translate="permanences">Permanences</li>
                        <li data-translate="actualites">Actualités</li>
                        <li data-translate="suggestions">Suggestions</li>
                        <li data-translate="avantages">Avantages</li>
                        <li data-translate="demandes">Demandes</li>
                        </ul>
                    </ul>
                    
                </div>
            </article>


            <h2 id="circle" class="project_title anchor">Circle (en cours)</h2>
            <article class="project anchor">
                <div class="figure_links">
                    <figure>
                        <video src="projects/circle.mp4" controls>
                    </figure>

                    
                </div>

                <div class="project_details">


                    <h3 class="project_links" data-translate="used_languages">Langages utilisés</h3>
                    <p>JS</p>
                    <div class="progress-bar">
                        <div class="progress" style="width: 60%;"></div>
                    </div>
                    <p>CSS</p>
                    <div class="progress-bar">
                        <div class="progress" style="width: 20%;"></div>
                    </div>
                    <p>HTML</p>
                    <div class="progress-bar">
                        <div class="progress" style="width: 10%;"></div>
                    </div>
                    <p>Kotlin</p>
                    <div class="progress-bar">
                        <div class="progress" style="width: 10%;"></div>
                    </div>
                    



                    <h3 class="project_links" data-translate="info">Informations</h3>
                    <ul>
                    <strong><li data-translate="android_app">Application Android</li></strong>
<li data-translate="perso_project">Projet personnel</li>
<li data-translate="responsive_interface">Création d'une interface responsive</li>
<li data-translate="shared_preferences">Utilisation des SharedPreferences Android</li>
<li data-translate="sound_service">Création d'un service pour la bande sonore</li>
<li data-translate="level_creation">Création des niveaux :</li>
<ul style="margin-left:25px; list-style-type:square;">
    <li data-translate="level_designs">Designs</li>
    <li data-translate="level_rules">Règles</li>
    <li data-translate="game_logic">Logiques de jeu</li>
    <li data-translate="difficulty_variables">Variables d'ajustement difficulté</li>
</ul>

                    </ul>
                    
                    </ul>

                    
                    
                </div>
            </article>


            




        </div>
    </section>
    <section id="contact" class="contact anchor">
        <h1 data-translate="contact_title">Contactez-moi</h1>
        <p data-translate="contact_description" class="p_description">N'hésitez pas à me contacter, je vous répondrai
            dans les plus brefs délais.</p>
        <div class="contact_container">
            <form action="formulaire.php" method="POST">
                <div class="form_double_input">
                    <div class="form_double_input_block">
                        <label for="name" data-translate="form_input_name">Nom</label>
                        <input class="double_input" type="text" name="name" />
                    </div>
                    <div class="form_double_input_block">
                        <label for="firstname" data-translate="form_input_firstname">Prénom</label>
                        <input class="double_input" type="text" name="firstname" />
                    </div>
                </div>
                <div class="form_double_input">
                    <div class="form_double_input_block">
                        <label for="mail">Email *</label>
                        <input type="mail" name="mail" required />
                    </div>
                    <div class="form_double_input_block">
                        <label for="tel" data-translate="form_input_tel">Téléphone</label>
                        <input type="tel" name="tel" />
                    </div>
                </div>
                <div class="form_temp">
                    <label for="object" data-translate="form_input_object">Objet</label>
                    <input type="text" name="object"/>
                    <label for="message">Message *</label>
                    <textarea name="message" required></textarea>
                </div>
                <p>Champs obligatoires *</p>


                <button data-translate="form_send_button">Envoyer</button>



            </form>
            <h1 data-translate="contact_others" id="titremin">Ou contactez-moi par :</h1>
            <div class="contact_others">
                <a class="" href="tel:0650555911"><button class="button_contact">Tel:<br>06 50 55 59 11</button></a>
                <a class="" href="mailto:malibu1106@gmail.com"><button
                        class="button_contact">Mail:<br>malibu1106@gmail.com</button></a>
                <!-- <a class="" href="#"><button class="button_contact">LinkedIn</button></a> -->
            </div>
        </div>
    </section>
    <footer>
        <p>© Copyright 2024 - Roberto De Sousa. <span data-translate="arr">Tous droits réservés.</span></p>

        <p><a href="#" data-translate="site_map">Plan du site</a> |
            <a href="#" data-translate="legal_mentions">Mentions légales</a><br><br>
            <a href="#" data-translate="privacy_policy">Ce site n'utilise aucun cookie et ne collecte aucune donnée
                personnelle.</a>
        </p>
    </footer>
</body>

</html>