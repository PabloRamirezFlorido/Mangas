<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bring in the tailwindcss stylesheet -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.2/dist/tailwind.min.css">
    <title><?php echo ($content['page_title'] ?? "Bienvenido a Manga Manía"); ?></title>
</head>
<body>
<?php include 'navbar.php'; ?>
<section class="container mx-auto my-6 p-4">