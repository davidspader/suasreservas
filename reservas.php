<?php
$imoveis = Apartamento::listarImovel(unserialize($_SESSION['logado'])->getId());
$intermediadores = IntermediadorJuridico::listarIntermediador(unserialize($_SESSION['logado'])->getId());
if (!isset($imoveis[0])) {
    $_SESSION['feedback'] = "Bem vindo, cadastre um imóvel para começar a utilizar o sistema";
    header("Location: dashboard.php?pagina=imoveis");
}
?>
<div class="painel-formulario card panel-20">

    <h5 class="card-title span-title-2">Cadastrar nova reserva:</h5>
    <hr>

    <!-- BOTÃO PARA CANCELAR FORMUÁRIO DE CADASTRO -->
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-3"></div>
        <div class="col-md-3"></div>
        <div class="col-md-3">
            <div class="form-group">
                <button type="button" class="btn btn-primary btn-block botaoCancelar">Cancelar cadastro</button>
            </div>
        </div>
    </div>
    <div>
        <!-- FORMULÁRIO DE CADASTRO -->
        <form action="control/reservaController.php" method="post" id="cadastroReserva" role="form"
              class="formularioReserva">
            <input type="hidden" name="req" value="cadastrarReserva">
            <input type="hidden" name="validacao" value="validacao">

            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="imovel">Imóvel</label>
                        <select name="imovel" class="form-control" id="imovel">
                            <option value="0" selected>Selecione um imóvel</option>
                            <?php
                            foreach ($imoveis as $i) {
                                $id = $i->getId();
                                $imovel = $i->getIdentificacao();
                                if ($id == $_GET['idImovel']) {
                                    echo "<option value='$id' selected>$imovel</option>";
                                } else {
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
                        <input class="form-control total data" id="dataInicial" name="dataInicial" autocomplete="off"
                               type="text" placeholder="Selecione a data inicial da reserva">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label for="dataFinal">*Data final</label>
                        <input class="form-control total data" id="dataFinal" name="dataFinal" autocomplete="off"
                               type="text" placeholder="Selecione a data final da reserva">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label for="nomeLocatario">Locatario</label>
                        <input type="text" id="nomeLocatario" name="nomeLocatario"
                               placeholder="Digite o nome do locatário" class="form-control">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="precoDiaria">*Preço da diária</label>
                        <div class="input-group">
                            <div class="input-group-prepend"><span class="input-group-text">$</span></div>
                            <input type="text" id="precoDiaria" name="precoDiaria"
                                   placeholder="Digite o preço da diária" class="total form-control valorReal">
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label for="taxaLimpeza">Taxa de limpeza</label>
                        <div class="input-group">
                            <div class="input-group-prepend"><span class="input-group-text">$</span></div>
                            <input type="text" id="taxaLimpeza" name="taxaLimpeza"
                                   placeholder="Digite a taxa de limpeza" class="total form-control valorReal">
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label for="desconto">Desconto</label>
                        <div class="input-group">
                            <div class="input-group-prepend"><span class="input-group-text">$</span></div>
                            <input type="text" id="desconto" name="desconto" placeholder="Digite o desconto"
                                   class="total form-control valorReal">
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label for="totalDepositado">Total depositado</label>
                        <div class="input-group">
                            <div class="input-group-prepend"><span class="input-group-text">$</span></div>
                            <input type="text" id="totalDepositado" name="totalDepositado"
                                   placeholder="Digite o total já depositado" class="total form-control valorReal">
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
                                echo "<option value='$id'>$intermediador</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label for="porcentagemIntermediador">Porcentagem do intermediador</label>
                        <div class="input-group">
                            <input type="text" id="porcentagemIntermediador" name="porcentagemIntermediador"
                                   placeholder="Digite a porcentagem do intermediador" class="total form-control">
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
                        <button type="submit" class="btn btn-primary" id="botaoCadastroReserva">Cadastrar</button>
                    </div>
                </div>
            </div>
        </form>


    </div>
    <hr>
</div>

<div class="card panel-20">
    <h5 class="card-title span-title-2">Reservas:</h5>
    <span>Selecione um imóvel e visualize, cadastre, exclua e atualize as suas reservas.</span>
    <hr>

    <div class="row select-mobile">
        <div class="col-md-3">
            <div class="form-group">
                <select name="selectImovel" class="form-control selectImovel">
                    <option value="0" selected>Selecione um imóvel</option>
                    <?php
                    foreach ($imoveis as $i) {
                        $id = $i->getId();
                        $imovel = $i->getIdentificacao();
                        if ($id == $_GET['idImovel']) {
                            echo "<option value='$id' selected>$imovel</option>";
                        } else {
                            echo "<option value='$id'>$imovel</option>";
                        }

                    }
                    ?>
                </select>
            </div>
        </div>
    </div>

    <div class="row select-pc">
        <?php
        foreach ($imoveis as $i) {
            $tipo = $i->tipo;

            if ($tipo == 1) {
                $icon = "home";
            } else {
                $icon = "building";
            }

            $id = $i->getId();
            ?>
            <div class="col-md-3">
                <div class="m-bot-20">
                    <div class="card">
                        <div class="card-header">
                            <i class="fa fa-<?php echo $icon; ?> fa-2x color-verde"></i><br>
                            <span class="span-title-2"> <?php echo $i->getIdentificacao(); ?></span>
                        </div>
                        <div class="card-body">
                            <a href="dashboard.php?pagina=reservas&idImovel=<?php echo $id; ?>"
                               class="btn btn-block btn-primary">Visualizar reservas</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
    <hr>

    <!-- BOTÃO PARA FORMUÁRIO DE CADASTRO -->
    <div>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-3"></div>
            <div class="col-md-3"></div>
            <div class="col-md-3">
                <div class="form-group">
                    <button type="button" class="btn btn-primary btn-block botaoCadastrar" id="cadastrarImovelBotao">
                        Cadastrar nova reserva
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- INPUT PESQUISA -->
    <div>
        <div class="row">
            <div class="col-md-3">
                <div class="form-group input-group">
                    <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-search"></i></span>
                    </div>
                    <input name="consulta" id="txt_consulta" placeholder="Pesquise uma reserva" type="text"
                           class="form-control">
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <?php
        if (isset($_GET['idImovel'])) {
            $id_imovel = $_GET['idImovel'];
            if (!Validacao::verificarInteiro($id_imovel)) {
                header("Location: ../dashboard.php?pagina=reservas");
                die();
            }
            $reservas = Reserva::listarReservas(unserialize($_SESSION['logado'])->getId(), $id_imovel);
            if (empty($reservas)) {
                echo "este imóvel não possui reservas";
            } else {
                foreach ($reservas as $r) {
                    $id = $r->getId();
                    $qtdDias = Validacao::verificaQuantidadeDias($r->getDataInicial(), $r->getDataFinal());
                    $valorTotal = $qtdDias * $r->getPrecoDiaria() - $r->getDesconto();

                    $valorIntermediador = ($valorTotal / 100) * $r->getPorcentagemIntermediador();

                    $valorParaReceber = $valorTotal + $r->getTaxaLimpeza() - $r->getTotalDepositado() - $valorIntermediador;

                    $valorLiquido = $valorTotal + $r->getTaxaLimpeza() - $valorIntermediador;
                    ?>
                    <div class="col-md-3 lista m-bot-20" id="<?php echo $id; ?>">
                        <div class="card">

                            <div class="card-header">

                                <div class="pull-right">
                                    <div class="btn-group">
                                        <form action="dashboard.php?pagina=criar-contrato" method="post">
                                            <input type="hidden" value="<?php echo $id; ?>" name="id">
                                            <input type="hidden" value="<?php echo $id_imovel; ?>" name="idImovel">
                                            <input type="hidden" value="<?php echo $r->getLocatario(); ?>" name="locatario">
                                            <button type="submit" class="btn btn-primary"><i
                                                        class="fa fa-lg fa-handshake"></i></button>
                                        </form>
                                        <form action="dashboard.php?pagina=reserva-editar" method="post">
                                            <input type="hidden" value="<?php echo $id; ?>" name="id">
                                            <button type="submit" class="btn btn-primary"><i
                                                        class="fa fa-lg fa-edit"></i></button>
                                        </form>
                                        <a class="btn btn-danger btn-apagar"
                                           href="control/reservaController.php?req=excluirReserva&id=<?php echo $id; ?>&id_imovel=<?php echo $id_imovel; ?>">
                                            <i class="fa fa-lg fa-trash"></i>
                                        </a>
                                    </div>
                                </div>

                                <br><br><br><br>

                                <div class="row">
                                    <div class="p-10">
                                        <i class="fa fa-calendar fa-2x color-verde"></i><br>
                                        <span class="span-title-2">De <?php echo Validacao::transformaTimestampEmData($r->getDataInicial()); ?>
                                            a <?php echo Validacao::transformaTimestampEmData($r->getDataFinal()); ?></span>
                                    </div>
                                </div>

                            </div>
                            <div class="card-body informacoes" id="toggle-<?php echo $id; ?>">
                                <ul class="list-group">
                                    <li class="list-group-item"><strong>DIÁRIAS:</strong> <?php echo $qtdDias; ?></li>
                                    <li class="list-group-item">
                                        <strong>LOCATÁRIO:</strong> <?php echo $r->getLocatario(); ?></li>
                                    <li class="list-group-item">
                                        <strong>INTERMEDIADOR:</strong> <?php if ($r->getIntermediador() == null) {
                                            echo $r->nome;
                                        } else {
                                            echo Reserva::buscarIntermediadorNome($r->getIntermediador());
                                        } ?></li>
                                    <li class="list-group-item"><strong>VALOR
                                            INTERMEDIADOR:</strong>R$ <?php echo number_format($valorIntermediador, 2, ',', '.'); ?>
                                    </li>
                                    <li class="list-group-item"><strong>P.
                                            INTERMEDIADOR:</strong> <?php echo $r->getPorcentagemIntermediador(); ?>%
                                    </li>
                                    <li class="list-group-item"><strong>PREÇO
                                            DIARIA:</strong>R$ <?php echo number_format($r->getPrecoDiaria(), 2, ',', '.'); ?>
                                    </li>
                                    <li class="list-group-item"><strong>TAXA DE
                                            LIMPEZA:</strong>R$ <?php echo number_format($r->getTaxaLimpeza(), 2, ',', '.'); ?>
                                    </li>
                                    <li class="list-group-item">
                                        <strong>DESCONTO:</strong>R$ <?php echo number_format($r->getDesconto(), 2, ',', '.'); ?>
                                    </li>
                                    <li class="list-group-item"><strong>JÁ
                                            DEPOSITADO:</strong>R$ <?php echo number_format($r->getTotalDepositado(), 2, ',', '.'); ?>
                                    </li>
                                    <li class="list-group-item"><strong>A
                                            RECEBER:</strong>R$ <?php echo number_format($valorParaReceber, 2, ',', '.'); ?>
                                    </li>
                                    <li class="list-group-item"><strong>VALOR
                                            LÍQUIDO:</strong>R$ <?php echo number_format($valorLiquido, 2, ',', '.'); ?>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-footer text-right">
                                <div data-id="<?php echo $id; ?>">
                                    <a href="#<?php echo $id; ?>" class="detalhes">Mostrar mais</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php }
            }
        } ?>
    </div>
</div>
<script src="js/js.page-reservas.js"></script>
<script src="js/validacao-formulario/js.validar-formulario-reserva.js"></script>