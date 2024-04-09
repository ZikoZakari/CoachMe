<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="static/js/color-modes.js"></script>
  <link href="static/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
  <link href="static/css/styles.css" rel="stylesheet" />
  <title>Coach-Me</title>
</head>

<body>
  <?php include_once "core.php";
        use Classes\Utils\Helper;
  ?>
  <!--  Header end -->
  <div class="container">
    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3">
      <div class="col-md-3 mb-2 mb-md-0">
        <a href="/" class="d-inline-flex fs-4 link-body-emphasis text-decoration-none" aria-current="page">
          Coach<span class="">Me</span>
        </a>
      </div>

      <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
        <li><a href="/" class="nav-link px-2 link-secondary">Home</a></li>
        <li><a href="#" class="nav-link px-2">Features</a></li>
        <li><a href="#" class="nav-link px-2">Pricing</a></li>
        <li><a href="#" class="nav-link px-2">FAQs</a></li>
        <li><a href="#" class="nav-link px-2">About</a></li>
      </ul>


      <div class="col-md-3 d-flex justify-content-end">
        <?php if (Helper::checkIfConnected()) { ?>
          <div class="dropdown me-2">
            <a href="#" class="d-block link-body-emphasis text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
              <img src="./static/images/profile-img-1.jpg" alt="mdo" width="32" height="32" class="rounded-circle">
            </a>
            <ul class="dropdown-menu text-small">
              <li><a class="dropdown-item" href="profile.php">Profile</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><button class="dropdown-item" id="logout">Sign out</button></li>
            </ul>
          </div>
        <?php } else { ?><div class="text-end ">
            <a href="/login.html" class="btn btn-outline-primary me-2"> Login </a>
            <a href="/register.html" class="btn btn-primary">Sign-up</a>
          </div>

        <?php } ?>
      </div>
    </header>
  </div>
  <!--  Header end -->