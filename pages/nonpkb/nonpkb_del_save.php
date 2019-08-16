<?php
		//$skrg = date('Y-m-d');
        include_once '../../lib/config.php';
        $idnonpkb = $_GET['idnonpkb'];
        
            $updatenonpkb = "UPDATE t_nonpkb SET tgl_batal='$hrini' WHERE id_nonpkb='$idnonpkb'";
            mysql_query($updatenonpkb);
?>
