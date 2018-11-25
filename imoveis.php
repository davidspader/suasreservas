<?php
if (!isset($_SESSION['logado'])) {
    header("Location: index.php");
}
?>
<div class="painel-formulario card panel-20">

    <h5 class="card-title span-title-2">Cadastrar novo imóvel:</h5>
    <hr>

    <!-- BOTÃO PARA CANCELAR FORMUÁRIO DE CADASTRO -->
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-3"></div>
        <div class="col-md-3"></div>
        <div class="col-md-3">
            <div class="form-group">
                <button type="button" class="btn btn-primary btn-block botaoCancelar" id="cancelarCadastrarImovelBotao">
                    Cancelar cadastro
                </button>
            </div>
        </div>
    </div>
    <div>

        <!-- FORMULÁRIO DE CADASTRO -->
        <form class="form formularioImovel" role="form" method="post" action="control/imovelController.php">
            <input type="hidden" name="req" value="cadastrarImovel">
            <input type="hidden" name="validacao" value="validacao">
            <input type="hidden" name="tipoImovel" value="1" id="tipoImovel">

            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="identificacaoImovel">*Nome de identificação</label>
                        <input class="form-control" type="text" placeholder="Digite a identificação do seu imóvel"
                               id="identificacaoImovel" name="identificacaoImovel">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="cepImovel">CEP</label>
                        <input class="form-control cep" type="text" placeholder="Digite o CEP do seu imóvel"
                               id="cepImovel" name="cepImovel">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label for="estadoImovel">Sigla do estado</label>
                        <input class="form-control siglaEstado" type="text"
                               placeholder="Digite a sigla do estado do imóvel" id="estadoImovel" name="estadoImovel">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label for="cidadeImovel">Cidade</label>
                        <input type="text" name="cidadeImovel" id="cidadeImovel"
                               placeholder="Digite a cidade do seu imóvel" class="form-control">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="bairroImovel">Bairro</label>
                        <input type="text" name="bairroImovel" id="bairroImovel"
                               placeholder="Digite o bairro do seu imóvel" class="form-control">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label for="logradouroImovel">Rua</label>
                        <input type="text" name="logradouroImovel" id="logradouroImovel"
                               placeholder="Digite a rua do seu imóvel" class="form-control">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label for="numeroImovel">Número</label>
                        <input type="text" name="numeroImovel" id="numeroImovel"
                               placeholder="Digite o número do seu imóvel" class="form-control">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-1">
                    <div class="form-group">
                        <div class="animated-radio-button">
                            <label>
                                <input type="radio" name="tipoImovel" value="1" checked class="radioCasa"><span
                                        class="label-text">Casa</span>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <div class="animated-radio-button">
                            <label>
                                <input type="radio" name="tipoImovel" value="2" class="radioApartamento"><span
                                        class="label-text">Apartamento</span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <!-- FORMULÁRIO DO APARTAMENTO -->
            <div class="formApartamento">
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="edificioImovel">Edificio</label>
                            <input type="text" name="edificioImovel" id="edificioImovel"
                                   placeholder="Digite o nome do edificio do seu apartamento" class="form-control">
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="blocoImovel">Bloco</label>
                            <input type="text" name="blocoImovel" id="blocoImovel"
                                   placeholder="Digite o nome do bloco do seu apartamento" class="form-control">
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="numeroApImovel">Número do apartamento</label>
                            <input type="text" name="numeroApImovel" id="numeroApImovel"
                                   placeholder="Digite o número do seu apartamento" class="form-control">
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary" id="botaoCadastroImovel">Cadastrar</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <hr>
</div>

<div class="card panel-20">
    <h5 class="card-title span-title-2">Imóveis:</h5>
    <span>Visualize, cadastre, exclua e atualize os seus imóveis.</span>
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
                        Cadastrar novo imóvel
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
                    <input name="consulta" id="txt_consulta" placeholder="Pesquise um imóvel" type="text"
                           class="form-control">
                </div>
            </div>
        </div>
    </div>

    <?php
    $imoveis = Apartamento::listarImovel(unserialize($_SESSION['logado'])->getId());
    ?>

    <div class="row">

        <?php
        foreach ($imoveis

        as $i) {
        $tipo = $i->tipo;

        if ($tipo == 1) {
            $icon = "home";
        } else {
            $icon = "building";
        }

        $id = $i->getId();
        ?>

        <div class="col-md-3 lista m-bot-20" id="<?php echo $id; ?>">
            <div class="card">

                <div class="card-header">

                    <div class="pull-right">
                        <form action="dashboard.php?pagina=imovel-editar" method="post">
                            <input type="hidden" value="<?php echo $id; ?>" name="id">
                            <input type="hidden" value="<?php echo $tipo; ?>" name="tipo_imovel">
                            <div class="btn-group">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-lg fa-edit"
                                                                                 title="Editar"></i></button>
                        </form>
                        <a class="btn btn-danger btn-apagar"
                           href="control/imovelController.php?req=excluir&id=<?php echo $id; ?>">
                            <i class="fa fa-lg fa-trash" title="Excluir"></i>
                        </a>
                    </div>
                </div>

                <br><br><br><br>

                <div class="row">
                    <div class="p-10">
                        <i class="fa fa-<?php echo $icon; ?> fa-2x color-verde"></i><br>
                        <a href="dashboard.php?pagina=reservas&idImovel=<?php echo $id; ?>"> <span class="span-title-2"> <?php echo $i->getIdentificacao(); ?></span></a>
                    </div>
                </div>

            </div>
            <div class="card-body informacoes" id="toggle-<?php echo $id; ?>">
                <ul class="list-group">
                    <li class="list-group-item"><strong>CEP:</strong> <?php echo $i->getCep(); ?></li>
                    <li class="list-group-item"><strong>ESTADO:</strong> <?php echo $i->getSiglaEstado(); ?></li>
                    <li class="list-group-item"><strong>CIDADE:</strong> <?php echo $i->getCidade(); ?></li>
                    <li class="list-group-item"><strong>BAIRRO:</strong> <?php echo $i->getBairro(); ?></li>
                    <li class="list-group-item"><strong>RUA:</strong> <?php echo $i->getLogradouro(); ?></li>
                    <li class="list-group-item"><strong>NÚMERO:</strong> <?php echo $i->getNumero(); ?></li>
                    <?php if ($tipo == 2) { ?>
                        <li class="list-group-item"><strong>EDIFICIO:</strong> <?php echo $i->getEdificio(); ?>
                        </li>
                        <li class="list-group-item"><strong>BLOCO:</strong> <?php echo $i->getBloco(); ?> </li>
                        <li class="list-group-item"><strong>NÚMERO DO
                                APARTAMENTO:</strong> <?php echo $i->getNumeroAp(); ?> </li>
                    <?php } ?>
                </ul>
            </div>
            <div class="card-footer text-right">
                <div data-id="<?php echo $id; ?>">
                    <a href="#<?php echo $id; ?>" class="detalhes">Mostrar mais</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
</div>
</div>


<!-- SCRIPITS DA PÁGINA -->
<script src="js/js-buscaCep.js"></script>
<script src="js/validacao-formulario/js.validar-formulario-imovel.js"></script>
