<?php
include_once "core.php";
include_once "header.php";

use Classes\Coachs\Coach;

if ($_SESSION['role'] != 'Admin') {
    header('Location: index.php');
    exit();
}

if (empty($_GET)) {
    header('Location: dashboard.php');
    exit();
}

$user = new Coach;
$profil = $user->getCoacheById($_GET['coach']);
$profil->skills = explode(',',$profil->skills);

?>

<!-- Profile -->
<section class="py-3 py-md-5 py-xl-8">
    <div class="container">
        <div class="row gy-4 gy-lg-0">
            <div class="col-12 col-lg-4 col-xl-3">
                <div class="row gy-4">
                    <div class="pt-lg-1 col-12">
                        <div class="card widget-card shadow-sm">
                            <div class="card-header text-bg-primary">
                                Welcome to <?= $profil->fname . ' ' . $profil->lname ?> profile
                            </div>
                            <div class="card-body">
                                <div class="text-center mb-3">
                                    <img width="120px" src="static/<?php if ($profil->pictur != NULL) {
                                                                        echo 'uploads/img/' . $profil->pictur;
                                                                    } else {
                                                                        echo 'images/profile-img-1.jpg';
                                                                    } ?>" class="img-fluid rounded-circle" alt="Luna John" />
                                </div>
                                <h5 class="text-center mb-1"><?= $profil->fname . ' ' . $profil->lname ?></h5>
                                <p class="text-center text-secondary mb-3">
                                    @<?= $profil->username ?>
                                </p>
                                <h6 class="fw-bolder text-center mb-1">A partir de</h6>
                                <h6 class="fw-bolder text-success text-center mb-4"><?php if ($profil->prix != NULL) {
                                                                                        echo $profil->prix . '€ / heure';
                                                                                    } else {
                                                                                        echo 'FREE';
                                                                                    } ?></h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card widget-card shadow-sm">
                            <div class="card-header text-bg-primary">Contact</div>
                            <div class="card-body">
                                <div class="mb-2">
                                    <i class="bi bi-envelope text-dark-emphasis px-2"></i> <a class="mb-1" href="mailto:<?= $profil->email ?>"> <?= $profil->email ?> </a>
                                </div>
                                <div class="mb-1">
                                    <i class="bi bi-telephone text-dark-emphasis px-2"></i> <a href="tel:<?= $profil->phone ?>"> <?= $profil->phone ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card widget-card shadow-sm">
                            <div class="card-header text-bg-primary">Skills</div>
                            <div class="card-body">
                            <?php foreach($profil->skills as $skill): ?>
                                <span class="badge text-bg-primary"><?= $skill ?></span>
                            <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-8 col-xl-9">
                <div class="card card-body widget-card shadow-sm">
                    <div class="tab-content pt-2" id="profileTabContent">
                        <div class="tab-pane fade show active" id="overview-tab-pane" role="tabpanel" aria-labelledby="overview-tab" tabindex="0">
                            <h5 class="mb-3">About</h5>
                            <p> <?= $profil->about ?> </p>
                            <h5 class="mb-3">Profile</h5>
                            <p> <?= $profil->detail ?> </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include_once "footer.php"; ?>