/**
 * Show / hide password
 * https://codepen.io/Wellington-Roth/pen/rNNVBBy
 */
const PassBtn = document.querySelector('#showHidePass');
PassBtn.addEventListener('click', () => {

      const input = document.querySelector('#password');
      input.getAttribute('type') === 'password' ? input.setAttribute('type', 'text') : input.setAttribute('type', 'password');
});

/**
 * Verification
 */
const number1 = Math.floor(Math.random() * 10);
const number2 = Math.floor(Math.random() * 10);
const result = number1 + number2;


$("#verification").attr("placeholder", number1 + " + " + number2 + " = ");
$("#confirmation").val(result);

/**
 * https://stackoverflow.com/questions/22763746/jquery-preventdefault-not-working-inside-ajax-call
 */
$('#loginForm').submit(function (e) {

      var rawFormElement = this; // Remember the DOM element for the form

      e.preventDefault();

      var formResult = $("#verification").val();
      var email = $('#email').val();
      var password = $('#password').val();
      var error = '';

      if (email == "" || password == "" || formResult == "") {
            error += 'Wypełnij wszytskie pola.';
      }
      if (formResult != result) {
            error += "\nPodaj popwawny wynik działania: " + number1 + " + " + number2 + " = ";
      }
      if (password.length < 5) {
            error += "\nZbyt krótkie hasło, hasło msi miec minimum 5 znaków";
      }


      if (error == '') {
            $.ajax({
                  type: "POST",
                  url: "login/validateEmail/" + email,
                  success: function (data) {
                        // alert(data);
                        if (data == true)
                              // All okay, go ahead and submit the form
                              rawFormElement.submit(); // Doesn't trigger 'submit' handler
                        else if (data == false) {
                              alert("Podany email jest już zajęty, zmień email.");

                        }
                        else {
                              alert('Nie można się zarejestrować, Coś poszło nie tak..');
                        }
                  },
                  error: function (data) {
                        alert('Wystapił błąd w komunikacji ajax.');
                  }
            });

      }
      else {
            alert(error);

      }
});