<?php
if (!isset($_SESSION['logado'])) {
    header("Location: index.php");
}

if (!isset($_POST['id']) || !isset($_POST['tipo_intermediador'])) {
    header("Location: index.php");
}
$i = IntermediadorJuridico::intermediadorDetalhe($_POST['id'], $_POST['tipo_intermediador'], unserialize($_SESSION['logado'])->getId());

$cpf = $i->getCpf();

?>
<div class="card panel-20">

    <h5 class="card-title span-title-2">Editar intermediador:</h5>
    <hr>
    <form class="form formularioIntermediador" role="form" method="post" action="control/intermediadorController.php" id="formularioCadastroIntermediador">
        <input type="hidden" name="req" value="editarIntermediador">
        <input type="hidden" name="validacao" value="validacao">
        <input type="hidden" name="idIntermediador" value="<?php echo $_POST['id']; ?>">

        <div class="row">
            <div class="col-md-1">
                <div class="form-group">
                    <div class="animated-radio-button">
                        <label>
                            <input type="radio" name="tipoIntermediador" value="1" <?php if ($i->tipo == 1) {echo 'checked';} ?> class="radioFisica"><span class="label-text">Pessoa física</span>
                        </label>
                    </div>
                </div>
            </div>

            <div class="col-md-2">
                <div class="form-group">
                    <div class="animated-radio-button">
                        <label>
                            <input type="radio" name="tipoIntermediador" value="2" <?php if ($i->tipo == 2) {echo 'checked';} ?> class="radioJuridica"><span class="label-text">Pessoa júridica</span>
                        </label>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label for="nomeIntermediador">*Nome</label>
                    <input type="text" id="nomeIntermediador" name="nomeIntermediador" placeholder="Digite o nome do intermediador" class="form-control" value="<?php echo $i->getNome(); ?>">
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <div class="campoCnpj">
                        <label for="cnpjIntermediador">CNPJ</label>
                        <input type="text" id="cnpjIntermediador" name="cnpjIntermediador" placeholder="Digite o CNPJ do intermediador" class="form-control cnpj" value="<?php echo $i->getCnpj(); ?>">
                    </div>
                    <div class="campoCpf">
                        <label for="cpfIntermediador">CPF</label>
                        <input type="text" id="cpfIntermediador" name="cpfIntermediador" placeholder="Digite o CPF do intermediador" class="form-control cpf" value="<?php echo $i->getCpf(); ?>">
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label for="emailIntermediador">E-mail</label>
                    <input type="text" name="emailIntermediador" id="emailIntermediador" placeholder="Digite o e-mail do intermediador" class="form-control" value="<?php echo $i->getEmail(); ?>">
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label for="telefoneCelularIntermediador">Telefone celular</label>
                    <input type="text" name="telefoneCelularIntermediador" id="telefoneCelularIntermediador" placeholder="Digite o telefone celular do intermediador" class="form-control celular" value="<?php echo $i->getTelefone(); ?>">
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label for="telefoneFixoIntermediador">Telefone fixo</label>
                    <input type="text" id="telefoneFixoIntermediador" name="telefoneFixoIntermediador" placeholder="Digite o telefone fixo do intermediador" class="form-control fixo" value="<?php echo $i->getTelefoneFixo(); ?>">
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
<script src="js/validacao-formulario/js.validar-formulario-intermediador.js"></script>
