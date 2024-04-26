<?php
include_once "core.php";

use Classes\Coachs\Coach;
use Classes\Newsletter\Newslatter;
use Classes\Utils\Helper;

$coaches = new Coach();
if (isset($_POST['search'])) {
    extract($_POST);
    if ($search == 'free') { 
        $search = 0;
    }
    $coachs = $coaches->search($search);
}else{
    $coachs = $coaches->coaches();
}

include_once "header.php";

if (isset($_POST['nl-sub'])) {
    extract($_POST);
    if (!empty($nlEmail)) {
        if (Helper::validateEmail($nlEmail)) {
            // get ip
            $ip = $_SERVER['REMOTE_ADDR'];

            try {
                $newslatter = new Newslatter();
                $newslatter->add($nlEmail, $ip);
                $nlMsg = Helper::flushMessage("Abonnement effectué avec succès", "alert alert-success text-center");
            } catch (Exception $e) {
                $nlMsg = Helper::flushMessage("Erreur de l'abonnement", "alert alert-danger text-center");
            }
        } else {
            $nlMsg = Helper::flushMessage("Veuillez saissire votre email correctement", "alert alert-danger text-center");
        }
    }
}
?>

<header class="bg-dark py-4">
    <div class="container px-4 px-lg-5 my-5">
        <div class="text-center text-white">
            <h1 class="display-4 fw-bolder">Nos Coachs</h1>
            <p class="lead fw-normal text-white-50 mb-0">With this shop hompeage template</p>
        </div>
        <div class="mt-5 d-flex justify-content-center">
            <form method="POST">
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon1">
                        <svg width="20" height="20" fill="currentColor" class="bi bi-search">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"></path>
                        </svg>
                    </span>
                    <input type="text" class="form-control" id="search" name="search" placeholder="Search" onchange="this.form.submit()">
                </div>
            </form>
        </div>
    </div>
</header>
<section class="py-5">

    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-4 row-cols-1 row-cols-md-3 row-cols-xl-4">
            <?php foreach ($coachs as $coach) :
                $coach->skills = explode(',', $coach->skills);
                $coach->about = Helper::stringLimiter($coach->about, 90); ?>
                <div class="col mb-5">
                    <div class="card h-100 rounded-5 shadow-lg">
                        <div class="rec position-absolute text-bg-secondary rounded-5 py-1 px-2 fw-medium">recommander (<?= $coach->recommend ?>)</div>
                        <img class="img-coach card-img-top rounded-top-5" src="./static/<?php if ($coach->pictur != NULL) {
                                                                                    echo 'uploads/img/' . $coach->pictur;
                                                                                } else {
                                                                                    echo 'images/profile-img-1.jpg';
                                                                                } ?>" alt="..." />
                        <div class="card-body mt-3">
                            <div class="text-center">
                                <h5 class="fw-bolder"><?= $coach->fname . ' ' . $coach->lname ?></h5>
                                <?= $coach->about ?>
                            </div>
                        </div>
                        <div class="card-footer p-4 pt-0 border-top-0 bg-black-50 rounded-5">
                            <div class="text-center mt-2">
                                <h6 class="fw-bolder">A partir de</h6>
                                <h6 class="fw-bolder text-success"><?php if ($coach->prix != NULL) {
                                                                        echo $coach->prix . '€ / heure';
                                                                    } else {
                                                                        echo 'FREE';
                                                                    } ?></h6>
                            </div>
                            <?php foreach ($coach->skills as $skill) : ?>
                                <span class="badge text-bg-primary"><?= $skill ?></span>
                            <?php endforeach; ?>
                            <div class="text-center mt-3"><a class="btn btn-outline-secondary mt-auto" href="coach.php?coach=<?= $coach->id ?>">View profile</a></div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<div class="container">
    <footer class="pt-5">
        <div class="row">
            <div class="col-6 col-md-2 mb-3">
                <h5>Section</h5>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2">
                        <a href="#" class="nav-link p-0 text-body-secondary">Home</a>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="#" class="nav-link p-0 text-body-secondary">Features</a>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="#" class="nav-link p-0 text-body-secondary">Pricing</a>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="#" class="nav-link p-0 text-body-secondary">FAQs</a>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="#" class="nav-link p-0 text-body-secondary">About</a>
                    </li>
                </ul>
            </div>

            <div class="col-6 col-md-2 mb-3">
                <h5>Section</h5>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2">
                        <a href="#" class="nav-link p-0 text-body-secondary">Home</a>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="#" class="nav-link p-0 text-body-secondary">Features</a>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="#" class="nav-link p-0 text-body-secondary">Pricing</a>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="#" class="nav-link p-0 text-body-secondary">FAQs</a>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="#" class="nav-link p-0 text-body-secondary">About</a>
                    </li>
                </ul>
            </div>

            <div class="col-6 col-md-2 mb-3">
                <h5>Section</h5>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2">
                        <a href="#" class="nav-link p-0 text-body-secondary">Home</a>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="#" class="nav-link p-0 text-body-secondary">Features</a>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="#" class="nav-link p-0 text-body-secondary">Pricing</a>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="#" class="nav-link p-0 text-body-secondary">FAQs</a>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="#" class="nav-link p-0 text-body-secondary">About</a>
                    </li>
                </ul>
            </div>

            <div class="col-md-5 offset-md-1 mb-3">
                <form method="POST">
                    <?= isset($nlMsg) ? $nlMsg : ''; ?>
                    <h5>Subscribe to our newsletter</h5>
                    <p>Monthly digest of what's new and exciting from us.</p>
                    <div class="d-flex flex-column flex-sm-row w-100 gap-2">
                        <label for="newsletter1" class="visually-hidden">Email address</label>
                        <input id="newsletter1" type="email" class="form-control" name="nlEmail" placeholder="Email address" />
                        <input class="btn btn-primary" type="submit" name="nl-sub" value="Subscribe">
                    </div>
                </form>
            </div>
        </div>
    </footer>
</div>

<?php include_once "footer.php"; ?>