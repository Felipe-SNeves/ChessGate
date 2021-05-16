<!DOCTYPE html>
<html lang="pt-BR">

    <head>
        <meta charset="utf-8" />
        <title>Carrinho</title>
        <link rel="shortcut icon" href="../../assets/images/icons/logo_icone.svg" type="image/svg" />
        <meta name="description" content="Carrinho de produtos da ChessGate" />
        <meta name="keywords" content="xadrez loja tabuleiro chaveiro decorativo livro produtos carrinho" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="stylesheet" href="../styles/estilos.css" />
        <script lang="javascript" type="text/javascript" src="../scripts/alterarEntrega.js"></script>
        <script lang="javascript" type="text/javascript" src="../scripts/limparEntrega.js"></script>
        <!-- JQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> 
        <!-- Inserção do Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
        <!-- Inclusão de fontes -->
        <!-- Conexão com o google fonts -->
        <link rel="preconnect" href="https://fonts.gstatic.com"> 
        <!-- Lora -->
        <link href="https://fonts.googleapis.com/css2?family=Lora&display=swap" rel="stylesheet">
    </head>

    <body id="topo">
        <div class="container-fluid px-0">
            <header>
                <div id="cabecalho">
                    <div id="menu_superior_esquerda">
                        <a href="home.php">
                            <img src="../../assets/images/icons/logo_icone.svg" type="image/svg" alt="Logomarca" />
                            ChessGate
                        </a>
                    </div>
                    <div id="menu_superior_direita">
                        <span class="pesquisar_icon">
                            <form onsubmit="pesquisar ()">
                                <input onsubmit="pesquisar ();" id="pesquisar_input" type="text" placeholder="Pesquisar" style="font-size: 15px; display: none;" />
                            </form>
                            <img src="../../assets/images/icons/busca_icone.svg" type="image/svg" alt="Ícone de pesquisa" />
                        </span>
                        <a href="conta/entrar.php">
                            <img src="../../assets/images/icons/usuario_icone.svg" type="image/svg" alt="Ícone do usuário" />
                            Entrar
                        </a>
                    </div>
                </div>
                <div id="menu_navegacao">
                    <ul class="nav justify-content-center">
                        <li id="link_home" class="nav-item">
                            <a class="nav-link" href="home.php">Home</a>
                        </li>
                        <li id="link_partidas" class="nav-item">
                            <a class="nav-link" href="partidas.php">Partidas</a>
                        </li>
                        <li id="link_produtos" class="nav-item">
                            <div class="dropdown">
                                <a class="nav-link btn dropdown-toggle" href="#" role="button" id="dropdownProdutos" data-bs-toggle="dropdown" aria-expanded="false">Produtos</a>

                                <ul id="lista_produtos" class="dropdown-menu" aria-labelledby="dropdownProdutos">
                                    <li><a class="dropdown-item" href="produtos/tabuleiros.php">Tabuleiros</a></li>
                                    <li><a class="dropdown-item" href="produtos/livros.php">Livros</a></li>
                                    <li><a class="dropdown-item" href="produtos/decorativos.php">Decorativos</a></li>
                                    <li><a class="dropdown-item" href="produtos/chaveiros.php">Chaveiros</a></li>
                                </ul>
                            </div>
                        </li>
                        <li id="link_carrinho" class="nav-item">
                            <a class="nav-link" href="carrinho.php">Carrinho</a>
                        </li>
                        <li id="link_conta" class="nav-item">
                            <div class="dropdown">
                                <a class="nav-link btn dropdown-toggle" href="#" role="button" id="dropdownConta" data-bs-toggle="dropdown" aria-expanded="false">Conta</a>
                                <ul id="lista_usuario" class="dropdown-menu" aria-labelledby="dropdownConta">
                                    <li><a class="dropdown-item" href="conta/entrar.php">Entrar</a></li>
                                    <li><a class="dropdown-item" href="conta/perfil.php">Meus dados</a></li>
                                    <li><a class="dropdown-item" href="#">Sair</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </header>

            <main>
                <div id="conteudo">
                    <div id="lista_itens">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Produto</th>
                                    <th scope="col">Quantidade</th>
                                    <th scope="col">Preço</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr scope="row">
                                    <td>Tabuleiro oriental</td>
                                    <td>1</td>
                                    <td>R$ 99,99</td>
                                </tr>
                                <tr scope="row">
                                    <td>Chaveiro real</td>
                                    <td>2</td>
                                    <td>R$ 79,98</td>
                                </tr>
                                <tr scope="row">
                                    <td>Meu sistema</td>
                                    <td>1</td>
                                    <td>119,99</td>
                                </tr>
                                <tr scope="row">
                                    <td>Tabuleiro clássico</td>
                                    <td>1</td>
                                    <td>89,99</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div id="preco_total">
                        <div class="card">
                            <div class="card-header">
                                Finalizar compra
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Preço total</h5>
                                <p class="card-text">O preço total da compra é de R$ 179,97</p>
                                <a href="#" class="btn" style="background-color: #b98753;">Pagar</a>
                                <a href="#" class="btn" style="background-color: #b98753;">Limpar</a>
                            </div>
                        </div>
                    </div>
                    <div id="endereco_entrega">
                        <div class="card">
                            <div class="card-header">
                                Endereço de entrega
                            </div>
                            <div class="card-body" style="text-align: left;">
                                <p class="card-text">Os produtos serão entregues no endereço abaixo. Caso deseje altera-lo clique no botão "Alterar endereço"!</p>
                                <form>
                                    <label for="enderecoEntrega" class="form-label">Endereço de entrega</label>
                                    <input type="text" maxlength="40" class="form-control" id="enderecoEntrega" value="" readonly />
                                </form>
                                <button style="background-color: #b98753; margin-top: 1%;" id="btn_alterar" type="button" class="btn" data-bs-toggle="modal" data-bs-target="#trocarEndereco">
                                    Alterar endereço
                                </button>
                            </div>
                    </div>       
                </div>
            </main>

            <footer>
                <div id="rodape">
                    <div id="conteudo_rodape">
                        <div id="p_col">
                            <ul>
                                <li><a href="#topo">Topo</a></li>
                                <li><a href="home.php">Home</a></li>
                                <li><a href="conta/perfil.php">Conta</a></li>
                                <li><a href="produtos/tabuleiros.php">Tabuleiros</a></li>
                            </ul>
                        </div>
                        <div id="s_col">
                            <ul>
                                <li><a href="produtos/livros.php">Livros</a></li>
                                <li><a href="produtos/decorativos.php">Decorativos</a></li>
                                <li><a href="produtos/chaveiros.php">Chaveiros</a></li>
                                <li><a href="partidas.php">Partidas</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </body>

