<?php
include_once "core.php";
include_once "header.php";

use Classes\Utils\Helper;
use Classes\Uploads\Upload;
use Classes\Users\User;

$user = new User();
$user = $user->get_user_info($_SESSION['id']);

if (empty($_SESSION)) {
  header('Location: login.php');
  exit();
}

if ($_SESSION['role'] === 'Admin') {
    header('Location: dashboard.php');
    exit();
}

if (isset($_POST['save-profile'])) {

  if (!empty($_POST["fname"]) && !empty($_POST["lname"]) && !empty($_POST["about"]) && !empty($_POST["adress"]) && !empty($_POST["city"]) && !empty($_POST["phone"]) && !empty($_POST["job"])) {

    extract($_POST);

    $fname = Helper::sanitizeString($fname);
    $lname = Helper::sanitizeString($lname);
    $adress = Helper::sanitizeString($adress);
    $city = Helper::sanitizeString($city);

    if (Helper::validateName($fname) && Helper::validateName($lname)) {

      try {

        $profil = new User();
        $profil->updateUser($fname, $lname, $about, $adress, $city, $phone, $job, $_SESSION['id']);
        echo $msg = Helper::flushMessage("Modifier avec succès", "alert alert-success text-center");
      } catch (Exception $e) {

        echo $msg = Helper::flushMessage("Compte existe déja", "alert alert-danger text-center");
      }

    } else {

      echo $msg = Helper::flushMessage("Veuillez saissire votre nom correctement", "alert alert-danger text-center");
    }
  } else {

    echo $msg = Helper::flushMessage("Veuillez remplire tous les champs necessaire", "alert alert-danger text-center");
  }
}

if (!empty($_FILES['pictur'])) {

  if (Helper::imgCheck($_FILES['pictur'])) {

    $file = new Upload;
    $updateImg = new User;
    $img = $file->imgUpload($_FILES['pictur']);
    $updateImg->updateFile($img, $_SESSION['id'], 'img');
    echo $msg = Helper::flushMessage("Done", "alert alert-success text-center");
  } else {

    echo $msg = Helper::flushMessage("error image", "alert alert-danger text-center");
  }
}

if (!empty($_FILES['cv'])) {

  if (Helper::fileCheck($_FILES['cv'])) {

    $file = new Upload;
    $updateFile = new User;
    $cv = $file->fileUpload($_FILES['cv']);
    $updateFile->updateFile($cv, $_SESSION['id'], 'cv');
    echo $msg = Helper::flushMessage("Cv telecharger avec succès", "alert alert-success text-center");
  } else {

    echo $msg = Helper::flushMessage("error Cv", "alert alert-danger text-center");
  }
}

if (isset($_POST['save-detail'])) {

  if (!empty($_POST["price"]) && !empty($_POST["detail"])) {

    extract($_POST);

    $detail = new User();
    $detail->details($price, $_POST['detail'], $_SESSION['id']);
  }
}

?>

