<script type="text/javascript">
  function Blank_TextField_Validator() {
    if (text_form.username.value == "") {
      alert("Isi dulu username !");
      text_form.username.focus();
      return (false);
    }
    if (text_form.password.value == "") {
      alert("Isi dulu password !");
      text_form.password.focus();
      return (false);
    }
    return (true);
  }
  -->
</script>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Login Akun</title>
</head>
<body>
  <div class="authincation">
      <div class="container-fluid">
          <div class="row justify-content-center align-items-center">
              <div class="col-md-6">
                  <div class="authincation-content">
                      <div class="row no-gutters">
                          <div class="col-xl-12">
                              <div class="auth-form">
                                  <h4 class="text-center mb-4">Masuk ke Akun Anda!</h4>
                                  <form action="login.php" method="post" name="text_form" onsubmit="return Blank_TextField_Validator()">
                                      <div class="form-group">
                                          <label><strong>Username</strong></label>
                                          <input type="text" name="username" id="username" placeHolder="Masukkan username anda" style="font-family:Arial, FontAwesome" class="form-control" required="Username masih kosong!">
                                      </div>
                                      <div class="form-group">
                                          <label><strong>Password</strong></label>
                                          <input type="password" name="password" id="password" placeHolder="Masukkan password anda" style="font-family:Arial, FontAwesome" class="form-control" required="Password masih kosong!">
                                      </div>
                                      <div class="form-row d-flex justify-content-between mt-4 mb-2">
                                          <div class="form-group">
                                              <div class="form-check ml-2">
                                              </div>
                                          </div>
                                          <div class="form-group">
                                              <a <?php if ($module == "lupa") echo 'class="active"'; ?> href="lupa">Lupa Password?</a>
                                          </div>
                                      </div>
                                      <div class="text-center">
                                          <input type="submit" name="login" id="login" value="Sign me in" class="btn btn-success btn-block text-white" onclick="radio_box(this.form)">
                                      </div>
                                  </form>
                                  <!--<div class="new-account mt-3">
                                      <p>Jika belum memiliki akun? <a class="text-success" href="index.php?page=4&act=daftar">Daftar</a></p>
                                  </div>-->
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</body>
</html>

<script>
  $('input[type="password"]').on('focus', () => {
    $('*').addClass('password');
  }).on('focusout', () => {
    $('*').removeClass('password');
  });;
  </script>
  <script>
  var d = document.getElementById("pakarjambu");
  d.className += " sidebar-collapse";
</script>