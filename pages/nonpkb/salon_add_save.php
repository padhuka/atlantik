<?php
        include_once '../../lib/config.php';
        include_once '../../lib/fungsi.php';
		 //$ip = ; // Ambil IP Address dari User
		$id_salon = trim($_POST['salon']);
        $idnonpkb = trim($_POST['idnonpkb']);
        $diskon = trim($_POST['diskon']);
        $hargajual= trim($_POST['hargapokok']);
        $hargadiskon= ($diskon*$hargajual)/100;
        $total= trim($_POST['hargatotal']);
      
		    $sqltbemp = "INSERT INTO t_nonpkb_salon_detail (fk_nonpkb,fk_salon,harga_jual_salon,diskon_salon,harga_diskon_salon,harga_total_nonpkb_salon) VALUES ('$idnonpkb','$id_salon','$hargajual','$diskon','$hargadiskon','$total')";
            mysql_query($sqltbemp);
            //echo $sqltbemp;
            //echo 'n';
            //jml salon
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
            //echo $updatenonpkb;

?>