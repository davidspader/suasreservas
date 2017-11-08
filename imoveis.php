<?php
if (!isset($_SESSION['logado'])) {
    header("Location: index.php");
}
?>
<div class="panel-group">
    <div class="panel panel-default painel-formulario" id="formImovel">
        <div class="panel-heading"><strong>Cadastrar Imóvel:</strong></div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-3 pull-right">
                    <button type="button" class="btn botao-padrao btn-block botaoCancelar" id="cancelarCadastrarImovelBotao">Cancelar cadastro</button>
                </div>
            </div>

            <form class="form" role="form" method="post" action="control/imovelController.php" id="formularioCadastroImovel">
                <input type="hidden" name="req" value="cadastrarImovel">
                <input type="hidden" name="validacao" value="validacao">
                <input type="hidden" name="tipoImovel" value="1" id="tipoImovel">
                <div class="form-group row">
                    <div class="col-md-4">
                        <input type="text" id="identificacaoImovel" name="identificacaoImovel" placeholder="*Nome de identificação" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <img src="css/imagens/icones/icone-help.png" class="glyphicon glyphicon-question-sign" data-toggle="ajuda_identificacaoImovel" title="Nome de identificação" data-content="É a forma que você gostaria que sua residência fosse identificada no sistema.">
                    </div>
                </div>   
                <div class="form-group row">
                    <div class="col-md-4">
                        <input type="text" id="cepImovel" name="cepImovel" placeholder="CEP" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <input type="text" id="estadoImovel" name="estadoImovel" placeholder="Sigla do estado" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <input type="text" name="cidadeImovel" id="cidadeImovel" placeholder="Cidade" class="form-control">
                    </div>
                </div>    
                <div class="form-group row">
                    <div class="col-md-4">
                        <input type="text" name="bairroImovel" id="bairroImovel" placeholder="Bairro" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <input type="text" name="logradouroImovel" id="logradouroImovel" placeholder="Rua" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <input type="text" name="numeroImovel" placeholder="Número" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <div class="checkbox-inline">
                        <label><input type="checkbox" id="casa" checked><strong>Casa</strong></label>
                    </div>
                    <div class="checkbox-inline">
                        <label><input type="checkbox" id="apartamento"><strong>Apartamento</strong></label>
                    </div>
                </div>
                <div id="formApartamento">
                    <div class="form-group row">
                        <div class="col-md-4">
                            <input type="text" name="edificioImovel" placeholder="Edificio" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <input type="text" name="blocoImovel" placeholder="Bloco" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <input type="text" name="numeroApImovel" placeholder="Número do apartamento" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-sm botao-padrao btn-block" id="botaoCadastroImovel">Cadastrar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading"><strong>Imóveis:</strong></div>
        <div class="panel-body">
            <div class="row mb-15">
                <div class="col-md-3 pull-right">
                    <button type="button" class="btn botao-padrao btn-block botaoCadastrar" id="cadastrarImovelBotao">Cadastrar novo imóvel</button>
                </div>
            </div>
            <?php
            $imoveis = Apartamento::listarImovel(unserialize($_SESSION['logado'])->getId());
            ?>
            <div class="container-fluid">
                <div class="row">
                    <?php foreach ($imoveis as $i) { $tipo = $i->tipo; $id = $i->getId();?>
                    
                        <div class=" well well-sm col-md-3">
                            <ul class="list-group text-center">
                                <li class="list-group-item"><?php echo "<img src='css/imagens/icones/imovel/icone-imovel-$tipo.png' class='img-thumbnail' alt='icone'>"?></li>
                                <li class="list-group-item"><strong><?php echo $i->getIdentificacao(); ?></strong></li>
                                <li class="list-group-item"><?php if(!Validacao::encontraNumeros($i->getCep())){echo "-";}else{echo $i->getCep();} ?></li>
                                <li class="list-group-item">
                                    <form action="dashboard.php?pagina=imovel-editar" method="post">
                                        <a href="control/imovelController.php?req=excluir&id=<?php echo $id;?>" class="btn btn-sm btn-danger btn-apagar">Excluir</a>
                                        <input type="hidden" value="<?php echo $id;?>" name="id">
                                        <input type="hidden" value="<?php echo $tipo;?>" name="tipo_imovel">
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
<script src="js/js-buscaCep.js"></script>
<script src="js/js.page-imoveis.js"></script>
