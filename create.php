<?php
if (!empty($_GET)) {
    require_once 'connect.php';

    $pdo = new \PDO(DSN, USER, PASS);

    $data = array_map('trim', $_GET);
    // $data=$_GET;
    
    // Déclaration des variables
    $title = $data['title'];
    $content = $data['content'];
    $author = $data['author'];

    // Requete pour ajouter les valeur
    //  $query = "INSERT INTO story (`title`, `content`, `author`) VALUES ('$title', '$content', '$author')";

    //$pdo->exec($query);
    $query= "INSERT INTO story (`title`, `content`, `author`) VALUES (:title,:content,:author)";

    $statement = $pdo->prepare($query);
    $statement->bindValue(":title",$title);
    $statement->bindValue(":content",$content);
    $statement->bindValue(":author",$author);

    $statement->execute();
    
    header('Location:index.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h1> Créer une histoire </h1>
        <form>
            <div class="mb-3">
                <label class="form-label" for="titre">Titre :</label>
                <br>
                <input class="form-control" type="text" id="titre" name="title" maxlength="45" placeholder="Titre" />
            </div>
            <div class="mb-3">
                <label class="form-label" for="content">Contenu :</label>
                <br>
                <textarea class="form-control" id="content" name="content" maxlength="150" rows="10" placeholder="150 caractères max"></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label" for="author">Auteur :</label>
                <br>
                <input class="form-control" type="text" id="author" name="author" maxlength="45" placeholder="Auteur" />
            </div>
            <button class="btn btn-primary" type="submit">Créer</button>
        </form>
    </div>
</body>

</html>