function menu() {
    var x = document.getElementById('menu_mobile');
    if (x.style.display === "block") {
        x.style.display = "none";
        document.getElementById('icone_menu_burger').style.transform = 'rotate(0deg)';
        document.getElementById('icone_menu_burger').style.transition = '0.5s';
    } else {
        x.style.display = "block";
        document.getElementById('icone_menu_burger').style.transform = 'rotate(90deg)';
        document.getElementById('icone_menu_burger').style.transition = '0.5s';
    }
}