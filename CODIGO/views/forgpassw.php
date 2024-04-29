<?php
include_once 'partials/header.php';

$content['h1'] = isset($content['page_title']) ? $content['page_title'] : 'Recuperar la cuenta';
include('partials/h1.php');

ob_start();
?>
<input type="hidden" name="page" value="forgpassw">
<input type="hidden" name="action" value="notify">
<div class="mb-4">
    <label for="email" class="block text-black">Email:</label>
    <input type="email" name="email" id="email" class="w-full px-3 py-2 border rounded-md" required>
</div>
<?php
$content['form-content'] = ob_get_clean();
include('partials/form.php');

include_once 'partials/footer.php';