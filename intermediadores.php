<?php
if (!isset($_SESSION['logado'])) {
    header("Location: index.php");
}
?>
<div class="painel-formulario">

    <!-- BOTÃO PARA CANCELAR FORMUÁRIO DE CADASTRO -->
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-3"></div>
        <div class="col-md-3"></div>
        <div class="col-md-3">
            <div class="form-group">
                <button type="button" class="btn btn-primary btn-block botaoCancelar" id="cancelarCadastrarIntermediador">Cancelar cadastro</button>
            </div>
        </div>
    </div>
    <div>

        <!-- FORMULÁRIO DE CADASTRO -->
        <form class="form formularioIntermediador" role="form" method="post" action="control/intermediadorController.php" id="formularioCadastroIntermediador">
            <input type="hidden" name="req" value="cadastrarIntermediador">
            <input type="hidden" name="validacao" value="validacao">

            <div class="row">
                <div class="col-md-1">
                    <div class="form-group">
                        <div class="animated-radio-button">
                            <label>
                                <input type="radio" name="tipoIntermediador" value="1" checked class="radioFisica"><span class="label-text">Pessoa física</span>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <div class="animated-radio-button">
                            <label>
                                <input type="radio" name="tipoIntermediador" value="2" class="radioJuridica"><span class="label-text">Pessoa júridica</span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="nomeIntermediador">*Nome</label>
                        <input type="text" id="nomeIntermediador" name="nomeIntermediador" placeholder="Digite o nome do intermediador" class="form-control">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <div class="campoCnpj">
                            <label for="cnpjIntermediador">CNPJ</label>
                            <input type="text" id="cnpjIntermediador" name="cnpjIntermediador" placeholder="Digite o CNPJ do intermediador" class="form-control cnpj campoCnpj">
                        </div>
                        <div class="campoCpf">
                            <label for="cpfIntermediador">CPF</label>
                            <input type="text" id="cpfIntermediador" name="cpfIntermediador" placeholder="Digite o CPF do intermediador" class="form-control cpf campoCpf">
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="emailIntermediador">E-mail</label>
                        <input type="text" name="emailIntermediador" id="emailIntermediador" placeholder="Digite o e-mail do intermediador" class="form-control">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label for="telefoneCelularIntermediador">Telefone celular</label>
                        <input type="text" name="telefoneCelularIntermediador" id="telefoneCelularIntermediador" placeholder="Digite o telefone celular do intermediador" class="form-control celular">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label for="telefoneFixoIntermediador">Telefone fixo</label>
                        <input type="text" id="telefoneFixoIntermediador" name="telefoneFixoIntermediador" placeholder="Digite o telefone fixo do intermediador" class="form-control fixo">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary" id="botaoCadastroIntermediadorFisico">Cadastrar</button>
                    </div>
                </div>
            </div>
        </form>


    </div>
    <hr>
</div>

<!-- BOTÃO PARA FORMUÁRIO DE CADASTRO -->
<div>
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-3"></div>
        <div class="col-md-3"></div>
        <div class="col-md-3">
            <div class="form-group">
                <button type="button" class="btn btn-primary btn-block botaoCadastrar" id="cadastrarImovelBotao">Cadastrar novo intermediador</button>
            </div>
        </div>
    </div>
</div>

<!-- INPUT PESQUISA -->
<div>
    <div class="row">
        <div class="col-md-3">
            <div class="form-group input-group">
                <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-search"></i></span></div>
                <input name="consulta" id="txt_consulta" placeholder="Pesquise um intermediador" type="text" class="form-control">
            </div>
        </div>
    </div>
</div>

<?php
$intermediadores = IntermediadorJuridico::listarIntermediador(unserialize($_SESSION['logado'])->getId());
?>

<div class="row">

    <?php
    foreach ($intermediadores as $i) {
    $tipo = $i->tipo;

    if($tipo == 1){
        $icon = "user";
    }else{
        $icon = "building";
    }

    $id = $i->getId();
    ?>

    <div class="col-md-3 lista m-bot-20">
        <div class="card">

            <div class="card-header">

                <div class="pull-right">
                    <form action="dashboard.php?pagina=intermediador-editar" method="post">
                        <input type="hidden" value="<?php echo $id;?>" name="id">
                        <input type="hidden" value="<?php echo $tipo;?>" name="tipo_intermediador">
                        <div class="btn-group">
                            <button type="submit" class="btn btn-primary"> <i class="fa fa-lg fa-edit"></i> </button>
                    </form>
                    <a class="btn btn-danger btn-apagar" href="control/intermediadorController.php?req=excluir&id=<?php echo $id;?>"">
                        <i class="fa fa-lg fa-trash"></i>
                    </a>
                </div>
            </div>

            <br><br><br><br>

            <div class="row">
                <div class="col-md-9">
                    <i class="fa fa-<?php echo $icon; ?> fa-2x color-verde"></i>
                    <span class="span-title"> <?php echo $i->getNome(); ?></span>
                </div>
            </div>

        </div>
        <div class="card-body informacoes" id="<?php echo $id; ?>">
            <ul class="list-group">
                <?php if($tipo == 1){ ?>
                    <li class="list-group-item"><strong>CPF:</strong> <?php echo $i->getCpf();?></li>
                <?php } else{?>
                    <li class="list-group-item"><strong>CNPJ:</strong> <?php echo $i->getCnpj();?></li>
                <?php } ?>
                <li class="list-group-item"><strong>E-MAIL:</strong> <?php echo $i->getEmail();?></li>
                <li class="list-group-item"><strong>TEL. CELULAR:</strong> <?php echo $i->getTelefone();?></li>
                <li class="list-group-item"><strong>TEL. FIXO:</strong> <?php echo $i->getTelefoneFixo();?></li>
            </ul>
        </div>

        <div class="card-footer text-right">
            <div data-id="<?php echo $id; ?>">
                <a href="#" class="detalhes">Mostrar mais</a>
            </div>
        </div>
    </div>
</div>
<?php } ?>
</div>
<script src="js/validacao-formulario/js.validar-formulario-intermediador.js"></script>

