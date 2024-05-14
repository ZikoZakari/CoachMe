<?php

include_once "core.php";

use Classes\Database\Db;
use Classes\Newsletter\Newslatter;
use Classes\Utils\Helper;
use Classes\Coachs\Coach;

$database = new DB();

$coach = new Coach;
$coachs = $coach->getCoache();

include_once "header.php";

if (isset($_POST['nl-sub'])) {
  extract($_POST);
  if (!empty($nlEmail)) {
    if (Helper::validateEmail($nlEmail)) {
      if (!Helper::checkIfEmailExist($nlEmail)) {
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
        $nlMsg = Helper::flushMessage("Email existe deja", "alert alert-danger text-center");
      }
    } else {
      $nlMsg = Helper::flushMessage("Veuillez saissire votre email correctement", "alert alert-danger text-center");
    }
  }
}

?>
<main class="">
  <div id="myCarousel" class="carousel slide mb-6" data-bs-ride="carousel">
    <?= isset($nlMsg) ? $nlMsg : ''; ?>
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active carousel-1 opc">
        <img src="./static/images/carousel-1.jpg" class="h-100 w-100 object-fit-cover">
        <div class="container">
          <div class="carousel-caption text-start">
            <h1>Transformez votre corps avec notre coaching</h1>
            <p class="opacity-75">
            Découvrez nos méthodes de coaching uniques et adaptées à vos besoins. Obtenez des résultats remarquables grâce à notre approche personnalisée et à notre équipe d'experts.
            </p>
            <p>
              <a class="btn btn-lg btn-primary" href="nos-coachs.php">Nos coachs</a>
            </p>
          </div>
        </div>
      </div>
      <div class="carousel-item carousel-2 opc">
        <img src="./static/images/carousel-2.jpg" class="h-100 w-100 object-fit-cover">
        <div class="container">
          <div class="carousel-caption">
            <h1>Transformez votre corps avec notre coaching</h1>
            <p>
            Découvrez nos méthodes de coaching uniques et adaptées à vos besoins. Obtenez des résultats remarquables grâce à notre approche personnalisée et à notre équipe d'experts.
            </p>
            <p><a class="btn btn-lg btn-primary" href="nos-coachs.php">Nos coachs</a></p>
          </div>
        </div>
      </div>
      <div class="carousel-item carousel-3 opc">
        <img src="./static/images/carousel-3.jpg" class="h-100 w-100 object-fit-cover">
        <div class="container">
          <div class="carousel-caption text-end">
            <h1>Transformez votre corps avec notre coaching</h1>
            <p>
            Découvrez nos méthodes de coaching uniques et adaptées à vos besoins. Obtenez des résultats remarquables grâce à notre approche personnalisée et à notre équipe d'experts.
            </p>
            <p>
              <a class="btn btn-lg btn-primary" href="nos-coachs.php">Nos coachs</a>
            </p>
          </div>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>

  <div class="container marketing">
    <div class="text-center mb-5">
      <h1 class="fw-normal">Top coachs</h1>
    </div>
    <div class="row">
      <?php foreach ($coachs as $coach) :
        $coach->about = Helper::stringLimiter($coach->about, 100);
      ?>
        <div class="col-lg-4">
          <img class="bd-placeholder-img rounded-circle mb-3" width="140" height="140" src="<?php if (!empty($coach->pictur)) {
                                                                                              echo 'static/uploads/img/' . $coach->pictur;
                                                                                            } else {
                                                                                              echo 'static/images/profile-img-1.jpg';
                                                                                            } ?>">
          <h4 class="fw-normal"><?= $coach->fname . ' ' . $coach->lname ?></h4>
          <p>
            <?= $coach->about ?>
          </p>
          <p>
            <a class="btn btn-secondary" href="coach.php?coach=<?= $coach->id ?>">View details &raquo;</a>
          </p>
        </div>
      <?php endforeach; ?>
      <div class="d-flex justify-content-end">
        <p>
          <a class="btn btn-secondary" href="nos-coachs.php">View All &raquo;</a>
        </p>
      </div>
    </div>

    <hr class="mb-5" />

    <div class="row featurette">
      <div class="col-md-7">
        <h2 class="featurette-heading fw-normal lh-1">
          Programme de définition 
          <span class="text-body-secondary">musculaire.</span>
        </h2>
        <p class="lead">
        Choisissez parmi nos différents programmes de coaching pour atteindre vos objectifs de musculation.
        </p>
      </div>
      <div class="col-md-5">
        <img height="500px" src="./static/images/9600665.jpg" alt="Grapefruit slice atop a pile of other slices" />
        <title>Placeholder</title>
        <rect width="100%" height="100%" fill="var(--bs-secondary-bg)" />
      </div>
    </div>

    <hr class="featurette-divider" />

    <div class="row featurette">
      <div class="col-md-7 order-md-2">
        <h2 class="featurette-heading fw-normal lh-1">
          Programme de préparation
          <span class="text-body-secondary">physique.</span>
        </h2>
        <p class="lead">
          Nos programmes de coaching en préparation physique vous aideront à améliorer vos performances sportives.
        </p>
      </div>
      <div class="col-md-5 order-md-1">
        <img height="500px" src="./static/images/2158742.jpg" alt="Grapefruit slice atop a pile of other slices" />
        <title>Placeholder</title>
        <rect width="100%" height="100%" fill="var(--bs-secondary-bg)" />
      </div>
    </div>

    <hr class="featurette-divider" />

    <div class="row featurette">
      <div class="col-md-7">
        <h2 class="featurette-heading fw-normal lh-1">
          Programme de renforcement
          <span class="text-body-secondary">musculaire.</span>
        </h2>
        <p class="lead">
        Optez pour nos programmes de coaching en renforcement musculaire pour développer votre force et votre endurance.
        </p>
      </div>
      <div class="col-md-5">
        <img height="500px" src="./static/images/10389856.jpg" alt="Grapefruit slice atop a pile of other slices" />
        <title>Placeholder</title>
        <rect width="100%" height="100%" fill="var(--bs-secondary-bg)" />
      </div>
    </div>
    <hr class="featurette-divider" />
  </div>
</main>
<div class="container">
  <footer class="pt-2">
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
          <h5>Recevez des conseils de musculation</h5>
          <p>Inscrivez-vous à notre newsletter pour recevoir des conseils de musculation et des offres exclusives.</p>
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
<?php
include_once "footer.php";
?>