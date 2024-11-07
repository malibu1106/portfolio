<a href="../../../index.php#elsan"><div class="return_to_portfolio"></div></a>
<nav class="bg-blue-600 p-2 h-16 fixed top-0 w-[100%] z-20 border-b border-white">
    <ul class="flex justify-between items-center w-full">
        <li class="w-1/4 flex justify-center items-center h-12 ">
            <h2 class="text-gray-100 text-xl font-bold bg-blue-600 z-10">CE Elsan</h2>
        </li>

        <?php if (!isset($_SESSION['logged_in'])){
        echo
        '<div id="login_message" class="fixed top-0 px-4 h-16 w-[100%] flex items-center justify-end text-gray-100 truncate border-b border-solid border-white"></div>';}
        ?>


        <?php if (isset($_SESSION['logged_in'])){
            echo          
        '<li class="w-1/4 flex justify-center">
                <a href="../index.php"><img class="nav_icons h-12" src="../images/icons/home.png" alt="bouton du menu" id="menu_bouton"></a>
        </li>';}
        ?>

        <?php if (isset($_SESSION) && isset($_SESSION['role']) && ($_SESSION['role'] === "admin")){
            echo
        '<li class="w-1/4 flex justify-center">
            <a href="back_office.php">
                <img class="h-12" src="../images/icons/back_office.png" alt="bouton de l\'interface administrateur">
            </a>
        </li>';}
        ?>

<?php
if (isset($_SESSION['logged_in'])) {
    // Récupérer l'URL actuelle
    $current_url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

    // Vérifier si l'URL actuelle contient /pages/profile.php
    if (strpos($current_url, '/pages/profile.php') !== false) {
        echo
        '<li class="w-1/4 flex justify-center"> 
            <a href="../php_sql/logout.php"> 
                <img class="h-12" src="../images/icons/logout.png" alt="bouton déconnexion"> 
            </a>
        </li>';
    } else {
        echo
        '<li class="w-1/4 flex justify-center">
            <a href="profile.php">
                <img class="h-12" src="../images/icons/user.png" alt="bouton accès profil">
            </a>
        </li>';
    }
}
?>
    </ul>
</nav>

<?php
if (isset($_SESSION['info_message']) && !empty($_SESSION['info_message'])){
    

    echo
    '<div class="info_message bg-blue-600 p-2 h-16 absolute top-0 w-[100%] flex items-center justify-center font-bold lg:text-2xl text-gray-100 z-30">';
    echo $_SESSION['info_message'];
    echo '</div>';    

    $_SESSION['info_message'] = "";}
?>
<div class="mb-24"></div>