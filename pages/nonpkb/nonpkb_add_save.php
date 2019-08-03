<?php
        include_once '../../lib/config.php';
        include_once '../../lib/fungsi.php';
        //$ip = ; // Ambil IP Address dari User
        //$id_nonpkb = trim($_POST['id_nonpkb']);
        $chasis = trim($_POST['chasis']);
        $mesin = trim($_POST['mesin']);
        $polisi = trim($_POST['polisi']);
        $uname = trim($_POST['uname']);
        $customer = trim($_POST['customer']);
        $tglselesai = trim($_POST['tglselesai']);
        $namamobil = trim($_POST['nmmobil']);
        //message_back($id_nonpkb);
        //$kodeawal = 'est_'.$hrini.'_';
        $hrn2= date('dmy' , strtotime($hrini));
  //EST.BR.020818.000001
        $kodeawal2 = 'NonPKB_BR.';
        $kodeawal = 'NonPKB_BR.'.$hrn2.'.';
        //$sqljur = "SELECT * FROM t_nonpkb WHERE id_nonpkb LIKE '$kodeawal2%' ORDER BY id_nonpkb DESC";
        $sqljur = "SELECT * FROM t_nonpkb ORDER BY tgl DESC";
        $resultjur = mysql_query($sqljur);
        $jur = mysql_fetch_array($resultjur);
        if (empty($jur['id_nonpkb'])){
            $kodeakhir = '000001';
        }else{
            # GENERATE
            $kode = $jur['id_nonpkb'];
            $pecah = explode('.',$kode);
            $nilbaru = $pecah[2] + 1;
            $panj = strlen($nilbaru);
            //message_back($panj);
            switch($panj){
                default : break;
                case '1' : $kodeakhir='00000'.$nilbaru; break;
                case '2' : $kodeakhir='0000'.$nilbaru; break;
                case '3' : $kodeakhir='000'.$nilbaru; break;
                case '4' : $kodeakhir='00'.$nilbaru; break;
                case '5' : $kodeakhir='0'.$nilbaru; break;
                case '6' : $kodeakhir=$nilbaru; break;
            }
        }
        
        $kodebaru = $kodeawal.$kodeakhir;     
        
        $sqltbemp = "INSERT INTO t_nonpkb (id_nonpkb,fk_no_chasis,fk_no_mesin,fk_no_polisi,fk_user,fk_customer,tgl_nonpkb_selesai,namamobil) VALUES ('$kodebaru','$chasis','$mesin','$polisi','$uname','$customer','$tglselesai','$namamobil')";
            mysql_query($sqltbemp);
            echo $kodebaru;
?>