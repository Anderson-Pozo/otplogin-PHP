
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Home</title>
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
<nav class="navbar navbar-light navbar-expand-md navigation-clean">
    <div class="container"><a class="navbar-brand" href="#">Usuarios registrados</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse"
             id="navcol-1">
            <ul class="nav navbar-nav ml-auto">
                <li class="nav-item" role="presentation"></li>
                <li class="nav-item" role="presentation"></li>
                <li class="nav-item" role="presentation"></li>
                <li class="nav-item dropdown">
                    <a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#"> <?php echo $user->getName(); ?></a>
                    <div class="dropdown-menu" role="menu">
                        <a class="dropdown-item" style="color: red" role="presentation" href="utils/logout.php">Cerrar sesión</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="container">
    <div class="row text-center">
        <?php
            $response = $user->getAllUsers();
            if($response){
                foreach($response as $item){
                    include 'layout/card_section.php';
                }
            }else{
                echo "<h1>No hay usuarios registrados </h1>";
            }
        ?>
    </div>
</div>

<div class="container" style="position: fixed; bottom: 0px; font-style: italic">
    <p class="text-center">Login OTP © 2020</p>
</div>

<script src="views/assets/js/jquery.min.js"></script>
<script src="views/assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>