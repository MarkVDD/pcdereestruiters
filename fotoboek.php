<?php 
$success = true;
$page = array_key_exists('pagina', $_GET) ? intval($_GET['pagina']) : 0;

$all_pictures = glob('crossles/*.jpg');

$total_images = ($all_pictures === false) ? 0 : count($all_pictures);

$images_per_page = 30;

$max_pages = ceil($total_images / $images_per_page);

if ($page <= -1) {
    $success = false;
}

if ($page > $max_pages) {
    $success = false;
}
if ($success === false) {
    echo "<div class='container text-center'><p class='text-danger fs-32 mt-100'>Geen foto's om te tonen</p></div>";
}

if($success){
    $offset = ($page -1) * $images_per_page;
    $fotos = array_slice($all_pictures, $offset, $images_per_page);
}

?>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>PCDereestruiters Fotoboek</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.13/css/mdb.min.css" rel="stylesheet">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
    <link rel="stylesheet" type="text/css" media="screen" href="css/main.css" />
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
        <a class="navbar-brand text-marigold" href="home">PCDereestruiters</a>
        <li class="nav-item ml-auto"><a class="nav-link ml-auto text-marigold" href="home">Home</a></li>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </nav>
    <h3 class="text-center mt-10">Fotoboek</h3>
    <div id='fotoboek' class='container mx-auto'>
        <a class="position-sticky float-left" href="fotoboek?pagina=<?= $page - 1 ?>">Vorige pagina</a>
        <a class="invisible" href="fotoboek">Naar begin</a>
        <a class="position-sticky float-right" href="fotoboek?pagina=<?= $page + 1 ?>">Volgende pagina</a>
        <div class="col-md-12 ml-1">
            <?php 
            if ($success) {
                foreach ($fotos as $foto) {

                    echo '<a target="_blank" href="/' . $foto . '"><img class="col-md-4 mb-4" src="/' . $foto . '" width="200" height="200"></a>';

                }
            } ?>
        <a class="position-sticky float-left" href="fotoboek?pagina=<?= $page - 1 ?>">Vorige pagina</a>
        <a class="invisible" href="fotoboek">Naar begin</a>
        <a class="position-sticky float-right" href="fotoboek?pagina=<?= $page + 1 ?>">Volgende pagina</a>

        </div>
    </div>
</body>

</html>