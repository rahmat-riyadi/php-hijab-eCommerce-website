<?php 

    require './function.php';

    session_start();

    if(addItem($_GET['id'], $_SESSION['user']['id'], $_GET['kuantitas'] ?? 1) > 0){
        echo "
            <script>
                alert('item dimasukan ke keranjang')
                window.location.href = '../pages/hijab.php?category=all-c&harga=all-p
            </script>
        ";
    } else {
        echo "
            <script>
                alert('item gagal dimasukan ke keranjang')
                window.location.href = '../pages/hijab.php?category=all-c&harga=all-p
            </script>
        ";
    }

?>