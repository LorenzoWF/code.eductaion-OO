<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>PHP - OO</title>

    <link rel="stylesheet" type="text/css" href="plugins/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="plugins/css/dataTables.bootstrap.min.css"> 

  </head>
  <body>

    <script type="text/javascript" src="plugins/js/jquery.js"></script>
    <script type="text/javascript" src="plugins/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="plugins/js/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript" src="plugins/js/tabela.js"></script>
    <script type="text/javascript" src="plugins/js/bootstrap.js"></script>

    <?php

      require_once('class/Cliente.php');
      require_once('class/ServiceDB.php');

      $cliente = new Cliente();
      $consulta = new ServiceDB($cliente);
      $resultado = $consulta->listar();

    ?>

    <div class="container">

      <div class="row">
        <h1>PHP - OO</h1>
      </div>

      <div class="row">
        <div class="col-md-5">

          <table class="table table-striped table-bordered" id="tabela">
            <thead>
              <tr>
                <th>Id</th>
                <th>Nome</th>
              </tr>
            </thead>
            <tbody>
              <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
              <?php
                foreach ($resultado as $lista) { ?>

                    <tr>
                      <td><?php echo $lista['id'] ?></td>

                      <td>


                          <div class="">
                            <div class="" role="tab" id="heading<?php echo $lista['id'] ?>">
                              <h4 class="panel-title">
                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $lista['id'] ?>" aria-expanded="false" aria-controls="collapse<?php echo $lista['id'] ?>">
                                  <?php echo $lista['nome'] ?>
                                </a>
                              </h4>
                            </div>
                            <div id="collapse<?php echo $lista['id'] ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading<?php echo $lista['id'] ?>">
                              <div class="panel-body">
                                <?php
                                  echo "Idade: ".$lista['idade']."</br>";
                                  echo "CPF: ".$lista['cpf']."</br>";
                                  echo "Endereço: ".$lista['endereco']."</br>";
                                ?>
                              </div>
                            </div>
                          </div>


                      </td>

                    </tr>


              <?php } ?>
              </div>
            </tbody>
          </table>

        </div>
      </div>

    </div>

  </body>
</html>
