<?php
if (!isset($_SESSION['logado'])) {
    header("Location: index.php");
}

if (!isset($_POST['id'])) {
    header("Location: index.php");
}

$r = Reserva::listarReserva(unserialize($_SESSION['logado'])->getId(), $_POST['id']);
$imoveis = Apartamento::listarImovel(unserialize($_SESSION['logado'])->getId());
$intermediadores = IntermediadorJuridico::listarIntermediador(unserialize($_SESSION['logado'])->getId());
?>
<div class="panel panel-default" id="formReserva">
        <div class="panel-heading"><strong>Editar reserva:</strong></div>
        <div class="panel-body">
            <form action="control/reservaController.php" method="post" role="form" id="editarReserva" class="formularioReserva">
                <input type="hidden" name="req" value="editarReserva">
                <input type="hidden" name="validacao" value="validacao">
                <input type="hidden" name="id" value="<?php echo $_POST['id'];?>">
                <div class="form-group row">
                    <div class="col-md-4">
                        <input type="text" value="<?php echo Validacao::transformaTimestampEmData($r->getDataInicial()); ?>" id="dataInicial" name="dataInicial" placeholder="*Data inicial" class="total form-control data">
                    </div> 
                    <div class="col-md-4">
                        <input type="text" value="<?php echo Validacao::transformaTimestampEmData($r->getDataFinal()); ?>" id="dataFinal" name="dataFinal" placeholder="*Data final" class="total form-control data">
                    </div> 
                </div>
                <div class="form-group row">
                    <div class="col-md-4">
                        <select name="imovel" class="form-control text-center">
                            <option selected>*Imóvel</option>
                            <?php
                            foreach ($imoveis as $i) {
                                $id = $i->getId();
                                $imovel = $i->getIdentificacao();
                                if($id == $r->getImovel()){
                                echo "<option value='$id' selected>$imovel</option>";
                                }else{
                                    echo "<option value='$id'>$imovel</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <select name="intermediador" class="form-control text-center">
                            <option value="0" selected>Intermediador</option>
                            <?php
                            foreach ($intermediadores as $i) {
                                $id = $i->getId();
                                $intermediador = $i->getNome();
                                if($id == $r->getIntermediador()){
                                echo "<option value='$id' selected>$intermediador</option>";
                                }else{
                                    echo "<option value='$id'>$intermediador</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <input type="text" value="<?php echo $r->getPorcentagemIntermediador(); ?>" id="porcentagemIntermediador" name="porcentagemIntermediador" placeholder="Porcentagem intermediador" class="form-control">
                    </div>    
                </div>
                <div class="form-group row">
                    <div class="col-md-4">
                        <input type="text" value="<?php echo $r->getPrecoDiaria(); ?>" id="precoDiaria" name="precoDiaria" placeholder="*Preço diaria" class="total form-control valorReal">
                    </div> 
                    <div class="col-md-4">
                        <input type="text" value="<?php echo number_format($r->getTaxaLimpeza(), 2, ',', '.'); ?>" id="taxaLimpeza" name="taxaLimpeza" placeholder="Taxa de limpeza" class="total form-control valorReal">
                    </div> 
                    <div class="col-md-4">
                        <input type="text" value="<?php echo number_format($r->getDesconto(), 2, ',', '.'); ?>" id="desconto" name="desconto" placeholder="Desconto" class="total form-control valorReal">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-sm botao-padrao btn-block" id="botaoCadastroReserva">Editar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
<script src="js/validacao-formulario/js.validar-formulario-reserva.js"></script>


