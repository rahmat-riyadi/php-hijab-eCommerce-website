<?php

    $db = mysqli_connect('localhost', 'root', '', 'hijabku_db');

    function query($query){

        global $db;

        $data = [];
        $result = mysqli_query($db, $query);
        while( $row = mysqli_fetch_assoc($result) ){
            $data[] = $row;
        }

        return $data;

    }

    function addItem($id, $userId, $kuantitas = 1){

        global $db;

        $waktu = date('Y-m-d');

        $data = query("SELECT * FROM keranjang WHERE id_user = '$userId' AND id_produk = '$id'");

        if(empty($data)){
            $query = "INSERT INTO keranjang VALUES ('', $userId, $id, $kuantitas, '$waktu')";
        } else {

            $jumlah = $data[0]['kuantitas'] + $kuantitas;

            $query = "UPDATE keranjang SET kuantitas = '$jumlah' WHERE id_user = '$userId' AND id_produk = '$id'";
        }


        mysqli_query($db, $query);

        return mysqli_affected_rows($db);

    }

    function deleteItem($id, $userId){
        global $db;
        $query = "DELETE FROM keranjang WHERE id_produk = '$id' AND id_user = '$userId'";
        mysqli_query($db, $query);
        return mysqli_affected_rows($db);
    }
    
    function addToPembelian($data, $userId){
        
        global $db;

        foreach($data as $item){

            $produkId = $item['id_produk'];
            $kuantitas = $item['kuantitas'];
            $tgl_pembelian = $item['waktu_masuk'];
            $query = "INSERT INTO pembelian VALUES ('', $userId, $produkId, $kuantitas, '$tgl_pembelian')";
            mysqli_query($db, $query);

        }

        return mysqli_affected_rows($db);

    }

    function checkoutItem($userId){
        global $db;
        mysqli_query($db, "DELETE FROM keranjang WHERE id_user = '$userId'");
        return mysqli_affected_rows($db);
    }

    function registration($data){

        global $db;

        $nama = $data['nama'];
        $email = $data['email'];
        $username = $data['username'];
        $password = $data['password'];
        $password_transaksi = $data['password_transaksi'];

        $query = "INSERT INTO user VALUES ('', '$nama', '$email', '$username', '$password', '$password_transaksi', '')";

        mysqli_query($db, $query);

        return mysqli_affected_rows($db);

    }

    function updateProfile($data){

        global $db;

        if($_FILES['gambar']['name'] != ''){
            
            $gambar_loc = $_FILES['gambar']['tmp_name'];
            $gambar = $data['nama'] . '-' . $_FILES['gambar']['name'];
            $gambar = str_replace(" ", "-", $gambar);
            move_uploaded_file($gambar_loc, '../assets/users/' . $gambar);

        } else {
            $gambar = $_SESSION['user']['gambar'] ?? null;
        }

        $id = $data['id'];
        $nama = $data['nama'];  
        $email = $data['email'];
        $username = $data['username'];
        $password = $data['password'];
        $password_transaksi = $data['password_transaksi'];

        $query = "UPDATE user SET nama = '$nama', email = '$email', username = '$username', password = '$password', password_transaksi = '$password_transaksi', gambar = '$gambar' WHERE id = '$id'";

        mysqli_query($db, $query);

        return mysqli_affected_rows($db);

    }

    function addNewItem($data){

        global $db;

        $gambar_loc = $_FILES['gambar']['tmp_name'];
        $gambar = $data['produk'] . '-' . $_FILES['gambar']['name'] ?? null;
        $gambar = str_replace(" ", "-", $gambar);
        move_uploaded_file($gambar_loc, '../assets/produk/' . $gambar);

        $produk = $_POST['produk'];
        $harga = $_POST['harga'];
        $desk_produk = $_POST['desk_produk'];
        $categori = $_POST['id_kategori'];

        $query = "INSERT INTO hijab VALUES ('', '$produk', '$categori', '$gambar', '$harga', '$desk_produk')";

        mysqli_query($db, $query);

        return mysqli_affected_rows($db);

    }

    function updateItem($data){

        global $db;

        if($_FILES['gambar']['name'] != ''){
            
            $gambar_loc = $_FILES['gambar']['tmp_name'];
            $gambar = $data['produk'] . '-' . $_FILES['gambar']['name'];
            $gambar = str_replace(" ", "-", $gambar);
            move_uploaded_file($gambar_loc, '../assets/product/' . $gambar);

        } else {
            $gambar = $_SESSION['gambar_tmp'] ?? null;
        }

        $id = $data['id'];
        $produk = $data['produk'];  
        $harga = $data['harga'];
        $id_kategori = $data['id_kategori'];
        $desk_produk = $data['desk_produk'];

        $query = "UPDATE hijab SET produk = '$produk', id_kategori = '$id_kategori', harga = '$harga', desk_produk = '$desk_produk', gambar = '$gambar' WHERE id = '$id'";

        mysqli_query($db, $query);

        return mysqli_affected_rows($db);

    }

    function reloadUserData($id){

        $data = query("SELECT * FROM `user` WHERE id = '$id'");

        $_SESSION['user']= [
            'id' => $data[0]['id'],
            'nama' => $data[0]['nama'],
            'gambar' => $data[0]['gambar'],
            'email' => $data[0]['email'],
            'username' => $data[0]['username'],
            'password' => $data[0]['password'],
            'password_transaksi' => $data[0]['password_transaksi'],
        ];

        return (isset($_SESSION['user']) && !empty($_SESSION['user']));
    }

    function userCheckOutValidation($pass, $password_transaksi){
        if($pass !== $password_transaksi){
            echo "
                <script>
                    alert('password transaksi salah')
                    window.location.href = '../pages/keranjang.php'
                </script>
            ";
        }
    }

?>