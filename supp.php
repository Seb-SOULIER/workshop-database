<?php
    require_once 'connect.php';
    $pdo = new \PDO(DSN, USER, PASS);
    
    if (isset($_GET['id']) && isset($_GET['confirm'])) {
    
    // Déclaration des variables
    $id=$_GET['id'];

    $query= "DELETE FROM story WHERE id = :id"; 

    $statement = $pdo->prepare($query);
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
        <h1> Suppression de l'histoire <?php echo $story['title'] ?></h1>
        <p class='alert alert-danger'> Etes vous sur de vouloir supprimer ?</p> 
        <form>
            <input type="hidden" name="id" value="<?=$_GET['id']?>">
            <a href='index.php' class='btn btn-warning'>Annuler</a>
            <input class="btn btn-danger" type="submit" value="confirmer" name="confirm"/>

        </form>
    </div>
</body>

</html>