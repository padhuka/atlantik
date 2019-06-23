<?php
        include_once '../../lib/config.php';
        include_once '../../lib/fungsi.php';
		 //$ip = ; // Ambil IP Address dari User
		$id = trim($_POST['idep']);
        $id_cuci = trim($_POST['cucie']);
        $idnonpkb = trim($_POST['idnonpkbep']);
        $diskon = trim($_POST['diskonep']);
        $qty = trim($_POST['qtye']);
        $hargajual= trim($_POST['hargapokokep']);
        $hargajuallm= trim($_POST['hargapokoklmep']);
        $hargadiskon= ($diskon*$hargajual)/100;
        $hargadiskonlm= trim($_POST['hargadiskonlmep']);
        $total= trim($_POST['hargatotalep']);
        $totallm= trim($_POST['hargatotallmep']);

         $updatecuci = "UPDATE t_nonpkb_cuci_detail SET fk_cuci='$id_cuci',qty_cuci='$qty',harga_jual_cuci='$hargajual', harga_diskon_cuci='$hargadiskon',harga_total_nonpkb_cuci='$total',diskon_cuci='$diskon',mark_cuci='$mark' WHERE id='$id'";
            mysql_query($updatecuci);


           $sqlcuci= "SELECT sum(harga_jual_cuci*qty_cuci) AS totjualcuci,sum(harga_diskon_cuci*qty_cuci) AS totdiskoncuci, sum(harga_total_nonpkb_cuci) AS totnonpkbcuci FROM t_nonpkb_cuci_detail WHERE fk_nonpkb = '$idnonpkb'";
            $hcuci= mysql_fetch_array(mysql_query($sqlcuci));
            //jml cuci

            $totgroscuci=$hcuci['totjualcuci'];
            $totdiskoncuci=$hcuci['totdiskoncuci'];
            $totnettocuci=$hcuci['totnonpkbcuci'];

            $updatecuci = "UPDATE t_nonpkb set total_gross_harga_cuci='$totgroscuci', total_diskon_rupiah_cuci='$totdiskoncuci', total_netto_harga_cuci='$totnettocuci' WHERE id_nonpkb='$idnonpkb'";
            mysql_query($updatecuci);



            $sqles= "SELECT sum(total_gross_harga_salon+total_gross_harga_cuci) as total_gross_harga_jasa,sum(total_diskon_rupiah_salon+total_diskon_rupiah_cuci) as total_diskon_rupiah_jasa,sum(total_netto_harga_salon+total_netto_harga_cuci) as total_netto_harga_jasa FROM t_nonpkb WHERE id_nonpkb = '$idnonpkb'";
           
            $hpes= mysql_fetch_array(mysql_query($sqles));

         

            $totgrosjasa=$hpes['total_gross_harga_jasa'];
            $totdiskonjasa=$hpes['total_diskon_rupiah_jasa'];
            $totnettojasa=$hpes['total_netto_harga_jasa'];



           $updatenonpkb = "UPDATE t_nonpkb SET total_gross_harga_jasa='$totgrosjasa', total_diskon_rupiah_jasa='$totdiskonjasa',total_netto_harga_jasa='$totnettojasa' WHERE id_nonpkb='$idnonpkb'";
              mysql_query($updatenonpkb);



?>