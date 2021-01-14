<?php

$public = "public/uploads/";


$files = $_FILES["files"];
for ($i = 0; $i < count($files["tmp_name"]); $i++) {
    $name = $public . uniqid() . "-" . str_replace(" ", "-", basename($files["name"][$i]));
    $imageData = file_get_contents($files["tmp_name"][$i]);
    echo sprintf('<img src="data:' . $files["type"][$i] . ';base64,%s" />', base64_encode($imageData));
    move_uploaded_file($files["tmp_name"][$i], $name);
}
?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--    <script src="../public/js/dropzone.min.js"></script>-->
    <!--    <link rel="stylesheet" href="../public/css/dropzone.min.css">-->
    <!--    <link rel="stylesheet" href="../public/css/basic.min.css">-->
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <title>Utilisateur</title>
</head>
<body class="min-h-screen">
<nav>
    <ul class="flex items-center justify-center gap-4 uppercase">
        <li>
            <a href="#">Se connecter</a>
        </li>
        <li>
            <a href="#">Se déconnecter</a>
        </li>
    </ul>
</nav>
<main>
    <div class="container p-8 mx-auto">
        <h1 class="text-center text-6xl font-bold uppercase">Galeries</h1>
        <button
                class="btn-new-gallery mt-4 mx-auto block px-6 py-2 text-xs font-medium leading-6 text-center text-white uppercase transition bg-black rounded-full shadow ripple waves-light hover:shadow-lg focus:outline-none hover:bg-black">
            Créer une nouvelle
        </button>
        <?php foreach ($galleries as $gallery): ?>
            <div class="gallery">
                <h1><?= $gallery->name ?></h1>
                <div class="photos">
                    <?php foreach ($gallery->images as $image): ?>
                        <img src="<?= $image->src ?>"
                             alt="<?= isset($image->alt) ? $image->alt : "Galerie de l'utilisateur" ?>">
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endforeach; ?>


        <div class="create-new-gallery fixed bottom-0 right-0 mr-8 mb-12 w-4/5 md:w-96 hidden">
            <form method="post" action="" enctype="multipart/form-data"
                  class="dropzone flex flex-col gap-2 bg-white rounded-lg shadow-md px-4 py-2 border-1 border-gray-400">
                <label for="name">Nom de la galerie</label>
                <input type="text" name="name" id="name" class="border rounded-sm px-1" value="Test">
                <label for="desc">Description de la galerie</label>
                <textarea
                        name="description"
                        id="desc"
                        cols="30"
                        rows="4"
                        class="border rounded-sm px-1"
                >Test de description</textarea>
                <input name="files[]" type="file" multiple/>
                <button type="submit" class="bg-black text-white font-bold justify-center rounded-sm flex py-1">Créer ma
                    galerie
                </button>
            </form>
        </div>
    </div>
</main>
<script src="../public/js/app.js"></script>
</body>
</html>