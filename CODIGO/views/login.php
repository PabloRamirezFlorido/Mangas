<?php
    include_once 'partials/header.php';
    ob_start();
?>
<div class="w-full text-center flex justify-center">
        <img class="ms-auto flex justify-center items-center w-40" src="/images/Manga-logo-red.png">
</div>

<div class="text-center ">
    <?php
        $content['h1'] = isset($content['page_title']) ? $content['page_title'] : 'Acceda con su cuenta';
        include('partials/h1.php');

    ?>
</div>
<input type="hidden" name="page" value="login">
<input type="hidden" name="action" value="login">
<div class="">
    <label for="name" class="block text-black w-full text-center">Usuario</label>
    <input type="text" name="email" id="email" value="" class="w-full px-3 py-2 text-center border rounded-md" required>
</div><br>
<div class="">
    <label for="password" class="block text-black w-full text-center">Contraseña</label>
    <input type="password" name="password" id="password" value="" class="w-full px-3 py-2 text-center border rounded-md" required>
</div><br>
<div class="w-full text-center flex justify-center">
<?php
$content['form-content'] = ob_get_clean();
$content['button-save-text'] = 'Acceder';
include('partials/form.php');
?>
</div>

<div class="w-full text-center flex justify-center">
    <a href="/?page=register" class="mb-6 text-lg font-normal text-gray-500 lg:text-xl sm:px-16 xl:px-48 dark:text-gray-400">
        ¿No tiene cuenta? Registrese aquí
    </a>
</div>
<div class="w-full text-center flex justify-center">
    <a href="/?page=forgpassw" class="mb-6 text-lg font-normal text-gray-500 lg:text-xl sm:px-16 xl:px-48 dark:text-gray-400">
        ¿No consigue entrar? Cambie su contraseña aquí
    </a>
</div>
<?php
include_once 'partials/footer.php';
?>