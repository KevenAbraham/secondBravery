<?php
	
    include 'conexao.php';
	session_start();

    /*produtos -> Nome Terno
    $nomeT1 = "Bravery Saibot";
    $nomeT2 = "Bravery Sceit";
    $nomeT3 = "Bravery Liberty";
    $nomeT4 = "Bravery SnowSuit";
    $nomeT5 = "Bravery Twilight";
    $nomeT6 = "Bravery Shrike";
    $nomeT7 = "Bravery NightVest";
    $nomeT8 = "Bravery RoyalOcean";

    //produtos -> Preco Terno
    $precoT1 = 3699.99;
    $precoT2 = 3099.99;
    $precoT3 = 2799.99;
    $precoT4 = 3399.99;
    $precoT5 = 2399.99;
    $precoT6 = 3299.99;
    $precoT7 = 2999.99;
    $precoT8 = 3899.99;

    //produtos -> Imagem Terno
    $fotoT1 = "imagens/Terno 1.png";
    $fotoT2 = "imagens/Terno 2.png";
    $fotoT3 = "imagens/Terno 3.png";
    $fotoT4 = "imagens/Terno 4.png";
    $fotoT5 = "imagens/Terno 5.png";
    $fotoT6 = "imagens/Terno 6.png";
    $fotoT7 = "imagens/Terno 7.png";
    $fotoT8 = "imagens/Terno 8.png";*/ 
    ?>
                  
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Bravery</title>
        <link rel="stylesheet" href="../css/style2.css">
        <link rel="icon" type="image/x-icon" href="../imagens/bravery-logo.png">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    </head>
    <body>
        <!--Navegação da página-->
        <header>
            <a href="#" class="logo">Bravery</a>
            <ul>
                <li><a href="#about" onclick="toggle()">Sobre nós</a></li>
                <li><a href="#products" onclick="toggle()">Produtos</a></li>
                <li><a href="#contact" onclick="toggle()">Contato</a></li>
                <li>
                    <div class="dropdown">
					    <a class="dropbtn"><?php echo $_SESSION['user'] ?>
						    <i class="fa fa-caret-down"></i>
						</a>
					    <div class="dropdown-content">
                            <a href="carrinho.php">Carrinho</a>
							<a href="excluir.php">Excluir Conta</a>
							<a href="finalizar-sessao.php">Finalizar Sessão</a>
						</div>
					</div>
                </li>
            </ul>
            <!--Criando um header responsivo-->
            <div class="toggle" onclick="toggle()"></div>
        </header>

        <!--Banner de fundo da primeira página-->
        <section class="banner" id="home"></section>

        <!--Section da página sobre nós-->
        <section class="sec" id="about">
            <div class="content">
                <div class="mxw800p">
                    <h3>Mundo Bravery</h3>
                    <p>A Bravery surgiu no final de 2021 com o intuito de expandir o ramo de roupas executivas de fabricação própria. A empresa trabalha diretamente com roupas 
                        executivas pré-prontas, criadas propriamente pela empresa.
                    O nome Bravery vem do termo bravura, soado como algo elegante, tem como público alvo aqueles que se interessam e prestigiam o melhor da vestimenta.
                    </p>                
                </div>
            </div>
        </section>

        <?php
            $tbProdutos = "SELECT * FROM produtos";
            $qr = mysql_query($tbProdutos) or die(mysql_error());
        ?>
        <!--Section da página Produtos-->
        <form name="adicionar" method="post">
            <section class="sec" id="products">
                <div class="content-products">
                    <div class="mxw800p-prod">
                        <h3 class="title-page">Produtos</h3>
                        <p class="p-page">Fique por dentro da moda Bravery. Seja melhor, seja Bravery!</p>
                    </div>
                    <?php 
                        while($line = mysql_fetch_assoc($qr)) {
                    ?>
                    <div class="card-produto">
                        <div class="left-produto">
                            <img class="img-produto" src="<?php echo $line['fotoProduto'] ?>">
                        </div>
                        <div class="right-produto">
                            <div class="product-info">
                                <div class="produto-name">
                                    <h1 class="h1-produto"><?php echo $line['nomeProduto'] ?></h1>
                                </div>
                                <div class="details-produto">
                                    <h3 class="h3-produto">Coleção: <?php echo $line['colecao'] ?></h3>
                                    <h2 class="h2-produto"><?php echo $line['descProduto'] ?></h2>
                                    <h5 class="h5-produto"><span class="fa fa-dollar"></span><?php echo $line['preco'] ?></h4>
                                    <h5 class="dis"><span class="fa fa-dollar"></span><?php echo $line['otherPreco'] ?></h4>
                                </div>
                                <ul class="ul-produto">
                                    <li class="li-produto">TAMANHOS</li>
                                    <li class="bg">P<li>
                                    <li class="bg">M<li>
                                    <li class="bg">G<li>
                                    <li class="bg">GG</li>
                                </ul>
                                <?php echo '<a href="carrinho.php?acao=add&id='.$line['id'].'"><span class="foot"><i class="fa fa-shopping-bag"></i>Comprar agora</span></a>';
                                      echo '<a href="carrinho.php?acao=add&id='.$line['id'].'"><span class="foot"><i class="fa fa-shopping-cart"></i>Adicionar ao Carrinho</span></a>' ?>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </section>
        </form>

        <!--Section do rodapé da página-->
        <section class="sec stats" id="contact">
            <div class="content">
                <div class="mxw800p">
                    <h4>Entre em contato conosco!</h4>
                    <p class="p-stats">Será um prazer em conversar com você!</p>
                </div>
                <div class="contactForm">
                    <form action="https://api.staticforms.xyz/submit" method="POST">
                        <input type="hidden" name="accessKey" value="907653e8-63ee-437f-91e8-2fc77fced2eb">
                        <input type="hidden" name="redirectTo" value="http://localhost:8080/bravery/html/obrigado.html">
                        <div class="row100">
                            <div class="inputBox50">
                                <input type="text" name="" placeholder="Nome Completo" autocomplete="off">
                            </div>
                            <div class="inputBox50">
                                <input type="text" name="" placeholder="Insira o E-mail" autocomplete="off">
                            </div>
                        </div>
                        <div class="row100">
                            <div class="inputBox100">
                                <textarea name="" id="msg" placeholder="Assunto"></textarea>
                            </div>
                        </div>
                        <div class="row100">
                            <div class="inputBox100">
                                <input type="submit" value="Enviar">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="media">
                    <ul>
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li> 
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li> 
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li> 
                        <li><a href="#"><i class="fa fa-youtube"></i></a></li> 
                        <li><a href="#"><i class="fa fa-linkedin-square"></i></a></li>
                    </ul>
                </div>
                <p class="end">Bravery LMTD &copy;Copyright. Todos os direitos reservados | Design inspirado em Online Tutorials</p>
            </div>
        </section>

        <!--Link do Script-->
        <script src="../js/script.js"></script>
    </body>
</html>

