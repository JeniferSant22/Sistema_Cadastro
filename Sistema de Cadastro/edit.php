<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

    
    <title>Editar</title>
</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-4">
                <h1>Sistema de Cadastro</h1>
            </div>
        </div>

        <div class="row">

            <div class="col-md-5 mx-auto">
                <?php
                    include 'model.php';
                    $model = new Model();
                    $id = $_REQUEST['id'] ;
                    $row = $model->edit($id);
                    if(isset($_POST['update'])){
                        if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['whats']) && isset($_POST['address'])){
                            if(!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['whats']) && !empty($_POST['address'])){
                                $data['id'] = $id;
                                $data['name'] = $_POST['name'];
                                $data['email'] = $_POST['email'];
                                $data['whats'] = $_POST['whats'];
                                $data['address'] = $_POST['address'];

                                $update = $model->update($data);
                                if($update){
                                    echo "<script>alert('Gravado com sucesso!')</script>";
                                    echo "<script>window.location.href='list.php'</script>";
                                }else{
                                    echo "<script>alert('Falhou')</script>";
                                    echo "<script>window.location.href='list.php'</script>";
                                }
                            }else{
                                echo "<script>alert('ERRO!')</script>";
                                header("location: edit.php?id=$id");
                            }
                        }
                    }
                ?>

                <form action="" method="post">

                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" name="name" value="<?php echo $row['name'];?>" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="">E-mail</label>
                        <input type="email" name="email" value="<?php echo $row['email'];?>" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="">Whatsapp</label>
                        <input type="tel" name="whats" value="<?php echo $row['whats'];?>" class="form-control" required><!--pattern="(\([0-9]{2}\))\s([9]{1})?([0-9]{5})-([0-9]{4})"--> 
                    </div>

                    <div class="form-group">
                        <label for="">Endereço</label>
                        <textarea name="address" rows="3" class="form-control" required><?php echo $row['name'];?></textarea>
                    </div>

                    <div class="form-group">
                        <button type="submit" name="update" class="btn btn-primary">
                            Atualizar
                        </button>
                    </div>

                </form>
            </div>
        </div>

    </div>

</body>
</html>