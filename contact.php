<?php include("includes/header.php"); ?>
<?php include("includes/db.php"); ?>

<main>
  <!-- Hero -->
  <section class="contact-hero">
    <div class="container">
      <h1>Bizimle İletişime Geçin</h1>
      <p>Her türlü soru, teklif ve işbirliği için bize ulaşın.</p>
    </div>
  </section>

  <!-- Form -->
  <section class="contact-form-section">
    <div class="container">
      <?php
      if (isset($_POST['gonder'])) {
          $adsoyad = mysqli_real_escape_string($conn, $_POST['adsoyad']);
          $email   = mysqli_real_escape_string($conn, $_POST['email']);
          $konu    = mysqli_real_escape_string($conn, $_POST['konu']);
          $mesaj   = mysqli_real_escape_string($conn, $_POST['mesaj']);

          $sql = "INSERT INTO iletisim (adsoyad, email, konu, mesaj) VALUES ('$adsoyad', '$email', '$konu', '$mesaj')";
          $sonuc = mysqli_query($conn, $sql);

          if ($sonuc) {
              echo "<div class='form-success'>✅ Mesajınız başarıyla gönderildi!</div>";
          } else {
              echo "<div class='form-error'>❌ Bir hata oluştu. Lütfen tekrar deneyin.</div>";
          }
      }
      ?>

      <form method="post" class="contact-form">
        <label for="adsoyad">Ad Soyad</label>
        <input type="text" name="adsoyad" id="adsoyad" required>

        <label for="email">E-posta</label>
        <input type="email" name="email" id="email" required>

        <label for="konu">Konu</label>
        <input type="text" name="konu" id="konu">

        <label for="mesaj">Mesajınız</label>
        <textarea name="mesaj" id="mesaj" rows="6" required></textarea>

        <button type="submit" name="gonder">Gönder</button>
      </form>
    </div>
  </section>
</main>

<?php include("includes/footer.php"); ?>