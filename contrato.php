<?php
session_start();
if (!isset($_SESSION['logado']) || !isset($_SESSION['contrato'])) {
    header("Location: index.php");
}
$locador = $_SESSION['contrato'][0];
$locatario = $_SESSION['contrato'][1];
$intermediador = $_SESSION['contrato'][2];
$imovel = $_SESSION['contrato'][3];
$reserva = $_SESSION['contrato'][4];
//unset($_SESSION['contrato']);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Contrato</title>
        <link rel="icon" href="css/imagens/icones/icone-titulo.png" type="image/x-icon">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="bootstrap-jquery/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <script src="bootstrap-jquery/jquery/jquery.min.js"></script>
        <script src="bootstrap-jquery/bootstrap/js/bootstrap.min.js"></script>
        <link href="css/a4-estilo.css" rel="stylesheet">
    </head>
    <body>
        <div class="page">
            <div>
                <h1 class="text-center">Contrato de locação</h1>
            </div>

            <div class="text-justify">
                <?php echo $locador; ?>
            </div>

            <div class="text-justify">
                <?php echo $locatario; ?>
            </div>

            <div class="text-justify">
                <?php echo $intermediador; ?>
            </div>

            <div class="text-justify">
                <?php echo $imovel; ?>
            </div>

            <div class="text-justify">
                <?php echo $reserva; ?>
            </div>

            <div>
                <h3 class="text-center">CLÁUSULAS E CONDIÇÕES</h3>
            </div>

            <div class="text-justify">
                <p class="condicoes"><strong>1. INEXISTÊNCIA DE DEVOLUÇÃO:</strong> No caso de encerramento da estadia em momento anterior ao previsto, por qualquer motivo, o locador não devolverá valores ao inquilino.</p>
            </div>

            <div class="text-justify">
                <p class="condicoes"><strong>2. DA DEMORA NA DESOCUPAÇÃO:</strong> ​A permanência no imóvel após o prazo contratado implicará no pagamento da diária em dobro, por dia que exceder até a definitiva desocupação.</p>
            </div>

            <div class="text-justify">
                <p class="condicoes"><strong>3. ANIMAIS:</strong> ​Não será permitida a presença no imóvel de qualquer animal sem qualquer consentimento do locador. Caso seja aceito pelo locador o animal de pequeno porte, obrigará o inquilino a indenizar qualquer dano causado ao imóvel ou à mobília pelo mesmo.</p>
            </div>

            <div class="text-justify">
                <p class="condicoes"><strong>4. VISTORIA:</strong> ​O inquilino entrará no imóvel acompanhado do locador ou pessoa de sua confiança, e será feita vistoria do estado do imóvel e do mobiliário. Qualquer avaria detectada no momento da vistoria será anotada, à pedido do inquilino, no presente contrato. No momento da saída do imóvel, nova vistoria será feita.</p>
            </div>

            <div class="text-justify">
                <p class="condicoes"><strong>5. DESPESAS:</strong> As despesas de água, luz, gás, impostos, condomínio, TV e internet estão incluidas no valor da locação previsto anteriormente, incluindo todas essas despesas, bem como outras não discriminadas expressamente neste contrato.</p>
            </div>

            <div class="text-justify">
                <p class="condicoes"><strong>6. RESPONSABILIDADE:</strong> O locador não se responsabiliza por objetos deixados no imóvel ou no veículo, bem como por furtos / roubos dos bens do inquilino e outros danos causados por caso fortuito ou força maior que ocasionam danos. O locador não é responsável por eventos que podem vir ocorrer no imóvel durante a locação, como por exemplo falta de água, energia elétrica, uma vez que a responsabilidade é da administração pública.</p>
            </div>

            <div class="centered text-center m-20">
                <div class="col-md-4">
                    <div class="row">
                        <strong>______________________</strong>
                    </div>
                    <div class="row">
                        <strong>Assinatura locador</strong>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <strong>______________________</strong>
                    </div>
                    <div class="row">
                        <strong>Assinatura locatário</strong>
                    </div>
                </div>
                <?php if($intermediador != ""){ ?>
                    <div class="col-md-4">
                        <div class="row">
                            <strong>______________________</strong>
                        </div>
                        <div class="row">
                            <strong>Assinatura intermediador</strong>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </body>
</html>
