<?php
include('baglanti.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $kullanici_adi = $_POST['kullanici_adi'];             
    $sifre = $_POST['password'];          
    
    $sql = $conn->prepare("SELECT * FROM kullanici WHERE kullanici_adi = ? AND sifre = ?");
    
    $sql->execute([$kullanici_adi, $sifre]);

    $row = $sql->fetch(PDO::FETCH_ASSOC);

    if ($row) {
        session_start();
        $_SESSION['user_id'] = $row['k_id'];
        $_SESSION['username'] = $row['kullanici_adi'];
        $_SESSION['adi'] = $row['adi'];
        $_SESSION['soyadi'] = $row['soyadi'];
        header('Location: anasayfa.php');
        exit;
    } else {
        echo "Hatalı bilgiler";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giriş Yap</title>
    <style>
        .content-wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .login-form {
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            padding: 30px;
            width: 300px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            background: white;
        }

        .form-input {
            width: 100%;
            padding: 8px 12px;
            margin: 8px 0;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .submit-button {
            width: 100%;
            padding: 10px;
            background: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 15px;
        }

        .submit-button:hover {
            background: #45a049;
        }

        .register-link {
            text-align: center;
            margin-top: 15px;
        }

        .register-link a {
            color: #4CAF50;
            text-decoration: none;
        }

        .register-link a:hover {
            text-decoration: underline;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"></head>

</head>
<body>
    <div class="content-wrapper">
        <form method="post" class="login-form">
            <h2 class="form-title">Giriş Yap</h2>
            <input type="text" class="form-control mb-3" name="kullanici_adi" placeholder="Kullanıcı Adı" class="form-input" required>
            <input type="password" class="form-control mb-3" name="password" placeholder="Şifre" class="form-input" required>
            <button type="submit" class="submit-button">Giriş Yap</button>
            
            <div class="register-link">
                Hesabınız yok mu? <a href="kayit.php">Kayıt Ol</a>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>