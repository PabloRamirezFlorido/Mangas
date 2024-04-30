<?php
$page_title = 'Bienvenido a tu biblioteca';
include_once 'partials/header.php';
?>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <br>
    <div class="w-full text-center flex justify-center">
    <?php $content['h1'] = 'Bienvenido a tu biblioteca'; include('partials/h1.php'); ?>
    </div>
    <div class="w-full text-center flex justify-center">
        <img class="ms-auto flex justify-center items-center w-80" src="/images/g2.webp">
    </div><br>
    <div class="w-full text-center flex justify-center">
        <p class="mb-6 text-lg font-normal text-gray-500 lg:text-xl sm:px-16 xl:px-48 dark:text-gray-400">Los volumenes a los que les hayas dado ❤ apareceran aquí</p>
    </div>
    <div class="grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 align-center">
            <?php
            while ($book = $books->fetch_assoc()) {
                $manga_id = $book['manga_id'];
                $manga_name = $book['manga_name'];
                $manga_img = $book['manga_img'];
                $manga_description = $book['manga_description'];
                $manga_liked = $book['liked'];
                $total_likes = $book['total_likes'];
            ?>
                <?php
                    if ($manga_liked) {
                ?>
                <div class="max-w-sm bd-white bg-teal-400 border border-black-500 rounded-lg shadow">
                    <h5 class="font-bold text-gray-500 text-3xl text-center dark:text-gray-400 pt-10">
                        <?php echo $manga_name; ?>
                    </h5>
                    <a href="/?page=details&id=<?php echo $manga_id; ?>" class="w-full text-center flex justify-center">
                        <img src="/portadas/<?php echo $manga_img; ?>" class="rounded-t-lg flex justify-center items-center p-10">
                    </a>
                    <div class="grid grid-cols-2">
                        <div class="pb-10 flex justify-start pl-10">
                            <a href="/?page=details&id=<?php echo $manga_id; ?>" class="inline-flex items-center px-3 px-2 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-green-600">      
                                Más información
                                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M13.2328 16.4569C12.9328 16.7426 12.9212 17.2173 13.2069 17.5172C13.4926 17.8172 13.9673 17.8288 14.2672 17.5431L13.2328 16.4569ZM19.5172 12.5431C19.8172 12.2574 19.8288 11.7827 19.5431 11.4828C19.2574 11.1828 18.7827 11.1712 18.4828 11.4569L19.5172 12.5431ZM18.4828 12.5431C18.7827 12.8288 19.2574 12.8172 19.5431 12.5172C19.8288 12.2173 19.8172 11.7426 19.5172 11.4569L18.4828 12.5431ZM14.2672 6.4569C13.9673 6.17123 13.4926 6.18281 13.2069 6.48276C12.9212 6.78271 12.9328 7.25744 13.2328 7.5431L14.2672 6.4569ZM19 12.75C19.4142 12.75 19.75 12.4142 19.75 12C19.75 11.5858 19.4142 11.25 19 11.25V12.75ZM5 11.25C4.58579 11.25 4.25 11.5858 4.25 12C4.25 12.4142 4.58579 12.75 5 12.75V11.25ZM14.2672 17.5431L19.5172 12.5431L18.4828 11.4569L13.2328 16.4569L14.2672 17.5431ZM19.5172 11.4569L14.2672 6.4569L13.2328 7.5431L18.4828 12.5431L19.5172 11.4569ZM19 11.25L5 11.25V12.75L19 12.75V11.25Z" fill="#000000"></path> </g></svg> 
                            </a>
                        </div>
                        <div class="pb-10 flex justify-end pr-10">
                            <form action="/?page=details&id=<?php echo $manga_id; ?>" method="post">
                                <input type="hidden" name="id" value="<?php echo $manga_id; ?>">
                                <?php
                                if ($manga_liked) {
                                ?>
                                    <input type="hidden" name="action" value="unlike">
                                    <button type="submit" class="inline-flex items-center px-3 px-2 text-sm font-medium text-center text-white bg-green-600 rounded-lg hover:bg-red-600">
                                        <?php
                                        echo (int)$total_likes; 
                                        ?>   ❤
                                    </button>
                                <?php
                                } else {
                                ?>
                                    <input type="hidden" name="action" value="like">
                                    <button type="submit" class="inline-flex items-center px-3 px-2 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-green-600">
                                        <?php
                                        echo (int)$total_likes; 
                                        ?>   ❤
                                    </button>
                                <?php
                                }
                                ?>
                            </form>
                        </div>
                    </div>
                </div>
                <?php
                    }
                ?>
            <?php
            }
            ?>

        </div>
        </div>


    


<?php
include_once 'partials/footer.php';
?>