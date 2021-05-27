<?php 

    include ("./conta/dadosBanco.php");

    $cod_produtoCarrousel_1 = 114;
    $cod_produtoCarrousel_2 = 111;
    $cod_produtoCarrousel_3 = 310;
    $cod_produtoCarrousel_4 = 411;
    
    session_start ();
    if (isset ($_SESSION["logado"])) {
        $nome = $_SESSION["nome"];
        $email = $_SESSION["email"];
        $fone = $_SESSION["fone"];
        $endereco = $_SESSION["endereco"];
        $logado = $_SESSION["logado"];
        $cod_cliente = $_SESSION["cod_cliente"];
    }

    $conexao = mysqli_connect ($servidor, $usuario, $senhaBanco, $banco);

    if (!$conexao)
        die ("Conexão falhou: " . mysqli_connection_error ());
    else {
        $query = "SELECT p.titulo, p.imagemURL
        FROM produto p WHERE p.cod_produto=$cod_produtoCarrousel_1;";

        $resultado = mysqli_query ($conexao, $query);

        if (mysqli_num_rows($resultado) <= 0)
            echo "<script>alert ('Nenhum produto cadastrado nessa categoria!'); </script>";
    }

    if ($_GET["cod"]==404) {
        echo "<script>alert ('Produto inexistente!');</script>";
    }

    if($_GET["cod"]==200)
        echo "<script>alert ('Senha atualizada com sucesso!');</script>";
?>

