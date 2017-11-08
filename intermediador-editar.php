<?php
if (!isset($_SESSION['logado'])) {
    header("Location: index.php");
}

if (!isset($_POST['id']) || !isset($_POST['tipo_intermediador'])) {
    header("Location: index.php");
}
$i = IntermediadorJuridico::intermediadorDetalhe($_POST['id'], $_POST['tipo_intermediador'], unserialize($_SESSION['logado'])->getId());
?>
<div class="panel panel-default" id="formIntermediador">
    <div class="panel-heading"><strong>editar Intermediador:</strong></div>
    <div class="panel-body">
        <div class="form-group">
            <div class="checkbox-inline">
                <label><input type="checkbox" id="fisica" <?php if($i->tipo == 1){echo 'checked';} ?>><strong>Pessoa física</strong></label>
            </div>
            <div class="checkbox-inline">
                <label><input type="checkbox" id="juridica" <?php if($i->tipo == 2){echo 'checked';} ?>><strong>Pessoa jurídica</strong></label>
            </div>
        </div>
        <form class="form" role="form" method="post" action="control/intermediadorController.php" id="formularioCadastroIntermediador">
            <input type="hidden" name="req" value="editarIntermediador">
            <input type="hidden" name="validacao" value="validacao">
            <input type="hidden" name="tipo" id="tipoIntermediador" value="<?php echo $i->tipo; ?>">
            <input type="hidden" name="idIntermediador" value="<?php echo $_POST['id'];?>">
            <div class="form-group row">
                <div class="col-md-3">
                    <input type="text" id="nomeIntermediador" name="nomeIntermediador" placeholder="*Nome" class="form-control" value="<?php echo $i->getNome();?>">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-3">
                    <input type="text" id="cnpjIntermediador" name="cnpjIntermediador" placeholder="CNPJ" class="form-control" value="<?php echo $i->getCnpj();?>">
                    <input type="text" id="cpfIntermediador" name="cpfIntermediador" placeholder="CPF" class="form-control" value="<?php echo $i->getCpf();?>">
                </div>
                <div class="">
                </div>
                <div class="col-md-3">
                    <input type="text" name="emailIntermediador" id="emailIntermediador" placeholder="E-mail" class="form-control" value="<?php echo $i->getEmail();?>">
                </div>
                <div class="col-md-3">
                    <input type="text" name="telefoneCelularIntermediador" id="telefoneCelularIntermediador" placeholder="Telefone celular" class="form-control telefoneCelular" value="<?php echo $i->getTelefone();?>">
                </div>
                <div class="col-md-3">
                    <input type="text" id="telefoneFixoIntermediador" name="telefoneFixoIntermediador" placeholder="Telefone fixo" class="form-control telefoneFixo"value="<?php echo $i->getTelefoneFixo();?>">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-2">
                    <button type="submit" class="btn btn-sm botao-padrao btn-block" id="botaoCadastroIntermediadorFisico">Editar</button>
                </div>
            </div>
        </form>
    </div>
</div>
<script src="js/js.page-intermediador-detalhe.js"></script>
