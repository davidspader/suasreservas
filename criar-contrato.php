<?php
if (!isset($_SESSION['logado']) || !isset($_POST['id'])) {
    header("Location: index.php");
}
?>
<div class="card panel-20">

    <h5 class="card-title span-title-2">Criar contrato:</h5>
    <span>Nos informe as informações do locatário.</span>
    <hr>
    <form class="form formularioLocatario" role="form" method="post" action="control/contratoController.php">
        <input type="hidden" name="id" value="<?php echo $_POST['id']; ?>">
        <input type="hidden" name="idImovel" value="<?php echo $_POST['idImovel']; ?>">
        <input type="hidden" name="req" value="criarContrato">

        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label for="nomeLocatario">*Nome</label>
                    <input type="text" id="nomeLocatario" name="nomeLocatario" value="<?php echo $_POST['locatario']; ?>" placeholder="Digite o nome do locatário" class="form-control">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label for="cpfLocatario">CPF</label>
                    <input type="text" id="cpfLocatario" name="cpfLocatario" placeholder="Digite o CPF do locatário" class="form-control cpf">
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label for="emailLocatario">E-mail</label>
                    <input type="text" name="emailLocatario" id="emailLocatario" placeholder="Digite o E-mail do locatário" class="form-control">
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label for="telefoneCelularLocatario">Telefone celular</label>
                    <input type="text" name="telefoneCelularLocatario" id="telefoneCelularLocatario" placeholder="Digite o telefone celular do locatário" class="form-control celular">
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label for="telefoneFixoLocatario">Telefone fixo</label>
                    <input type="text" id="telefoneFixoLocatario" name="telefoneFixoLocatario" placeholder="Digite o telefone fixo do locatário" class="form-control fixo">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <button type="submit" class="btn btn-primary" id="botaoCadastroLocatario">Criar contrato</button>
                </div>
            </div>
        </div>

    </form>
</div>
<script src="js/validacao-formulario/js.validar-formulario-locatario.js"></script>