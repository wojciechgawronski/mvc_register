<main>
      <div class="container">
            <div class="row">
            <div class="col-sm-6">
                  <form method="POST" action="login/createUser" id="loginForm">
                  <div class="form-group">
                        <label for="login" class='small mb-0 text-muted'>Email:</label>
                        <input disabled type="" name="login" class="form-control rounded-0" name="login" id="login" aria-describedby="loginHelp" placeholder="name@email.com">
                        <small id="loginHelp" class="form-text text-warning">
                              Link aktywujący konto otrzymasz na podany adres.</small>
                        </div>
                        <div class="form-group">
                              <label for="password" class='small mb-0 text-muted'>Password</label>
                              <input disabled type="password" name="password" class="form-control rounded-0" id="password" placeholder="Password">
                              <small id="passwordHelp" class="form-text text-warning">
                                    Hasło musi mieć minumum 5 znaków.</small>
                              </div>
                              
                              <button disabled type="submit" class="btn btn-primary mt-1 rounded-0">Zarejestruj</button>
                        </form>
                  </div>
            </div>
      </div>
</main>