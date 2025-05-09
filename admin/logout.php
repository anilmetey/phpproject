<?php
session_start();
session_unset();
session_destroy();
?>

<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="UTF-8">
  <title>Çıkış Yapıldı</title>
  <meta http-equiv="refresh" content="2;url=login.php"> <!-- 2 saniye sonra login'e gider -->
  <link rel="stylesheet" href="../css/adminstyle.css">
</head>
<body class="logout-body">
  <div class="logout-box">
    <h2>Başarıyla çıkış yaptınız.</h2>
    <p>Yönlendiriliyorsunuz...</p>
  </div>
</body>
</html>