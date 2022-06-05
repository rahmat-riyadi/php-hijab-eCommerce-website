<?php 

    require './function.php';

    session_start();

    if(updateItem($_POST) > 0){
        reloadUserData($_SESSION['user']['id']);
        echo "
            <script>
                alert('data berhasil diperbaharui')
                window.location.href = '../pages/profile.php'
            </script>
        ";
    } else {
        echo "
            <script>
                alert('data gagal diperbaharui')
                window.location.href = '../pages/profile.php'
            </script>
        ";
    }

?>