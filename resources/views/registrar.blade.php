<!doctype html>
<html lang="pt-br">
    <head>
        <title>Bem-Vindo</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/style.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    </head>
    <body>
        <section class="ftco-section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-6 text-center mb-5">
                        <h2 class="heading-section">Faça seu registro</h2>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-7 col-lg-5">
                        <div class="login-wrap p-4 p-md-5">
                            <div class="icon d-flex align-items-center justify-content-center">
                                <span class="fa fa-user-o"></span>
                            </div>
                            <h3 class="text-center mb-4">Registrar</h3>
                            <form action="{{route('registrando')}}" class="login-form" id="register-form">
                                <div class="form-group">
                                    <input type="text" class="form-control rounded-left" id="user" name="user" placeholder="Usuario" maxlength="20" required>
                                </div>
                                <div class="form-group d-flex">
                                    <input type="text" class="form-control rounded-left" id="name" name="name" placeholder="Nome Completo" maxlength="60" required>
                                </div>
                                <div class="form-group d-flex">
                                    <input type="email" class="form-control rounded-left" id="mail" name="mail" placeholder="Email" maxlength="60" required>
                                </div>
                                <div class="form-group d-flex">
                                    <input type="password" class="form-control rounded-left" id="password" name="password" placeholder="Senha" maxlength="20" required>
                                </div>
                                <div class="form-group d-flex">
                                    <input type="password" class="form-control rounded-left" id="confirm-password" placeholder="Confirmar senha" maxlength="20" required>
                                </div>
                                <?php
                                    $data = date('Y-m-d'); 
                                ?>
                                <input type="hidden" name="data_criacao" value="<?php echo $data ?>" id="data_criacao" name="data_criacao">
                                <div class="form-group">
                                    <input type="button" class="form-control btn btn-primary rounded submit px-3" onclick="submitBtn()" value="Registrar">
                                </div>
                                <div class="form-group d-md-flex">
                                    <div class="w-50">
                                        <a href="{{route('login')}}">Fazer login</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </body>
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script>
        function submitBtn(){
            let password = document.getElementById('password');
            let confirmPassword = document.getElementById('confirm-password');

            if (password.value != confirmPassword.value) {
                Swal.fire({
                    title: 'Opss',
                    text: 'Senhas divergentes',
                    icon: 'error',
                    confirmButtonText: 'Ok'
                })
                confirmPassword.reportValidity();
                return false;
            } else {
                document.getElementById("register-form").submit();
                confirmPassword.setCustomValidity("");
                return true;
            }
            // verificar também quando o campo for modificado, para que a mensagem suma quando as senhas forem iguais
            confirmPassword.addEventListener('input', validarSenha);
        }
    </script>
</html>
