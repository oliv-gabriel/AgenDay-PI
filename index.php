<?php
session_start();
?>
<html lang="pt-BR" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Login</title>

    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <!-- JAVASCRIPT -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

    <link href="https://fonts.googleapis.com/css?family=Arvo" rel="stylesheet">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css'>
    <link rel="stylesheet" href="css/login.css">
</head>

<body>
    <div class="container box <?= (isset($_SESSION['senhas_diferentes']) || isset($_SESSION['usuario_existe']) || isset($_SESSION['dados_cadastro'])) ? 'right-panel-active' : '' ?>" id="container">

        <div class="form-container sign-up-container">
            <form action="cadastrar.php" method="POST">
                <h1>Criar Conta</h1>

                <div class="user-type-toggle">
                    <button type="button" class="toggle-btn active" id="btn-cliente" data-type="cliente">Sou Cliente</button>
                    <button type="button" class="toggle-btn" id="btn-empresa" data-type="empresa">Sou Estabelecimento</button>
                    <input type="hidden" name="tipo_usuario" id="tipo_usuario" value="<?= htmlspecialchars($_SESSION['dados_cadastro']['tipo_usuario'] ?? 'cliente') ?>">
                </div>

                <div class="row">
                    <div class="mb-2 col">
                        <div class="input-group">
                            <input class="input rounded rounded-4" name="nome" id="input_nome" type="text" placeholder=" " value="<?= htmlspecialchars($_SESSION['dados_cadastro']['nome'] ?? '') ?>" required />
                            <label class="letra" id="label_nome">Seu nome completo</label>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="mb-2 col">
                        <div class="input-group">
                            <input class="input rounded rounded-4" name="contato" id="input_contato" type="tel" placeholder=" " value="<?= htmlspecialchars($_SESSION['dados_cadastro']['contato'] ?? '') ?>" required />
                            <label class="letra" id="label_contato">Telefone / WhatsApp</label>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="mb-2 col">
                        <div class="input-group">
                            <input class="input rounded rounded-4" name="email" type="email" placeholder=" " value="<?= htmlspecialchars($_SESSION['dados_cadastro']['email'] ?? '') ?>" required />
                            <label class="letra">E-mail</label>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="mb-2 col">
                        <div class="input-group">
                            <input class="input rounded rounded-4" name="senha" type="password" placeholder=" " required />
                            <label class="letra">Senha</label>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="mb-2 col">
                        <div class="input-group">
                            <input class="input rounded rounded-4" name="repita_senha" type="password" placeholder=" " required />
                            <label class="letra">Repita a senha</label>
                        </div>
                    </div>
                </div>



                <button class="rounded rounded-4" name="bcadastrar">Cadastrar-se</button>
            </form>
        </div>

        <div class="form-container sign-in-container">
            <form action="login.php" method="POST">
                <h1>Entrar</h1>

                <div class="row">
                    <div class="mb-2 col">
                        <div class="input-group">
                            <input class="input rounded rounded-4" type="email" placeholder=" " name="email" />
                            <label class="letra">E-mail</label>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="mb-2 col">
                        <div class="input-group ">
                            <input class="input rounded rounded-4" type="password" placeholder=" " name="senha" />
                            <label class="letra">Senha</label>
                        </div>
                    </div>
                </div>

                <a href="#">Esqueceu a senha?</a>

                <button class=" rounded rounded-4">Entrar</button>
            </form>
        </div>

        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Bem vindo de volta!</h1>
                    <p>Para se manter conectado conosco, faça login com seus dados do seu estabelecimento</p>
                    <button class="ghost rounded rounded-4 " id="signIn">Entrar</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>Olá!</h1>
                    <p>Insira os dados do seu estabelecimento para abrir uma conta conosco</p>
                    <button class="ghost rounded rounded-4" id="signUp">Cadastrar-se</button>
                </div>
            </div>
        </div>

    </div>

    <?php
    if (isset($_SESSION['status_cadastro'])) :
    ?>
        <div class="alert alert-success fixed-top col-md-4 col-10 mx-auto mt-4 text-center shadow" style="z-index: 9999;" role="alert">
            Cadastro efetuado com sucesso!
        </div>
    <?php
    endif;
    unset($_SESSION['status_cadastro']);
    ?>

    <?php
    if (isset($_SESSION['usuario_existe'])) :
    ?>
        <div class="alert alert-danger fixed-top col-md-4 col-10 mx-auto mt-4 text-center shadow" style="z-index: 9999;" role="alert">
            <?= is_string($_SESSION['usuario_existe']) ? htmlspecialchars($_SESSION['usuario_existe']) : 'Nome de estabelecimento ou e-mail já existente!' ?>
        </div>
    <?php
    endif;
    unset($_SESSION['usuario_existe']);
    ?>

    <?php
    if (isset($_SESSION['senhas_diferentes'])) :
    ?>
        <div class="alert alert-danger fixed-top col-md-4 col-10 mx-auto mt-4 text-center shadow" style="z-index: 9999;" role="alert">
            As senhas não coincidem!
        </div>
    <?php
    endif;
    unset($_SESSION['senhas_diferentes']);
    ?>


    <?php
    if (isset($_SESSION['nao_autenticado'])) :
    ?>
        <div class="alert alert-danger fixed-top col-md-4 col-10 mx-auto mt-4 text-center shadow" style="z-index: 9999;" role="alert">
            E-mail ou senha inválidos.
        </div>
    <?php
    endif;
    unset($_SESSION['nao_autenticado']);
    unset($_SESSION['dados_cadastro']);
    ?>


    <script src="js/login.js" charset="utf-8"></script>
</body>


</html>