<section class="py-3 py-md-5 py-xl-8">
  <div class="container">
    <div class="row gy-4 gy-lg-0">
      <div class="col-12 col-lg-4 col-xl-3">
        <div class="row gy-4">
          <div class=" pt-lg-1 col-12">
            <div class="card widget-card shadow-sm">
              <div class="card-header text-bg-primary">
                Welcome, <?= $user->fname . ' ' . $user->lname ?>
              </div>
              <div class="card-body">
                <div class="text-center mb-3">
                  <img width="120px" src="./static/<?php if ($user->pictur != NULL) {
                                                      echo 'uploads/img/' . $user->pictur;
                                                    } else {
                                                      echo 'images/profile-img-1.jpg';
                                                    } ?>" class="img-fluid rounded-circle" />
                </div>
                <h5 class="text-center mb-1"><?= $user->fname . ' ' . $user->lname ?></h5>
                <p class="text-center text-secondary mb-4">
                  @<?= $user->username ?>
                </p>
                <div class="text-center mb-3">
                  <form method="POST" enctype="multipart/form-data">
                    <!-- <a class="btn btn-outline-danger" href="?logout=1">
                      <i class="bi bi-box-arrow-left"></i>
                    </a> -->
                    <input type="file" id="pictur" name="pictur" hidden onchange="this.form.submit()" />
                    <label for="pictur" class="btn btn-primary w-100">Nouvelle image</label>
                  </form>
                </div>
                <div class="text-center">
                  <form method="POST" enctype="multipart/form-data">
                    <input type="file" id="cv" name="cv" hidden onchange="this.form.submit()" />
                    <label for="cv" class="btn btn-warning w-100">Deposer votre CV ici</label>
                  </form>
                </div>
                <!-- <ul class="list-group list-group-flush">
                  <li class="list-group-item d-flex justify-content-between align-items-center">
                    <h6 class="m-0">Followers</h6>
                    <span>7,854</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center">
                    <h6 class="m-0">Following</h6>
                    <span>5,987</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center">
                    <h6 class="m-0">Friends</h6>
                    <span>4,620</span>
                  </li>
                </ul> -->
              </div>
            </div>
          </div>
          <div class="col-12">
            <div class="card widget-card shadow-sm">
              <div class="card-header text-bg-primary">Skills</div>
              <div class="card-body">
                <span class="badge text-bg-primary">HTML</span>
                <span class="badge text-bg-primary">SCSS</span>
                <span class="badge text-bg-primary">Javascript</span>
                <span class="badge text-bg-primary">React</span>
                <span class="badge text-bg-primary">Vue</span>
                <span class="badge text-bg-primary">Angular</span>
                <span class="badge text-bg-primary">UI</span>
                <span class="badge text-bg-primary">UX</span>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12 col-lg-8 col-xl-9">
        <div class="card widget-card shadow-sm">
          <div class="card-body p-4">
            <ul class="nav nav-tabs" id="profileTab" role="tablist">
              <li class="nav-item" role="presentation">
                <button class="nav-link active" id="overview-tab" data-bs-toggle="tab" data-bs-target="#overview-tab-pane" type="button" role="tab" aria-controls="overview-tab-pane" aria-selected="true">
                  Overview
                </button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">
                  Profile
                </button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link" id="detail-tab" data-bs-toggle="tab" data-bs-target="#detail-tab-pane" type="button" role="tab" aria-controls="detail-tab-pane" aria-selected="false">
                  Details
                </button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact-tab-pane" type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false">
                  Contact
                </button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link" id="password-tab" data-bs-toggle="tab" data-bs-target="#password-tab-pane" type="button" role="tab" aria-controls="password-tab-pane" aria-selected="false">
                  Mot de passe
                </button>
              </li>
            </ul>
            <div class="tab-content pt-4" id="profileTabContent">
              <div class="tab-pane fade show active" id="overview-tab-pane" role="tabpanel" aria-labelledby="overview-tab" tabindex="0">
                <h5 class="mb-3">About</h5>
                <p class="lead mb-3">
                  <?= $user->about ?>
                </p>
                <h5 class="mb-3">Profile</h5>
                <div class="row g-0">
                  <div class="col-5 col-md-3 border-bottom border-3">
                    <div class="p-2">First Name</div>
                  </div>
                  <div class="col-7 col-md-9 border-start border-bottom border-3">
                    <div class="p-2"><?= $user->fname ?></div>
                  </div>
                  <div class="col-5 col-md-3 border-bottom border-3">
                    <div class="p-2">Last Name</div>
                  </div>
                  <div class="col-7 col-md-9 border-start border-bottom border-3">
                    <div class="p-2"><?= $user->lname ?></div>
                  </div>
                  <div class="col-5 col-md-3 border-bottom border-3">
                    <div class="p-2">Job</div>
                  </div>
                  <div class="col-7 col-md-9 border-start border-bottom border-3">
                    <div class="p-2"><?= $user->job ?></div>
                  </div>
                  <div class="col-5 col-md-3 border-bottom border-3">
                    <div class="p-2">Phone</div>
                  </div>
                  <div class="col-7 col-md-9 border-start border-bottom border-3">
                    <div class="p-2"><?= $user->phone ?></div>
                  </div>
                  <div class="col-5 col-md-3 border-bottom border-3">
                    <div class="p-2">Email</div>
                  </div>
                  <div class="col-7 col-md-9 border-start border-bottom border-3">
                    <div class="p-2"><?= $user->email ?></div>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                <form method="POST" class="row gy-3 gy-xxl-4" enctype="multipart/form-data">
                  <div class="col-12 col-md-4">
                    <label for="fname" class="form-label">First Name</label>
                    <input type="text" class="form-control" id="fname" name="fname" value="<?= $user->fname ?>" />
                  </div>
                  <div class="col-12 col-md-4">
                    <label for="lname" class="form-label">Last Name</label>
                    <input type="text" class="form-control" id="lname" name="lname" value="<?= $user->lname ?>" />
                  </div>
                  <div class="col-12 col-md-4">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username" value="<?= $user->username ?>" disabled />
                  </div>
                  <div class="col-12">
                    <label for="about" class="form-label">About</label>
                    <textarea class="form-control" rows="5" id="about" name="about"><?= $user->about ?></textarea>
                  </div>
                  <div class="col-12 col-md-6">
                    <label for="adress" class="form-label">Adress</label>
                    <input type="text" class="form-control" id="adress" name="adress" value="<?= $user->address ?>" />
                  </div>
                  <div class="col-12 col-md-6">
                    <label for="city" class="form-label">City</label>
                    <input type="text" class="form-control" id="city" name="city" value="<?= $user->city ?>" />
                  </div>
                  <div class="col-12 col-md-6">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="tel" class="form-control" id="phone" name="phone" value="<?= $user->phone ?>" />
                  </div>
                  <div class="col-12 col-md-6">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?= $user->email ?>" disabled />
                  </div>
                  <div class="col-12 col-md-6">
                    <label for="skill" class="form-label">Skills</label>
                    <select class="form-select" id="skill" data-placeholder="Choose anything" name="skill" multiple>
                      <option>Christmas Island</option>
                      <option>South Sudan</option>
                      <option>Jamaica</option>
                      <option>Kenya</option>
                      <option>French Guiana</option>
                      <option>Mayotta</option>
                      <option>Liechtenstein</option>
                      <option>Denmark</option>
                      <option>Eritrea</option>
                      <option>Gibraltar</option>
                      <option>Saint Helena, Ascension and Tristan da Cunha</option>
                      <option>Haiti</option>
                      <option>Namibia</option>
                      <option>South Georgia and the South Sandwich Islands</option>
                      <option>Vietnam</option>
                      <option>Yemen</option>
                      <option>Philippines</option>
                      <option>Benin</option>
                      <option>Czech Republic</option>
                      <option>Russia</option>
                    </select>
                  </div>
                  <div class="col-12 col-md-6">
                    <label for="job" class="form-label">Job</label>
                    <input type="text" class="form-control" id="job" name="job" value="<?= $user->job ?>" />
                  </div>
                  <div class="col-12">
                    <button type="submit" class="btn btn-primary" name="save-profile" id="save-profile">
                      Save Changes
                    </button>
                  </div>
                </form>
              </div>

              <div class="tab-pane fade" id="contact-tab-pane" role="tabpanel" aria-labelledby="detail-tab" tabindex="0">
                <div class="row gy-3 gy-md-0">
                  <table class="hover row-border stripe" id="example" style="width:100%">
                    <thead>
                      <tr>
                        <th>First name</th>
                        <th>Last name</th>
                        <th>Numero de telephone</th>
                        <th>Status</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>Hamid</td>
                        <td>Taki</td>
                        <td>0768543658</td>
                        <td>Waiting</td>
                        <td><button class="btn btn-success me-2">Accept</button><button class="btn btn-danger">Decline</button></td>
                      </tr>
                      <tr>
                        <td>Yacine</td>
                        <td>Mahi</td>
                        <td>0768577777</td>
                        <td>Waiting</td>
                        <td><button class="btn btn-success me-2">Accept</button><button class="btn btn-danger">Decline</button></td>
                      </tr>
                      <tr>
                        <td>islem</td>
                        <td>meghnine</td>
                        <td>0556896467</td>
                        <td>Waiting</td>
                        <td><button class="btn btn-success me-2">Accept</button><button class="btn btn-danger">Decline</button></td>
                      </tr>
                      <tr>
                        <td>omar</td>
                        <td>bell</td>
                        <td>0665824563</td>
                        <td>Waiting</td>
                        <td><button class="btn btn-success me-2">Accept</button><button class="btn btn-danger">Decline</button></td>
                      </tr>
                      <tr>
                        <td>Tokyo</td>
                        <td>Chine</td>
                        <td>0777966656</td>
                        <td>Waiting</td>
                        <td><button class="btn btn-success me-2">Accept</button><button class="btn btn-danger">Decline</button></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>

              <div class="tab-pane fade" id="detail-tab-pane" role="tabpanel" aria-labelledby="detail-tab" tabindex="0">
                <form method="POST" class="row gy-3 gy-md-0" enctype="multipart/form-data">
                  <div class="col-12 col-md-12 mb-3">
                    <label for="price" class="form-label">Prix de base</label>
                    <div class="input-group">
                      <span class="input-group-text">€</span>
                      <input type="text" class="form-control" id="price" name="price" value="<?= $user->prix ?>">
                      <span class="input-group-text">.00</span>
                    </div>
                  </div>
                  <div class="col-12 col-md-12">
                    <label for="detail" class="form-label">Description de votre offre</label>
                    <textarea id="detail" name="detail"><?= $user->detail ?></textarea>
                  </div>
                  <div class="row">
                    <div class="col-12">
                      <button type="submit" class="btn btn-primary mt-4" name="save-detail">
                        Save Changes
                      </button>
                    </div>
                  </div>
                </form>
              </div>



              <div class="tab-pane fade" id="password-tab-pane" role="tabpanel" aria-labelledby="password-tab" tabindex="0">
                <form action="#!">
                  <div class="row gy-3 gy-xxl-4">
                    <div class="col-12">
                      <label for="currentPassword" class="form-label">Mot de passe courant</label>
                      <input type="password" class="form-control" id="currentPassword" />
                    </div>
                    <div class="col-12">
                      <label for="newPassword" class="form-label">Nouveau mot de passe</label>
                      <input type="password" class="form-control" id="newPassword" />
                    </div>
                    <div class="col-12">
                      <label for="confirmPassword" class="form-label">Confirmation du mot de passe</label>
                      <input type="password" class="form-control" id="confirmPassword" />
                    </div>
                    <div class="col-12">
                      <button type="submit" class="btn btn-primary">
                        Enregister
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<div class="dropdown position-fixed bottom-0 end-0 mb-3 me-3 bd-mode-toggle">
  <button class="btn btn-bd-primary py-2 dropdown-toggle d-flex align-items-center" id="bd-theme" type="button" aria-expanded="false" data-bs-toggle="dropdown" aria-label="Toggle theme (light)">
    <svg class="bi my-1 theme-icon-active" width="1em" height="1em">
      <use href="#sun-fill"></use>
    </svg>
    <span class="visually-hidden" id="bd-theme-text">Toggle theme</span>
  </button>
  <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="bd-theme-text" style="">
    <li>
      <button type="button" class="dropdown-item d-flex align-items-center active" data-bs-theme-value="light" aria-pressed="true">
        <svg class="bi me-2 opacity-50" width="1em" height="1em">
          <use href="#sun-fill"></use>
        </svg>
        Light
        <svg class="bi ms-auto d-none" width="1em" height="1em">
          <use href="#check2"></use>
        </svg>
      </button>
    </li>
    <li>
      <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="dark" aria-pressed="false">
        <svg class="bi me-2 opacity-50" width="1em" height="1em">
          <use href="#moon-stars-fill"></use>
        </svg>
        Dark
        <svg class="bi ms-auto d-none" width="1em" height="1em">
          <use href="#check2"></use>
        </svg>
      </button>
    </li>
    <li>
      <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="auto" aria-pressed="false">
        <svg class="bi me-2 opacity-50" width="1em" height="1em">
          <use href="#circle-half"></use>
        </svg>
        Auto
        <svg class="bi ms-auto d-none" width="1em" height="1em">
          <use href="#check2"></use>
        </svg>
      </button>
    </li>
  </ul>
