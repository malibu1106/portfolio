<?php 
session_start();
if (isset($_SESSION['logged_in'])) {
    header('Location: pages/home.php');
}
?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./output.css" rel="stylesheet">
    <script src="js/login.js"></script>
    <title>Elsan</title>
</head>
<body class="pb-8">

    <?php include 'includes/nav.php'; ?>
    

    <h1 class="text-blue-600 font-bold text-4xl text-center m-8 2xl:m-16">Bienvenue !</h1>
    <main class="p-1 flex flex-col gap-8 lg:flex-row lg:p-4 max-w-screen-2xl mx-auto">
        <section class="login w-[96%] bg-blue-600 mx-auto p-1 max-w-xl lg:max-h-[350px] rounded">
            <h2 class="text-gray-100 font-bold text-3xl text-center m-4">Connexion</h2>
            <form id="signin_form" class="flex flex-col p-4" action="php_sql/signin_handler.php" method="POST">
                <input class="mb-6 h-16 text-3xl text-center" type="mail" placeholder="Adresse mail" name="email" required>
                <div class="relative">
                    <input class="mb-6 h-16 text-3xl text-center w-[100%]" type="password" placeholder="Mot de passe" name="password" id="password" required>
                    <span class="toggle-password absolute right-0 p-4" onclick="togglePassword('password', this)">
                        <img class="show-hide-password w-8" src="images/icons/show_password.png" alt="Afficher/Masquer mot de passe">
                    </span> 
                </div>
                <input id="show_signin_btn" class="bg-gray-100 h-16 w-[50%] mx-auto text-3xl font-semibold text-green-700" type="submit" value="Valider">
            </form>
        </section>

        <section class="signup w-[96%] bg-blue-600 mx-auto p-1 max-w-xl rounded">
            <h2 class="text-gray-100 font-bold text-3xl text-center m-4">Inscription</h2>
            <form id="signup_form" class="flex flex-col p-4" action="php_sql/signup_handler.php" method="POST">
                <input class="mb-6 h-16 text-3xl text-center" type="text" placeholder="Prénom" name="first_name" required>
                <input class="mb-6 h-16 text-3xl text-center" type="text" placeholder="Nom" name="last_name" required>
                <input class="mb-6 h-16 text-3xl text-center" type="email" placeholder="Adresse mail" name="su_email" required>
                <div class="relative">
                    <input class="mb-6 h-16 text-3xl text-center w-[100%]" type="password" placeholder="Mot de passe" name="su_password" id="su_password" autocomplete="off" required>
                    <span class="toggle-password absolute right-0 p-4" onclick="togglePassword('su_password', this)">
                        <img class="show-hide-password w-8" src="images/icons/show_password.png" alt="Afficher/Masquer mot de passe">
                    </span> 
                </div>
                <div class="relative">
                    <input class="mb-6 h-16 text-3xl text-center w-[100%]" type="password" placeholder="Confirmer mot de passe" name="su_retyped_password" id="su_retyped_password" autocomplete="off" required>
                    <span class="toggle-password absolute right-0 p-4" onclick="togglePassword('su_retyped_password', this)">
                        <img class="show-hide-password w-8" src="images/icons/show_password.png" alt="Afficher/Masquer mot de passe">
                    </span> 
                </div>
                <input id="show_signup_btn" class="bg-gray-100 h-16 w-[50%] mx-auto text-3xl font-semibold text-green-700" type="submit" value="Valider">
            </form>
        </section>
    </main>    

</body>
</html>
