<?php
    include_once 'partials/header.php';
    ob_start();
?>
<div class="w-full text-center flex justify-center">
        <img class="ms-auto flex justify-center items-center w-40" src="/images/Manga-logo-red.png">
</div>

<div class="text-center ">
    <?php
        $content['h1'] = isset($content['page_title']) ? $content['page_title'] : 'Registre su cuenta';
        include('partials/h1.php');

    ?>
</div>
<input type="hidden" name="page" value="register">
<input type="hidden" name="action" value="register">
<div class="">
    <label for="name" class="block text-black w-full text-center">Usuario</label>
    <input type="text" name="name" id="name" value="" class="w-full px-3 py-2 text-center border rounded-md" required>
</div><br>
<div class="">
    <label for="email" class="block text-black w-full text-center">Email</label>
    <input type="email" name="email" id="email" value="" class="w-full px-3 py-2 text-center border rounded-md" required>
</div><br>
<div class="">
    <label for="password" class="block text-black w-full text-center">Contraseña</label>
    <input type="password" name="password" id="password" value="" class="w-full px-3 py-2 text-center border rounded-md" required>
</div><br>
<div class="">
    <label for="password" class="block text-black w-full text-center">Repita contraseña</label>
    <input type="password" name="password2" id="password2" value="" class="w-full px-3 py-2 text-center border rounded-md" required>
</div><br>
<div class="w-full text-center flex justify-center">
    <div class="flex items-center h-5">
      <input id="remember" type="checkbox" value="" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800" required />
    </div>
    <label for="remember" class="ms-2 text-sm pl-2 font-medium text-gray-900 dark:text-gray-300">Acepta los términos y condiciones</label>
  </div>
  <br>
<div class="w-full text-center flex justify-center">
<?php
$content['form-content'] = ob_get_clean();
$content['button-save-text'] = 'Guardar';
include('partials/form.php');
?>
</div>
<div class="w-full text-center flex justify-center">
    <a href="/?page=login" class="mb-6 text-lg font-normal text-gray-500 lg:text-xl sm:px-16 xl:px-48 dark:text-gray-400">
        ¿Ya tiene cuenta? Inicie sesión aquí
    </a>
</div>
<?php
include_once 'partials/footer.php';
?>