</html>

<script lang="javascript">
    
    $(window).scroll(function () {
        
        var scroll = $(window).scrollTop();
        var cabecalhoOffset = $("#menu_navegacao").offset().top;

        if (scroll >= cabecalhoOffset)
            $("#menu_navegacao").css("position","fixed").css("top","0");

        if (cabecalhoOffset <= $("#cabecalho").offset().top)
            $("#menu_navegacao").css("position","relative").css("top","auto");
    });

    $("#link_produtos").mouseenter( function () {
        $("#lista_produtos").toggle();
    });

    $("#link_produtos").mouseleave ( function () {
        $("#lista_produtos").toggle();
    });

    $("#link_conta").mouseenter ( function () {
        $("#lista_usuario").toggle();
    })

    $("#link_conta").mouseleave ( function () {
        $("#lista_usuario").toggle();
    })

    $(document).ready( function () {

        var busca = document.getElementById("pesquisar_input");
        busca.value = "";

        var largura_atual = $(window).width();

        if (largura_atual < 576) {
            $("#pesquisar_input").attr("size","2.5");
            return false;
        }

        if ((largura_atual >= 576 && largura_atual < 768)) {
            $("#pesquisar_input").attr("size","5");
            return false;
        }

        if ((largura_atual >= 768 && largura_atual < 992)) {
            $("#pesquisar_input").attr("size","7.5");
            return false;
        }

        if ((largura_atual >= 992 && largura_atual < 1200)) {
            $("#pesquisar_input").attr("size","10");
            return false;
        }

        if((largura_atual >= 1200)) {
            $("#pesquisar_input").attr("size","12.5");
            return false;
        }
    })

    $(window).on("resize", function () {

        $("#pesquisar_input").fadeOut(100);
        
        var largura_atual = $(window).width();

        if (largura_atual < 576) {
            $("#pesquisar_input").attr("size","2.5");
            return false;
        }

        if ((largura_atual >= 576 && largura_atual < 768)) {
            $("#pesquisar_input").attr("size","5");
            return false;
        }

        if ((largura_atual >= 768 && largura_atual < 992)) {
            $("#pesquisar_input").attr("size","7.5");
            return false;
        }

        if ((largura_atual >= 992 && largura_atual < 1200)) {
            $("#pesquisar_input").attr("size","10");
            return false;
        }

        if((largura_atual >= 1200)) {
            $("#pesquisar_input").attr("size","12.5");
            return false;
        }

    })

    $(".pesquisar_icon").click ( function () {
            var busca = document.getElementById("pesquisar_input");
            busca.value = "";
            $("#pesquisar_input").fadeIn(100);
            $("#pesquisar_input").focus();
    })

    $(document).on("click", function (event) {
        if(!$(event.target).closest(".pesquisar_icon").length) {
            $("#pesquisar_input").fadeOut(100);
            var busca = document.getElementById("pesquisar_input");
            busca.value = "";
        }
    })
</script>

<script lang="javascript">

    function pesquisar () {
        var busca = document.getElementById("pesquisar_input");

        alert(busca.value);
    }
</script>

<div class="modal fade" id="trocarEndereco" tabindex="-1" role="dialog" style="z-index: 1500;">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabel">Alterar endereço de entrega</h5>
                <button type="button" class="close" data-bs-dismiss="modal" arial-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Informe o endereço de entrega para essa compra. Caso deseje fazer essa alteração <b>permanentemente</b>, mude o endereço associado a sua conta na <b>página de perfil!</b></p>
                <input type="text" id="endereco_novo" class="form-control" maxlength="40" required placeholder="Informe o endereço de entrega" />
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                <button type="button" onclick="alterarEndereco ();" class="btn btn-success">Alterar endereço</button>
            </div>
        </div>
    </div>
</div>