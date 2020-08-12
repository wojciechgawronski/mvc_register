$('#loginForm').submit(function(e) {
      e.preventDefault();

      var url = '../model/login.php';
      var login = $('#login').val();
      var password = $('#password').val();

      var dataString = 'login=' + login + '&password=' + password;

      if (login == "" || password == "") {
            alert('Wypełnij wszytskie pola.');
      } else if (1) {
            $.ajax({
                  type: "POST",
                  url: url,
                  data: dataString,
                  success: function(data) {
                        alert(data);
                        if (data == 'zalogowany!')
                              window.location.reload();
                  },
                  error: function(data) {
                        alert('Wystapił błąd w komunikacji ajax.');
                  }
            });
      } else {
            alert('Coś poszło nie tak.');
      }
});