<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

    <title>Ler</title>
</head>
<body>

    <div class="row">
        <div class="col-md-12 mt-4">
            <h1 class="text-center">Ver Contatos</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card">
                <?php
                    include 'model.php';
                    $model = new Model();
                    $id = $_REQUEST['id'];
                    $row = $model->fetch_unico($id);
                    if(!empty($row)){
                ?>
            <div class="card-header">
                <?php echo $row['name']; ?>
    </div>
            <div class="card-body">
            <?php echo $row['email']; ?></p>
            <?php echo $row['whats']; ?></p>
            <?php echo $row['address']; ?></p>
        </div>
                    <?php
                    }else{
                        echo "Sem Registros!";
                    }
                    ?>
            </div>
        </div>
    </div>
</body>
</html>