<!DOCTYPE html>
<html lang="pt-BR">

    <head>
        <meta charset="utf-8" />
        <title>ChessGate</title>
        <link rel="shortcut icon" href="../../assets/images/icons/logo_icone.svg" type="image/svg" />
        <meta name="description" content="Home da ChessGate, a maior e melhor loja de artigos enxadrístico do país" />
        <meta name="keywords" content="xadrez loja tabuleiro chaveiro decorativo livro" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="stylesheet" href="../styles/estilos.css" />
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
                            <a class="nav-link" href="home.php">Home</a>
                        </li>
                        <li id="link_partidas" class="nav-item">
                            <a class="nav-link" href="partidas.php">Partidas</a>
                        </li>
                        <li id="link_produtos" class="nav-item">
                            <div class="dropdown">
                                <a class="nav-link btn dropdown-toggle" href="#" role="button" id="dropdownProdutos" data-bs-toggle="dropdown" aria-expanded="false">Produtos</a>

                                <ul id="lista_produtos" class="dropdown-menu" aria-labelledby="dropdownProdutos">
                                    <li><a class="dropdown-item" href="produtos/vitrine.php?categoria=100">Tabuleiros</a></li>
                                    <li><a class="dropdown-item" href="produtos/vitrine.php?categoria=200">Livros</a></li>
                                    <li><a class="dropdown-item" href="produtos/vitrine.php?categoria=300">Decorativos</a></li>
                                    <li><a class="dropdown-item" href="produtos/vitrine.php?categoria=400">Chaveiros</a></li>
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
                                    <?php 
                                        if ($logado) {
                                            echo "<li><a class='dropdown-item' href='conta/perfil.php'>Meus dados</a></li>";
                                            echo "<li><a class='dropdown-item' href='conta/sair.php'>Sair</a></li>";
                                        }
                                        else
                                            echo "<li><a class='dropdown-item' href='conta/entrar.php'>Entrar</a></li>";
                                    ?>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </header>

            <main>
                <div id="conteudo">
                    <p>Confira as novidades que a ChessGate preparou para você!</p>
                    
                    <div id="carousel" class="carousel carousel-dark slide" data-bs-ride="carousel">
                        <div class="carousel-inner">

                            <div class="carousel-item active">
                                <div id="op_box" style="position: relative;">
                                        <?php 
                                            $linha = mysqli_fetch_assoc ($resultado);
                                            $titulo = $linha["titulo"];
                                            $imagemPath = substr($linha["imagemURL"], 3);

                                            echo "
                                            <img src='$imagemPath' />
                                            <div class='back_image'>
                                                <div class='conteudo_image'>
                                                    <a target='new' href='produtos/produto.php?cod_produto=$cod_produtoCarrousel_1'>Clique aqui para ver mais</a>
                                                </div>
                                            </div>";
                    
                                        ?>
                        
                                </div>
                                <div class="d-none d-md-block">
                                    <br />
                                    <?php echo "<h5>$titulo</h5>"; ?>
                                    <p>Trace as suas estratégias nas estepes asiáticas</p>
                                </div>
                            </div>

                            <div class="carousel-item">
                                <div id="op_box" style="position: relative;">
                                <?php 
                                $query = "SELECT p.titulo, p.imagemURL
                                FROM produto p WHERE p.cod_produto=$cod_produtoCarrousel_2;";
                        
                                $resultado = mysqli_query ($conexao, $query);
                                $linha = mysqli_fetch_assoc ($resultado);
                                            $titulo = $linha["titulo"];
                                            $imagemPath = substr($linha["imagemURL"], 3);

                                            echo "
                                            <img src='$imagemPath' />
                                            <div class='back_image'>
                                                <div class='conteudo_image'>
                                                    <a target='new' href='produtos/produto.php?cod_produto=$cod_produtoCarrousel_2'>Clique aqui para ver mais</a>
                                                </div>
                                            </div>";
                    
                                ?>
                                </div>
                                <div class="d-none d-md-block">
                                    <br />
                                    <?php echo "<h5>$titulo</h5>"; ?>
                                    <p>Nada melhor que o clássico</p>
                                </div>
                            </div>

                            <div class="carousel-item">
                                <div id="op_box" style="position: relative;">
                                <?php 
                                $query = "SELECT p.titulo, p.imagemURL
                                FROM produto p WHERE p.cod_produto=$cod_produtoCarrousel_3;";
                        
                                $resultado = mysqli_query ($conexao, $query);
                                $linha = mysqli_fetch_assoc ($resultado);
                                            $titulo = $linha["titulo"];
                                            $imagemPath = substr($linha["imagemURL"], 3);

                                            echo "
                                            <img src='$imagemPath' />
                                            <div class='back_image'>
                                                <div class='conteudo_image'>
                                                    <a target='new' href='produtos/produto.php?cod_produto=$cod_produtoCarrousel_3'>Clique aqui para ver mais</a>
                                                </div>
                                            </div>";
                    
                                ?>
                                </div>
                                <div class="d-none d-md-block">
                                    <br />
                                    <?php echo "<h5>$titulo</h5>"; ?>
                                    <p>Nada melhor que um rei para decorar sua casa</p>
                                </div>
                            </div>

                            <div class="carousel-item">
                                <div id="op_box" style="position: relative;">
                                <?php 
                                $query = "SELECT p.titulo, p.imagemURL
                                FROM produto p WHERE p.cod_produto=$cod_produtoCarrousel_4;";
                        
                                $resultado = mysqli_query ($conexao, $query);
                                $linha = mysqli_fetch_assoc ($resultado);
                                            $titulo = $linha["titulo"];
                                            $imagemPath = substr($linha["imagemURL"], 3);

                                            echo "
                                            <img src='$imagemPath' />
                                            <div class='back_image'>
                                                <div class='conteudo_image'>
                                                    <a target='new' href='produtos/produto.php?cod_produto=$cod_produtoCarrousel_4'>Clique aqui para ver mais</a>
                                                </div>
                                            </div>";
                    
                                ?>
                                </div>
                                <div class="d-none d-md-block">
                                    <br />
                                    <?php echo "<h5>$titulo</h5>"; ?>
                                    <p>Leve a realeza contigo para todo lugar</p>
                                </div>
                            </div>

                            <button class="carousel-control-prev" type="button" data-bs-target="#carousel" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>  
                            </button>

                            <button class="carousel-control-next" type="button" data-bs-target="#carousel" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                            
                        </div>
                    </div>
                </div>
            </main>

            <footer>
                <div id="rodape" class="home_rodape">
                    <div id="conteudo_rodape">
                        <div id="p_col">
                            <ul>
                                <li><a href="#topo">Topo</a></li>
                                <li><a href="home.php">Home</a></li>
                                <?php 
                                    if ($logado)
                                        echo "<li><a href='conta/perfil.php'>Conta</a></li>";
                                    else
                                        echo "<li><a href='conta/entrar.php'>Entrar</a></li>";
                                ?>
                                <li><a href="produtos/vitrine.php?categoria=100">Tabuleiros</a></li>
                            </ul>
                        </div>
                        <div id="s_col">
                            <ul>
                                <li><a href="produtos/vitrine.php?categoria=200">Livros</a></li>
                                <li><a href="produtos/vitrine.php?categoria=300">Decorativos</a></li>
                                <li><a href="produtos/vitrine.php?categoria=400">Chaveiros</a></li>
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

<?php
    mysqli_close ($conexao);
?>