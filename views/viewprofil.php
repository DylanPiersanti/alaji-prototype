<?php require('../template/header.php') ?>
<?php require('../utils/studentProfil.php') ?>
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
                    <td><?= intval($review->questions[0]->mark) ?></td>
                    <td>1</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr class="table-dark">
                    <th scope="row">Critère 2</th>
                    <td><?= intval($review->questions[1]->mark) ?></td>
                    <td>0</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr class="table-dark">
                    <th scope="row">Critère 3</th>
                    <td><?= intval($review->questions[2]->mark) ?></td>
                    <td>1</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr class="table-dark">
                    <th scope="row">Critère 4</th>
                    <td><?= intval($review->questions[3]->mark) ?></td>
                    <td>0</td>
                    <td></td>
                    <td></td>
                </tr>
            </tbody>
        </table>
        <div class="row">
            <h2 class="display-3">Ajouter les notes de l'examen oral</h2>
            <div class="col-12">
                <form action="" method="post" class="form-group ">
                    <label for="addNote1">Critère 1</label>
                    <input class="form-control" type="number" name="addNote1" id="" value="0" max="1" min="0">

                    <label for="addNote2">Critère 2</label>
                    <input class="form-control" type="number" name="addNote2" id="" value="0" max="1" min="0">

                    <label for="addNote3">Critère 3</label>
                    <input class="form-control" type="number" name="addNote3" id="" value="0" max="1" min="0">

                    <label for="addNote4">Critère 4</label>
                    <input class="form-control" type="number" name="addNote4" id="" value="0" max="1" min="0">
                </form>
            </div>
        </div>
    </div>
</div>
<?php require('../template/bottom.php') ?>

<?php
