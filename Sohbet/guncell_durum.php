<?php
    include('baglanti.php');
    session_start();

    $alici_id = $_POST['alici_id'];
    $yaziyormu = $_POST['yaziyormusun'];

    $sql = $conn->prepare("UPDATE kullanici SET yazilan_kisi = ?, yaziyormu = ? WHERE k_id = ?");
    $sql->execute([$alici_id, $yaziyormu, $_SESSION['user_id']]);
?>
