
<?php
    $random = substr($item['email'], 0, 5) . $item['id'];
    $urlImage = 'https://api.adorable.io/avatars/285/' . $random . '.png'
?>

<div class="col-12 col-sm-6 col-md-4 col-lg-3 user-item">
    <?php
    if ($item['email'] == $user->getEmail()){
        echo '<div class="user-container" style="background-color: lightcyan">';
    }else{
        echo '<div class="user-container">';
    }
    ?>
        <a class="user-avatar">
            <img class="rounded-circle img-fluid" src="<?php echo $urlImage ?>" width="48" height="48" alt="Profile of Mark Smith Peterson">
        </a>
        <p class="user-name"><a href="#"><?php echo $item['nombre'] . " " .  $item['apellido']; ?></a>
            <span><?php echo $item['email']; ?> </span>
        </p>
    </div>
</div>
