<?php
$page_title = 'Detalles';
include_once 'partials/header.php';
?>
    <div class=" w-full text-center flex justify-center">
        <?php $content['h1'] = 'Datos de la obra'; include('partials/h1.php'); ?>
    </div>
        <div class="w-full text-center justify-center">
            <?php
                $manga_id = $book['manga_id'];
                $manga_name = $book['manga_name'];
                $manga_isbn = $book['manga_isbn'];
                $manga_img = $book['manga_img'];
                $manga_description = $book['manga_description'];
                $manga_precio = $book['manga_precio'];
                $editorial_nombre = $book['editorial_nombre'];
                $categoria_nombre = $book['categoria_nombre']
            ?>
            <div class="">
            <?php $content['h1'] = $book['manga_name']; include('partials/h1.php'); ?>
            </div>
            <div class="w-full text-center flex justify-center p-15">
                <img src="portadas/<?php echo $manga_img; ?>" alt="">
            </div>
            <br>
            <div>
                <p class="mb-6 text-lg font-normal text-gray-500 lg:text-xl sm:px-16 xl:px-48 dark:text-gray-400">
                    ISBN: <?php echo $manga_isbn; ?>
                </p>
            </div>
            <br>
            <div>
                <p class="mb-6 text-lg font-normal text-gray-500 lg:text-xl sm:px-16 xl:px-48 dark:text-gray-400">
                    Descripción: <?php echo $manga_description; ?>
                </p>
            </div>
            <br>
            <div>
                <p class="mb-6 text-lg font-normal text-gray-500 lg:text-xl sm:px-16 xl:px-48 dark:text-gray-400">
                    Precio: <?php echo $manga_precio; ?>€
                </p>
            </div>
            <br>
            <div>
                <p class="mb-6 text-lg font-normal text-gray-500 lg:text-xl sm:px-16 xl:px-48 dark:text-gray-400">
                    Editorial: <?php echo $editorial_nombre; ?>
                </p>
            </div>
            <br>
            <div>
                <p class="mb-6 text-lg font-normal text-gray-500 lg:text-xl sm:px-16 xl:px-48 dark:text-gray-400">
                    Categoría: <?php echo $categoria_nombre; ?>
                </p>
            </div>
            <br>
        </div>

    


<?php
include_once 'partials/footer.php';
?>