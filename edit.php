<?php
    require_once 'connect.php';
    $pdo = new \PDO(DSN, USER, PASS);
    
    if (!empty($_GET && isset($_GET['submit']))) {
    $data = array_map('trim', $_GET);
    // $data=$_GET;
    
    // Déclaration des variables
    $title = $data['title'];
    $content = $data['content'];
    $author = $data['author'];
    $id=$data['id'];

    // Requete pour ajouter les valeur
    //  $query = "INSERT INTO story (`title`, `content`, `author`) VALUES ('$title', '$content', '$author')";

    //$pdo->exec($query);
    $query= "UPDATE story SET `title` = :title, `content` = :content, `author` = :author WHERE id = :id"; 

    $statement = $pdo->prepare($query);
    $statement->bindValue(":title",$title);
    $statement->bindValue(":content",$content);
    $statement->bindValue(":author",$author);
    $statement->bindValue(":id",$id);

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

<?php
    $query= "SELECT * FROM story WHERE id=:id";
    $statement = $pdo->prepare($query);
    $statement->bindValue(":id",$_GET['id']);
    $statement->execute();
    $story= $statement->fetch();
?>


<body>
    <div class="container">
        <h1> Modifier <?php echo $story['title'] ?></h1>
        <form>
            <input type="hidden" name="id" value="<?=$_GET['id']?>">
                <div class="mb-3">
                <label class="form-label" for="titre">Titre :</label>
                <br>
                <input class="form-control" type="text" id="titre" name="title" maxlength="45" placeholder="Titre" value="<?php echo $story['title'] ?>" />
            </div>
            <div class="mb-3">
                <label class="form-label" for="content">Contenu :</label>
                <br>
                <textarea class="form-control" id="content" name="content" maxlength="150" rows="10" placeholder="150 caractères max"><?php echo $story['content'] ?></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label" for="author">Auteur :</label>
                <br>
                <input class="form-control" type="text" id="author" name="author" maxlength="45" placeholder="Auteur" value="<?php echo $story['author'] ?>"/>
            </div>
            <input class="btn btn-primary" type="submit" value="Modifier" name="submit"/>

        </form>
    </div>
</body>

</html>