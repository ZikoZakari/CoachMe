<?php
include_once "core.php";

use Classes\Coachs\Coach;

$coaches = new Coach();
$coachs = $coaches->coaches();

include_once "header.php";
?>

<header class="bg-dark py-5">
    <div class="container px-4 px-lg-5 my-5">
        <div class="text-center text-white">
            <h1 class="display-4 fw-bolder">Nos Coachs</h1>
            <p class="lead fw-normal text-white-50 mb-0">With this shop hompeage template</p>
        </div>
    </div>
</header>
<section class="py-5">

    <div class="container px-4 px-lg-5">
        <!-- <div class="col-md-3 mb-5">
            <div class="input-group">
                <span class="input-group-text" id="basic-addon1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"></path>
                    </svg>
                </span>
                <input type="text" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="basic-addon1">
            </div>
        </div> -->
        <div class="row gx-4 gx-lg-4 row-cols-1 row-cols-md-3 row-cols-xl-4">
            <?php foreach ($coachs as $coach) :
                $coach->skills = explode(',', $coach->skills);; ?>
                <div class="col mb-5">
                    <div class="card h-100 rounded-5 shadow-lg">
                        <div class="rec position-absolute text-bg-secondary rounded-5 py-1 px-2 fw-medium">recommander (<?= $coach->recommend ?>)</div>
                        <img class="card-img-top rounded-top-5" src="./static/<?php if ($coach->pictur != NULL) {
                                                                                    echo 'uploads/img/' . $coach->pictur;
                                                                                } else {
                                                                                    echo 'images/profile-img-1.jpg';
                                                                                } ?>" alt="..." />
                        <div class="card-body mt-3">
                            <div class="text-center">
                                <h5 class="fw-bolder"><?= $coach->fname . ' ' . $coach->lname ?></h5>
                                Enseignant de kundalin yoga à domicile sur lille sa région <!--<?= $coach->job ?> -->
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
                            <div class="text-center mt-3"><a class="btn btn-outline-dark mt-auto" href="coach.php?coach=<?= $coach->id ?>">View profile</a></div>
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
                <form>
                    <h5>Subscribe to our newsletter</h5>
                    <p>Monthly digest of what's new and exciting from us.</p>
                    <div class="d-flex flex-column flex-sm-row w-100 gap-2">
                        <label for="newsletter1" class="visually-hidden">Email address</label>
                        <input id="newsletter1" type="text" class="form-control" placeholder="Email address" />
                        <button class="btn btn-primary" type="button">Subscribe</button>
                    </div>
                </form>
            </div>
        </div>
    </footer>
</div>

<?php include_once "footer.php"; ?>