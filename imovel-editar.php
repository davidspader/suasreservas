<?php
if (!isset($_SESSION['logado'])) {
    header("Location: index.php");
}

if (!isset($_POST['id']) || !isset($_POST['tipo_imovel'])) {
    header("Location: index.php");
}
$imovel = Apartamento::imovelDetalhe($_POST['id'], $_POST['tipo_imovel'], unserialize($_SESSION['logado'])->getId());
?>
<div class="panel panel-default">
    <div class="panel-heading"><strong>Detalhes do imóvel:</strong></div>
    <div class="panel-body">
        <form class="form" role="form" method="post" action="control/imovelController.php" id="formularioEdicaoImovel">
            <input type="hidden" name="req" value="editarImovel">
            <input type="hidden" name="validacao" value="validacao">
            <input type="hidden" name="tipoImovel" value="<?php echo $_POST['tipo_imovel'];?>" id="tipoImovelEdicao">
            <input type="hidden" name="idImovel" value="<?php echo $_POST['id'];?>" id="idImovelEdicao">
            <div class="form-group row">
                <div class="col-md-4">
                    <input type="text" value="<?php echo $imovel->getIdentificacao(); ?>" id="identificacaoEdicaoImovel" name="identificacaoImovel" placeholder="*Nome de identificação" class="form-control">
                </div>
            </div>   
            <div class="form-group row">
                <div class="col-md-4">
                    <input type="text" value="<?php echo $imovel->getCep(); ?>" id="cepImovel" name="cepImovel" placeholder="CEP" class="form-control">
                </div>
                <div class="col-md-4">
                    <input type="text" value="<?php echo $imovel->getSiglaEstado(); ?>" id="estadoImovel" name="estadoImovel" placeholder="Sigla do estado" class="form-control">
                </div>
                <div class="col-md-4">
                    <input type="text" value="<?php echo $imovel->getCidade(); ?>" name="cidadeImovel" id="cidadeImovel" placeholder="Cidade" class="form-control">
                </div>
            </div>    
            <div class="form-group row">
                <div class="col-md-4">
                    <input type="text" value="<?php echo $imovel->getBairro(); ?>" name="bairroImovel" id="bairroImovel" placeholder="Bairro" class="form-control">
                </div>
                <div class="col-md-4">
                    <input type="text" value="<?php echo $imovel->getLogradouro(); ?>" name="logradouroImovel" id="logradouroImovel" placeholder="Rua" class="form-control">
                </div>
                <div class="col-md-4">
                    <input type="text" value="<?php echo $imovel->getNumero(); ?>" name="numeroImovel" id="numeroImovel" placeholder="Número" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <div class="checkbox-inline">
                    <label><input type="checkbox" id="casaEdicao" <?php if($_POST['tipo_imovel'] == 1){echo 'checked';}?> ><strong>Casa</strong></label>
                </div>
                <div class="checkbox-inline">
                    <label><input type="checkbox" id="apartamentoEdicao" <?php if($_POST['tipo_imovel'] == 2){echo 'checked';}?> ><strong>Apartamento</strong></label>
                </div>
            </div>
            <div id="formApartamentoEdicao">
                <div class="form-group row">
                    <div class="col-md-4">
                        <input type="text" value="<?php echo $imovel->getEdificio(); ?>" name="edificioImovel" id="edificioEdicaoImovel" placeholder="Edificio" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <input type="text" value="<?php echo $imovel->getBloco(); ?>" name="blocoImovel" id="blocoEdicaoImovel" placeholder="Bloco" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <input type="text" value="<?php echo $imovel->getNumeroAp(); ?>" name="numeroApImovel" id="numeroApEdicaoImovel" placeholder="Número do apartamento" class="form-control">
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-2">
                    <button type="submit" class="btn btn-sm botao-padrao btn-block">Editar</button>
                </div>
            </div>
        </form>
    </div>
</div>
<script src="js/js-buscaCep.js"></script>
<script src="js/js.page-imovel-detalhe.js"></script>