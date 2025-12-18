<?php



if (!isset($_POST["id"])) {
    exit;
}
$id = $_POST["id"];

$tite = isset($_POST["title"]) ? $_POST["title"] : "";
$price = isset($_POST["price"]) ? $_POST["price"] : 0;
$photo = isset($_POST["thumbnail"]) ? $_POST["thumbnail"] : "";

?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>



    <!-- TODO 5: Inclure Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
</body>

</html>


<pre>
  <?php
  print_r("id " . $id);
  print_r("price " . $price);
  print_r("title " . $title);
  print_r("photo" . $photo);
  ?> 
</pre>