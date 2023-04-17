<?php
    include ('conexao.php');
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bravery</title>
    <link rel="icon" type="image/x-icon" href="../imagens/bravery-logo.png">
</head>
<style>
    @import url('https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800,900&display=swap');

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Poppins', sans-serif;
    }

    body {
        background: url(../imagens/signup-image.png);
    }

    .form {
        display: flex;
        align-items: center;
        justify-content: space-evenly;
    }

    .content {
        padding: 25px;
        margin: 50px;
        border-radius: 10px;
    }

    .mxw800p {
        text-align: center;
        padding-top: 80px;
        padding-bottom: 100px;
    }

    h4 {
        position: relative;
        font-size: 75px;
        font-weight: 500;
        margin-bottom: 10px;
        color: #fff;
        padding: 10px;
    }

    .p-stats {
        position: relative;
        color: #fff;
        font-size: 25px;
        margin-bottom: 20px;
    }

    .contactForm {
        position: relative;
        max-width: 300px;
        margin: 0 auto;
        display: flex;
    }

    .contactForm form {
        width: 100%;
    }

    .contactForm .row100 {
        width: 100%;
    }

    .contactForm .row100 .inputBox50 {
        width: 100%;
        margin: 0 20px;
    }

    .contactForm .row100 .inputBox100 {
        width: 100%;
        margin: 0 20px;
    }

    .contactForm .row100 input, .contactForm .row100 textarea {
        position: relative;
        border: none;
        border-bottom: 1px solid #fff;
        color: #fff;
        background: transparent;
        width: 100%;
        padding: 10 px 0;
        outline: none;
        font-size: 18px;
        font-weight: 300;
        margin: 20px 0;
        resize: none;
    }

    .contactForm .row100 textarea {
        height: 100px;
    }

    .contactForm .row100 input::placeholder, .contactForm .row100 textarea::placeholder {
        color: rgba(255, 255, 255, 0.5);
    }

    button {
        color: #fff;
        background: transparent;
        border: none;
        font-size: 20px;
        padding: 14px 20px;
        margin: 8px 0;
        cursor: pointer;
        align-items: center;
        margin: 35px 0;
        transition: 0.28s ease;
    }

    button:hover {
        background: #fff;
        color: #000;
        transition: 0.28s ease;
    }

    .end {
        color: #fff;
        margin-top: 200px;
        text-align: center;
        font-size: 16px;
    }

    img {
        position: relative;
        left: 50%;
        transform: translateX(-50%);
    }

    .row100 {
        padding-bottom: 10px;
    }

    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
    }

    @media (max-width: 1366px) {
        .content {
            margin: 0;
        }
    }

</style>
<body>
    <section class="sec stats" id="contact">
        <div class="content">
            <div class="mxw800p">
                <h4>Excluir Conta</h4>
                <p class="p-stats">Preencha o campo abaixo</p>
            </div>  
            <div class="contactForm">
                <form name="formulario" method="POST">
                    <div class="row100">
                        <div class="inputBox50">
                            <input type="number" name="cpf" placeholder="Informe o CPF">
                        </div>
                    </div>
                    <div class="form">
                        <button name="button" onclick="document.formulario.action='conta-logada.php'">Cancelar</button>
                        <button name="button" onclick="document.formulario.action='conta-excluida.php'">Excluir</button>
                    </div>
                </form>
            </div>
            <p class="end">Seja Bravery</p>
        </div>
    </section> 
</body>
</html>