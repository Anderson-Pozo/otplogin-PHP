<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Verify OTP</title>
    <link rel="stylesheet" href="views/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="views/assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="views/assets/css/-Login-form-Page-BS4--1.css">
    <link rel="stylesheet" href="views/assets/css/-Login-form-Page-BS4-.css">
    <link rel="stylesheet" href="views/assets/css/Navigation-Clean.css">
    <link rel="stylesheet" href="views/assets/css/Pretty-User-List.css">
    <link rel="stylesheet" href="views/assets/css/styles.css">
    <link rel="stylesheet" href="views/assets/css/Zig-Zag-Timeline-v3.css">
</head>

<body>
<div class="container-fluid">
    <div class="row mh-100vh">
        <div class="col-10 col-sm-8 col-md-6 col-lg-6 offset-1 offset-sm-2 offset-md-3 offset-lg-0 align-self-center d-lg-flex align-items-lg-center align-self-lg-stretch bg-white p-5 rounded rounded-lg-0 my-5 my-lg-0" id="login-block">
            <div class="m-auto w-lg-75 w-xl-50">
                <h2 class="text-info font-weight-light mb-5"><i class="fa fa-code"></i>&nbsp;Verifica tu código</h2>
                <form action="" method="post">
                    <?php
                    if (isset($message)){
                        echo "<span class=\"badge badge-success\">" . $message . "</span>";
                    }
                    ?>
                    <div class="form-group"><label class="text-secondary">Ingresa tu número celular</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                    <span class="input-group-text" style="background-color: rgb(251,232,131);">
                                    <img src="views/assets/img/ecuador.png" width="20">&nbsp;+593</span>
                            </div>
                            <input class="form-control" name="phone" type="text" required="true" pattern="[0-9]+" maxlength="9">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit" style="background-color: rgb(23,162,184);">Enviar</button>
                            </div>
                        </div>
                    </div>
                </form>
                <form action="" method="post">
                    <?php
                    if (isset($errorCode)){
                        echo "<span class=\"badge badge-danger\">" . $errorCode . "</span>";
                    }
                    ?>
                    <div class="form-group">
                        <label class="text-secondary">Escribe el código recibido</label>
                        <input class="form-control" name="codigotp" type="text" required="true" pattern="[0-9]+" inputmode="text" maxlength="6">
                    </div>
                    <button class="btn btn-info mt-2" type="submit">Validar</button>
                </form>
            </div>
        </div>
        <div class="col-lg-6 d-flex align-items-end" id="bg-block" style="background-image:url(&quot;views/assets/img/lock.jpg&quot;);background-size:cover;background-position:center center;">
        </div>
    </div>
</div>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>