<?php
// guardar el token en la sesión
$_SESSION['token'] = $_GET['token'] ?? null;

include_once 'partials/header.php';

$content['h1'] = isset($content['page_title']) ? $content['page_title'] : 'Recuperar la cuenta';
include('partials/h1.php');

ob_start();
?>
<input type="hidden" name="page" value="forgpassw">
<input type="hidden" name="action" value="reset">
<input type="hidden" name="token" value="<?php echo htmlspecialchars($_SESSION['token']); ?>">
<div class="mb-4">
    <label for="password" class="block text-black w-full text-center">Contraseña nueva</label>
    <input type="password" name="password" id="password" value="" class="w-full px-3 py-2 text-center border rounded-md" required>
</div>
<div class="mb-4">
    <label for="password" class="block text-black w-full text-center">Contraseña nueva (otra vez)</label>
    <input type="password" name="password2" id="password2" value="" class="w-full px-3 py-2 text-center border rounded-md" required>
</div>
<?php
$content['form-content'] = ob_get_clean();
$content['button-save-text'] = 'Guardar';
include('partials/form.php');

include_once 'partials/footer.php';