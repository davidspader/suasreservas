<?php
if (!isset($_SESSION['logado'])) {
    header("Location: index.php");
}

if (!isset($_POST['id']) || !isset($_POST['tipo_imovel'])) {
    header("Location: index.php");
}
$imovel = Apartamento::imovelDetalhe($_POST['id'], $_POST['tipo_imovel'], unserialize($_SESSION['logado'])->getId());
?>
<div class="card panel-20">

    <h5 class="card-title span-title-2">Editar imóvel:</h5>
    <hr>
    <form class="form formularioImovel" role="form" method="post" action="control/imovelController.php">
        <input type="hidden" name="req" value="editarImovel">
        <input type="hidden" name="validacao" value="validacao">
        <input type="hidden" name="idImovel" value="<?php echo $_POST['id']; ?>" id="idImovelEdicao">

        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label for="identificacaoImovel">*Nome de identificação</label>
                    <input class="form-control" type="text" placeholder="Digite a identificação do seu imóvel" id="identificacaoImovel" name="identificacaoImovel" value="<?php echo $imovel->getIdentificacao(); ?>">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label for="cepImovel">CEP</label>
                    <input class="form-control cep" type="text" placeholder="Digite o CEP do seu imóvel" id="cepImovel" name="cepImovel" value="<?php echo $imovel->getCep(); ?>">
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label for="estadoImovel">Sigla do estado</label>
                    <input class="form-control siglaEstado" type="text" placeholder="Digite a sigla do estado do imóvel" id="estadoImovel" name="estadoImovel" value="<?php echo $imovel->getSiglaEstado(); ?>">
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label for="cidadeImovel">Cidade</label>
                    <input type="text" name="cidadeImovel" id="cidadeImovel" placeholder="Digite a cidade do seu imóvel" class="form-control" value="<?php echo $imovel->getCidade(); ?>">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label for="bairroImovel">Bairro</label>
                    <input type="text" name="bairroImovel" id="bairroImovel" placeholder="Digite o bairro do seu imóvel" class="form-control" value="<?php echo $imovel->getBairro(); ?>">
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label for="logradouroImovel">Rua</label>
                    <input type="text" name="logradouroImovel" id="logradouroImovel" placeholder="Digite a rua do seu imóvel" class="form-control" value="<?php echo $imovel->getLogradouro(); ?>">
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label for="numeroImovel">Número</label>
                    <input type="text" name="numeroImovel" id="numeroImovel" placeholder="Digite o número do seu imóvel" class="form-control" value="<?php echo $imovel->getNumero(); ?>">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-1">
                <div class="form-group">
                    <div class="animated-radio-button">
                        <label>
                            <input type="radio" name="tipoImovel" value="1" checked class="radioCasa" <?php if($_POST['tipo_imovel'] == 1){echo 'checked';}?>><span class="label-text">Casa</span>
                        </label>
                    </div>
                </div>
            </div>

            <div class="col-md-2">
                <div class="form-group">
                    <div class="animated-radio-button">
                        <label>
                            <input type="radio" name="tipoImovel" value="2" class="radioApartamento" id="apartamentoEdicao" <?php if($_POST['tipo_imovel'] == 2){echo 'checked';}?>><span class="label-text">Apartamento</span>
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
                        <input type="text" name="edificioImovel" id="edificioImovel" placeholder="Digite o nome do edificio do seu apartamento" class="form-control" value="<?php echo $imovel->getEdificio(); ?>">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label for="blocoImovel">Bloco</label>
                        <input type="text" name="blocoImovel" id="blocoImovel" placeholder="Digite o nome do bloco do seu apartamento" class="form-control" value="<?php echo $imovel->getBloco(); ?>">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label for="numeroApImovel">Número do apartamento</label>
                        <input type="text" name="numeroApImovel" id="numeroApImovel" placeholder="Digite o número do seu apartamento" class="form-control" value="<?php echo $imovel->getNumeroAp(); ?>">
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <button type="submit" class="btn btn-primary" id="botaoCadastroImovel">Editar</button>
                </div>
            </div>
        </div>
    </form>
</div>
<script src="js/js-buscaCep.js"></script>
<script src="js/validacao-formulario/js.validar-formulario-imovel.js"></script>
<script src="js/js.page-imovel-editar.js"></script>