<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}

include("../includes/admin.php");
include("../includes/db.php");

// MESAJ SİLME
if (isset($_POST['sil_id'])) {
    $sil_id = intval($_POST['sil_id']); // güvenlik için int'e çevir
    $sorgu = "DELETE FROM iletisim WHERE id = $sil_id";
    mysqli_query($conn, $sorgu);
    header("Location: dashboard.php");
    exit;
}

$sonuc = mysqli_query($conn, "SELECT * FROM iletisim ORDER BY tarih DESC");
?>

<main class="admin-dashboard">
  <div class="container">
    <h2>Gelen Mesajlar</h2>

    <table class="admin-table">
      <tr>
        <th>ID</th>
        <th>Ad Soyad</th>
        <th>Email</th>
        <th>Konu</th>
        <th>Mesaj</th>
        <th>Tarih</th>
        <th>İşlem</th>
      </tr>

      <?php while ($row = mysqli_fetch_assoc($sonuc)) { ?>
        <tr>
          <td><?= $row['id'] ?></td>
          <td><?= htmlspecialchars($row['adsoyad']) ?></td>
          <td><?= htmlspecialchars($row['email']) ?></td>
          <td><?= htmlspecialchars($row['konu']) ?></td>
          <td><?= nl2br(htmlspecialchars($row['mesaj'])) ?></td>
          <td><?= $row['tarih'] ?></td>
          <td>
            <form method="post" onsubmit="return confirm('Silmek istediğinize emin misiniz?');">
              <input type="hidden" name="sil_id" value="<?= $row['id'] ?>">
              <button type="submit" class="delete-btn">Sil</button>
            </form>
          </td>
        </tr>
      <?php } ?>
    </table>
  </div>
</main>

<?php include("../includes/footer.php"); ?>