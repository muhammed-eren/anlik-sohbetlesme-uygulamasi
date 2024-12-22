<?php
    include('baglanti.php');
    session_start();
    if (!isset($_POST['alici_id'])) {
        echo "Hata: alici_id eksik.";
        exit;
    }
    
    $alici = $_POST["alici_id"];
    $stmt = $conn->prepare("SELECT yaziyormu, yazilan_kisi FROM kullanici WHERE yazilan_kisi = :alici");
    $stmt->bindParam(':alici', $_SESSION['user_id'], PDO::PARAM_INT);
    $stmt->execute();
    
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($row && $row["yaziyormu"] === "y") {
        echo "Yazıyor...";
    } else {
        echo "Durum yok.";
    }
?>