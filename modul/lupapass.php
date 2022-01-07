<title>Lupa Password</title>
<?php
    switch($_GET[act]){
        default:
        echo "
        <div class='authincation>
            <div class='container-fluid>
                <div class='row justify-content-center align-items-center'>
                    <div class='col-md-6'>
                        <div class='authincation-content'>
                            <div class='row no-gutters'>
                                <div class='col-xl-12'>
                                    <div class='auth-form'>
                                        <h4 class='text-center mb-4'>Apakah kamu lupa password?</h4>
                                        <p class='mb-4' align='center'>Kami sudah tahu, apa yang terjadi. Kamu hanya perlu memasukan username-mu dan kami akan memberikan solusinya!</p>
                                        <form method='post' action='?module=lupa&act=pertanyaan'>
                                            <div class='form-group'>
                                                <input type='text' name='username' id='username' class='form-control' placeholder='Enter a username..'' required>
                                            </div>
                                            <div class='text-center'>
                                                <input type='submit' name='submit' value='Lanjutkan' class='btn btn-danger btn-block'>
                                            </div>
                                        </form>
                                        <div class='new-account mt-3'>
                                            <p>Jika sudah memiliki akun? <a class='text-success' onclick=\"window.location.href='?module=formlogin';\">Login</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>";
        break;

        case "pertanyaan":
            include "config/koneksi.php";
            $username = $_POST['username'];
    
            $qry = mysql_query("SELECT * FROM admin WHERE username='$username'");
            $cek = mysql_num_rows($qry);

            if($cek>0){
                $data = mysql_fetch_array($qry);
        echo "  <div class='authincation'>
                    <div class='container-fluid'>
                        <div class='row justify-content-center align-items-center'>
                            <div class='col-md-6'>
                                <div class='authincation-content'>
                                    <div class='row no-gutters'>
                                        <div class='col-xl-12'>
                                            <div class='auth-form'>
                                                <h4 class='text-center mb-4'>Jawab Pertanyaan Rahasia!</h4>
                                                <p class='mb-4' align='center'>Jawab pertanyaan rahasia tersebut. Jawaban hanya kamu saja yang tahu!</p>
                                                <form action='?module=lupa&act=ubah' method='post'>
                                                    <input  name='username' value='".$username."' type='hidden'>
                                                    <div class='form-group'>
                                                        <label><strong>"; echo "$data[pertanyaan]"; echo"</strong></label>
                                                        <input type='text' name='jawaban' class='form-control' placeholder='Enter your answer..' required>
                                                    </div>
                                                    <div class='text-center'>
                                                        <input type='submit' name='ubah' value='Lanjutkan' class='btn btn-danger btn-block'>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> ";
            } else {
                echo "<meta http-equiv=\"refresh\" content=\"0; url=?module=lupa&act=lupa2\">";
            }
        break;

        case "lupa2":
        echo "
        <div class='authincation>
            <div class='container-fluid>
                <div class='row justify-content-center align-items-center'>
                    <div class='col-md-6'>
                        <div class='authincation-content'>
                            <div class='row no-gutters'>
                                <div class='col-xl-12'>
                                    <div class='auth-form'>
                                        <h4 class='text-center mb-4'>Apakah kamu lupa password?</h4>
                                        <p class='mb-4' align='center'>Kami sudah tahu, apa yang terjadi. Kamu hanya perlu memasukan username-mu dan kami akan memberikan solusinya!</p>
                                        <form method='post' action='?module=lupa&act=pertanyaan'>
                                            <div class='alert alert-danger alert-dismissible alert-alt fade show'>
                                                <button type='button' class='close h-100' data-dismiss='alert' aria-label='Close'><span><i class='mdi mdi-close'></i></span>
                                                </button>
                                                <strong>Gagal!</strong> Username anda salah.
                                            </div>
                                            <div class='form-group'>
                                                <input type='text' name='username' id='username' class='form-control' placeholder='Enter a username..'' required>
                                            </div>
                                            <div class='text-center'>
                                                <input type='submit' name='submit' value='Lanjutkan' class='btn btn-danger btn-block'>
                                            </div>
                                        </form>
                                        <div class='new-account mt-3'>
                                            <p>Jika sudah memiliki akun? <a class='text-success' onclick=\"window.location.href='?module=formlogin';\">Login</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>";
        break;

        case "pertanyaan2":
            include "config/koneksi.php";
            $username = $_GET['u'];
    
            $qry = mysql_query("SELECT * FROM admin WHERE username='$username'");
            $cek = mysql_num_rows($qry);

            if($cek>0){
                $data = mysql_fetch_array($qry);
        echo "  <div class='authincation'>
                    <div class='container-fluid'>
                        <div class='row justify-content-center align-items-center'>
                            <div class='col-md-6'>
                                <div class='authincation-content'>
                                    <div class='row no-gutters'>
                                        <div class='col-xl-12'>
                                            <div class='auth-form'>
                                                <h4 class='text-center mb-4'>Jawab Pertanyaan Rahasia!</h4>
                                                <p class='mb-4' align='center'>Jawab pertanyaan rahasia tersebut. Jawaban hanya kamu saja yang tahu!</p>
                                                <form action='?module=lupa&act=ubah' method='post'>
                                                    <input  name='username' value='".$username."' type='hidden'>
                                                    <div class='alert alert-danger alert-dismissible alert-alt fade show'>
                                                        <button type='button' class='close h-100' data-dismiss='alert' aria-label='Close'><span><i class='mdi mdi-close'></i></span>
                                                        </button>
                                                        <strong>Gagal!</strong> Jawaban anda tidak cocok.
                                                    </div>
                                                    <div class='form-group'>
                                                        <label><strong>"; echo "$data[pertanyaan]"; echo"</strong></label>
                                                        <input type='text' name='jawaban' class='form-control' placeholder='Enter your answer..' required>
                                                    </div>
                                                    <div class='text-center'>
                                                        <input type='submit' name='ubah' value='Lanjutkan' class='btn btn-danger btn-block'>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> ";
            } else {
                echo "<meta http-equiv=\"refresh\" content=\"0; url=?module=lupa&act=pertanyaan2\">";
            }
        break;

        case "ubah":
            function clean($str) {
                $str = @trim($str);
                if(get_magic_quotes_gpc()) {
                    $str = stripslashes($str);
                }
                return mysql_real_escape_string($str);
            }
            $username = $_POST['username'];
            $jawaban  = clean($_POST['jawaban']);

            $cek = mysql_num_rows(mysql_query("SELECT * FROM admin WHERE username='$username' and jawaban='".md5($_POST['jawaban'])."'"));

            if ($cek>0){
        echo "  <div class='authincation'>
                    <div class='container-fluid'>
                        <div class='row justify-content-center align-items-center'>
                            <div class='col-md-6'>
                                <div class='authincation-content'>
                                    <div class='row no-gutters'>
                                        <div class='col-xl-12'>
                                            <div class='auth-form'>
                                                <h4 class='text-center mb-4'>Buat Password Baru?</h4>
                                                <p class='mb-4' align='center'>Masukan password baru kamu dan login kembali!</p>
                                                <form action='?module=lupa&act=acubah&u=".$username."' method='post' class='form-valide'>
                                                    <div class='form-group row'>
                                                        <label class='col-lg-4 col-form-label' for='val-username'>Username<span class='text-danger'>*</span></label>
                                                        <div class='col-lg-8'>
                                                            <input type='text' class='form-control' id='val-username' name='val-username' placeholder='Enter a username..' value='".$username."' disabled>
                                                        </div>
                                                    </div>
                                                    <div class='form-group row'>
                                                        <label class='col-lg-4 col-form-label' for='val-password-new'>Password Baru<span class='text-danger'>*</span></label>
                                                        <div class='col-lg-8'>
                                                            <input type='password' class='form-control' id='val-password-new' name='val-password-new'>
                                                        </div>
                                                    </div>
                                                    <div class='form-group row'>
                                                        <label class='col-lg-4 col-form-label' for='val-confirm-password'>Konfirmasi Password Baru <span class='text-danger'>*</span></label>
                                                        <div class='col-lg-8'>
                                                            <input type='password' class='form-control' id='val-confirm-password' name='val-confirm-password'>
                                                        </div>
                                                    </div>
                                                    <div class='text-center'>
                                                        <input type='submit' name='ubah' value='Simpan' class='btn btn-success text-white btn-block'>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>";
            } else {
                echo  "<meta http-equiv=\"refresh\" content=\"0; url=?module=lupa&u=$username&act=pertanyaan2\">";
            }
        break;

        case "acubah":
            $username = $_GET['u'];
            $password = $_POST['val-password-new'];

            $qry= mysql_query("UPDATE admin SET password='".md5($_POST['val-password-new'])."' WHERE username='$username'");

            if($qry){
                echo '<script language="javascript" type="text/javascript">alert("Terima Kasih, Proses Ubah Password Anda Berhasil Disimpan Silahkan Login !");</script>';
                echo "<meta http-equiv=\"refresh\" content=\"0; url=index.php?module=formlogin\">";
            } else {
                echo '<script language="javascript" type="text/javascript">alert("Proses Ubah Password Anda Gagal Disimpan !");</script>';
                echo "<meta http-equiv=\"refresh\" content=\"0; url=index.php?module=formlogin\">";
            }
        break;
    }
?>
