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
    else {
        header ("location: entrar.php");
        exit ();
    }

    include ('dadosBanco.php');
?>

<!DOCTYPE html>
<html lang="pt-BR">

    <head>
        <meta charset="utf-8" />
        <title>Minha conta</title>
        <link rel="shortcut icon" href="../../../assets/images/icons/logo_icone.svg" type="image/svg" />
        <meta name="description" content="Veja e configure os seus dados de cadastro" />
        <meta name="keywords" content="login dados pessoais conta xadrez loja store" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="stylesheet" href="../../styles/estilos.css" />
        <script lang="javascript" type="text/javascript" src="../../scripts/alterarDados.js"></script>
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
        <!-- Scripts -->
        <script lang="javascript" type="text/javascript" src="../../scripts/recuperarSenha.js"></script>
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
                        <a href="entrar.php">
                            <img src="../../../assets/images/icons/usuario_icone.svg" type="image/svg" alt="Ícone do usuário" />
                            <?php 
                                if ($logado) {
                                    echo "<span class='usuarioNome'>$nome</span>";
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
                                    <li><a class="dropdown-item" href="../produtos/vitrine.php?categoria=100">Tabuleiros</a></li>
                                    <li><a class="dropdown-item" href="../produtos/vitrine.php?categoria=200">Livros</a></li>
                                    <li><a class="dropdown-item" href="../produtos/vitrine.php?categoria=300">Decorativos</a></li>
                                    <li><a class="dropdown-item" href="../produtos/vitrine.php?categoria=400">Chaveiros</a></li>
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
                                            echo "<li><a class='dropdown-item' href='perfil.php'>Meus dados</a></li>";
                                            echo "<li><a class='dropdown-item' href='sair.php'>Sair</a></li>";
                                        }
                                        else
                                            echo "<li><a class='dropdown-item' href='entrar.php'>Entrar</a></li>";
                                    ?>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </header>

            <main>
                <div id="conteudo">
                    <p>Meu perfil</p>
                   <div class="controle">
                       <div class="card">
                           <div class="card-header">
                               Painel de controle do usuário
                           </div>
                           <div class="card-body fundo-cartao">
                            <p>Caso deseje alterar algum dado associado à conta, comece por aqui!</p>
                                <p class="config"> 
                                    <button id="btn_usuario" type="button" class="btn" data-bs-toggle="modal" data-bs-target="#trocarUsuario" style="background-color: #b98753;">
                                    Alterar nome</button>
                                </p>
                                <p class="config">
                                   <button id="btn_email" type="button" class="btn" data-bs-toggle="modal" data-bs-target="#trocarEmail" style="background-color: #b98753;">
                                    Alterar email</button>
                                </p>
                                <p class="config">
                                    <button id="btn_senha" type="button" class="btn" data-bs-toggle="modal" data-bs-target="#trocarSenha" style="background-color: #b98753;">
                                    Alterar senha</button>
                                </p>
                                <p class="config">
                                    <button id="btn_telefone" type="button" class="btn" data-bs-toggle="modal" data-bs-target="#trocarTelefone" style="background-color: #b98753;">
                                    Alterar telefone</button>
                                </p>
                                <p class="config">
                                    <button id="btn_endereco" type="button" class="btn" data-bs-toggle="modal" data-bs-target="#trocarEndereco" style="background-color: #b98753;">
                                    Alterar endereço</button>
                                </p>
                            </div>
                       </div>
                   </div>
                   <div class="dados">
                    <div class="card">
                        <div class="card-header">
                            Dados do usuário
                        </div>
                        <div class="card-body fundo-cartao">
                            <div>
                                <form class="row g-3">
                                    <div class="col-md-6">
                                        <label for="txtNome" class="form-label">Nome</label>
                                        <input type="text" value="<?php echo $nome; ?>" maxlength="30" class="form-control" id="txtNome" readonly />                             
                                    </div>
                                    <div class="col-md-6">
                                        <label for="txtEmail" class="form-label">Email</label>
                                        <input type="email" value="<?php echo $email; ?>" maxlength="30" class="form-control" id="txtEmail" readonly />
                                    </div>
                                    <div class="col-md-4">
                                        <label for="txtTelefone" class="form-label">Telefone</label>
                                        <input type="text" value="<?php echo $fone; ?>" pattern="[0-9]{8,9}" class="form-control" id="txtTelefone" minlength="8" maxlength="9" readonly />
                                    </div>
                                    <div class="col-md-5">
                                        <label class="form-label" for="txtEndereco">Endereço</label>
                                        <input type="text" value="<?php echo $endereco; ?>" maxlength="40" class="form-control" id="txtEndereco" readonly />
                                    </div>
                                </form>
                            </div>
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
                                <li><a href="../home.php">Home</a></li>
                                <?php 
                                    if ($logado)
                                        echo "<li><a href='perfil.php'>Conta</a></li>";
                                    else
                                        echo "<li><a href='entrar.php'>Entrar</a></li>";
                                ?>
                                <li><a href="../produtos/vitrine.php?categoria=100">Tabuleiros</a></li>
                            </ul>
                        </div>
                        <div id="s_col">
                            <ul>
                                <li><a href="../produtos/vitrine.php?categoria=200">Livros</a></li>
                                <li><a href="../produtos/vitrine.php?categoria=300">Decorativos</a></li>
                                <li><a href="../produtos/vitrine.php?categoria=400">Chaveiros</a></li>
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

