<?php
    include('baglanti.php');
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $sql = $conn->query("SELECT * FROM kullanici");
        while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
            if($row['k_id'] == $_SESSION['user_id'])
            {
                continue;
            }
            else
            {
                ?>
                    <a href="chat.php?id=<?php echo $row['k_id']; ?>"><?php echo $row["adi"] . " " . $row["soyadi"]; ?></a>
                <?php
            }
        }
    ?>
</body>
</html>