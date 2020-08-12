<main>
      <div class="container">
            <div class="row">
                  <div class="col-sm-9 col-md-6">
                        <!-- <form method="POST" action="modelAjax/login"> -->
                        <form method="POST" action="login/loginAction">
                              <div class="form-group">
                                    <label for="email" class='small mb-0 text-muted'>Email:</label>
                                    <input type="email" name="email" required class="form-control rounded-0" id="email" aria-describedby="emailHelp" placeholder="email" 
                                    value="<?php echo $email ?? ''; ?>">
                                    <small class="form-text text-warning">
                                          Email podany podczas rejestracji</small>

                              </div>
                              <div class="form-group">
                                    <label for="password" class='small mb-0 text-muted'>Password</label>
                                    <div class="input-group">
                                          <input type="password" name="password" required class="form-control rounded-0" id="password" placeholder="Password" minlength="5">
                                          <div class="input-group-prepend">
                                                <div id="showHidePass" class="input-group-text">
                                                      <i class="far fa-eye"></i>
                                                </div>
                                          </div>
                                    </div>
                                    <small class="form-text text-warning">
                                          Hasło musi mieć minumum 5 znaków.</small>
                              </div>

                              <button type="submit" class="btn btn-primary rounded-0">Zaloguj</button>
                              <div class="form-check mt-4">
                                    <input disabled type="checkbox" class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">Zapamiętaj mnie</label>
                              </div>
                        </form>
                        <p class="mt-4">
                              <a disabled href="login" class="i text-info">Zapomniałem hasła</a>
                        </p>
                  </div>
            </div>
      </div>
</main>