<?php include_once "core.php";

use Classes\Utils\Helper;
use Classes\Users\User;

if (isset($_GET['logout'])) {
  session_destroy();
  header("Location: login.php");
  exit;
}

if (!empty($_SESSION)) {
  $user = new User();
  $user = $user->get_user_pic($_SESSION['id']);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="static/js/color-modes.js"></script>
  <link href="static/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
  <link rel="stylesheet" href="https://cdn.datatables.net/2.0.3/css/dataTables.dataTables.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="static/css/styles.css" rel="stylesheet" />
  <title>Coach-Me</title>
</head>

<body>
  <!--  Header end -->
  <div class="container">
    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3">
      <div class="col-md-3 mb-2 mb-md-0">
        <a href="/" class="d-inline-flex fs-4 link-body-emphasis text-decoration-none" aria-current="page">
          Coach<span class="">Me</span>
        </a>
      </div>

      <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
        <li><a href="index.php" class="nav-link px-2 link-secondary">Home</a></li>
        <li><a href="#" class="nav-link px-2">Features</a></li>
        <li><a href="#" class="nav-link px-2">Pricing</a></li>
        <li><a href="#" class="nav-link px-2">FAQs</a></li>
        <li><a href="#" class="nav-link px-2">About</a></li>
      </ul>

      <div class="col-md-3 d-flex justify-content-end">
        <?php if (Helper::checkIfConnected()) { ?>
          <div class="dropdown me-2">
            <a href="#" class="d-block link-body-emphasis text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
              <img src="./static/<?php if ($user->pictur != NULL) {
                                    echo 'uploads/img/' . $user->pictur;
                                  } else {
                                    echo 'images/profile-img-1.jpg';
                                  } ?>" class="img-fluid rounded-circle" alt="mdo" width="32" height="32" class="rounded-circle">
            </a>
            <ul class="dropdown-menu text-small">
              <li>
                <h5 class="dropdown-item"><?php echo $_SESSION['role']; ?></h5>
              </li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <?php if ($_SESSION['role'] === 'Admin') { ?>
                <li><a class="dropdown-item" href="#">Admin</a></li>
              <?php } else { ?>
                <li><a class="dropdown-item" href="profile.php">Profile</a></li>
              <?php } ?>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="?logout=1">Sign out</a></li>
            </ul>
          </div>
        <?php } else { ?><div class="text-end ">
            <a href="login.php" class="btn btn-outline-primary me-2"> Login </a>
            <a href="register.php" class="btn btn-primary">Sign-up</a>
          </div>

        <?php } ?>
      </div>
    </header>
  </div>
  <!--  Header end -->