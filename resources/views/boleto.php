<?php

    session_start();

?>

<style>

    .hidden{

        display: inline-block;
    }

</style>


<div class="container_boleto" style="background-color: white;"> 
        <div style="width: 666px">
            <?php if ($imprime_instrucoes_impressao) :?>
            <div class="noprint info">
                <h2>Instruções de Impressão</h2>
                <ul>
                    <li>Imprima em impressora jato de tinta (ink jet) ou laser em qualidade normal ou alta (Não use modo econômico).</li>
                    <li>Utilize folha A4 (210 x 297 mm) ou Carta (216 x 279 mm) e margens mínimas à esquerda e à direita do formulário.</li>
                    <li>Corte na linha indicada. Não rasure, risque, fure ou dobre a região onde se encontra o código de barras.</li>
                    <li>Caso não apareça o código de barras no final, pressione F5 para atualizar esta tela.</li>
                    <li>Caso tenha problemas ao imprimir, copie a sequencia numérica abaixo e pague no caixa eletrônico ou no internet banking:</li>
                </ul>
                <span class="header">Linha Digitável: <?php echo $linha_digitavel; ?></span>
                    <?php if ($valor_documento) : ?><span class="header">Valor: R$ <?php echo $valor_documento; ?></span><?php endif ?>
                    <?php if ($pagamento_minimo) : ?><span class="header">Pagamento mínimo: R$ <?php echo $pagamento_minimo; ?></span><?php endif ?>
                <br>
                <div class="linha-pontilhada" style="margin-bottom: 20px;">Recibo do pagador</div>
            </div>
            <?php endif ?>
            <div class="info-empresa">
                <?php if ($logotipo) : ?>
                <div style="display: inline-block;">
                    <img alt="logotipo" src="<?php echo $logotipo; ?>" />
                </div>
                <?php endif ?>
                <div style="display: inline-block; vertical-align: super;">
                    <div><strong><?php echo $cedente; ?></strong></div>
                    <div><?php echo $cedente_cpf_cnpj; ?></div>
                    <div><?php echo $cedente_endereco1; ?></div>
                    <div><?php echo $cedente_endereco2; ?></div>
                </div>
            </div>
            <br>
            <table class="table-boleto" cellpadding="0" cellspacing="0" border="0">
                <tbody>
                <tr>
                    <td valign="bottom" colspan="8" class="noborder nopadding">
                        <div class="logocontainer">
                            <div class="logobanco">
                                <img src="<?php echo $logo_banco; ?>" alt="logotipo do banco">
                            </div>
                            <div class="codbanco"><?php echo $codigo_banco_com_dv ?></div>
                        </div>
                        <div class="linha-digitavel"><?php echo $linha_digitavel ?></div>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" width="250">
                        <div class="titulo">Beneficiário</div>
                        <div class="conteudo"><?php echo $cedente ?></div>
                    </td>
                    <td>
                        <div class="titulo">CPF/CNPJ</div>
                        <div class="conteudo"><?php echo $cedente_cpf_cnpj ?></div>
                    </td>
                    <td width="120">
                        <div class="titulo">Agência/Código do Beneficiário</div>
                        <div class="conteudo rtl"><?php echo $agencia_codigo_cedente ?></div>
                    </td>
                    <td width="110">
                        <div class="titulo">Vencimento</div>
                        <div class="conteudo rtl"><?php echo $data_vencimento ?></div>
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        <div class="titulo">Pagador</div>
                        <div class="conteudo"><?php echo $sacado ?></div>
                    </td>
                    <td>
                        <div class="titulo">Nº documento</div>
                        <div class="conteudo rtl"><?php echo $numero_documento ?></div>
                    </td>
                    <td>
                        <div class="titulo">Nosso número</div>
                        <div class="conteudo rtl"><?php echo $nosso_numero ?></div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="titulo">Espécie</div>
                        <div class="conteudo"><?php echo $especie ?></div>
                    </td>
                    <td>
                        <div class="titulo">Quantidade</div>
                        <div class="conteudo rtl"><?php echo $quantidade ?></div>
                    </td>
                    <td>
                        <div class="titulo">Valor</div>
                        <div class="conteudo rtl"><?php echo $valor_unitario ?></div>
                    </td>
                    <td>
                        <div class="titulo">(-) Descontos / Abatimentos</div>
                        <div class="conteudo rtl"><?php echo $desconto_abatimento ?></div>
                    </td>
                    <td>
                        <div class="titulo">(=) Valor Documento</div>
                        <div class="conteudo rtl"><?php echo $valor_documento ?></div>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <div class="conteudo"></div>
                        <div class="titulo">Demonstrativo</div>
                    </td>
                    <td>
                        <div class="titulo">(-) Outras deduções</div>
                        <div class="conteudo"><?php echo $outras_deducoes ?></div>
                    </td>
                    <td>
                        <div class="titulo">(+) Outros acréscimos</div>
                        <div class="conteudo rtl"><?php echo $outros_acrescimos ?></div>
                    </td>
                    <td>
                        <div class="titulo">(=) Valor cobrado</div>
                        <div class="conteudo rtl"><?php echo $valor_cobrado ?></div>
                    </td>
                </tr>
                <tr>
                    <td colspan="4"><div style="margin-top: 10px" class="conteudo"><?php echo $demonstrativo[0] ?></div></td>
                    <td class="noleftborder"><div class="titulo">Autenticação mecânica</div></td>
                </tr>
                <tr>
                    <td colspan="5" class="notopborder"><div class="conteudo"><?php echo $demonstrativo[1] ?></div></td>
                </tr>
                <tr>
                    <td colspan="5" class="notopborder"><div class="conteudo"><?php echo $demonstrativo[2] ?></div></td>
                </tr>
                <tr>
                    <td colspan="5" class="notopborder"><div class="conteudo"><?php echo $demonstrativo[3] ?></div></td>
                </tr>
                <tr>
                    <td colspan="5" class="notopborder bottomborder"><div style="margin-bottom: 10px;" class="conteudo"><?php echo $demonstrativo[4] ?></div></td>
                </tr>
                </tbody>
            </table>
            <br>
            <div class="linha-pontilhada">Corte na linha pontilhada</div>
            <br>
            <!-- Ficha de compensação -->
            <?php include('partials/ficha-de-compensacao.phtml') ?>
        </div>
    </div>
    <br>
    <br>
    <br>
