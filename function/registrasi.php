<?php

    require './function.php';

    if(registration($_POST) > 0){

        echo "
            <script>
                alert('registrasi berhasil')
            </script>
        ";
        
        header('Location: ../index.php');
    } else {
        echo "
        <script>
            alert('registrasi gagal')
        </script>
        ";
        header('Location: ../index.php');
        
    }

?>