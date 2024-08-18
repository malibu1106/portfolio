<?php if(isset($_SESSION['user_id']) && ((!isset($_GET['page']) || $_GET['page'] !== "profil"))){
            echo '<a href="index.php?page=profil#main"><svg class="w-[40px] h-[40px] text-gray-800 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
  <path stroke="#93455f" stroke-width="1.8" d="M7 17v1a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1v-1a3 3 0 0 0-3-3h-4a3 3 0 0 0-3 3Zm8-9a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
</svg></a>';}?>
<?php if(isset($_SESSION['user_id']) && ((!isset($_GET['page']) || $_GET['page'] !== "cart"))){
echo '<a href="index.php?page=cart#main"><svg class="w-[40px] h-[40px] text-gray-800 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
  <path stroke="#93455f" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7" d="M5 4h1.5L9 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm-8.5-3h9.25L19 7H7.312"/>
</svg></a>';}?>