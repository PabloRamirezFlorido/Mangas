<?php
include_once 'partials/header.php';

$content['h1'] = isset($content['page_title']) ? $content['page_title'] : 'Perfil de usuario';
include('partials/h1.php');

ob_start();
?>
<input type="hidden" name="page" value="profile">
<input type="hidden" name="action" value="update">
<div class="mb-4">
    <label for="name" class="block text-black">Nombre:</label>
    <input type="text" name="name" id="name" value="<?php echo isset($_SESSION['old']) ? htmlspecialchars($_SESSION['old']['name']) : $_SESSION['user']['usuario_name'] ?? ''; ?>" class="w-full px-3 py-2 border rounded-md" required>
</div>
<div class="mb-4">
    <label for="email" class="block text-black">Email:</label>
    <input disabled title="No se puede cambiar la dirección de correo" type="email" name="email" id="email" value="<?php echo htmlspecialchars($_SESSION['user']['usuario_email']); ?>" class="w-full px-3 py-2 border rounded-md" required>
</div>
<?php
$content['form-content'] = ob_get_clean();
include('partials/form.php');

include_once 'partials/footer.php';