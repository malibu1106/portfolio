<section class="zone-prof">
    <div id="zone-pro">
        <div class="zone-pro-remove">

            <form action="index.php?action=retirervoyage" method="post" enctype="multipart/form-data">
                <br>
                <h2 class="titre-zone-pro">Retirer un voyage</h2>
                <hr>
                <select name="filename">
                    <?php
                    echo '<option value="label" selected disabled>Sélectionner un voyage</option>';
                    foreach (glob("pages/*.php") as $filename) {
                        echo '<option value="' . $filename . '">' . $filename . '</option>';
                    }
                    ?>
                </select>
                <button type="submit" name="delete">Supprimer</button>
            </form>

            <form action="index.php?action=retirerpromo" method="post" enctype="multipart/form-data">
                <hr>
                <h2 class="titre-zone-pro">Retirer une promotion</h2>
                <hr>
                <select name="filename">
                    <?php
                    echo '<option value="label" selected disabled>Sélectionner une promotion</option>';
                    foreach (glob("promos/*.php") as $filename) {
                        echo '<option value="' . $filename . '">' . $filename . '</option>';
                    }
                    ?>
                </select>
                <button type="submit" name="delete">Supprimer</button>
            </form>
        </div>


        <div class="zone-pro-add">
            <form action="index.php?action=ajoutervoyage" method="post" enctype="multipart/form-data">

                <div class="zone-pro-voyage">

                    <hr>
                    <h2 class="titre-zone-pro">Ajouter un voyage</h2>
                    <hr>


                    <label for="image">Image principale :</label>
                    <input class="inputfile" type="file" name="image" id="image" required><br>

                    <label for="region">Région :</label>
                    <select name="region" id="region" required>
                        <option value="Auvergne-Rhône-Alpes">Auvergne-Rhône-Alpes</option>
                        <option value="Bourgogne-Franche-Comté">Bourgogne-Franche-Comté</option>
                        <option value="Bretagne">Bretagne</option>
                        <option value="Centre-Val de Loire">Centre-Val de Loire</option>
                        <option value="Corse">Corse</option>
                        <option value="Grand Est">Grand Est</option>
                        <option value="Hauts-de-France">Hauts-de-France</option>
                        <option value="Île-de-France">Île-de-France</option>
                        <option value="Normandie">Normandie</option>
                        <option value="Nouvelle-Aquitaine">Nouvelle-Aquitaine</option>
                        <option value="Occitanie">Occitanie</option>
                        <option value="Pays de la Loire">Pays de la Loire</option>
                        <option value="Provence-Alpes-Côte d'Azur">Provence-Alpes-Côte d'Azur</option>
                    </select><br>

                    <label for="envie">Envie :</label>
                    <select name="envie" id="envie" required>
                        <option value="Atteignez des sommets">Atteignez des sommets</option>
                        <option value="Bien-être absolu">Bien-être absolu</option>
                        <option value="Escale marine">Escale marine</option>
                        <option value="Escapade gourmande">Escapade gourmande</option>
                        <option value="Harmonie naturelle">Harmonie naturelle</option>
                        <option value="Plages de rêve">Plages de rêve</option>
                        <option value="Sentiers intrépides">Sentiers intrépides</option>
                        <option value="Sport Extrême">Sport Extrême</option>
                        <option value="Vibrations culturelles">Vibrations culturelles</option>
                        <option value="Voyages Écoresponsables">Voyages Écoresponsables</option>
                    </select><br>

                    <div class="zone-pro-add-voyage-bloc-para">
                        <label for="nompara1">Titre paragraphe 1:</label><br>
                        <input class="inputmoyen" type="text" name="nompara1" id="nompara1" required><br>
                        <label for="para1">Paragraphe 1:</label><br>
                        <textarea class="inputpara" name="para1" id="para1" required></textarea><br>
                        <div class="ajouterPara">Ajouter un paragraphe</div><br>
                    </div>

                    <div class="zone-pro-add-voyage-bloc-para">
                        <label for="nompara2">Titre paragraphe 2:</label><br>
                        <input class="inputmoyen" type="text" name="nompara2" id="nompara2"><br>
                        <label for="para2">Paragraphe 2:</label><br>
                        <textarea class="inputpara" name="para2" id="para2"></textarea><br>
                        <div class="retirerPara">Retirer ce paragraphe</div><br>
                        <div class="ajouterPara">Ajouter un paragraphe</div><br>

                    </div>

                    <div class="zone-pro-add-voyage-bloc-para">
                        <label for="nompara3">Titre paragraphe 3:</label><br>
                        <input class="inputmoyen" type="text" name="nompara3" id="nompara3"><br>
                        <label for="para3">Paragraphe 3:</label><br>
                        <textarea class="inputpara" name="para3" id="para3"></textarea><br>
                        <div class="retirerPara">Retirer ce paragraphe</div><br>
                        <div class="ajouterPara">Ajouter un paragraphe</div><br>
                    </div>

                    <div class="zone-pro-add-voyage-bloc-para">
                        <label for="nompara4">Titre paragraphe 4:</label><br>
                        <input class="inputmoyen" type="text" name="nompara4" id="nompara4"><br>
                        <label for="para4">Paragraphe 4:</label><br>
                        <textarea class="inputpara" name="para4" id="para4"></textarea><br>
                        <div class="retirerPara">Retirer ce paragraphe</div><br>
                    </div>


                    <label for="lieuDuSejour">Lieu du sejour:</label><br>
                    <input class="inputmoyen" type="text" name="lieuDuSejour" id="lieuDuSejour" required><br>

                    <label for="phraseLieuDuSejour">Phrase d'accroche du lieu:</label><br>
                    <textarea class="inputgrand" name="phraseLieuDuSejour" id="phraseLieuDuSejour" required></textarea><br>

                    <label for="imageLieuVoyage">Image lieu du séjour :</label>
                    <input class="inputfile" type="file" name="imageLieuVoyage" id="imageLieuVoyage" required><br>


                    <select name="avantages-voyage-1">
                        <?php
                        echo '<option value="label" selected disabled>Sélectionner avantage 1</option>';
                        foreach (glob("img/avantages-voyage/*.png") as $filename) {
                            echo '<option value="' . $filename . '" required>' . $filename . '</option>';
                        }
                        ?>
                    </select>
                    <select name="avantages-voyage-2">
                        <?php
                        echo '<option value="label" selected disabled>Sélectionner avantage 2</option>';
                        foreach (glob("img/avantages-voyage/*.png") as $filename) {
                            echo '<option value="' . $filename . '" required>' . $filename . '</option>';
                        }
                        ?>
                    </select>
                    <select name="avantages-voyage-3">
                        <?php
                        echo '<option value="label" selected disabled>Sélectionner avantage 3</option>';
                        foreach (glob("img/avantages-voyage/*.png") as $filename) {
                            echo '<option value="' . $filename . '" required>' . $filename . '</option>';
                        }
                        ?>
                    </select>

                    <select name="nombre-jours">
                        <option value="label" selected disabled>Sélectionner le nombre de jours max</option>
                        <?php
                        for ($i = 2; $i <= 15; $i++) {
                            echo '<option value="' . $i . '">' . $i . ' jours</option>' . PHP_EOL;
                        }
                        ?>
                    </select>

                    <select name="nombre-personne-max">
                        <option value="label" selected disabled>Sélectionner le nombre de pers. max</option>
                        <?php
                        for ($i = 1; $i <= 8; $i++) {
                            echo '<option value="' . $i . '">' . $i . ' pers.</option>' . PHP_EOL;
                        }
                        ?>
                    </select>

                    <label for="disponible-partir-de">Disponible à partir du</label>
                    <input type="date" id="disponible-partir-de" name="disponible-partir-de" value="2024-05-17" min="2024-05-17" max="2024-12-31" /><br>

                    <label for="prixNuitParPers">Prix nuit par personne:</label><br>
                    <input class="inputpetit" type="number" name="prixNuitParPers" id="prixNuitParPers" required><br>

                    <label for="promoCheckbox">Mettre en promotion</label><br>
                    <input type="checkbox" id="promoCheckbox" name="promoCheckbox">


                </div>




                <div id="zone-pro-promo">



                    <h2 class="titre-zone-pro">Détails de la promotion</h2>

                    <br>




                    <label for="reduc">Réduction du voyage (-XX%):</label><br>
                    <input class="inputpetit" type="text" name="reduc" id="reduc"><br>


                </div>
                <button type="submit" name="ajouterVoyage">Ajouter mon voyage</button>
            </form>


        </div>



    </div>
</section>