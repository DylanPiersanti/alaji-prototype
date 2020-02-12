<?php include('../template/header.php') ?>
<?php require('../utils/studentsList.php') ?>

<div class="container">
    <div class="row mt-5">
        <?php for ($i = 0; $i < count($data->users); $i++) { ?>
            <div class="card mt-2 ml-2 mr-2 col-6" style="max-width: 540px;">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="<?= $data->users[$i]->profileimageurl ?>" class="card-img py-3" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?= $data->users[$i]->fullname ?></h5>
                            <p class="card-text"><?= $data->users[$i]->email ?></p>
                            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                        </div>
                        <a class="btn btn-primary ml-3" href="<?= 'viewprofil.php/' . $data->users[$i]->id ?>">Voir le candidat</a>
                    </div>
                </div>

            </div>
        <?php } ?>
    </div>
</div>
<?php include('../template/bottom.php') ?>
