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
            <h1>Example headline.</h1>
            <p class="opacity-75">
              Some representative placeholder content for the first slide of
              the carousel.
            </p>
            <p>
              <a class="btn btn-lg btn-primary" href="#">Sign up today</a>
            </p>
          </div>
        </div>
      </div>
      <div class="carousel-item carousel-2 opc">
        <img src="./static/images/carousel-2.jpg" class="h-100 w-100 object-fit-cover">
        <div class="container">
          <div class="carousel-caption">
            <h1>Another example headline.</h1>
            <p>
              Some representative placeholder content for the second slide
              of the carousel.
            </p>
            <p><a class="btn btn-lg btn-primary" href="#">Learn more</a></p>
          </div>
        </div>
      </div>
      <div class="carousel-item carousel-3 opc">
        <img src="./static/images/carousel-3.jpg" class="h-100 w-100 object-fit-cover">
        <div class="container">
          <div class="carousel-caption text-end">
            <h1>One more for good measure.</h1>
            <p>
              Some representative placeholder content for the third slide of
              this carousel.
            </p>
            <p>
              <a class="btn btn-lg btn-primary" href="#">Browse gallery</a>
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

  <!-- Marketing messaging and featurettes
        ================================================== -->
  <!-- Wrap the rest of the page in another container to center all the content. -->

  <div class="container marketing">
    <div class="text-center mb-5">
      <h1 class="fw-normal">Top coachs</h1>
    </div>
    <!-- Three columns of text below the carousel -->
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

      <!-- <div class="col-lg-4">
        <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder" preserveAspectRatio="xMidYMid slice" focusable="false">
          <title>Placeholder</title>
          <rect width="100%" height="100%" fill="var(--bs-secondary-color)" />
        </svg>
        <h2 class="fw-normal">Heading</h2>
        <p>
          Another exciting bit of representative placeholder content. This
          time, we've moved on to the second column.
        </p>
        <p>
          <a class="btn btn-secondary" href="#">View details &raquo;</a>
        </p>
      </div>
      <div class="col-lg-4">
        <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder" preserveAspectRatio="xMidYMid slice" focusable="false">
          <title>Placeholder</title>
          <rect width="100%" height="100%" fill="var(--bs-secondary-color)" />
        </svg>
        <h2 class="fw-normal">Heading</h2>
        <p>
          And lastly this, the third column of representative placeholder
          content.
        </p>
        <p>
          <a class="btn btn-secondary" href="#">View details &raquo;</a>
        </p>
      </div> -->
      <div class="d-flex justify-content-end">
        <p>
          <a class="btn btn-secondary" href="nos-coachs.php">View All &raquo;</a>
        </p>
      </div>
    </div>
    <!-- START THE FEATURETTES -->

    <hr class="mb-5" />

    <div class="row featurette">
      <div class="col-md-7">
        <h2 class="featurette-heading fw-normal lh-1">
          First featurette heading.
          <span class="text-body-secondary">It’ll blow your mind.</span>
        </h2>
        <p class="lead">
          Some great placeholder content for the first featurette here.
          Imagine some exciting prose here.
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
          Oh yeah, it’s that good.
          <span class="text-body-secondary">See for yourself.</span>
        </h2>
        <p class="lead">
          Another featurette? Of course. More placeholder content here to
          give you an idea of how this layout would work with some actual
          real-world content in place.
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
          And lastly, this one.
          <span class="text-body-secondary">Checkmate.</span>
        </h2>
        <p class="lead">
          And yes, this is the last block of representative placeholder
          content. Again, not really intended to be actually read, simply
          here to give you a better view of what this would look like with
          some actual content. Your content.
        </p>
      </div>
      <div class="col-md-5">
        <img height="500px" src="./static/images/10389856.jpg" alt="Grapefruit slice atop a pile of other slices" />
        <title>Placeholder</title>
        <rect width="100%" height="100%" fill="var(--bs-secondary-bg)" />
      </div>
    </div>

    <hr class="featurette-divider" />

    <!-- /END THE FEATURETTES -->
  </div>
  <!-- /.container -->
</main>
<!-- footer -->
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
<?php
include_once "footer.php";
?>