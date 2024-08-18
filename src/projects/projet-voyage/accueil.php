<video id="background-video" autoplay loop muted>

    <source src="bg2.mov" type="video/mp4">

</video>

<main>
    <section class="accueil">
        <h1><a href="#ancre-évadez">évadez-vous,</a> <a href="#ancre-découvrez">découvrez,</a> <a href="#ancre-voyages">vivez.</a></h1>
        <div id="recherche-voyage-mobile" class="recherche-voyage-mobile-fermee">
            <div id="recherche-cachee">

                <div class="conteneur-select-mobile">
                    <label for="regions">Régions</label>
                    <select id="regions" name="regions">


                        <option class="researchOption" value="allregions">Toutes les régions</option>
                        <option class="researchOption" value="auvergne">Auvergne-Rhône-Alpes</option>
                        <option class="researchOption" value="bourgogne">Bourgogne-Franche-Comté</option>
                        <option class="researchOption" value="bretagne">Bretagne</option>
                        <option class="researchOption" value="centre">Centre-Val de Loire</option>
                        <option class="researchOption" value="corse">Corse</option>
                        <option class="researchOption" value="grandest">Grand Est</option>
                        <option class="researchOption" value="hdf">Hauts-de-France</option>
                        <option class="researchOption" value="idf">Île-de-France</option>
                        <option class="researchOption" value="normandie">Normandie</option>
                        <option class="researchOption" value="aquitaine">Nouvelle-Aquitaine</option>
                        <option class="researchOption" value="occitanie">Occitanie</option>
                        <option class="researchOption" value="loire">Pays de la Loire</option>
                        <option class="researchOption" value="paca">Provence-Alpes-Côte d'Azur</option>
                    </select>
                </div>
                <div class="conteneur-select-mobile">
                    <label for="envies">Envies</label>
                    <select id="envies" name="envies">
                        <option class="researchOption" value="allenvies">Toutes les envies</option>
                        <option class="researchOption" value="sommets">Atteignez des sommets</option>
                        <option class="researchOption" value="bienetre">Bien-être absolu</option>
                        <option class="researchOption" value="marine">Escale marine</option>
                        <option class="researchOption" value="gourmande">Escapade gourmande</option>
                        <option class="researchOption" value="harmonie">Harmonie naturelle</option>
                        <option class="researchOption" value="plage">Plages de rêve</option>
                        <option class="researchOption" value="sentiers">Sentiers intrépides</option>
                        <option class="researchOption" value="sport">Sport Extrême</option>
                        <option class="researchOption" value="culture">Vibrations culturelles</option>
                        <option class="researchOption" value="eco">Voyages Écoresponsables</option>
                    </select>
                </div>
                <div id="close-icon">
                    <a id="researchLink" href="#"><img id="search-mobile-icon" src="img/ok_black.svg"></a><img id="close-search-mobile-icon" src="img/cross_black.svg">
                </div>

            </div>

            <div id="trouver-mon-voyage">Trouver mon voyage</div>
        </div>
    </section>
    <div class="cut-blanc"></div>

    <div id="ancre-évadez"></div>
    <div class="cut-transp">

        <h2 class="titre-section">Évadez-vous,</h2>
        <h4 class="texte-section">Evadez-vous dans l'élégance intemporelle de la France, où la beauté des villes lumière
            se mêle au charme paisible des villages pittoresques.</h4>
    </div>
    <div class="cut-blanc">

    </div>




    <!-- PROMO GRAND -->
    <section class="section-promos">
        <div class="conteneur-promo">
            <?php include 'promo.php' ?>
        </div>
    </section>
    <div class="cut-blanc"></div>


    <!--REGIONS-->
    <div id="ancre-découvrez"></div>
    <div class="cut-transp">

        <h2 class="titre-section">Découvrez,</h2>
        <h4 class="texte-section">Découvrez les trésors cachés de France, où chaque panorama dévoile un tableau vivant
            d'histoire, de culture et de beauté naturelle à couper le souffle.</h4>

    </div>

    <div class="cut-blanc">

    </div>
    <section id="section-regions" class="fade">

        <div id="background-regions">

            <h3 id="titre-region">L'Auvergne</h3>




            <button id="prevRegion" onclick="prevRegion()">&#10094;</button>

            <a href="index.php?region=auvergne" id="lienRegion"><span class="clickableRegion"></span></a>


            <button id="nextRegion" onclick="nextRegion()">&#10095;</button>

            <div class="prez-region">

                <div class="conteneur-infos-region">

                    <p id="texte-region">Laissez-vous séduire par la beauté brute des volcans endormis et des vastes étendues
                        verdoyantes de l'Auvergne, une région où la nature règne en maître.</p>
                </div>
                <img id="carte-region-img" src="img/regions/cartefr/carte-auvergne.png">

            </div>

        </div>



    </section>
    <div class="cut-blanc"></div>
    <div id="ancre-voyages"></div>
    <div class="cut-transp">



        <h2 class="titre-section">Vivez.</h2>
        <h4 class="texte-section">Vivez une escapade mémorable où les paysages de France se révèlent être le décor parfait
            pour vos moments d'aventure et de détente.</h4>
    </div>
    <div class="cut-blanc">

    </div>
    <section class="section-voyages">
        <div class="conteneur-voyages">
            <?php include 'typevoyages.php' ?>
        </div>


    </section>

    <div class="cut-blanc"></div>
    <!-- SECTION AVIS-->
    <div class="cut-transp">
        <h2 class="titre-section">L'avis de nos clients</h2>
        <h4 class="texte-section">Découvrez les expériences inoubliables à travers les yeux de nos voyageurs. Des avis
            authentiques pour des aventures sur mesure.</h4>

    </div>

    <div class="cut-blanc"></div>

    <section class="section-avis">
        <div class="conteneur-avis">
            <article class="avis">
                <figure>
                    <img title="Photo de Manu" src="img/avis/manu.jpg" alt="Photo de Manu" />
                    <figcaption>

                        <p class="titre-avis">Super voyage !</p>
                        <p class="texte-avis">C'était vraiment un super voyage, j'ai bien profité de nos somptueux paysages<br><br>Merci Bleu Blanc Bouge !!</p>
                        <span class="note-avis"><img src="img/avis/star.png"><img src="img/avis/star.png"><img src="img/avis/star.png"><img src="img/avis/star.png"></span>
                        <span class="nom-avis">Manu</span>

                    </figcaption>
                </figure>
            </article>
            <article class="avis">
                <figure>
                    <img title="Photo de Jean Luc Reichmann" src="img/avis/jean-luc.jpg" alt="Photo de Jean Luc Reichmann" />
                    <figcaption>
                        <p class="titre-avis">Excellent !</p>
                        <p class="texte-avis">Tout était parfait! La réservation, l'organisation du voyage, l'hôtel .. merveilleux !
                            Merci beaucoup, je recommande !</p>
                        <span class="note-avis"><img src="img/avis/star.png"><img src="img/avis/star.png"><img src="img/avis/star.png"><img src="img/avis/star.png"><img src="img/avis/star.png"></span>
                        <span class="nom-avis">Jean-Luc</span>
                    </figcaption>
                </figure>
            </article>
            <article class="avis">
                <figure>
                    <img title="Photo de Brigitte Macron" src="img/avis/brigitte.jpg" alt="Photo de Brigitte Macron" />
                    <figcaption>
                        <p class="titre-avis">Peut mieux faire</p>
                        <p class="texte-avis">Bon voyage dans l'ensemble, mais un peu déçu, problème de chambre dans mon hôtel ..</p>
                        <span class="note-avis"><img src="img/avis/star.png"><img src="img/avis/star.png"><img src="img/avis/star.png"></span>
                        <span class="nom-avis">Léa</span>
                    </figcaption>
                </figure>
            </article>


        </div>



    </section>

    <div class="cut-blanc"></div>
    <!-- SECTION AVIS-->
    <div id="ancre-contact"></div>
    <div class="cut-transp">
        <h2 class="titre-section">Contactez-nous</h2>
        <h4 class="texte-section">Prêt à partir à l'aventure ? Contactez-nous dès maintenant pour planifier votre prochain
            voyage mémorable en quelques clics!</h4>

    </div>

    <div class="cut-blanc"></div>

    <section class="contact">
        <div class="conteneur-contact">
            <div class="conteneur-contact-gauche">
                <form action="#" method="post">
                    <div class="form-gauche">

                        <input placeholder="Nom" type="text" id="nom" name="nom" required>

                        <input placeholder="Prénom" type="text" id="prenom" name="prenom" required>


                        <input placeholder="Adresse email" type="email" id="email" name="email" required>


                        <select id="objet" name="objet" required>
                            <option value="Motif" selected disabled>Ma demande</option>
                            <option value="monvoyage">Planifier mon voyage</option>
                            <option value="renseignements">Obtenir des renseignements</option>
                            <option value="reclamation">Faire une réclamation</option>
                            <option value="autres">Autres demande</option>
                        </select>
                    </div>
                    <div class="form-droite">


                        <textarea placeholder="Votre message" id="message" name="message" rows="4" required></textarea>

                        <input type="submit" value="Envoyer">
                    </div>
                </form>
            </div>
            <div class="conteneur-contact-droite">
                <p class="type-contact">Par téléphone</p>
                <p class="infos-contact">01.65.32.66.44</p>

                <p class="type-contact">Par email</p>
                <p class="infos-contact">contact@bleublancbouge.com</p>

            </div>
        </div>
    </section>

</main>