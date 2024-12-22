<?php
include('baglanti.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $ad = $_POST['adi'];
    $soyad = $_POST['soyadi'];
    $kullanici_adi = $_POST['kullanici_adi'];
    $sifre = $_POST['sifre'];

    $query = $conn->prepare("INSERT INTO kullanici (adi, soyadi, kullanici_adi,sifre,k_trh) VALUES (?,?,?,?,?)");
    $today = date("Y-m-d");
    $execute = $query->execute([$ad,$soyad,$kullanici_adi,$sifre,$today]);

    if($execute) {         
        $_SESSION['message'] = "Kayıt başarıyla eklendi.";
    } else {         
        $_SESSION['message'] = "Beklenmedik bir hata oluştu.";
    } 
} 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kullanıcı Kayıt</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.15.2/sweetalert2.min.js" integrity="sha512-gtx8/kJpAsm7drqGdR5bl6CQtb+zzNY2wfWdzAe7wt0vCgFph7fX2ubCyxZn9CEGE/I9xasdwkaVPaKQGlq1Lw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"></head>

    <style>
        /* Form Stilleri */
        .content-wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .register-form {
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

        /* Alert Stilleri */
        .alert {
            z-index: 23074089 !important;
            max-width: 200px;
            position: fixed;
            top: 20px;
            right: 20px;
        }

        .alert-simple.alert-success {
            border: 1px solid rgba(36, 241, 6, 0.46);
            background-color: rgba(7, 149, 66, 0.12156862745098039);
            box-shadow: 0px 0px 2px #259c08;
            color: #0ad406;
            text-shadow: 2px 1px #00040a;
            transition: 0.5s;
            cursor: pointer;
        }

        .alert-success:hover {
            background-color: rgba(7, 149, 66, 0.35);
            transition: 0.5s;
        }

        .alert:before {
            content: '';
            position: absolute;
            width: 0;
            height: calc(100% - 44px);
            border-left: 1px solid;
            border-right: 2px solid;
            border-bottom-right-radius: 3px;
            border-top-right-radius: 3px;
            left: 0;
            top: 50%;
            transform: translate(0,-50%);
            height: 20px;
        }

        .start-icon {
            margin-right: 5px;
            font-size: 18px;
            color: #25ff0b;
            text-shadow: none;
        }
    </style>
</head>
<body>
    <div class="content-wrapper">
        <form method="post" action="" class="register-form">
            <center><h2 class="form-title">Kayıt ol </h2></center>
            <input type="text" class="form-control mb-3" name="adi" placeholder="İsim" class="form-input" required>
            <input type="text" class="form-control mb-3" name="soyadi" placeholder="Soyisim" class="form-input" required>
            <input type="text" class="form-control mb-3" name="kullanici_adi" placeholder="Kullanıcı Adı" class="form-input" required>
            <input type="password" class="form-control mb-3" name="sifre" placeholder="Şifre" class="form-input" required>
            <button type="submit" class="submit-button">Kayıt Ol</button>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            
        });
        <?php
            if($_POST){
                ?>
                Swal.fire({
                    title: "Good job!",
                    text: "You clicked the button!",
                    icon: "success",
                    confirmButtonText: "Tamam",
                        confirmButtonColor: "#4CAF50"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = 'giris.php';
                        }
                    });
                
                <?php
            }
        ?>
    </script>
</body>
</html>