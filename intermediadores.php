<?php
if (!isset($_SESSION['logado'])) {
    header("Location: index.php");
}
?>
<div class="panel-group">
    <div class="panel panel-default painel-formulario" id="formIntermediador">
        <div class="panel-heading"><strong>Cadastrar Intermediador:</strong></div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-3 pull-right">
                    <button type="button" class="btn botao-padrao btn-block botaoCancelar" id="cancelarCadastrarIntermediadorBotao">Cancelar cadastro</button>
                </div>
            </div>
            <div class="form-group">
                <div class="checkbox-inline">
                    <label><input type="checkbox" id="fisica" checked><strong>Pessoa física</strong></label>
                </div>
                <div class="checkbox-inline">
                    <label><input type="checkbox" id="juridica"><strong>Pessoa jurídica</strong></label>
                </div>
            </div>
            <form class="form" role="form" method="post" action="control/intermediadorController.php" id="formularioCadastroIntermediador">
                <input type="hidden" name="req" value="cadastrarIntermediador">
                <input type="hidden" name="validacao" value="validacao">
                <input type="hidden" name="tipo" id="tipoIntermediador" value="1">
                <div class="form-group row">
                    <div class="col-md-3">
                        <input type="text" id="nomeIntermediador" name="nomeIntermediador" placeholder="*Nome" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-3">
                        <input type="text" id="cnpjIntermediador" name="cnpjIntermediador" placeholder="CNPJ" class="form-control">
                        <input type="text" id="cpfIntermediador" name="cpfIntermediador" placeholder="CPF" class="form-control">
                    </div>
                    <div class="">
                    </div>
                    <div class="col-md-3">
                        <input type="text" name="emailIntermediador" id="emailIntermediador" placeholder="E-mail" class="form-control">
                    </div>
                    <div class="col-md-3">
                        <input type="text" name="telefoneCelularIntermediador" id="telefoneCelularIntermediador" placeholder="Telefone celular" class="form-control telefoneCelular">
                    </div>
                    <div class="col-md-3">
                        <input type="text" id="telefoneFixoIntermediador" name="telefoneFixoIntermediador" placeholder="Telefone fixo" class="form-control telefoneFixo">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-sm botao-padrao btn-block" id="botaoCadastroIntermediadorFisico">Cadastrar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading"><strong>Intermediadores:</strong></div>
        <div class="panel-body">
            <div class="row mb-15">
                <div class="col-md-3 pull-right">
                    <button type="button" class="btn botao-padrao btn-block botaoCadastrar" id="cadastrarIntermediadorBotao">Cadastrar novo intermediador</button>
                </div>
            </div>
            <?php
            $intermediadores = IntermediadorJuridico::listarIntermediador(unserialize($_SESSION['logado'])->getId());
            ?>
            <div class="container-fluid">
                <div class="row">
                    <?php foreach ($intermediadores as $i) { $tipo = $i->tipo; $id = $i->getId();?>
                        
                        <div class=" well well-sm col-md-3">
                            <ul class="list-group text-center">
                                <li class="list-group-item"><?php echo "<img src='css/imagens/icones/intermediador/icone-intermediador-$tipo.png' class='img-thumbnail' alt='icone'>"?></li>
                                <li class="list-group-item"><strong><?php echo $i->getNome(); ?></strong></li>
                                <li class="list-group-item"><?php if(Validacao::encontraNumeros($i->getCpf())){echo $i->getCpf();}elseif(Validacao::encontraNumeros($i->getCnpj())){echo $i->getCnpj();}else{echo "-";}?></li>
                                <li class="list-group-item"><?php if(!filter_var($i->getEmail(), FILTER_VALIDATE_EMAIL)){echo "-";} else{echo $i->getEmail();}?></li>
                                <li class="list-group-item"><?php if(!Validacao::encontraNumeros($i->getTelefone())){echo "-";}else{echo $i->getTelefone();}?></li>
                                <li class="list-group-item"><?php if(!Validacao::encontraNumeros($i->getTelefoneFixo())){echo "-";}else{echo $i->getTelefoneFixo();}?></li>
                                <li class="list-group-item">
                                    <form action="dashboard.php?pagina=intermediador-editar" method="post">
                                        <a href="control/intermediadorController.php?req=excluir&id=<?php echo $id;?>" class="btn btn-sm btn-danger btn-apagar">Excluir</a>
                                        <input type="hidden" value="<?php echo $id;?>" name="id">
                                        <input type="hidden" value="<?php echo $tipo;?>" name="tipo_intermediador">
                                        <button type="submit" class="btn btn-sm botao-padrao"> Editar </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="js/js.page-intermediador.js"></script>

