<main>
      <div class="container">
            <div class="row">
                  <div class="col-md-9">
                        <form method="post" action="form/contact">
                              <div class="form-group">
                                    <label for="email" class="small text-muted mb-0">Email:</label>
                                    <input type="email" class="form-control rounded-0" id="email" placeholder="name@example.com" disabled>
                              </div>

                              <div class="form-group">
                                    <label for="message" class="small text-muted mb-0">Wiadomość:</label>
                                    <textarea class="form-control rounded-0" id="message" rows="3" placeholder="Twoja wiadomość" disabled></textarea>
                              </div>
                              <input type="submit" value="Wyślij" class="btn btn-outline-info rounded-0" disabled>
                        </form>

                        <div class='mt-5 small'>
                              <p>
                                    <i class='fas fa-at mr-2 orange'></i> <a href='mailto:wojciech@gawronsky.com.pl'>wojciech@gawronsky.com.pl</a>
                              </p>
                              <p>
                                    <i class='fas fa-mobile-alt mr-2 orange'></i> <a href='tel:+48693686600'>+48 693 686 600</a>
                              </p>
                        </div>

                  </div>
                  <div class="col-md-3">
                        <div class="jumbotron py-5 rounded-0 bg-transparent border border-info text-center mt-4">
                              <div id="day-name"></div>
                              <div id="date"></div>
                              <div id="time"></div>
                        </div>
                  </div>
            </div>
      </div>
</main>

<script src="js/time.js"></script>