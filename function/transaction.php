<?php 

    session_start();

    require '../PHPMailer/src/PHPMailer.php';
    require '../PHPMailer/src/Exception.php';
    require '../PHPMailer/src/SMTP.php';
    require './function.php';

    use PHPMailer\PHPMailer\PHPMailer;

    $id = $_SESSION['user']['id'];

    $data = query("SELECT * FROM keranjang WHERE id_user = $id");

    userCheckOutValidation($_POST['password_transaksi'], $_SESSION['user']['password_transaksi']);

    $msg = "<script>
                alert('gagal checkout barang')
                window.location.href = '../pages/keranjang.php
            </script>";

    if(addToPembelian($data, $_SESSION['user']['id']) <= 0)
        echo $msg;
    
    if(checkoutItem($_SESSION['user']['id']) <= 0)
        echo $msg;

    // $email_pengirim = 'hijabkucompany@gmail.com';
    // $nama = 'Hijabku Company';
    // $pesan = 'barang telah di checkout';

    // $email = new PHPMailer;
    // $email->isSMTP();

    // $email->Host = 'smtp.gmail.com';
    // $email->SMTPAuth = true;
    // $email->Username = 'hijabkucompany@gmail.com';
    // $email->Password = 'makassar010222';
    // $email->SMTPSecure = 'tls';
    // $email->Port = 587;

    // $email->setFrom($email_pengirim, $nama);
    // $email->Subject = 'checkout barang';
    // $email->addAddress($_SESSION['user']['email']);
    // $email->isHTML(true);

    // $email->Body = $pesan;

    // ob_start();
    //     require '../pages/email.php';

    //     $content = ob_get_contents();

    // ob_end_clean();

    // $email->Body = $content;

    // if(!$email->send()){

    //     var_dump($email->ErrorInfo);
    //     die;
        
    // } else {
    //     echo "
    //         <script>
    //             alert('berhasil')
    //             window.location.href = '../pages/keranjang.php'
    //         </script>
    //     ";
    // }
    
    echo "
        <script>
            alert('berhasil')
            window.location.href = '../pages/keranjang.php'
        </script>
    ";



?>