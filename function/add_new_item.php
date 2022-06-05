<?php 

    require './function.php';

    if(addNewItem($_POST) > 0){
        echo "
            <script>
                alert('produk berhasil ditambahkan')
                window.location.href = '../admin/index.php'
            </script>
        ";
    } else {
        echo "
            <script>
                alert('produk gagal ditambahkan')
                window.location.href = '../admin/index.php'
            </script>
        ";
    }

?>