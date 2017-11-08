<?php 
    if(!isset($_SESSION['erros'])){
        header("Location: index.php");
    }     
?>
<div class="container mt-20">
  <div class="row">
    <div class="col-md-8 centered">
      <div class="panel panel-danger">
        <div class="panel-heading">
          <h3 class="text-center">
          <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> Ops:
          <small><b><?php echo $_SESSION['tituloErro'];?></b></small>
          </h3>
        </div>
        <div class="panel-body">
          <p>O seu formulário contem os seguintes erros:</p>

            <ul class="list-group">
                <?php
                    foreach($_SESSION['erros'] as $mensagem){
                        echo "<li class='list-group-item'>".$mensagem."</li>";
                    }
                    unset($_SESSION['erros']);
                    unset($_SESSION['tituloErro']);
                ?>
              </ul>
          <p>Por favor, volte para a <a href="index.php">página inical</a>.</p>
          </div>
        </div>
      </div>

      </div>
</div>
