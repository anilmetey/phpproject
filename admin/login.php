<?php
session_start();

if (isset($_POST['giris'])) {
    $kullanici = $_POST['kullanici'];
    $sifre = $_POST['sifre'];

    if ($kullanici === 'admin' && $sifre === '1234') {
        $_SESSION['admin'] = true;
        header("Location: dashboard.php");
        exit;
    } else {
        $hata = "Geçersiz kullanıcı adı veya şifre!";
    }
}
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Admin Giriş</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="../css/adminstyle.css">
</head>
<body class="login-body">
  <div class="login-box">
    <h2>Yönetici Girişi</h2>
    <?php if (isset($hata)) echo "<p class='form-error'>$hata</p>"; ?>

<form method="post" class="login-form">
    <label>Kullanıcı Adı:</label>
    <input type="text" name="kullanici" required>

    <label>Şifre:</label>
    <input type="password" name="sifre" required>

    <label><input type="checkbox" id="showPassword"> Şifreyi Göster</label>

    <button type="submit" name="giris">Giriş Yap</button>
</form>
<script>
document.getElementById('showPassword').addEventListener('change', function () {
  const passwordInput = document.querySelector('input[name="sifre"]');
  passwordInput.type = this.checked ? 'text' : 'password';
});
</script>

</body>
</html>
  </div>
</body>
</html>