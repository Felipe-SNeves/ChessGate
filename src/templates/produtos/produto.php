<?php

    include ("../conta/dadosBanco.php");

    $codigoProduto = $_GET["cod_produto"];

    session_start ();
    if (isset ($_SESSION["logado"])) {
        $nome = $_SESSION["nome"];
        $email = $_SESSION["email"];
        $fone = $_SESSION["fone"];
        $endereco = $_SESSION["endereco"];
        $logado = $_SESSION["logado"];
    }

    if ($codigoProduto >= 100 && $codigoProduto < 200)
        $categoria = "tabuleiro";
    else if ($codigoProduto >= 200 && $codigoProduto < 300)
        $categoria = "livro";
    else if ($codigoProduto >= 300 && $codigoProduto < 400)
        $categoria = "decorativo";
    else if ($codigoProduto >= 400 && $codigoProduto < 500)
        $categoria = "chaveiro";
    else {
        header ("location: ../home.php?cod=404");
        exit();
    }

    $conexao = mysqli_connect ($servidor, $usuario, $senhaBanco, $banco);

    if (!$conexao)
        die ("Não foi possível se conectar com o banco: " . mysqli_connection_error ());
    else {

        if ($categoria=="tabuleiro") {
            $query = "SELECT p.titulo, p.preco, p.imagemURL, c.dimensoes,
            c.num_unidades, c.num_jogadores, c.peso, c.material
            FROM produto p INNER JOIN $categoria c ON p.cod_produto = c.cod_produto
            WHERE $codigoProduto=c.cod_produto;";

            $resultado = mysqli_query ($conexao, $query);

            if (mysqli_num_rows ($resultado) > 0) {
                while ($linha = mysqli_fetch_assoc($resultado)) {
                    $tituloProduto = $linha["titulo"];
                    $precoProduto = $linha["preco"];
                    $imagemURL = $linha["imagemURL"];
                    $dimensoesProduto = $linha["dimensoes"];
                    $numUnidadesProduto = $linha["num_unidades"];
                    $numJogadoresProduto = $linha["num_jogadores"];
                    $pesoProduto = $linha["peso"];
                    $materialProduto = $linha["material"];
                } 
            } 
            else {
                header ("location: ../home.php?cod=404");
                exit();
            }
        }
        else if ($categoria=="livro") {
            $query = "SELECT p.titulo, p.preco, p.imagemURL, c.dimensoes,
            c.num_unidades, c.idioma, c.qntd_paginas, c.isbn
            FROM produto p INNER JOIN $categoria c ON p.cod_produto = c.cod_produto
            WHERE $codigoProduto=c.cod_produto;";

            $resultado = mysqli_query ($conexao, $query);

            if (mysqli_num_rows ($resultado) > 0) {
                while ($linha = mysqli_fetch_assoc($resultado)) {
                    $tituloProduto = $linha["titulo"];
                    $precoProduto = $linha["preco"];
                    $imagemURL = $linha["imagemURL"];
                    $dimensoesProduto = $linha["dimensoes"];
                    $numUnidadesProduto = $linha["num_unidades"];
                    $idiomaProduto = $linha["idioma"];
                    $qntdPaginasProduto = $linha["qntd_paginas"];
                    $isbnProduto = $linha["isbn"];
                } 
            } 
            else {
                header ("location: ../home.php?cod=404");
                exit();
            }
        }
        else if ($categoria=="decorativo") {
            $query = "SELECT p.titulo, p.preco, p.imagemURL, c.dimensoes,
            c.num_unidades, c.cor, c.peso, c.material, c.armacao
            FROM produto p INNER JOIN $categoria c ON p.cod_produto = c.cod_produto
            WHERE $codigoProduto=c.cod_produto;";

            $resultado = mysqli_query ($conexao, $query);

            if (mysqli_num_rows ($resultado) > 0) {
                while ($linha = mysqli_fetch_assoc($resultado)) {
                    $tituloProduto = $linha["titulo"];
                    $precoProduto = $linha["preco"];
                    $imagemURL = $linha["imagemURL"];
                    $dimensoesProduto = $linha["dimensoes"];
                    $numUnidadesProduto = $linha["num_unidades"];
                    $corProduto = $linha["cor"];
                    $pesoProduto = $linha["peso"];
                    $materialProduto = $linha["material"];
                    $armacaoProduto = $linha["armacao"];
                } 
            } 
            else {
                header ("location: ../home.php?cod=404");
                exit();
            }
        }
        else if ($categoria=="chaveiro") {
            $query = "SELECT p.titulo, p.preco, p.imagemURL, c.dimensoes,
            c.num_unidades, c.cor, c.peso, c.material
            FROM produto p INNER JOIN $categoria c ON p.cod_produto = c.cod_produto
            WHERE $codigoProduto=c.cod_produto;";

            $resultado = mysqli_query ($conexao, $query);

            if (mysqli_num_rows ($resultado) > 0) {
                while ($linha = mysqli_fetch_assoc($resultado)) {
                    $tituloProduto = $linha["titulo"];
                    $precoProduto = $linha["preco"];
                    $imagemURL = $linha["imagemURL"];
                    $dimensoesProduto = $linha["dimensoes"];
                    $numUnidadesProduto = $linha["num_unidades"];
                    $corProduto = $linha["cor"];
                    $pesoProduto = $linha["peso"];
                    $materialProduto = $linha["material"];
                } 
            } 
            else {
                header ("location: ../home.php?cod=404");
                exit();
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="pt-BR">

    <head>
        <meta charset="utf-8" />
        <title>Xadrez para crianças</title>
        <link rel="shortcut icon" href="../../../assets/images/icons/logo_icone.svg" type="image/svg" />
        <meta name="description" content="Xadrez para crianças na ChessGate!" />
        <meta name="keywords" content="xadrez loja livro peças crianças aprender shop store" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="stylesheet" href="../../styles/estrutura_produtos.css" />
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
                        <a href="../home.php">
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
                <div id="conteudo">
                    <p style="text-align: center;"><?php echo $tituloProduto?></p>
                    <div class="pri_col">
                        <img class="livro" src="<?php echo $imagemURL?>" type="image/jpg" alt="<?php echo $tituloProduto?>" />
                    </div>
                    <div class="seg_col">
                        <div class="card">
                            <div class="card-header">
                                Comprar
                            </div>
                            <div class="card-body" style="background-color: #f5ebd5;">
                                <h5 class="card-title"><?php echo "$tituloProduto - $precoProduto"?></h5>
                                <form>
                                    <label class="form-label" for="qntdComprar">Quantidade</label>
                                    <input type="number" min="0" max="99" step="1" id="qntdComprar" /> <br />
                                    <button type="submit" class="btn mt-3" style="background-color: #b98753;">Adicionar ao carrinho</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="ter_col">
                        <table class="table caption-top table-striped table-hover">
                            <caption>Características</caption>
                            <tbody>
                                <?php 

                                    echo "<tr scope='row'>
                                        <td>Dimensões</td>
                                        <td>$dimensoesProduto</td>
                                        </tr>";
                                    echo "<tr scope='row'>
                                                <td>Número de unidades</td>
                                                <td>$numUnidadesProduto</td>
                                              </tr>";
                                    if ($categoria=="tabuleiro") {
                                        echo "<tr scope='row'>
                                                <td>Número de jogadores</td>
                                                <td>$numJogadoresProduto</td>
                                              </tr>";
                                        echo "<tr scope='row'>
                                              <td>Peso</td>
                                              <td>$pesoProduto</td>
                                            </tr>";
                                        echo "<tr scope='row'>
                                            <td>Tipo de material</td>
                                            <td>$materialProduto</td>
                                          </tr>";
                                    }
                                    else if ($categoria=="livro") {
                                        echo "<tr scope='row'>
                                                <td>Idioma</td>
                                                <td>$idiomaProduto</td>
                                              </tr>";
                                        echo "<tr scope='row'>
                                              <td>Quantidade de páginas</td>
                                              <td>$qntdPaginasProduto</td>
                                            </tr>";
                                        echo "<tr scope='row'>
                                            <td>ISBN-13</td>
                                            <td>$isbnProduto</td>
                                          </tr>";
                                    }
                                    else if ($categoria=="decorativo") {
                                        if ($corProduto=='') {
                                            echo "<tr scope='row'>
                                                <td>Armação</td>
                                                <td>$armacaoProduto</td>
                                            </tr>";
                                        }
                                        else {
                                            echo "<tr scope='row'>
                                                <td>Cor</td>
                                                <td>$corProduto</td>
                                              </tr>";
                                        }
                                        echo "<tr scope='row'>
                                                <td>Peso</td>
                                                <td>$pesoProduto</td>
                                              </tr>";
                                        echo "<tr scope='row'>
                                              <td>Tipo de material</td>
                                              <td>$materialProduto</td>
                                            </tr>";

                                    }
                                    else {
                                        echo "<tr scope='row'>
                                                <td>Cor</td>
                                                <td>$corProduto</td>
                                              </tr>";
                                        echo "<tr scope='row'>
                                              <td>Peso</td>
                                              <td>$pesoProduto</td>
                                            </tr>";
                                        echo "<tr scope='row'>
                                            <td>Tipo de material</td>
                                            <td>$materialProduto</td>
                                          </tr>";
                                    }
                                
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </main>

            <footer>
                <div id="rodape">
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

<script lang="javascript">

    function pesquisar () {
        var busca = document.getElementById("pesquisar_input");

        alert(busca.value);
    }
</script>

<?php 
    mysqli_close ($conexao);
?>