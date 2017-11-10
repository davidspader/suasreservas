<?php
$imoveis = Apartamento::listarImovel(unserialize($_SESSION['logado'])->getId());
$intermediadores = IntermediadorJuridico::listarIntermediador(unserialize($_SESSION['logado'])->getId());
?>
<div class="panel-group">
    <div class="panel panel-default painel-formulario" id="formReserva">
        <div class="panel-heading"><strong>Cadastrar Reserva:</strong></div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-3 pull-right">
                    <button type="button" class="btn botao-padrao btn-block botaoCancelar">Cancelar cadastro</button>
                </div>
            </div>
            <form action="control/reservaController.php" method="post" id="cadastroReserva" role="form" class="formularioReserva">
                <input type="hidden" name="req" value="cadastrarReserva">
                <input type="hidden" name="validacao" value="validacao">
                <div class="form-group row">
                    <div class="col-md-4">
                        <input type="text" id="dataInicial" name="dataInicial" placeholder="*Data inicial" class="total form-control data">
                    </div> 
                    <div class="col-md-4">
                        <input type="text" id="dataFinal" name="dataFinal" placeholder="*Data final" class="total form-control data">
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
                                echo "<option value='$id'>$imovel</option>";
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
                                echo "<option value='$id'>$intermediador</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <input type="text" id="porcentagemIntermediador" name="porcentagemIntermediador" placeholder="Porcentagem intermediador" class="form-control">
                    </div>    
                </div>
                <div class="form-group row">
                    <div class="col-md-4">
                        <input type="text" id="precoDiaria" name="precoDiaria" placeholder="*Preço diaria" class="total form-control valorReal">
                    </div> 
                    <div class="col-md-4">
                        <input type="text" id="taxaLimpeza" name="taxaLimpeza" placeholder="Taxa de limpeza" class="total form-control valorReal">
                    </div> 
                    <div class="col-md-4">
                        <input type="text" id="desconto" name="desconto" placeholder="Desconto" class="total form-control valorReal">
                    </div> 
                </div>
                <div class="form-group row">
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-sm botao-padrao btn-block" id="botaoCadastroReserva">Cadastrar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading"><strong>Reservas:</strong></div>
        <div class="panel-body">
            <div class="row mb-15">
                <div class="col-md-3">
                    <select name="selectImovel" class="form-control text-center selectImovel">
                        <option value="0" selected>Selecione um imóvel</option>
                        <?php
                        foreach ($imoveis as $i) {
                            $id = $i->getId();
                            $imovel = $i->getIdentificacao();
                            if($id == $_GET['idImovel']){
                                echo "<option value='$id' selected>$imovel</option>";
                            }else{
                                echo "<option value='$id'>$imovel</option>";
                            }
                            
                        }
                        ?>
                    </select>
                </div>
                <div class="col-md-3 pull-right">
                    <button type="button" class="botaoCadastrar btn botao-padrao btn-block">Cadastrar nova reserva</button>
                </div>
            </div>
            
            
            <div class="container-fluid">
                <div class="row">
                    <?php
                    if(isset($_GET['idImovel'])){
                        $id_imovel = $_GET['idImovel'];
                        if(!Validacao::verificarInteiro($id_imovel)){
                            header("Location: ../dashboard.php?pagina=reservas");
                            die();
                        }
                        $reservas = Reserva::listarReservas(unserialize($_SESSION['logado'])->getId(), $id_imovel);
                        if(empty($reservas)){
                            echo "este imóvel não tem reservas";
                        }else{ 
                            foreach ($reservas as $r){ 
                                $id = $r->getId(); 
                                $qtdDias = Validacao::verificaQuantidadeDias($r->getDataInicial(), $r->getDataFinal());
                            ?>
                            <div class=" well well-sm col-md-3">
                                <ul class="list-group text-center">
                                    <li class="list-group-item"><?php echo "<img src='css/imagens/icones/reserva/icone-reserva.png' class='img-thumbnail' alt='icone'>"?></li>
                                    <li class="list-group-item"><strong>Data Inicial: </strong><?php echo Validacao::transformaTimestampEmData($r->getDataInicial()); ?></li>
                                    <li class="list-group-item"><strong>Data Final: </strong><?php echo Validacao::transformaTimestampEmData($r->getDataFinal()); ?></li>
                                    <li class="list-group-item"><strong>Imóvel: </strong><?php echo $r->identificacao; ?></li>
                                    <li class="list-group-item"><strong>Intermediador: </strong><?php if($r->getIntermediador() == null){ echo $r->nome;}else{ echo Reserva::buscarIntermediadorNome($r->getIntermediador());}?></li>
                                    <li class="list-group-item"><strong>P. intermediador: </strong><?php echo $r->getPorcentagemIntermediador(); ?>%</li>
                                    <li class="list-group-item"><strong>Preço da diária: </strong>R$ <?php echo number_format($r->getPrecoDiaria(), 2, ',', '.'); ?></li>
                                    <li class="list-group-item"><strong>Taxa de limpeza: </strong>R$ <?php echo number_format($r->getTaxaLimpeza(), 2, ',', '.'); ?></li>
                                    <li class="list-group-item"><strong>Desconto: </strong>R$ <?php echo number_format($r->getDesconto(), 2, ',', '.');?></li>
                                    <li class="list-group-item"><strong>Total: </strong>R$ <?php echo number_format($qtdDias*$r->getPrecoDiaria()+$r->getTaxaLimpeza()-$r->getDesconto(), 2, ',', '.');?></li>
                                    <li class="list-group-item">
                                        <form action="dashboard.php?pagina=criar-contrato" method="post">
                                        <input type="hidden" value="<?php echo $id;?>" name="id">
                                        <input type="hidden" value="<?php echo $id_imovel;?>" name="idImovel">
                                        <button type="submit" class="btn btn-sm botao-padrao"> Criar contrato </button>
                                        </form>
                                    <li class="list-group-item">
                                        <form action="dashboard.php?pagina=reserva-editar" method="POST">
                                            <a href="control/reservaController.php?req=excluirReserva&id=<?php echo $id;?>&id_imovel=<?php echo $id_imovel;?>" class="btn btn-sm btn-danger btn-apagar">Excluir</a>
                                            <input type="hidden" value="<?php echo $id;?>" name="id">
                                            <button type="submit" class="btn btn-sm botao-padrao"> Editar </button>
                                        </form>
                                    </li>
                            </ul>
                            </div>
                            <?php }
                            }
                    }?>
                </div>
            </div>
            
        </div>
    </div>
</div>
<script src="js/js.page-reservas.js"></script>
<script src="js/validacao-formulario/js.validar-formulario-reserva.js"></script>