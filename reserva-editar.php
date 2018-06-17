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
<div class="card panel-20">

    <h5 class="card-title span-title-2">Editar reserva:</h5>
    <hr>
    <!-- FORMULÁRIO DE CADASTRO -->
    <form action="control/reservaController.php" method="post" id="cadastroReserva" role="form" class="formularioReserva">
        <input type="hidden" name="req" value="editarReserva">
        <input type="hidden" name="id" value="<?php echo $_POST['id']; ?>">
        <input type="hidden" name="validacao" value="validacao">

        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label for="imovel">Imóvel</label>
                    <select name="imovel" class="form-control" id="imovel">
                        <option value="" selected>Selecione um imóvel</option>
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
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label for="dataInicial">*Data inicial</label>
                    <input class="form-control total data" id="dataInicial" name="dataInicial" type="text" placeholder="Selecione a data inicial da reserva" value="<?php echo Validacao::transformaTimestampEmData($r->getDataInicial()); ?>">
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label for="dataFinal">*Data final</label>
                    <input class="form-control total data" id="dataFinal" name="dataFinal" type="text" placeholder="Selecione a data final da reserva" value="<?php echo Validacao::transformaTimestampEmData($r->getDataFinal()); ?>">
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label for="nomeLocatario">Locatario</label>
                    <input type="text" id="nomeLocatario" name="nomeLocatario" placeholder="Digite o nome do locatário" class="form-control" value="<?php echo $r->getLocatario(); ?>">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label for="precoDiaria">*Preço da diária</label>
                    <div class="input-group">
                        <div class="input-group-prepend"><span class="input-group-text">$</span></div>
                        <input type="text" id="precoDiaria" name="precoDiaria" placeholder="Digite o preço da diária" class="total form-control valorReal" value="<?php echo $r->getPrecoDiaria(); ?>">
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label for="taxaLimpeza">Taxa de limpeza</label>
                    <div class="input-group">
                        <div class="input-group-prepend"><span class="input-group-text">$</span></div>
                        <input type="text" id="taxaLimpeza" name="taxaLimpeza" placeholder="Digite a taxa de limpeza" class="total form-control valorReal" value="<?php echo $r->getTaxaLimpeza(); ?>">
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label for="desconto">Desconto</label>
                    <div class="input-group">
                        <div class="input-group-prepend"><span class="input-group-text">$</span></div>
                        <input type="text" id="desconto" name="desconto" placeholder="Digite o desconto" class="total form-control valorReal" value="<?php echo $r->getDesconto(); ?>">
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label for="totalDepositado">Total depositado</label>
                    <div class="input-group">
                        <div class="input-group-prepend"><span class="input-group-text">$</span></div>
                        <input type="text" id="totalDepositado" name="totalDepositado" placeholder="Digite o total já depositado" class="total form-control valorReal" value="<?php echo $r->getTotalDepositado(); ?>">
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label for="intermediador">Intermediador</label>
                    <select name="intermediador" id="intermediador" class="form-control">
                        <option value="0" selected>Selecione um intermediador</option>
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
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label for="porcentagemIntermediador">Porcentagem do intermediador</label>
                    <div class="input-group">
                        <input type="text" id="porcentagemIntermediador" name="porcentagemIntermediador" placeholder="Digite a porcentagem do intermediador" class="total form-control"  value="<?php echo $r->getPorcentagemIntermediador(); ?>">
                        <div class="input-group-prepend"><span class="input-group-text">%</span></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label for="qtdDiarias">Diárias</label>
                    <input type="text" id="qtdDiarias" disabled class="form-control">
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label for="valorIntermediador">Valor do intermediador</label>
                    <div class="input-group">
                        <div class="input-group-prepend"><span class="input-group-text">$</span></div>
                        <input type="text" id="valorIntermediador" disabled class="form-control valorReal">
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label for="TotalReceber">Valor a receber</label>
                    <div class="input-group">
                        <div class="input-group-prepend"><span class="input-group-text">$</span></div>
                        <input type="text" id="TotalReceber" disabled class="form-control valorReal">
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label for="total">Valor líquido</label>
                    <div class="input-group">
                        <div class="input-group-prepend"><span class="input-group-text">$</span></div>
                        <input type="text" id="total" disabled class="form-control valorReal">
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Editar</button>
                </div>
            </div>
        </div>
    </form>


</div>
<hr>
</div>
<script src="js/validacao-formulario/js.validar-formulario-reserva.js"></script>
<script src="js/js.page-reservas.js"></script>


