<?php
/*
Este es el menú de navegación del sitio web. Se muestra en la parte superior de la página y siempre está visible.
Contiene una lista de enlaces que permiten al usuario navegar por el sitio web y un menú desplegable que muestra la información del usuario.
El menú de cuenta o perfil cambia dependiendo de si el usuario ha iniciado sesión o cerrado sesión.

La pagina usa Tailwindcss para los estilos propios

Menubar
    Actions
        - show (display the menubar)
    Fields
        - user
    Views
        - user
        - login
        - register
        - logout
    Links
        - Home
        - Mylibrary
        - Profile
*/
?>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

<nav class="p-5 bg-gray-800 shadow md:flex md:items-center md:justify-between">
    <div class="flex justify-between items-center ">
                <a href="/">
                    <img class="ms-auto flex justify-center items-start w-20" src="/images/Manga-logo-red.png">
                </a>

      <span class="text-3xl cursor-pointer mx-2 md:hidden block">
        <ion-icon name="menu" onclick="Menu(this)"></ion-icon>
      </span>
    </div>

    <ul class="md:flex md:items-center z-[-1] md:z-auto md:static absolute bg-gray-800 w-full left-0 md:w-auto md:py-0 py-4 md:pl-0 pl-7 md:opacity-100 opacity-0 top-[-400px] transition-all ease-in duration-500">
      <li class="mx-4 my-6 md:my-0">
      <?php $content['a']['text'] = ' MyLibrary'; $content['a']['href'] = '?page=mylibrary'; include('a.php'); ?>
      </li>
        <?php if (isset($_SESSION['user'])) : ?>
            <?php include_once('loggedInUserMenu.php'); ?>
            <?php else : ?>
            <li class="mx-4 my-6 md:my-0">
                <?php $content['a']['text'] = 'Login '; $content['a']['href'] = '?page=login'; include('a.php'); ?>
            </li>
        <?php endif; ?>
    </ul>
  </nav>


  <script>
    function Menu(e){
      let list = document.querySelector('ul');
      e.name === 'menu' ? (e.name = "close",list.classList.add('top-[80px]') , list.classList.add('opacity-100')) :( e.name = "menu" ,list.classList.remove('top-[80px]'),list.classList.remove('opacity-100'))
    }
  </script>
