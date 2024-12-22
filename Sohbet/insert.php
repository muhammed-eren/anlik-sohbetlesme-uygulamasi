<?php
	include('baglanti.php');
    $alici_id = (int)$_POST['alici_id'];
    $gonderici_id = (int)$_POST['gonderici_id'];
    $mesaj = htmlspecialchars($_POST['mesaj'], ENT_QUOTES, 'UTF-8');

    $stmt = $conn->prepare("INSERT INTO chat (alici_id, gonderici_id, mesaj,mesaj_tarihi) VALUES (?, ?, ? ,?)");
    $stmt->execute([$alici_id, $gonderici_id, $mesaj,date('H:i')]);
    exit;
?>