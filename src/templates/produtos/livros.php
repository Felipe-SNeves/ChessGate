<!DOCTYPE html>
<html lang="pt-BR">

    <head>
        <meta charset="utf-8" />
        <title>ChessGate - Livros</title>
        <link rel="shortcut icon" href="../../../assets/images/icons/logo_icone.svg" type="image/svg" />
        <meta name="description" content="Compre seus livros de xadrez na ChessGate!" />
        <meta name="keywords" content="xadrez loja livros shop store" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="stylesheet" href="../../styles/estilos.css" />
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
                        <a href="../home.html">
                            <img src="../../../assets/images/icons/logo_icone.svg" type="image/svg" alt="Logomarca" />
                            ChessGate
                        </a>
                    </div>
                    <div id="menu_superior_direita">
                        <span class="pesquisar_icon">
                            <form onsubmit="pesquisar ()">
                                <input onsubmit="pesquisar ();" id="pesquisar_input" type="text" placeholder="Pesquisar" style="font-size: 15px; display: none;" />
                            </form>
                            <img src="../../../assets/images/icons/busca_icone.svg" type="image/svg" alt="Ícone de pesquisa" />
                        </span>
                        <a href="../conta/entrar.html">
                            <img src="../../../assets/images/icons/usuario_icone.svg" type="image/svg" alt="Ícone do usuário" />
                            Entrar
                        </a>
                    </div>
                </div>
                <div id="menu_navegacao">
                    <ul class="nav justify-content-center">
                        <li id="link_home" class="nav-item">
                            <a class="nav-link" href="../home.html">Home</a>
                        </li>
                        <li id="link_partidas" class="nav-item">
                            <a class="nav-link" href="../partidas.html">Partidas</a>
                        </li>
                        <li id="link_produtos" class="nav-item">
                            <div class="dropdown">
                                <a class="nav-link btn dropdown-toggle" href="#" role="button" id="dropdownProdutos" data-bs-toggle="dropdown" aria-expanded="false">Produtos</a>

                                <ul id="lista_produtos" class="dropdown-menu" aria-labelledby="dropdownProdutos">
                                    <li><a class="dropdown-item" href="tabuleiros.html">Tabuleiros</a></li>
                                    <li><a class="dropdown-item" href="livros.html">Livros</a></li>
                                    <li><a class="dropdown-item" href="decorativos.html">Decorativos</a></li>
                                    <li><a class="dropdown-item" href="chaveiros.html">Chaveiros</a></li>
                                </ul>
                            </div>
                        </li>
                        <li id="link_carrinho" class="nav-item">
                            <a class="nav-link" href="../carrinho.html">Carrinho</a>
                        </li>
                        <li id="link_conta" class="nav-item">
                            <div class="dropdown">
                                <a class="nav-link btn dropdown-toggle" href="#" role="button" id="dropdownConta" data-bs-toggle="dropdown" aria-expanded="false">Conta</a>
                                <ul id="lista_usuario" class="dropdown-menu" aria-labelledby="dropdownConta">
                                    <li><a class="dropdown-item" href="../conta/entrar.html">Entrar</a></li>
                                    <li><a class="dropdown-item" href="../conta/perfil.html">Meus dados</a></li>
                                    <li><a class="dropdown-item" href="#">Sair</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </header>

            <main>
                <div id="conteudo" class="prod liv">
                    <p style="text-align: center;">Livros</p>
                    <div id="pri_col">
                        <div class="card">
                            <div class="card-body" style="text-align: center;">
                                <h5 class="card-title">Xadrez para crinças</h5>
                                <img src="../../../assets/images/products/Livros/Livro2.jpg" type="image/jpg" alt="Xadrez para Crianças - Sabrina Chevannes" />
                                <p class="card-text">Jogue desde pequeno</p>
                                <a href="livros/xadrez_criancas.html" class="btn">Ver produto</a>
                            </div>
                        </div>
                    </div>
                    <div id="seg_col">
                        <div class="card">
                            <div class="card-body" style="text-align: center;">
                                <h5 class="card-title">Finais de peões elementares</h5>
                                <img src="../../../assets/images/products/Livros/Livro3.jpeg" type="image/jpeg" alt="Finais de peoes elementares - R.A.F" />
                                <p class="card-text">Não perca mais nas finais</p>
                                <a href="livros/peoes_elem.html" class="btn">Ver produto</a>
                            </div>
                        </div>
                    </div>
                    <div id="ter_col">
                        <div class="card">
                            <div class="card-body" style="text-align: center;">
                                <h5 class="card-title">Meu sistema</h5>
                                <img src="../../../assets/images/products/Livros/Livro5.jpg" type="image/jpg" alt="Meu Sistema - Nimzovitsch" />
                                <p class="card-text">Comece por aqui</p>
                                <a href="livros/meu_sistema.html" class="btn">Ver produto</a>
                            </div>
                        </div>
                    </div>
                    <div id="qua_col">
                        <div class="card">
                            <div class="card-body" style="text-align: center;">
                                <h5 class="card-title">Minhas melhores partidas de xadrez - B Fischer</h5>
                                <img src="../../../assets/images/products/Livros/Livro4.png" type="image/png" alt="Minhas melhores partidas de xadrez - Bobby Fischer" />
                                <p class="card-text">Aprenda com o gênio</p>
                                <a href="livros/partidas_fischer.html" class="btn">Ver produto</a>
                            </div>
                        </div>
                    </div>
                    <div id="qui_col">
                        <div class="card">
                            <div class="card-body" style="text-align: center;">
                                <h5 class="card-title">Minhas melhores partidas de xadrez - Alekhine</h5>
                                <img src="../../../assets/images/products/Livros/Livro1.jpg" type="image/jpg" alt="Minhas melhores partidas de xadrez - Alekhine" />
                                <p class="card-text">Ataque com Alekhine</p>
                                <a href="livros/partidas_alekhine.html" class="btn">Ver produto</a>
                            </div>
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
                                <li><a href="../home.html">Home</a></li>
                                <li><a href="../conta/perfil.html">Conta</a></li>
                                <li><a href="tabuleiros.html">Tabuleiros</a></li>
                            </ul>
                        </div>
                        <div id="s_col">
                            <ul>
                                <li><a href="livros.html">Livros</a></li>
                                <li><a href="decorativos.html">Decorativos</a></li>
                                <li><a href="chaveiros.html">Chaveiros</a></li>
                                <li><a href="../partidas.html">Partidas</a></li>
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