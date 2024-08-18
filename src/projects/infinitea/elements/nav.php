<nav>
    <button id="burgerButton"><svg class="w-[40px] h-[40px] text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
  <text x="50%" y="50%" dominant-baseline="central" text-anchor="middle" font-size="16" fill="#93455f">☰</text>
</svg>
</button>
    <ul id="burger">
        <a href="./index.php"><li>Accueil</li></a>
        <?php 
        if(empty($_SESSION['admin'])){
            echo '<a href="./index.php#main"><li>Nos Produits</li></a>';
            echo '<a href="./index.php?page=contact#main"><li>Contact</li></a>';
            
            }
            if(isset($_SESSION["user_id"])){
            echo '<a href="./pages/logout.php"><li>Déconnexion</li></a>';
        }
        else{
            echo '<a href="./index.php?page=connexion#main"><li>Connexion</li></a>';
        }
        
         if(!empty($_SESSION['admin'])){
            

                    echo '<a href="index.php?page=control_panel#main"><li>Gestion</li></a>';
                    
                }
                

            
        ?>
    </ul>
</nav>