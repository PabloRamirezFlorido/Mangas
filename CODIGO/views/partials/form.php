<form action="/" method="post" class="bg-gray-100 p-6 rounded-md">
    <div class="text-red-500" id="error"><?php
    if (isset($_SESSION['errors'])) {
        echo '<ul>';
        foreach ($_SESSION['errors'] as $error) {
            echo "<li>$error</li>";
        }
        echo '</ul>';
        $_SESSION['errors'] = [];
    }
    ?></div>
    <div class="text-green-500" id="success"><?php 
    if (isset($_SESSION['success-message'])) {
        echo $_SESSION['success-message'];
        $_SESSION['success-message'] = '';
    }
    ?></div>
    <?php echo ($content['form-content'] ?? '') ?>
    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"><?php echo $content['button-save-text'] ?? 'Submit'; ?></button>
</form>
