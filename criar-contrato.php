<?php
if (!isset($_SESSION['logado']) || !isset($_POST['id'])) {
    header("Location: index.php");
}
?>
<div class="panel panel-default" id="formLocatario">
    <div class="panel-heading"><strong>Preencha os campos sobre o locatário para criar o contrato:</strong></div>
    <div class="panel-body">
        <form class="form formularioLocatario" role="form" method="post" action="control/contratoController.php">
            <input type="hidden" name="id" value="<?php echo $_POST['id']; ?>">
            <input type="hidden" name="idImovel" value="<?php echo $_POST['idImovel']; ?>">
            <input type="hidden" name="req" value="criarContrato">
            <div class="form-group row">
                <div class="col-md-3">
                    <input type="text" id="nomeLocatario" name="nomeLocatario" placeholder="*Nome" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-3">
                    <input type="text" id="cpfLocatario" name="cpfLocatario" placeholder="CPF" class="form-control cpf">
                </div>
                <div class="">
                </div>
                <div class="col-md-3">
                    <input type="text" name="emailLocatario" id="emailLocatario" placeholder="E-mail" class="form-control">
                </div>
                <div class="col-md-3">
                    <input type="text" name="telefoneCelularLocatario" id="telefoneCelularLocatario" placeholder="Telefone celular" class="form-control celular">
                </div>
                <div class="col-md-3">
                    <input type="text" id="telefoneFixoLocatario" name="telefoneFixoLocatario" placeholder="Telefone fixo" class="form-control fixo">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-2">
                    <button type="submit" class="btn btn-sm botao-padrao btn-block" id="botaoCadastroLocatario">Criar contrato</button>
                </div>
            </div>
        </form>
    </div>
</div>
<script src="js/validacao-formulario/js.validar-formulario-locatario.js"></script>