</div>
<svg xmlns="http://www.w3.org/2000/svg" class="d-none">
  <symbol id="check2" viewBox="0 0 16 16">
    <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z" />
  </symbol>
  <symbol id="circle-half" viewBox="0 0 16 16">
    <path d="M8 15A7 7 0 1 0 8 1v14zm0 1A8 8 0 1 1 8 0a8 8 0 0 1 0 16z" />
  </symbol>
  <symbol id="moon-stars-fill" viewBox="0 0 16 16">
    <path d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278z" />
    <path d="M10.794 3.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387a1.734 1.734 0 0 0-1.097 1.097l-.387 1.162a.217.217 0 0 1-.412 0l-.387-1.162A1.734 1.734 0 0 0 9.31 6.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387a1.734 1.734 0 0 0 1.097-1.097l.387-1.162zM13.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732l-.774-.258a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L13.863.1z" />
  </symbol>
  <symbol id="sun-fill" viewBox="0 0 16 16">
    <path d="M8 12a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z" />
  </symbol>
  <symbol id="bootstrap" viewBox="0 0 118 94">
    <title>Bootstrap</title>
    <path fill-rule="evenodd" clip-rule="evenodd" d="M24.509 0c-6.733 0-11.715 5.893-11.492 12.284.214 6.14-.064 14.092-2.066 20.577C8.943 39.365 5.547 43.485 0 44.014v5.972c5.547.529 8.943 4.649 10.951 11.153 2.002 6.485 2.28 14.437 2.066 20.577C12.794 88.106 17.776 94 24.51 94H93.5c6.733 0 11.714-5.893 11.491-12.284-.214-6.14.064-14.092 2.066-20.577 2.009-6.504 5.396-10.624 10.943-11.153v-5.972c-5.547-.529-8.934-4.649-10.943-11.153-2.002-6.484-2.28-14.437-2.066-20.577C105.214 5.894 100.233 0 93.5 0H24.508zM80 57.863C80 66.663 73.436 72 62.543 72H44a2 2 0 01-2-2V24a2 2 0 012-2h18.437c9.083 0 15.044 4.92 15.044 12.474 0 5.302-4.01 10.049-9.119 10.88v.277C75.317 46.394 80 51.21 80 57.863zM60.521 28.34H49.948v14.934h8.905c6.884 0 10.68-2.772 10.68-7.727 0-4.643-3.264-7.207-9.012-7.207zM49.948 49.2v16.458H60.91c7.167 0 10.964-2.876 10.964-8.281 0-5.406-3.903-8.178-11.425-8.178H49.948z"></path>
  </symbol>
  <symbol id="facebook" viewBox="0 0 16 16">
    <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"></path>
  </symbol>
  <symbol id="instagram" viewBox="0 0 16 16">
    <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"></path>
  </symbol>
  <symbol id="twitter" viewBox="0 0 16 16">
    <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z"></path>
  </symbol>
</svg>
<?php include_once "footer.php"; ?>