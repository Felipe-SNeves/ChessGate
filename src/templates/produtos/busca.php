<?php

    session_start ();
    if (isset ($_SESSION["logado"])) {
        $nome = $_SESSION["nome"];
        $email = $_SESSION["email"];
        $fone = $_SESSION["fone"];
        $endereco = $_SESSION["endereco"];
        $logado = $_SESSION["logado"];
        $cod_cliente = $_SESSION["cod_cliente"];
    }
    
    include ("../conta/dadosBanco.php");

    $produtoBusca = $_GET["prod"];

    $conexao = mysqli_connect ($servidor, $usuario, $senhaBanco, $banco);

    if (!$conexao)
        die ("Conexão falhou: " . mysqli_connection_error ());
    else {
        $query = "SELECT p.cod_produto, p.titulo, p.imagemURL
        FROM produto p
        WHERE p.titulo LIKE '%$produtoBusca%';";

        $resultado = mysqli_query ($conexao, $query);

        if (mysqli_num_rows($resultado) <= 0)
            $busca = false;
        else
            $busca = true;
    }

    mysqli_close ($conexao);

    function proximo (int $i) {
        return fmod ($i,3) + 1; 
    }
?>


<!DOCTYPE html>
<html lang="pt-BR">

    <head>
        <meta charset="utf-8" />
        <title>ChessGate</title>
        <link rel="shortcut icon" href="../../../assets/images/icons/logo_icone.svg" type="image/svg" />
        <meta name="description" content="Compre seu próximo tabuleiro de xadrez na ChessGate! Entre vários outros produtos!" />
        <meta name="keywords" content="xadrez loja tabuleiro peças shop store decorativo chaveiros livros" />
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
        <style>
            .rodape_busca {
                bottom: 0;
            }
        </style>
    </head>

    <body id="topo">
        <div class="container-fluid px-0">
            <header>
                <div id="cabecalho">
                    <div id="menu_superior_esquerda">
                        <a href="../home.php">
                            <img src="../../../assets/images/icons/logo_icone.svg" type="image/svg" alt="Logomarca" />
                            ChessGate
                        </a>
                    </div>
                    <div id="menu_superior_direita">
                        <span class="pesquisar_icon">
                            <form method="get" action="busca.php">
                                <input name="prod" id="pesquisar_input" type="text" placeholder="Pesquisar" style="font-size: 15px; display: none;" />
                            </form>
                            <img src="../../../assets/images/icons/busca_icone.svg" type="image/svg" alt="Ícone de pesquisa" />
                        </span>
                        <a href="../conta/entrar.php">
                            <img src="../../../assets/images/icons/usuario_icone.svg" type="image/svg" alt="Ícone do usuário" />
                            <?php 
                                if ($logado) {
                                    echo $nome;
                                }
                                else
                                    echo "Entrar";
                            ?>
                        </a>
                    </div>
                </div>
                <div id="menu_navegacao">
                    <ul class="nav justify-content-center">
                        <li id="link_home" class="nav-item">
                            <a class="nav-link" href="../home.php">Home</a>
                        </li>
                        <li id="link_partidas" class="nav-item">
                            <a class="nav-link" href="../partidas.php">Partidas</a>
                        </li>
                        <li id="link_produtos" class="nav-item">
                            <div class="dropdown">
                                <a class="nav-link btn dropdown-toggle" href="#" role="button" id="dropdownProdutos" data-bs-toggle="dropdown" aria-expanded="false">Produtos</a>

                                <ul id="lista_produtos" class="dropdown-menu" aria-labelledby="dropdownProdutos">
                                    <li><a class="dropdown-item" href="vitrine.php?categoria=100">Tabuleiros</a></li>
                                    <li><a class="dropdown-item" href="vitrine.php?categoria=200">Livros</a></li>
                                    <li><a class="dropdown-item" href="vitrine.php?categoria=300">Decorativos</a></li>
                                    <li><a class="dropdown-item" href="vitrine.php?categoria=400">Chaveiros</a></li>
                                </ul>
                            </div>
                        </li>
                        <li id="link_carrinho" class="nav-item">
                            <a class="nav-link" href="../carrinho.php">Carrinho</a>
                        </li>
                        <li id="link_conta" class="nav-item">
                            <div class="dropdown">
                                <a class="nav-link btn dropdown-toggle" href="#" role="button" id="dropdownConta" data-bs-toggle="dropdown" aria-expanded="false">Conta</a>
                                <ul id="lista_usuario" class="dropdown-menu" aria-labelledby="dropdownConta">
                                    <?php 
                                        if ($logado) {
                                            echo "<li><a class='dropdown-item' href='../conta/perfil.php'>Meus dados</a></li>";
                                            echo "<li><a class='dropdown-item' href='../conta/sair.php'>Sair</a></li>";
                                        }
                                        else
                                            echo "<li><a class='dropdown-item' href='../conta/entrar.php'>Entrar</a></li>";
                                    ?>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </header>

            <main>
                <div id="conteudo" class="prod <?php if ($categoria=="Livros") echo "liv"; ?>">
                    <p style="text-align: center;"><?php echo $categoria; ?></p>
                    
                    <?php
                        
                        if ($busca) {
                            $i = 0;
                            while ($linha = mysqli_fetch_assoc ($resultado)) {
                                $titulo = $linha["titulo"];
                                $imagemPath = $linha["imagemURL"];
                                $cod_produto = $linha["cod_produto"];
                                
                                if (proximo($i)==1)
                                    $classe = "pri_col";
                                else if (proximo($i)==2)
                                    $classe = "seg_col";
                                else if (proximo($i)==3)
                                    $classe = "ter_col";

                                $i++;

                                echo  "<div id='$classe'>
                                    <div class='card'>
                                        <div class='card-body' style='text-align: center;'>
                                            <h5 class='card-title'>$titulo</h5>
                                            <img src='$imagemPath' alt='$titulo' />
                                            <a href='produto.php?cod_produto=$cod_produto' class='btn'>Ver produto</a>
                                        </div>
                                    </div>
                                </div>";
                            }
                        }
                        else {
                            echo "<h2>Nenhum produto corresponde a '$produtoBusca'!</h2>";
                        }
                    ?>
                </div>
            </main>

            <footer>
                <div id="rodape" style="position: <?php if ($busca) echo "relative"; else echo "absolute"; ?>;" >
                    <div id="conteudo_rodape">
                        <div id="p_col">
                            <ul>
                                <li><a href="#topo">Topo</a></li>
                                <li><a href="../home.php">Home</a></li>
                                <?php 
                                    if ($logado)
                                        echo "<li><a href='../conta/perfil.php'>Conta</a></li>";
                                    else
                                        echo "<li><a href='../conta/entrar.php'>Entrar</a></li>";
                                ?>
                                <li><a href="vitrine.php?categoria=100">Tabuleiros</a></li>
                            </ul>
                        </div>
                        <div id="s_col">
                            <ul>
                                <li><a href="vitrine.php?categoria=200">Livros</a></li>
                                <li><a href="vitrine.php?categoria=300">Decorativos</a></li>
                                <li><a href="vitrine.php?categoria=400">Chaveiros</a></li>
                                <li><a href="../partidas.php">Partidas</a></li>
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