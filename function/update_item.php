<?php 

    require './function.php';

    session_start();

    if(updateItem($_POST) > 0){
        echo "
            <script>
                alert('data berhasil diperbaharui')
                window.location.href = '../admin/index.php'
            </script>
        ";
    } else {
        echo "
            <script>
                alert('data gagal diperbaharui')
                window.location.href = '../admin/index.php'
            </script>
        ";
    }

?>