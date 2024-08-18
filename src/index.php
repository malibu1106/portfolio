<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="js/nav.js" defer></script>
    <link rel="stylesheet" href="css/style.css">
    <title>Malibu</title>
</head>
<body>

<header>
<nav>
    <div class="nav_div nav_avatar">
        <img alt="avatar" src="img/pfff.gif">
    </div>
    <div class="nav_div nav_menu">
    <span id="menu_burger_button">☰</span>
    <ul class="menu_buttons_desktop">
        <li><a href="#" data-translate="bouton_home">Accueil</a></li>
        <li><a href="#" data-translate="bouton_profile">Profil</a></li>
        <li><a href="#" data-translate="bouton_skills">Compétences</a></li>
        <li><a href="#">Portfolio</a></li>
        <li><a href="#">Contact</a></li>
    </ul>
    </div>
    <div class="nav_div nav_settings">
        <img id="themeToggle" alt="dark mode button" src="img/dark-mode.png">
        <img id="language_switcher_button" alt="english language settings button" src="img/english_flag.svg">
    </div>

    <div id="burger_menu" class="burger_hidden">
    <ul class="menu_buttons_mobile">
        <li><a href="#" data-translate="bouton_home">Accueil</a></li>
        <li><a href="#" data-translate="bouton_profile">Profil</a></li>
        <li><a href="#" data-translate="bouton_skills">Compétences</a></li>
        <li><a href="#">Portfolio</a></li>
        <li><a href="#">Contact</a></li>
    </ul>
</div>
    
</nav>
</header>



<section class="home">
    <h1 class="opacity_anim" data-translate="title_home">Roberto De Sousa</h1>
    <h2 data-translate="description_home">Développeur Web FullStack- Intégrateur</h2>
    <a href="#anchor_whoiam"><button data-translate="whoiam" >Qui suis-je?</button></a>
</section>
<section class="profile">
    <h1 id="anchor_whoiam" class="anchor" data-translate="titre_profile">A propos de moi</h1>
    <div class="profile_container">
        <img src="img/profile.png" alt="Photo de présentation">
        <p data-translate="description_profile">Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l'imprimerie depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n'a pas fait que survivre cinq siècles, mais s'est aussi adapté à la bureautique informatique, sans que son contenu n'en soit modifié. Il a été popularisé dans les années 1960 grâce à la vente de feuilles Letraset contenant des passages du Lorem Ipsum, et, plus récemment, par son inclusion dans des applications de mise en page de texte, comme Aldus PageMaker.</p>
    </div>
</section>
<section class="skills">
    <h1 data-translate="skills_title">Compétences</h1>
    <p data-translate="description_skills">Bon on va mettre une petite phrase toute pétée en attendant on verra ça plus tard quoi</p>
    <div class="skills_container">
        <div class="skills_details">
        <h3 class="titre_skills">back-end</h3>
        <div class="skill">
        <p>PHP</p>
        <div class="progress-bar">
            <div class="progress" style="width: 90%;"></div>
        </div>
    </div>
    <div class="skill">
        <p>SQL</p>
        <div class="progress-bar">
            <div class="progress" style="width: 90%;"></div>
        </div>
    </div>
        <h3 class="titre_skills">front-end</h3>
        <div class="skill">
        <p>HTML</p>
        <div class="progress-bar">
            <div class="progress" style="width: 90%;"></div>
        </div>
    </div>
    <div class="skill">
        <p>CSS</p>
        <div class="progress-bar">
            <div class="progress" style="width: 80%;"></div>
        </div>
    </div>
    <div class="skill">
        <p>JavaScript</p>
        <div class="progress-bar">
            <div class="progress" style="width: 70%;"></div>
        </div>
    </div>
        <h3 class="titre_skills">autres</h3>
        <div class="skill">
        <p>Python</p>
        <div class="progress-bar">
            <div class="progress" style="width: 90%;"></div>
        </div>
    </div>

        
        </div>
        <div class="skills_cv">
            <!-- <img src="img/cv.png" alt="CV de Roberto De Sousa"> -->
            <button alt="Télécharger le CV">Télécharger le CV</button> 
        </div>
    </div>
