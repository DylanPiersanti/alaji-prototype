<?php
session_start();
require('../utils/db.php');
require('../template/header.php');
require('../template/navbar.php');
?>
<?php
if(!isset($_SESSION['access'])){ 
    header("Location: http://localhost/alaji-prototype/views/");
}
?>
<div class="container">

<?php 
    if(isset($_GET['id']) AND $_GET['id'] > 0) 
    {
        $getid = intval($_GET['id']);
        $requser = $db->prepare('SELECT * FROM users WHERE id = ?');
        $requser->execute(array($getid));
        $userinfo = $requser->fetch();
?>
<div class="jumbotron mt-5">
        <div class="row">
            <div class="col-4">
                <img src="<?= $userinfo['avatar'] ?>" width="100%" />
            </div>
            <div class="col-8">
                <h1 class="display-3"><?= $userinfo['fullname'] ?></h1>
                <p class="lead"><?= $userinfo['email'] ?></p>
                <hr class="my-4">
                <p>
                    <?php if(isset($_SESSION['id']) AND $userinfo['id'] == $_SESSION['id']) {
                        echo '<a href="disconnect.php" class="btn btn-primary">Déconnexion</a>';
                    } ?>
                </p>
            </div>
        </div>
    </div>
</div>
<?php
}
?>

<?php require('../template/bottom.php'); ?>