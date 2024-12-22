<?php
include('baglanti.php');
session_start();

$alici = $_POST["alici_id"];
$gonderici = $_POST["gonderici_id"];
$last_message_id = isset($_POST['last_message_id']) ? $_POST['last_message_id'] : 0;

// Sadece son mesaj ID'sinden sonraki mesajları al
$sql = $conn->query("SELECT * FROM chat WHERE 
    ((alici_id = $alici AND gonderici_id = $gonderici) 
    OR 
    (alici_id = $gonderici AND gonderici_id = $alici))
    AND c_id > $last_message_id
    ORDER BY c_id ASC");

$messages = [];
while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
    $messages[] = $row;
}

$html = '';
foreach ($messages as $row) {
    if($row['gonderici_id'] == $_SESSION['user_id']) {
        $html .= '<li class="clearfix">
            <div class="message-data text-right">
                <span class="message-data-time">'.$row["mesaj_tarihi"].'</span>
                <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="avatar">
            </div>
            <div class="message other-message float-right">'.$row["mesaj"].'</div>
        </li>';
    } else {
        $html .= '<li class="clearfix">
            <div class="message-data">
                <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="avatar">
                <span class="message-data-time">'.$row["mesaj_tarihi"].'</span>
            </div>
            <div class="message my-message">'.$row["mesaj"].'</div>
        </li>';
    }
}

// Eğer hiç yeni mesaj yoksa boş HTML gönder
echo json_encode([
    'html' => $html,
    'last_message_id' => count($messages) > 0 ? end($messages)['c_id'] : $last_message_id
]);