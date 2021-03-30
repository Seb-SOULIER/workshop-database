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

    <?php
    require_once 'connect.php';
    $pdo = new \PDO(DSN, USER, PASS);

    $query = "SELECT * FROM story";

    $statement = $pdo->query($query);

    $stories = $statement->fetchAll();

    foreach ($stories as $storie) :
    ?>
        <div class="contenaire">
            <div class="card" style="width: 25rem;">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $storie['title'] ?></h5>
                    <h6 class="card-subtitle mb-2 text-muted"><?php echo $storie['author'] ?></h6>
                    <p class="card-text"><?php echo $storie['content'] ?></p>
                    <a href="edit.php?id=<?php echo $storie['id'] ?>" class="card-link">Modifier</a>
                    <a href="supp.php?id=<?php echo $storie['id'] ?>" class="card-link">Supprimer</a>
                    <a href="create.php" class="card-link">Nouvelle histoire</a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>

</body>

</html>