</section>
<section class="portfolio">
    <h1 data-translate="portfolio_title">Portfolio</h1>
    <p data-translate="portfolio_description">Ci-dessous, quelques exemples de réalisations effectuées durant la formation, le stage et plus encore :</p>
    <div class="portfolio_container">

        <article id="jadoo" class="project anchor">
            <figure>
            <a href="projects.php?project=jadoo"><figcaption class="project_title">Jadoo</figcaption></a>
                <img src="projects/jadoo.png">                
            </figure>
            <div class="project_details">

                <h3 class="project_links">Liens</h3>
                <div class="project_links_block">
                    <div class="project_links_logo local">
                    </div>
                    <p><a href="projects.php?project=jadoo">Voir le projet</a></p>
                </div>
                <div class="project_links_block">
                <div class="project_links_logo github">
                </div>
                    <p><a href="https://github.com/malibu1106/html-css-jadoo">Voir le github</a></p>
                </div>
                <h3 class="project_infos">Langages utilisés</h3>
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
                <h3 class="project_infos">Informations</h3>
                <ul>
                    <li>Projet de formation</li>
                    <li>Réalisé depuis une maquette complète</li>
                    <li>Animations majoritairement en CSS</li>
                    <li>Menu burger et quelques animations en JS</li>
                    <li>Responsive</li>
                </ul>


            </div>
        </article>


        <article id="projet-voyage" class="project anchor">
            <figure>
            <a href="projects.php?project=jadoo"><figcaption class="project_title">Bleu Blanc Bouge</figcaption></a>
            <img src="projects/bleu-blanc-bouge.png">               
            </figure>
            <div class="project_details">

                <h3 class="project_links">Liens</h3>
                <div class="project_links_block">
                    <div class="project_links_logo local">
                    </div>
                    <p><a href="projects.php?project=projet-voyage">Voir le projet</a></p>
                </div>
                <div class="project_links_block">
                <div class="project_links_logo github">
                </div>
                    <p><a href="https://github.com/malibu1106/projet-voyage-fab-roberto">Voir le github</a></p>
                </div>
                <h3 class="project_infos">Langages utilisés</h3>
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
                
                <h3 class="project_infos">Informations</h3>
                <ul>
                    <li>Projet de formation</li>
                    <li>Réalisation de la maquette & du site</li>
                    <li>Recherche filtrée en JS</li>
                    <li>Back-office full PHP</li>
                    <li>Responsive</li>
                </ul>
                <h3 class="project_infos">Collaboration :</h3>
                <ul>
                    <li>Aide pour le design : Fabien need link </li>                    
                </ul>
            </div>
        </article>


        <article id="infinitea" class="project anchor">
            <figure>
            <a href="projects/infinitea/"><figcaption class="project_title">InfiniTea</figcaption></a>
            <img src="projects/infinitea.png">               
            </figure>
            <div class="project_details">

                <h3 class="project_links">Liens</h3>
                <div class="project_links_block">
                    <div class="project_links_logo local">
                    </div>
                    <p><a href="projects/infinitea/">Voir le projet</a></p>
                </div>
                <div class="project_links_block">
                <div class="project_links_logo github">
                </div>
                    <p><a href="https://github.com/malibu1106/InfiniTea">Voir le github</a></p>
                </div>
                <h3 class="project_infos">Langages utilisés</h3>
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
                
                
                <h3 class="project_infos">Informations</h3>
                <ul>
                    <li>Projet de formation</li>                    
                    <li>Back-end</li>
                    <li>Responsive</li>
                </ul>
                <h3 class="project_infos">Collaboration :</h3>
                <ul>
                    <li>Design et choix images par Mathilde need link</li>
                    <li>HTML-Tailwind par Mathilde need link</li>                      
                </ul>
            </div>
        </article>



        <article id="color-simon" class="project anchor">
            <figure>
            <a href="projects.php?project=color-simon"><figcaption class="project_title">Color Memo</figcaption></a>
            <img src="projects/color-simon.png">               
            </figure>
            <div class="project_details">

                <h3 class="project_links">Liens</h3>
                <div class="project_links_block">
                    <div class="project_links_logo local">
                    </div>
                    <p><a href="projects.php?project=color-simon">Voir le projet</a></p>
                </div>
                <div class="project_links_block">
                <div class="project_links_logo github">
                </div>
                    <p><a href="https://github.com/malibu1106/js-color-simon">Voir le github</a></p>
                </div>
                <h3 class="project_infos">Langages utilisés</h3>
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
                
                
                <h3 class="project_infos">Informations</h3>
                <ul>
                    <li>Projet personnel</li>                    
                    <li>Need infos sur jeu</li>
                </ul>
                <h3 class="project_infos">Collaboration :</h3>
                <ul>
                    <li>Amélioration CSS par Mathilde</li>                     
                </ul>
            </div>
        </article>



        
    </div>
</section>
<section class="contact">
    <h1 data-translate="contact_title">Contactez-moi</h1>
    <p data-translate="contact_description">N'hésitez pas à me contacter, je vous répondrai dans les plus brefs délais.</p>
    <div class="contact_container">
        <form>
            <div class="form_double_input">
                <div class="form_double_input_block">
                    <label for="name" data-translate="form_input_name">Nom</label>
                    <input class="double_input" type="text" name="name"/>
                </div>
                <div class="form_double_input_block">
                    <label for="firstname" data-translate="form_input_firstname">Prénom</label>
                    <input class="double_input" type="text" name="firstname"/>
                </div>
            </div>
            <div class="form_double_input">
                <div class="form_double_input_block">
                    <label for="mail">Email</label>
                    <input type="mail" name="mail"/>
                </div>
                <div class="form_double_input_block">
                    <label for="tel" data-translate="form_input_tel">Téléphone</label>
                    <input type="tel" name="tel"/>
                </div>
            </div>
            <div class="form_temp">
                <label for="object" data-translate="form_input_object">Objet</label>
                <input type="text"/>
                <label for="message">Message</label>
                <textarea></textarea>
            </div>

            <div class="form_warning">
                <input type="checkbox"/>
                <p data-translate="contact_warning">En soumettant ce formulaire, j'accepte que mes données personnelles soient utilisées pour me recontacter. Aucun autre traitement ne sera effectué avec mes informations. Pour connaître et exercer vos droits, veuillez consultez la Politique de confidentialité.</p>
            </div>
            <button data-translate="form_send_button">Envoyer</button>



        </form>
        <h1>Ou contactez-moi par :</h1>
        <div class="contact_others">            
            <button class="button_contact">Tel</button>
            <button class="button_contact">Mail</button>
            <button class="button_contact">LinkedIn</button>
        </div>
    </div>    
</section>
<footer>
<p>© Copyright 2024 - Roberto De Sousa. Tous droits réservés.</p>

<p><a href="#">Plan du site</a> | <a href="#">Mentions légales</a> | <a href="#">Politique de confidentialité</a></p>
</footer>
</body>
</html>