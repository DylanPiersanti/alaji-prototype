<?php require('../template/header.php') ?>
<?php require('../utils/db.php') ?>

<?php
session_start();


if(isset($_SESSION['access'])){ 
    header("Location: http://localhost/alaji-prototype/views/profil.php?id=".$_SESSION['id']);
}

$error = '';
if (isset($_POST['login'])) {
    $access = htmlspecialchars(($_POST['examLogin']));
    if (!empty($access)) {
        $requser = $db->prepare('SELECT * FROM users WHERE access = ?');
        $requser->execute(array($access));
        $userexist = $requser->rowCount();
        if ($userexist == 1) {
            $userinfo = $requser->fetch();
            $_SESSION['id'] = $userinfo['id'];
            $_SESSION['avatar'] = $userinfo['avatar'];
            $_SESSION['fullname'] = $userinfo['fullname'];
            $_SESSION['email'] = $userinfo['email'];
            $_SESSION['access'] = $userinfo['access'];
            $_SESSION['role'] = $userinfo['role'];
            header("Location: profil.php?id=" . $_SESSION['id']);
        } else {
            $error = 'Identifiant invalide';
        }
    } else {
        $error = "Veuillez entrer un identifiant";
    }
}

?>
<div class="container login">
    <div class="wrapper fadeInDown">
        <div id="formContent">
            <div class="fadeIn first mt-5 mb-5">
                <img src="https://www.alaji.fr/wp-content/uploads/logo.png" id="icon" alt="User Icon" />
            </div>

            <form action="" method="post">
                <input type="text" id="login" class="fadeIn second mb-2" name="examLogin" placeholder="identifiant examinateur">

                <button class="btn btn-primary mb-5 mt-3" name="login">Connexion</button>

            </form>
            <p class="mt-2 loginError"><?= $error ?></p>
        </div>


    </div>
    <?php require('../template/bottom.php') ?>