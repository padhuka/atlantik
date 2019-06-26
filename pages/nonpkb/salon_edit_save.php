<?php
        include_once '../../lib/config.php';
        include_once '../../lib/fungsi.php';
		 //$ip = ; // Ambil IP Address dari User
		$id = trim($_POST['ide']);
        $id_salon = trim($_POST['salone']);
        $idnonpkb = trim($_POST['idnonpkbe']);
        $diskon = trim($_POST['diskone']);
        $hargajual= trim($_POST['hargapokoke']);
        $hargajuallm= trim($_POST['hargapokoklme']);
        $hargadiskon= ($diskon*$hargajual)/100;
        $hargadiskonlm= trim($_POST['hargadiskonlme']);
        $total= trim($_POST['hargatotale']);
        $totallm= trim($_POST['hargatotallme']);

          $updatesalon = "UPDATE t_nonpkb_salon_detail SET fk_salon='$id_salon',harga_jual_salon='$hargajual', harga_diskon_salon='$hargadiskon',harga_total_nonpkb_salon='$total',diskon_salon='$diskon' WHERE id='$id'";
            mysql_query($updatesalon);
            //echo $updatesalon;
            $sqlsalon= "SELECT sum(harga_jual_salon) AS totjualsalon,sum(harga_diskon_salon) AS totdiskonsalon, sum(harga_total_nonpkb_salon) AS totnonpkbsalon FROM t_nonpkb_salon_detail WHERE fk_nonpkb = '$idnonpkb'";
            $hsalon= mysql_fetch_array(mysql_query($sqlsalon));
            //jml salon

            $totgrossalon=$hsalon['totjualsalon'];
            $totdiskonsalon=$hsalon['totdiskonsalon'];
            $totnettosalon=$hsalon['totnonpkbsalon'];

            $updatesalon = "UPDATE t_nonpkb set total_gross_harga_salon='$totgrossalon', total_diskon_rupiah_salon='$totdiskonsalon', total_netto_harga_salon='$totnettosalon' WHERE id_nonpkb='$idnonpkb'";
            mysql_query($updatesalon);


            $sqles= "SELECT sum(total_gross_harga_salon+total_gross_harga_cuci) as total_gross_harga_jasa,sum(total_diskon_rupiah_salon+total_diskon_rupiah_cuci) as total_diskon_rupiah_jasa,sum(total_netto_harga_salon+total_netto_harga_cuci) as total_netto_harga_jasa FROM t_nonpkb WHERE id_nonpkb = '$idnonpkb'";
           
            $hpes= mysql_fetch_array(mysql_query($sqles));    

            $totgrosjasa=$hpes['total_gross_harga_jasa'];
            $totdiskonjasa=$hpes['total_diskon_rupiah_jasa'];
            $totnettojasa=$hpes['total_netto_harga_jasa'];

           $updatenonpkb = "UPDATE t_nonpkb SET total_gross_harga_jasa='$totgrosjasa', total_diskon_rupiah_jasa='$totdiskonjasa',total_netto_harga_jasa='$totnettojasa' WHERE id_nonpkb='$idnonpkb'";
              mysql_query($updatenonpkb);



?>