<main>
      <div class="container">
            <div class="row">

                  <div class="col-sm-9 col-md-6">
                        <?php
                        if (isset($user)) {
                              if (isset($user->errors)) {
                                    echo "<ul type='square' class='small ul-square'>";
                                    foreach ($user->errors as $error) {
                                          echo "<li>$error</li>";
                                    }
                                    echo "</ul>";
                              }
                        }
                        ?>
                        <form method="POST" action="login/signupUser" id="loginForm">

                              <div class="form-group mb-0">
                                    <label for="email" class='small mb-0 text-muted'>Email:</label>
                                    <input required type="email" name="email" class="form-control rounded-0" id="email" aria-describedby="emailHelp" placeholder="name@email.com" value="<?php echo $user->email ?? ''; ?>">
                                    <small id="emailHelp" class="form-text text-warning pb-0">
                                          Link aktywujący konto otrzymasz na podany adres @.
                                    </small>
                              </div>

                              <div class="form-group mb-0">
                                    <label for="password" class='small mb-0 text-muted'>Password</label>
                                    <div class="input-group">
                                          <input required type="password" name="password" class="form-control rounded-0" id="password" placeholder="Password" placeholder="Password" pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{6,}$" title="Minimum 5 znaków, przynajmniej jedna iczba i cyfra">
                                          <div class="input-group-prepend">
                                                <div id="showHidePass" class="input-group-text">
                                                      <i class="far fa-eye"></i>
                                                </div>
                                          </div>
                                    </div>
                                    <small id="passwordHelp" class="form-text text-warning">
                                          Hasło musi mieć minumum 5 znaków, w tym 1 <b>literę</b> i 1 <b>cyfrę</b>.
                                    </small>
                              </div>

                              <div class="form-group w-50">
                                    <label for="verification" class='small mb-0 text-muted'>Podaj wynik:</label>
                                    <input required type="text" name="verificationNumber" class="form-control rounded-0" id="verification" aria-describedby="loginHelp" placeholder="">
                                    <input type="hidden" id="confirmation" name="confirmationNumber">
                                    <small id="loginHelp" class="form-text text-warning">
                                          Aby utworzyć konto podaj poprawny wynik
                                    </small>
                              </div>

                              <button type="submit" class="btn btn-primary mt-1 rounded-0">Zarejestruj</button>

                        </form>

                  </div>
            </div>
      </div>
</main>