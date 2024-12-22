<?php
    include('baglanti.php');
    session_start();

    $aliciID = $_GET["id"];
    $sql = $conn->query("SELECT * FROM kullanici WHERE k_id = $aliciID");
    $aliciBilgileri = $sql->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="asset/css/main.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"></head>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
<body>
    <div class="container">
        <div class="row clearfix">
            <div class="col-lg-12">
            <div class="chat">
                    <div class="chat-header clearfix">
                        <div class="row">
                            <div class="col-lg-6">
                                <a href="javascript:void(0);" data-toggle="modal" data-target="#view_info">
                                    <img src="https://bootdey.com/img/Content/avatar/avatar2.png" alt="avatar">
                                </a>
                                <div class="chat-about">
                                    <h6 class="m-b-0"><?=$aliciBilgileri["adi"]." ".$aliciBilgileri["soyadi"]?></h6>
                                    <small id="durum"></small>
                                </div>
                            </div>
                            <div class="col-lg-6 hidden-sm text-right">
                                <a href="javascript:void(0);" class="btn btn-outline-secondary"><i class="fa fa-camera"></i></a>
                                <a href="javascript:void(0);" class="btn btn-outline-primary"><i class="fa fa-image"></i></a>
                                <a href="javascript:void(0);" class="btn btn-outline-info"><i class="fa fa-cogs"></i></a>
                                <a href="javascript:void(0);" class="btn btn-outline-warning"><i class="fa fa-question"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="chat-history">
                        <ul class="m-b-0 mb-5" id="chat">
                            
                        </ul>
                    </div>
                    <div class="chat-message clearfix send">
                        <div class="input-group mb-0 ">
                            <div class="input-group-prepend">
                                <button type="button" id="sendBtn" onclick="msgGonder()" title="Bir şey yazın" class="input-group-text" disabled><i class="fa fa-send"></i></span>
                            </div>
                            <input type="text" id="msgText" class="form-control" placeholder="Bir Mesaj Yazın" >                                    
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var msgText = document.getElementById('msgText');
        var sendBtn = document.getElementById('sendBtn');
        var durum = document.getElementById('durum');
        console.log(msgText);
        console.log(sendBtn);
        msgText.addEventListener('input',()=>{
            if(msgText.value.trim() !== "")
            {
                durumguncelle('y');
                sendBtn.disabled = false;
                sendBtn.title = "Gönder";
            }
            else
            {
                durumguncelle('n');
                sendBtn.disabled = true;
                sendBtn.title = "Bir şey yazın";
            }

        });
    });
    
    $(document).on("keypress", "input", function(e){
        if(e.which == 13){
            msgGonder();
        }
    });

    setInterval(() => {
        durumKontrol();
    }, 1000);
    window.addEventListener('scroll', () => {
        const scrollPosition = window.scrollY + window.innerHeight;
        const pageHeight = document.body.scrollHeight;
        isUserScrollingUp = (scrollPosition < pageHeight - 100);
    });

    let lastMessageId = 0;
    let isUserScrollingUp = false;
    loadInitialMessages();

    function msgGonder()
    {
        $.ajax({
            url:'insert.php',
            type: "POST",
            data: {mesaj:msgText.value,
                gonderici_id:<?=$_SESSION["user_id"]?>,
                alici_id:<?=$aliciID?>
            }
            ,
            success: function(response) {
                window.scrollTo({
                    top: document.body.scrollHeight,
                    behavior: 'smooth'
                });
            },
        });
        msgText.value="";
        durumguncelle('n');
    }

    function loadInitialMessages() {
        $.ajax({
            url: 'return.php',
            type: "POST",
            dataType: 'json',
            data: {
                gonderici_id: <?=$_SESSION["user_id"]?>,
                alici_id: <?=$aliciID?>,
                last_message_id: 0
            },
            success: function(data) {
                document.getElementById('chat').innerHTML = data.html;
                lastMessageId = data.last_message_id;
                startLongPolling();
            }
        });

        
    }

    function startLongPolling() {
        $.ajax({
            url: 'return.php',
            type: "POST",
            dataType: 'json',
            data: {
                gonderici_id: <?=$_SESSION["user_id"]?>,
                alici_id: <?=$aliciID?>,
                last_message_id: lastMessageId
            },
            success: function(data) {
                if (data.html) {
                    const chatElement = document.getElementById('chat');
                    chatElement.insertAdjacentHTML('beforeend', data.html);
                    lastMessageId = data.last_message_id;
                    
                    if (!isUserScrollingUp) {
                        window.scrollTo({
                            top: document.body.scrollHeight,
                            behavior: 'smooth'
                        });
                    }
                }
                setTimeout(startLongPolling, 1000);
            },
            error: function() {
                setTimeout(startLongPolling, 5000);
            }
        });
    }
    function durumKontrol() {
        $.ajax({
            url: 'durum_kontrol.php',
            type: "POST",
            data: {
                alici_id: <?=$aliciID?>
            },
            success: function(response) {
                durum.innerHTML = response;
            }
        });
    }
    function durumguncelle(durum) {
        $.ajax({
            url:'guncell_durum.php',
            type: "POST",
            data: {alici_id:<?=$aliciID?>,
                yaziyormusun:durum
            }
        });
    }

</script>
</body>
</html>