<?php
session_start();

// Limpiar la sesión
session_unset();
session_destroy();

header("Location: /");

exit;
