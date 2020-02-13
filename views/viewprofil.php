<?php session_start() ?>
<?php require('../template/header.php') ?>
<?php include('../template/navbar.php') ?>
<?php require('../utils/studentProfil.php') ?>
<?php
if(!isset($_SESSION['access'])){ 
    header("Location: http://localhost/alaji-prototype/views/");
}
?>
<div class="container">
    <div class="jumbotron mt-5">
        <div class="row">
            <div class="col-4">
                <img src="<?= $data->users[0]->profileimageurl ?>" width="100%" />
            </div>
            <div class="col-8">
                <h1 class="display-3"><?= $data->users[0]->fullname; ?></h1>
                <p class="lead"><?= $data->users[0]->email; ?></p>
                <hr class="my-4">
                <p>
                    <?php
                    $suspended = $data->users[0]->suspended;
                    if (!$suspended) {
                        echo "L'utilisateur n'est pas suspendu";
                    } else {
                        echo "L'utilisateur est suspendu";
                    }
                    ?>
                </p>
                <p class="lead">
                    <a class="btn btn-primary btn-lg mt-5" href="http://e-learning.alaji.fr/user/profile.php?id=<?= $studentId ?>" role="button">Profil E-learning</a>
                </p>
            </div>
        </div>
        <table class="table table-hover mt-5 text-center" border="1">
            <thead>
                <tr class="table-primary">
                    <th scope="col">Critères</th>
                    <th scope="col">Test e-learning</th>
                    <th scope="col">Examen oral</th>
                    <th scope="col">Moyenne</th>
                    <th scope="col">Debrief</th>
                </tr>
            </thead>
            <tbody>
                <tr class="table-dark">
                    <th scope="row">Critère 1</th>
                    <td><?= $test1 ?></td>
                    <td><?= $oral1 ?></td>
                    <td><?= $m1 ?></td>
                    <td><?= $debrief1 ?></td>
                </tr>
                <tr class="table-dark">
                    <th scope="row">Critère 2</th>
                    <td><?= $test2 ?></td>
                    <td><?= $oral2 ?></td>
                    <td><?= $m2 ?></td>
                    <td><?= $debrief2 ?></td>
                </tr>
                <tr class="table-dark">
                    <th scope="row">Critère 3</th>
                    <td><?= $test3 ?></td>
                    <td><?= $oral3 ?></td>
                    <td><?= $m3 ?></td>
                    <td><?= $debrief3 ?></td>
                </tr>
                <tr class="table-dark">
                    <th scope="row">Critère 4</th>
                    <td><?= $test4 ?></td>
                    <td><?= $oral4 ?></td>
                    <td><?= $m4 ?></td>
                    <td><?= $debrief4 ?></td>
                </tr>
            </tbody>
        </table>
        <div class="row">

            <div class="col-12">
                <h2 class="display-3">Ajouter les notes de l'examen oral</h2>
                <form action="" method="post" class="form-group ">
                    <label for="addNote1">Critère 1</label>
                    <input class="form-control" type="number" name="addNote1" id="" value="0" max="1" min="0">

                    <label for="addNote2">Critère 2</label>
                    <input class="form-control" type="number" name="addNote2" id="" value="0" max="1" min="0">

                    <label for="addNote3">Critère 3</label>
                    <input class="form-control" type="number" name="addNote3" id="" value="0" max="1" min="0">

                    <label for="addNote4">Critère 4</label>
                    <input class="form-control" type="number" name="addNote4" id="" value="0" max="1" min="0">
                    <button type="submit" class="btn btn-primary mt-4">Envoyer les notes</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php require('../template/bottom.php') ?>

<?php
