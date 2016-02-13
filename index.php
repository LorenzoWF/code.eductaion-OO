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

      define("CLASS_DIR","src/");
      set_include_path(get_include_path().PATH_SEPARATOR.CLASS_DIR);
      spl_autoload_register(function ($class) {
          require_once(str_replace('\\', '/', $class . '.php'));
      });

      /*require_once 'autoload.php';

      $class = "";
      spl_autoload_register(autoload($class));*/

      require_once 'config/connect.php';

      $cliente = new Model\Cliente\Cliente();
      $consulta = new Model\ServiceDB\ServiceDB($conn, $cliente);
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
                <th>Tipo </th>
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
                                  if($lista['tipocliente'] == 1){
                                    echo "CPF: ".$lista['cpf']."</br>";
                                  } else{
                                    echo "CNPJ: ".$lista['cpf']."</br>";
                                  }
                                  echo "Endereço: ".$lista['endereco']."</br>";
                                ?>
                              </div>
                            </div>
                          </div>


                      </td>

                      <td>
                         <?php
                            if ($lista['tipocliente'] == 1){
                                echo "F";
                            } else {
                                echo "J";
                            }
                         ?>
                      </td>

                    </tr>


              <?php } ?>
              </div>
            </tbody>
          </table>

        </div>

        <div class="col-md-5">

        </div>

        <div class="col-md-2">

          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Cadastrar</button>

          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="exampleModalLabel">Cadastrar</h4>
                </div>
                <div class="modal-body">
                  <form class="form-inline" action="src/Controller/Cliente/cadastrar.php" method="post">

                    <div class="form-group">
                      <label class="control-label">Nome:</label>
                      <input type="text" class="form-control" id="nome" name="nome">
                    </div>

                    <div class="form-group">
                      <label class="control-label">Tipo de cliente:</label>

                      <label><input type="radio" name="tipoCliente" value="1">P. Física</label>
                      <label><input type="radio" name="tipoCliente" value="2">P. Jurídica</label>

                    </div>

                    <br><br>

                    <div class="form-group">
                      <label class="control-label">Idade:</label>
                      <input type="number" class="form-control" id="idade" name="idade" style="width:75px;">

                      <label class="control-label" style="margin-left: 50px;">CPF/ CNPJ:</label>
                      <input type="text" class="form-control" id="cpf" name="cpf" style="width:200px;">
                    </div>

                    <br><br>

                    <div class="form-group">
                      <label class="control-label">Endereco:</label>
                      <input type="text" class="form-control" id="endereco" name="endereco" style="width: 480px;">
                    </div>

                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                  <button type="submit" class="btn btn-primary">Cadastrar</button>
                </div>
                </form>
              </div>
            </div>
          </div>

        </div>

      </div>

    </div>

  </body>
</html>