<div class="modal fade" id="trocarUsuario" tabindex="-1" role="dialog" style="z-index: 1500;">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabel">Alterar nome de usuário</h5>
                <button type="button" class="close" data-bs-dismiss="modal" arial-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Informe um novo nome de usuário. Sujeito a disponibilidade.</p>
                <input type="text" id="usuarioNovo" class="form-control" maxlength="30" required placeholder="Informe o novo nome de usuário" />
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" onclick="alterarNome ();" class="btn btn-success">Alterar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="trocarEmail" tabindex="-1" role="dialog" style="z-index: 1500;">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabel">Alterar email associado a conta</h5>
                <button type="button" class="close" data-bs-dismiss="modal" arial-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Informe um novo endereço de email para a conta!</p>
                <input type="email" id="emailNovo" class="form-control" maxlength="30" required placeholder="Informe o novo endereço de email" />
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" onclick="alterarEmail ();" class="btn btn-success">Alterar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="trocarSenha" tabindex="-1" role="dialog" style="z-index: 1500;">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabel">Alterar a senha da conta</h5>
                <button type="button" class="close" data-bs-dismiss="modal" arial-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Informe a nova senha! Será necessário <b>confirmar</b> a nova senha!</p>
                <input type="password" id="senhaNovo" class="form-control" minlength="8" maxlength="30" required placeholder="Informe a nova senha" style="margin-bottom: 2.5%;" />
                <input type="password" id="senhaNovoConfirmacao" class="form-control" minlength="8" maxlength="30" required placeholder="Confirme a senha informada" />
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" onclick="alterarSenha ();" class="btn btn-success">Alterar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="trocarTelefone" tabindex="-1" role="dialog" style="z-index: 1500;">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabel">Alterar o número de telefone</h5>
                <button type="button" class="close" data-bs-dismiss="modal" arial-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Informe um novo número de telefone para ser associado a conta!</p>
                <input type="text" id="telefoneNovo" pattern="[0-9]{8,9}" class="form-control" minlength="8" maxlength="9" required placeholder="Informe o novo número de telefone" />
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" onclick="alterarTelefone ();" class="btn btn-success">Alterar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="trocarEndereco" tabindex="-1" role="dialog" style="z-index: 1500;">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabel">Alterar o endereço associado a conta</h5>
                <button type="button" class="close" data-bs-dismiss="modal" arial-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Informe um novo endereço para ser assoaciado a conta. Esse novo endereço será o novo <b>endereço de entregas padrão</b>!</p>
                <input type="text" id="enderecoNovo" class="form-control" maxlength="30" required placeholder="Informe o novo endereço" />
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" onclick="alterarEndereco ();" class="btn btn-success">Alterar</button>
            </div>
        </div>
    </div>
</div>