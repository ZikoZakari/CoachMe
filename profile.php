<?php 
include_once "core.php";
include_once "header.php"; ?>

    <div class="container">
      <header
        class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3"
      >
        <div class="col-md-3 mb-2 mb-md-0">
          <a
            href="/"
            class="d-inline-flex fs-4 link-body-emphasis text-decoration-none"
            aria-current="page"
          >
            Coach<span class="">Me</span>
          </a>
        </div>

        <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
          <li><a href="#" class="nav-link px-2 link-secondary">Home</a></li>
          <li><a href="#" class="nav-link px-2">Features</a></li>
          <li><a href="#" class="nav-link px-2">Pricing</a></li>
          <li><a href="#" class="nav-link px-2">FAQs</a></li>
          <li><a href="#" class="nav-link px-2">About</a></li>
        </ul>

        <div class="col-md-3 text-end">
          <a href="/login.html" class="btn btn-outline-primary me-2"> Login </a>
          <a href="/register.html" class="btn btn-primary">Sign-up</a>
        </div>
      </header>
    </div>

    <section class="py-3 py-md-5 py-xl-8">
      <div class="container">
        <div class="row gy-4 gy-lg-0">
          <div class="col-12 col-lg-4 col-xl-3">
            <div class="row gy-4">
              <div class=" pt-lg-1 col-12">
                <div class="card widget-card shadow-sm">
                  <div class="card-header text-bg-primary">
                    Welcome, Ethan Leo
                  </div>
                  <div class="card-body">
                    <div class="text-center mb-3">
                      <img width="120px"
                        src="./static/images/profile-img-1.jpg"
                        class="img-fluid rounded-circle"
                        alt="Luna John"
                      />
                    </div>
                    <h5 class="text-center mb-1">Ethan Leo</h5>
                    <p class="text-center text-secondary mb-4">
                      @Coach
                    </p>
                    <div class="text-center mb-4">
                      <button class="btn btn-outline-danger" type="button">
                        <i class="bi bi-box-arrow-left"></i>
                      </button>
                      <button class="btn btn-primary" type="button">
                        <i class="bi bi-house-door-fill"></i> Home
                      </button>
                    </div>
                    <ul class="list-group list-group-flush">
                      <li
                        class="list-group-item d-flex justify-content-between align-items-center"
                      >
                        <h6 class="m-0">Followers</h6>
                        <span>7,854</span>
                      </li>
                      <li
                        class="list-group-item d-flex justify-content-between align-items-center"
                      >
                        <h6 class="m-0">Following</h6>
                        <span>5,987</span>
                      </li>
                      <li
                        class="list-group-item d-flex justify-content-between align-items-center"
                      >
                        <h6 class="m-0">Friends</h6>
                        <span>4,620</span>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <!-- <div class="position-sticky col-12">
                <div class="card widget-card shadow-sm">
                  <div class="card-header text-bg-primary">Social Accounts</div>
                  <div class="card-body">
                    <a
                      href="#!"
                      class="d-inline-block bg-dark link-light lh-1 p-2 rounded"
                    >
                      <i class="bi bi-youtube"></i>
                    </a>
                    <a
                      href="#!"
                      class="d-inline-block bg-dark link-light lh-1 p-2 rounded"
                    >
                      <i class="bi bi-twitter-x"></i>
                    </a>
                    <a
                      href="#!"
                      class="d-inline-block bg-dark link-light lh-1 p-2 rounded"
                    >
                      <i class="bi bi-facebook"></i>
                    </a>
                    <a
                      href="#!"
                      class="d-inline-block bg-dark link-light lh-1 p-2 rounded"
                    >
                      <i class="bi bi-linkedin"></i>
                    </a>
                  </div>
                </div>
              </div> -->
              <!-- <div class="col-12">
                <div class="card widget-card shadow-sm">
                  <div class="card-header text-bg-primary">About Me</div>
                  <div class="card-body">
                    <ul class="list-group list-group-flush mb-0">
                      <li class="list-group-item">
                        <h6 class="mb-1">
                          <span class="bii bi-mortarboard-fill me-2"></span>
                          Education
                        </h6>
                        <span>M.S Computer Science</span>
                      </li>
                      <li class="list-group-item">
                        <h6 class="mb-1">
                          <span class="bii bi-geo-alt-fill me-2"></span>
                          Location
                        </h6>
                        <span>Mountain View, California</span>
                      </li>
                      <li class="list-group-item">
                        <h6 class="mb-1">
                          <span class="bii bi-building-fill-gear me-2"></span>
                          Company
                        </h6>
                        <span>GitHub Inc</span>
                      </li>
                    </ul>
                  </div>
                </div>
              </div> -->
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
                    <button
                      class="nav-link active"
                      id="overview-tab"
                      data-bs-toggle="tab"
                      data-bs-target="#overview-tab-pane"
                      type="button"
                      role="tab"
                      aria-controls="overview-tab-pane"
                      aria-selected="true"
                    >
                      Overview
                    </button>
                  </li>
                  <li class="nav-item" role="presentation">
                    <button
                      class="nav-link"
                      id="profile-tab"
                      data-bs-toggle="tab"
                      data-bs-target="#profile-tab-pane"
                      type="button"
                      role="tab"
                      aria-controls="profile-tab-pane"
                      aria-selected="false"
                    >
                      Profile
                    </button>
                  </li>
                  <li class="nav-item" role="presentation">
                    <button
                      class="nav-link"
                      id="email-tab"
                      data-bs-toggle="tab"
                      data-bs-target="#email-tab-pane"
                      type="button"
                      role="tab"
                      aria-controls="email-tab-pane"
                      aria-selected="false"
                    >
                      Emails
                    </button>
                  </li>
                  <li class="nav-item" role="presentation">
                    <button
                      class="nav-link"
                      id="password-tab"
                      data-bs-toggle="tab"
                      data-bs-target="#password-tab-pane"
                      type="button"
                      role="tab"
                      aria-controls="password-tab-pane"
                      aria-selected="false"
                    >
                      Mot de passe
                    </button>
                  </li>
                </ul>
                <div class="tab-content pt-4" id="profileTabContent">
                  <div
                    class="tab-pane fade show active"
                    id="overview-tab-pane"
                    role="tabpanel"
                    aria-labelledby="overview-tab"
                    tabindex="0"
                  >
                    <h5 class="mb-3">About</h5>
                    <p class="lead mb-3">
                      Ethan Leo is a seasoned and results-driven Project Manager
                      who brings experience and expertise to project management.
                      With a proven track record of successfully delivering
                      complex projects on time and within budget, Ethan Leo is
                      the go-to professional for organizations seeking efficient
                      and effective project leadership.
                    </p>
                    <h5 class="mb-3">Profile</h5>
                    <div class="row g-0">
                      <div class="col-5 col-md-3 border-bottom border-3">
                        <div class="p-2">First Name</div>
                      </div>
                      <div
                        class="col-7 col-md-9 border-start border-bottom border-3"
                      >
                        <div class="p-2">Ethan</div>
                      </div>
                      <div class="col-5 col-md-3 border-bottom border-3">
                        <div class="p-2">Last Name</div>
                      </div>
                      <div
                        class="col-7 col-md-9 border-start border-bottom border-3"
                      >
                        <div class="p-2">Leo</div>
                      </div>
                      <!-- <div class="col-5 col-md-3 border-bottom border-3">
                        <div class="p-2">Education</div>
                      </div>
                      <div
                        class="col-7 col-md-9 border-start border-bottom border-3"
                      >
                        <div class="p-2">M.S Computer Science</div>
                      </div>
                      <div class="col-5 col-md-3 border-bottom border-3">
                        <div class="p-2">Address</div>
                      </div>
                      <div
                        class="col-7 col-md-9 border-start border-bottom border-3"
                      >
                        <div class="p-2">Mountain View, California</div>
                      </div>
                      <div class="col-5 col-md-3 border-bottom border-3">
                        <div class="p-2">Country</div>
                      </div>
                      <div
                        class="col-7 col-md-9 border-start border-bottom border-3"
                      >
                        <div class="p-2">United States</div>
                      </div> -->
                      <div class="col-5 col-md-3 border-bottom border-3">
                        <div class="p-2">Job</div>
                      </div>
                      <div
                        class="col-7 col-md-9 border-start border-bottom border-3"
                      >
                        <div class="p-2">Project Manager</div>
                      </div>
                      <!-- <div class="col-5 col-md-3 border-bottom border-3">
                        <div class="p-2">Company</div>
                      </div>
                      <div
                        class="col-7 col-md-9 border-start border-bottom border-3"
                      >
                        <div class="p-2">GitHub Inc</div>
                      </div> -->
                      <div class="col-5 col-md-3 border-bottom border-3">
                        <div class="p-2">Phone</div>
                      </div>
                      <div
                        class="col-7 col-md-9 border-start border-bottom border-3"
                      >
                        <div class="p-2">+1 (248) 679-8745</div>
                      </div>
                      <div class="col-5 col-md-3 border-bottom border-3">
                        <div class="p-2">Email</div>
                      </div>
                      <div
                        class="col-7 col-md-9 border-start border-bottom border-3"
                      >
                        <div class="p-2">leo@example.com</div>
                      </div>
                    </div>
                  </div>
                  <div
                    class="tab-pane fade"
                    id="profile-tab-pane"
                    role="tabpanel"
                    aria-labelledby="profile-tab"
                    tabindex="0"
                  >
                    <form action="#!" class="row gy-3 gy-xxl-4">
                      <div class="col-12">
                        <div class="row gy-2">
                          <label class="col-12 form-label m-0"
                            >Profile Image</label
                          >
                          <div class="col-12">
                            <img width="100px"
                              src="./static/images/profile-img-1.jpg"
                              class="img-fluid"
                              alt="Luna John"
                            />
                          </div>
                          <div class="col-12">
                            <a
                              href="#!"
                              class="d-inline-block bg-primary link-light lh-1 p-2 rounded"
                            >
                              <i class="bi bi-upload"></i>
                            </a>
                            <a
                              href="#!"
                              class="d-inline-block bg-danger link-light lh-1 p-2 rounded"
                            >
                              <i class="bi bi-trash"></i>
                            </a>
                          </div>
                        </div>
                      </div>
                      <div class="col-12 col-md-6">
                        <label for="inputFirstName" class="form-label"
                          >First Name</label
                        >
                        <input
                          type="text"
                          class="form-control"
                          id="inputFirstName"
                          value="Ethan"
                        />
                      </div>
                      <div class="col-12 col-md-6">
                        <label for="inputLastName" class="form-label"
                          >Last Name</label
                        >
                        <input
                          type="text"
                          class="form-control"
                          id="inputLastName"
                          value="Leo"
                        />
                      </div>
                      <!-- <div class="col-12 col-md-6">
                        <label for="inputEducation" class="form-label"
                          >Education</label
                        >
                        <input
                          type="text"
                          class="form-control"
                          id="inputEducation"
                          value="M.S Computer Science"
                        />
                      </div> -->
                      <div class="col-12 col-md-6">
                        <label for="inputSkills" class="form-label"
                          >Skills</label
                        >
                        <input
                          type="text"
                          class="form-control"
                          id="inputSkills"
                          value="HTML, SCSS, Javascript, React, Vue, Angular, UI, UX"
                        />
                      </div>
                      <div class="col-12 col-md-6">
                        <label for="inputJob" class="form-label">Job</label>
                        <input
                          type="text"
                          class="form-control"
                          id="inputJob"
                          value="Project Manager"
                        />
                      </div>
                      <!-- <div class="col-12 col-md-6">
                        <label for="inputCompany" class="form-label"
                          >Company</label
                        >
                        <input
                          type="text"
                          class="form-control"
                          id="inputCompany"
                          value="GitHub Inc"
                        />
                      </div> -->
                      <div class="col-12 col-md-6">
                        <label for="inputPhone" class="form-label">Phone</label>
                        <input
                          type="tel"
                          class="form-control"
                          id="inputPhone"
                          value="+12486798745"
                        />
                      </div>
                      <div class="col-12 col-md-6">
                        <label for="inputEmail" class="form-label">Email</label>
                        <input
                          type="email"
                          class="form-control"
                          id="inputEmail"
                          value="leo@example.com"
                        />
                      </div>
                      <!-- <div class="col-12 col-md-6">
                        <label for="inputAddress" class="form-label"
                          >Address</label
                        >
                        <input
                          type="text"
                          class="form-control"
                          id="inputAddress"
                          value="Mountain View, California"
                        />
                      </div>
                      <div class="col-12 col-md-6">
                        <label for="inputCountry" class="form-label"
                          >Country</label
                        >
                        <select class="form-select" id="inputCountry">
                          <option value="Afghanistan">Afghanistan</option>
                          <option value="Åland Islands">Åland Islands</option>
                          <option value="Albania">Albania</option>
                          <option value="Algeria">Algeria</option>
                          <option value="American Samoa">American Samoa</option>
                          <option value="Andorra">Andorra</option>
                          <option value="Angola">Angola</option>
                          <option value="Anguilla">Anguilla</option>
                          <option value="Antarctica">Antarctica</option>
                          <option value="Antigua and Barbuda">
                            Antigua and Barbuda
                          </option>
                          <option value="Argentina">Argentina</option>
                          <option value="Armenia">Armenia</option>
                          <option value="Aruba">Aruba</option>
                          <option value="Australia">Australia</option>
                          <option value="Austria">Austria</option>
                          <option value="Azerbaijan">Azerbaijan</option>
                          <option value="Bahamas">Bahamas</option>
                          <option value="Bahrain">Bahrain</option>
                          <option value="Bangladesh">Bangladesh</option>
                          <option value="Barbados">Barbados</option>
                          <option value="Belarus">Belarus</option>
                          <option value="Belgium">Belgium</option>
                          <option value="Belize">Belize</option>
                          <option value="Benin">Benin</option>
                          <option value="Bermuda">Bermuda</option>
                          <option value="Bhutan">Bhutan</option>
                          <option value="Bolivia">Bolivia</option>
                          <option value="Bosnia and Herzegovina">
                            Bosnia and Herzegovina
                          </option>
                          <option value="Botswana">Botswana</option>
                          <option value="Bouvet Island">Bouvet Island</option>
                          <option value="Brazil">Brazil</option>
                          <option value="British Indian Ocean Territory">
                            British Indian Ocean Territory
                          </option>
                          <option value="Brunei Darussalam">
                            Brunei Darussalam
                          </option>
                          <option value="Bulgaria">Bulgaria</option>
                          <option value="Burkina Faso">Burkina Faso</option>
                          <option value="Burundi">Burundi</option>
                          <option value="Cambodia">Cambodia</option>
                          <option value="Cameroon">Cameroon</option>
                          <option value="Canada">Canada</option>
                          <option value="Cape Verde">Cape Verde</option>
                          <option value="Cayman Islands">Cayman Islands</option>
                          <option value="Central African Republic">
                            Central African Republic
                          </option>
                          <option value="Chad">Chad</option>
                          <option value="Chile">Chile</option>
                          <option value="China">China</option>
                          <option value="Christmas Island">
                            Christmas Island
                          </option>
                          <option value="Cocos (Keeling) Islands">
                            Cocos (Keeling) Islands
                          </option>
                          <option value="Colombia">Colombia</option>
                          <option value="Comoros">Comoros</option>
                          <option value="Congo">Congo</option>
                          <option value="Congo, The Democratic Republic of The">
                            Congo, The Democratic Republic of The
                          </option>
                          <option value="Cook Islands">Cook Islands</option>
                          <option value="Costa Rica">Costa Rica</option>
                          <option value="Cote D'ivoire">Cote D'ivoire</option>
                          <option value="Croatia">Croatia</option>
                          <option value="Cuba">Cuba</option>
                          <option value="Cyprus">Cyprus</option>
                          <option value="Czech Republic">Czech Republic</option>
                          <option value="Denmark">Denmark</option>
                          <option value="Djibouti">Djibouti</option>
                          <option value="Dominica">Dominica</option>
                          <option value="Dominican Republic">
                            Dominican Republic
                          </option>
                          <option value="Ecuador">Ecuador</option>
                          <option value="Egypt">Egypt</option>
                          <option value="El Salvador">El Salvador</option>
                          <option value="Equatorial Guinea">
                            Equatorial Guinea
                          </option>
                          <option value="Eritrea">Eritrea</option>
                          <option value="Estonia">Estonia</option>
                          <option value="Ethiopia">Ethiopia</option>
                          <option value="Falkland Islands (Malvinas)">
                            Falkland Islands (Malvinas)
                          </option>
                          <option value="Faroe Islands">Faroe Islands</option>
                          <option value="Fiji">Fiji</option>
                          <option value="Finland">Finland</option>
                          <option value="France">France</option>
                          <option value="French Guiana">French Guiana</option>
                          <option value="French Polynesia">
                            French Polynesia
                          </option>
                          <option value="French Southern Territories">
                            French Southern Territories
                          </option>
                          <option value="Gabon">Gabon</option>
                          <option value="Gambia">Gambia</option>
                          <option value="Georgia">Georgia</option>
                          <option value="Germany">Germany</option>
                          <option value="Ghana">Ghana</option>
                          <option value="Gibraltar">Gibraltar</option>
                          <option value="Greece">Greece</option>
                          <option value="Greenland">Greenland</option>
                          <option value="Grenada">Grenada</option>
                          <option value="Guadeloupe">Guadeloupe</option>
                          <option value="Guam">Guam</option>
                          <option value="Guatemala">Guatemala</option>
                          <option value="Guernsey">Guernsey</option>
                          <option value="Guinea">Guinea</option>
                          <option value="Guinea-bissau">Guinea-bissau</option>
                          <option value="Guyana">Guyana</option>
                          <option value="Haiti">Haiti</option>
                          <option value="Heard Island and Mcdonald Islands">
                            Heard Island and Mcdonald Islands
                          </option>
                          <option value="Holy See (Vatican City State)">
                            Holy See (Vatican City State)
                          </option>
                          <option value="Honduras">Honduras</option>
                          <option value="Hong Kong">Hong Kong</option>
                          <option value="Hungary">Hungary</option>
                          <option value="Iceland">Iceland</option>
                          <option value="India">India</option>
                          <option value="Indonesia">Indonesia</option>
                          <option value="Iran, Islamic Republic of">
                            Iran, Islamic Republic of
                          </option>
                          <option value="Iraq">Iraq</option>
                          <option value="Ireland">Ireland</option>
                          <option value="Isle of Man">Isle of Man</option>
                          <option value="Israel">Israel</option>
                          <option value="Italy">Italy</option>
                          <option value="Jamaica">Jamaica</option>
                          <option value="Japan">Japan</option>
                          <option value="Jersey">Jersey</option>
                          <option value="Jordan">Jordan</option>
                          <option value="Kazakhstan">Kazakhstan</option>
                          <option value="Kenya">Kenya</option>
                          <option value="Kiribati">Kiribati</option>
                          <option
                            value="Korea, Democratic People's Republic of"
                          >
                            Korea, Democratic People's Republic of
                          </option>
                          <option value="Korea, Republic of">
                            Korea, Republic of
                          </option>
                          <option value="Kuwait">Kuwait</option>
                          <option value="Kyrgyzstan">Kyrgyzstan</option>
                          <option value="Lao People's Democratic Republic">
                            Lao People's Democratic Republic
                          </option>
                          <option value="Latvia">Latvia</option>
                          <option value="Lebanon">Lebanon</option>
                          <option value="Lesotho">Lesotho</option>
                          <option value="Liberia">Liberia</option>
                          <option value="Libyan Arab Jamahiriya">
                            Libyan Arab Jamahiriya
                          </option>
                          <option value="Liechtenstein">Liechtenstein</option>
                          <option value="Lithuania">Lithuania</option>
                          <option value="Luxembourg">Luxembourg</option>
                          <option value="Macao">Macao</option>
                          <option
                            value="Macedonia, The Former Yugoslav Republic of"
                          >
                            Macedonia, The Former Yugoslav Republic of
                          </option>
                          <option value="Madagascar">Madagascar</option>
                          <option value="Malawi">Malawi</option>
                          <option value="Malaysia">Malaysia</option>
                          <option value="Maldives">Maldives</option>
                          <option value="Mali">Mali</option>
                          <option value="Malta">Malta</option>
                          <option value="Marshall Islands">
                            Marshall Islands
                          </option>
                          <option value="Martinique">Martinique</option>
                          <option value="Mauritania">Mauritania</option>
                          <option value="Mauritius">Mauritius</option>
                          <option value="Mayotte">Mayotte</option>
                          <option value="Mexico">Mexico</option>
                          <option value="Micronesia, Federated States of">
                            Micronesia, Federated States of
                          </option>
                          <option value="Moldova, Republic of">
                            Moldova, Republic of
                          </option>
                          <option value="Monaco">Monaco</option>
                          <option value="Mongolia">Mongolia</option>
                          <option value="Montenegro">Montenegro</option>
                          <option value="Montserrat">Montserrat</option>
                          <option value="Morocco">Morocco</option>
                          <option value="Mozambique">Mozambique</option>
                          <option value="Myanmar">Myanmar</option>
                          <option value="Namibia">Namibia</option>
                          <option value="Nauru">Nauru</option>
                          <option value="Nepal">Nepal</option>
                          <option value="Netherlands">Netherlands</option>
                          <option value="Netherlands Antilles">
                            Netherlands Antilles
                          </option>
                          <option value="New Caledonia">New Caledonia</option>
                          <option value="New Zealand">New Zealand</option>
                          <option value="Nicaragua">Nicaragua</option>
                          <option value="Niger">Niger</option>
                          <option value="Nigeria">Nigeria</option>
                          <option value="Niue">Niue</option>
                          <option value="Norfolk Island">Norfolk Island</option>
                          <option value="Northern Mariana Islands">
                            Northern Mariana Islands
                          </option>
                          <option value="Norway">Norway</option>
                          <option value="Oman">Oman</option>
                          <option value="Pakistan">Pakistan</option>
                          <option value="Palau">Palau</option>
                          <option value="Palestinian Territory, Occupied">
                            Palestinian Territory, Occupied
                          </option>
                          <option value="Panama">Panama</option>
                          <option value="Papua New Guinea">
                            Papua New Guinea
                          </option>
                          <option value="Paraguay">Paraguay</option>
                          <option value="Peru">Peru</option>
                          <option value="Philippines">Philippines</option>
                          <option value="Pitcairn">Pitcairn</option>
                          <option value="Poland">Poland</option>
                          <option value="Portugal">Portugal</option>
                          <option value="Puerto Rico">Puerto Rico</option>
                          <option value="Qatar">Qatar</option>
                          <option value="Reunion">Reunion</option>
                          <option value="Romania">Romania</option>
                          <option value="Russian Federation">
                            Russian Federation
                          </option>
                          <option value="Rwanda">Rwanda</option>
                          <option value="Saint Helena">Saint Helena</option>
                          <option value="Saint Kitts and Nevis">
                            Saint Kitts and Nevis
                          </option>
                          <option value="Saint Lucia">Saint Lucia</option>
                          <option value="Saint Pierre and Miquelon">
                            Saint Pierre and Miquelon
                          </option>
                          <option value="Saint Vincent and The Grenadines">
                            Saint Vincent and The Grenadines
                          </option>
                          <option value="Samoa">Samoa</option>
                          <option value="San Marino">San Marino</option>
                          <option value="Sao Tome and Principe">
                            Sao Tome and Principe
                          </option>
                          <option value="Saudi Arabia">Saudi Arabia</option>
                          <option value="Senegal">Senegal</option>
                          <option value="Serbia">Serbia</option>
                          <option value="Seychelles">Seychelles</option>
                          <option value="Sierra Leone">Sierra Leone</option>
                          <option value="Singapore">Singapore</option>
                          <option value="Slovakia">Slovakia</option>
                          <option value="Slovenia">Slovenia</option>
                          <option value="Solomon Islands">
                            Solomon Islands
                          </option>
                          <option value="Somalia">Somalia</option>
                          <option value="South Africa">South Africa</option>
                          <option
                            value="South Georgia and The South Sandwich Islands"
                          >
                            South Georgia and The South Sandwich Islands
                          </option>
                          <option value="Spain">Spain</option>
                          <option value="Sri Lanka">Sri Lanka</option>
                          <option value="Sudan">Sudan</option>
                          <option value="Suriname">Suriname</option>
                          <option value="Svalbard and Jan Mayen">
                            Svalbard and Jan Mayen
                          </option>
                          <option value="Swaziland">Swaziland</option>
                          <option value="Sweden">Sweden</option>
                          <option value="Switzerland">Switzerland</option>
                          <option value="Syrian Arab Republic">
                            Syrian Arab Republic
                          </option>
                          <option value="Taiwan">Taiwan</option>
                          <option value="Tajikistan">Tajikistan</option>
                          <option value="Tanzania, United Republic of">
                            Tanzania, United Republic of
                          </option>
                          <option value="Thailand">Thailand</option>
                          <option value="Timor-leste">Timor-leste</option>
                          <option value="Togo">Togo</option>
                          <option value="Tokelau">Tokelau</option>
                          <option value="Tonga">Tonga</option>
                          <option value="Trinidad and Tobago">
                            Trinidad and Tobago
                          </option>
                          <option value="Tunisia">Tunisia</option>
                          <option value="Turkey">Turkey</option>
                          <option value="Turkmenistan">Turkmenistan</option>
                          <option value="Turks and Caicos Islands">
                            Turks and Caicos Islands
                          </option>
                          <option value="Tuvalu">Tuvalu</option>
                          <option value="Uganda">Uganda</option>
                          <option value="Ukraine">Ukraine</option>
                          <option value="United Arab Emirates">
                            United Arab Emirates
                          </option>
                          <option value="United Kingdom">United Kingdom</option>
                          <option value="United States" selected>
                            United States
                          </option>
                          <option value="United States Minor Outlying Islands">
                            United States Minor Outlying Islands
                          </option>
                          <option value="Uruguay">Uruguay</option>
                          <option value="Uzbekistan">Uzbekistan</option>
                          <option value="Vanuatu">Vanuatu</option>
                          <option value="Venezuela">Venezuela</option>
                          <option value="Viet Nam">Viet Nam</option>
                          <option value="Virgin Islands, British">
                            Virgin Islands, British
                          </option>
                          <option value="Virgin Islands, U.S.">
                            Virgin Islands, U.S.
                          </option>
                          <option value="Wallis and Futuna">
                            Wallis and Futuna
                          </option>
                          <option value="Western Sahara">Western Sahara</option>
                          <option value="Yemen">Yemen</option>
                          <option value="Zambia">Zambia</option>
                          <option value="Zimbabwe">Zimbabwe</option>
                        </select>
                      </div> -->
                      <!-- <div class="col-12 col-md-6">
                        <label for="inputYouTube" class="form-label"
                          >YouTube</label
                        >
                        <input
                          type="text"
                          class="form-control"
                          id="inputYouTube"
                          value="https://www.youtube.com/EthanLeo"
                        />
                      </div>
                      <div class="col-12 col-md-6">
                        <label for="inputX" class="form-label">X</label>
                        <input
                          type="text"
                          class="form-control"
                          id="inputX"
                          value="https://twitter.com/EthanLeo"
                        />
                      </div>
                      <div class="col-12 col-md-6">
                        <label for="inputFacebook" class="form-label"
                          >Facebook</label
                        >
                        <input
                          type="text"
                          class="form-control"
                          id="inputFacebook"
                          value="https://www.facebook.com/EthanLeo"
                        />
                      </div>
                      <div class="col-12 col-md-6">
                        <label for="inputLinkedIn" class="form-label"
                          >LinkedIn</label
                        >
                        <input
                          type="text"
                          class="form-control"
                          id="inputLinkedIn"
                          value="https://www.linkedin.com/EthanLeo"
                        />
                      </div> -->
                      <div class="col-12">
                        <label for="inputAbout" class="form-label">About</label>
                        <textarea class="form-control" rows="5" id="inputAbout">
                        Ethan Leo is a seasoned and results-driven Project Manager who brings experience and expertise to project management. With a proven track record of successfully delivering complex projects on time and within budget, Ethan Leo is the go-to professional for organizations seeking efficient and effective project leadership.</textarea
                        >
                      </div>
                      <div class="col-12">
                        <button type="submit" class="btn btn-primary">
                          Save Changes
                        </button>
                      </div>
                    </form>
                  </div>
                  <div
                    class="tab-pane fade"
                    id="email-tab-pane"
                    role="tabpanel"
                    aria-labelledby="email-tab"
                    tabindex="0"
                  >
                    <form action="#!">
                      <fieldset class="row gy-3 gy-md-0">
                        <legend class="col-form-label col-12 col-md-3 col-xl-2">
                          Email Alerts
                        </legend>
                        <div class="col-12 col-md-9 col-xl-10">
                          <div class="form-check">
                            <input
                              class="form-check-input"
                              type="checkbox"
                              id="emailChange"
                            />
                            <label class="form-check-label" for="emailChange">
                              Email Changed
                            </label>
                          </div>
                          <div class="form-check">
                            <input
                              class="form-check-input"
                              type="checkbox"
                              id="passwordChange"
                            />
                            <label
                              class="form-check-label"
                              for="passwordChange"
                            >
                              Password Changed
                            </label>
                          </div>
                          <div class="form-check">
                            <input
                              class="form-check-input"
                              type="checkbox"
                              id="weeklyNewsletter"
                            />
                            <label
                              class="form-check-label"
                              for="weeklyNewsletter"
                            >
                              Weekly Newsletter
                            </label>
                          </div>
                          <div class="form-check">
                            <input
                              class="form-check-input"
                              type="checkbox"
                              id="productPromotions"
                            />
                            <label
                              class="form-check-label"
                              for="productPromotions"
                            >
                              Product Promotions
                            </label>
                          </div>
                        </div>
                      </fieldset>
                      <div class="row">
                        <div class="col-12">
                          <button type="submit" class="btn btn-primary mt-4">
                            Save Changes
                          </button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <div
                    class="tab-pane fade"
                    id="password-tab-pane"
                    role="tabpanel"
                    aria-labelledby="password-tab"
                    tabindex="0"
                  >
                    <form action="#!">
                      <div class="row gy-3 gy-xxl-4">
                        <div class="col-12">
                          <label for="currentPassword" class="form-label"
                            >Mot de passe courant</label
                          >
                          <input
                            type="password"
                            class="form-control"
                            id="currentPassword"
                          />
                        </div>
                        <div class="col-12">
                          <label for="newPassword" class="form-label"
                            >Nouveau mot de passe</label
                          >
                          <input
                            type="password"
                            class="form-control"
                            id="newPassword"
                          />
                        </div>
                        <div class="col-12">
                          <label for="confirmPassword" class="form-label"
                            >Confirmation du mot de passe</label
                          >
                          <input
                            type="password"
                            class="form-control"
                            id="confirmPassword"
                          />
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

    <div
      class="dropdown position-fixed bottom-0 end-0 mb-3 me-3 bd-mode-toggle"
    >
      <button
        class="btn btn-bd-primary py-2 dropdown-toggle d-flex align-items-center"
        id="bd-theme"
        type="button"
        aria-expanded="false"
        data-bs-toggle="dropdown"
        aria-label="Toggle theme (light)"
      >
        <svg class="bi my-1 theme-icon-active" width="1em" height="1em">
          <use href="#sun-fill"></use>
        </svg>
        <span class="visually-hidden" id="bd-theme-text">Toggle theme</span>
      </button>
      <ul
        class="dropdown-menu dropdown-menu-end shadow"
        aria-labelledby="bd-theme-text"
        style=""
      >
        <li>
          <button
            type="button"
            class="dropdown-item d-flex align-items-center active"
            data-bs-theme-value="light"
            aria-pressed="true"
          >
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
          <button
            type="button"
            class="dropdown-item d-flex align-items-center"
            data-bs-theme-value="dark"
            aria-pressed="false"
          >
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
          <button
            type="button"
            class="dropdown-item d-flex align-items-center"
            data-bs-theme-value="auto"
            aria-pressed="false"
          >
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
        <path
          d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"
        />
      </symbol>
      <symbol id="circle-half" viewBox="0 0 16 16">
        <path d="M8 15A7 7 0 1 0 8 1v14zm0 1A8 8 0 1 1 8 0a8 8 0 0 1 0 16z" />
      </symbol>
      <symbol id="moon-stars-fill" viewBox="0 0 16 16">
        <path
          d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278z"
        />
        <path
          d="M10.794 3.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387a1.734 1.734 0 0 0-1.097 1.097l-.387 1.162a.217.217 0 0 1-.412 0l-.387-1.162A1.734 1.734 0 0 0 9.31 6.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387a1.734 1.734 0 0 0 1.097-1.097l.387-1.162zM13.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732l-.774-.258a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L13.863.1z"
        />
      </symbol>
      <symbol id="sun-fill" viewBox="0 0 16 16">
        <path
          d="M8 12a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z"
        />
      </symbol>
      <symbol id="bootstrap" viewBox="0 0 118 94">
        <title>Bootstrap</title>
        <path
          fill-rule="evenodd"
          clip-rule="evenodd"
          d="M24.509 0c-6.733 0-11.715 5.893-11.492 12.284.214 6.14-.064 14.092-2.066 20.577C8.943 39.365 5.547 43.485 0 44.014v5.972c5.547.529 8.943 4.649 10.951 11.153 2.002 6.485 2.28 14.437 2.066 20.577C12.794 88.106 17.776 94 24.51 94H93.5c6.733 0 11.714-5.893 11.491-12.284-.214-6.14.064-14.092 2.066-20.577 2.009-6.504 5.396-10.624 10.943-11.153v-5.972c-5.547-.529-8.934-4.649-10.943-11.153-2.002-6.484-2.28-14.437-2.066-20.577C105.214 5.894 100.233 0 93.5 0H24.508zM80 57.863C80 66.663 73.436 72 62.543 72H44a2 2 0 01-2-2V24a2 2 0 012-2h18.437c9.083 0 15.044 4.92 15.044 12.474 0 5.302-4.01 10.049-9.119 10.88v.277C75.317 46.394 80 51.21 80 57.863zM60.521 28.34H49.948v14.934h8.905c6.884 0 10.68-2.772 10.68-7.727 0-4.643-3.264-7.207-9.012-7.207zM49.948 49.2v16.458H60.91c7.167 0 10.964-2.876 10.964-8.281 0-5.406-3.903-8.178-11.425-8.178H49.948z"
        ></path>
      </symbol>
      <symbol id="facebook" viewBox="0 0 16 16">
        <path
          d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"
        ></path>
      </symbol>
      <symbol id="instagram" viewBox="0 0 16 16">
        <path
          d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"
        ></path>
      </symbol>
      <symbol id="twitter" viewBox="0 0 16 16">
        <path
          d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z"
        ></path>
      </symbol>
    </svg>

<?php include_once "footer.php"; ?>