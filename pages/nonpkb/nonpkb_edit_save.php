<?php
        include_once '../../lib/config.php';
        include_once '../../lib/fungsi.php';
         //$ip = ; // Ambil IP Address dari User
        $idnonpkb = trim($_POST['idnonpkbe']);
        $chasis = trim($_POST['chasise']);
        $mesin = trim($_POST['mesine']);
        $polisi = trim($_POST['polisie']);
        $uname = trim($_POST['unamee']);
        $customer = trim($_POST['customere']);
        $namamobil = trim($_POST['nmmobil']);
        //message_back($id_nonpkb);
        //$kodeawal = 'est_'.$hrini.'_';
        //UPDATE t_nonpkb\
        $updateEs = "UPDATE t_nonpkb SET fk_no_chasis='$chasis',fk_no_mesin='$mesin',fk_no_polisi='$polisi',fk_user='$uname',fk_customer='$customer',namamobil='$namamobil' WHERE id_nonpkb='$idnonpkb'";
        mysql_query($updateEs);
        echo $idnonpkb;
        //echo $updateEs;      
?>