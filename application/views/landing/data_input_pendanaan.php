<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title><?=$title?> | Agung Widiya Lestari Syirkah Muamalah</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap Icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />
    <!-- SimpleLightbox plugin CSS-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="<?php echo base_url();?>assets/startbootstrap/css/styles.css" rel="stylesheet" />
</head>
<body id="page-top">
    <!-- Navigation-->
    <?php include "nav.php" ?>
    <!-- Masthead-->

    <!-- About-->
    <section class="page-section bg-primary" id="">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-lg-8 text-center">
                    <h2 class="text-white mt-0">We've got what you need!</h2>
                    <hr class="divider divider-light" />
                    <p class="text-white-75 mb-4"><?=$this->session->flashdata('user_loggedin'); ?><br>
                    Silahkan untuk mengisi formulir Pendataan Perseorangan Agung Widiya Lestari Syirkah Muamalah</p>
                    <!-- <a class="btn btn-light btn-xl" href="#services">Get Started!</a> -->
                </div>
            </div>
        </div>
    </section>

<?php 
    if ($status == 'update'){
        $id = $user->id;
        $email = $user->email;
        $nama_ktp = $user->nama_ktp;
        $t_tempat = $user->t_tempat;
        $t_lahir = $user->t_lahir;
        $agama = $user->agama;
        $jk = $user->jk;
        $no_ktp = $user->no_ktp;
        $foto_ktp = $user->foto_ktp;
        $skck = $user->skck;
        $slik_ojk = $user->slik_ojk;
        $ibu_kandung = $user->ibu_kandung;
        $status_pernikahan = $user->status_pernikahan;
        $pendidikan_terakhir = $user->pendidikan_terakhir;
        $pekerjaan = $user->pekerjaan;
        $bidang_pekerjaan = $user->bidang_pekerjaan;
        $pendapatan_per_bulan = $user->pendapatan_per_bulan;
        $sumber_dana = $user->sumber_dana;
        $pengalaman_kerja = $user->pengalaman_kerja;
        $npwp = $user->npwp;
        $no_hp = $user->no_hp;
        $alamat_ktp = $user->alamat_ktp;
        $nama_bank = $user->nama_bank;
        $no_rek = $user->no_rek;
        $nama_pemilik = $user->nama_pemilik;
        $rekening_koran = $user->rekening_koran;
        $no_gopay = $user->no_gopay;
        $no_dana = $user->no_dana;
        $nama_ahli_waris = $user->nama_ahli_waris;
        $nik_ahli_waris = $user->nik_ahli_waris;
        $hubungan_ahli_waris = $user->hubungan_ahli_waris;
        $alamat_ahli_waris = $user->alamat_ahli_waris;
        $no_ahli_waris = $user->no_ahli_waris;  
    } else {
        $id = '';
        $email = $register->email;
        $nama_ktp = $register->nama;
        $t_tempat = '';
        $t_lahir = '';
        $agama = '';
        $jk = '';
        $no_ktp = '';
        $foto_ktp = '';
        $skck = '';
        $slik_ojk = '';
        $ibu_kandung = '';
        $status_pernikahan = '';
        $pendidikan_terakhir = '';
        $pekerjaan = '';
        $bidang_pekerjaan = '';
        $pendapatan_per_bulan = '';
        $sumber_dana = '';
        $pengalaman_kerja = '';
        $npwp = '';
        $no_hp = '';
        $alamat_ktp = '';
        $nama_bank = '';
        $no_rek = '';
        $nama_pemilik = '';
        $rekening_koran = '';
        $no_gopay = '';
        $no_dana = '';
        $nama_ahli_waris = '';
        $nik_ahli_waris = '';
        $hubungan_ahli_waris = '';
        $alamat_ahli_waris = '';
        $no_ahli_waris = '';
    }
?>
<!-- Contact-->
    <section class="page-section" id="contact-">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-lg-8 col-xl-6 text-center">
                    <h2 class="mt-0">Form Pendataan</h2>
                    <hr class="divider" />
                    <p class="text-muted mb-5">Pendataan Perseorangan Agung Widiya Lestari Syirkah Muamalah</p>
                </div>
            </div>
            <div class="row gx-4 gx-lg-5 justify-content-center mb-5">
                <div class="col-lg-6">
                <?php echo $this->session->flashdata('message');?>
                <?php if ($status == 'update'){ ?>
                <form action="<?= base_url(). 'dashboard/update'; ?>" method="post" enctype="multipart/form-data">
                <?php } else { ?>
                <form action="<?= base_url(). 'dashboard/tambah'; ?>" method="post" enctype="multipart/form-data">
                <?php } ?>
                  <div class="form-group">
                    <label style="color:green" for="exampleInputEmail1">Email</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="email" name="email" value="<?=$email?>">
                </div>
                <br>
                <div class="form-group">
                    <label style="color:green" for="exampleInputPassword1">Nama (sesuai KTP)</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="nama" name="nama_ktp" value="<?=$nama_ktp?>">
                </div>
                <br>
                <div class="form-group">
                    <label style="color:green" for="exampleInputEmail1">Tempat Lahir</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="tempat lahir" name="t_tempat" value="<?=$t_tempat?>">
                </div>
                <br>
                <div class="form-group">
                    <label style="color:green" for="exampleInputEmail1">Tanggal Lahir</label>
                    <input type="date" class="form-control date" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="tanggal lahir" name="t_lahir" value="<?=$t_lahir?>">
                </div>
                <br>
                <div class="form-group">
                  <label style="color:green" for="exampleInputEmail1">Agama</label><br>
                  <input class="form-check-input" type="checkbox" class="radio" value="Islam" <?php echo ($agama == 'Islam' ? 'checked' : null); ?> name="agama" id=""> Islam <br>
                  <input class="form-check-input" type="checkbox" class="radio" value="Katolik" <?php echo ($agama == 'Katolik' ? 'checked' : null); ?> name="agama" id=""> Katolik <br>
                  <input class="form-check-input" type="checkbox" class="radio" value="Protestan" <?php echo ($agama == 'Protestan' ? 'checked' : null); ?> name="agama" id=""> Protestan <br>
                  <input class="form-check-input" type="checkbox" class="radio" value="Hindu" <?php echo ($agama == 'Hindu' ? 'checked' : null); ?> name="agama" id=""> Hindu <br>
                  <input class="form-check-input" type="checkbox" class="radio" value="Buddha" <?php echo ($agama == 'Buddha' ? 'checked' : null); ?> name="agama" id=""> Buddha <br>
                  <input class="form-check-input" type="checkbox" class="radio" value="Konghuchu" <?php echo ($agama == 'Konghuchu' ? 'checked' : null); ?> name="agama" id=""> Konghuchu <br>
              </div>
              <br>
              <div class="form-group">
                  <label style="color:green" for="exampleInputEmail1">Jenis Kelamin</label><br>
                  <input class="form-check-input" type="checkbox" class="radio" value="Laki-laki" <?php echo ($jk == 'Laki-laki' ? 'checked' : null); ?> name="jk" id=""> Laki-laki <br>
                  <input class="form-check-input" type="checkbox" class="radio" value="Perempuan" <?php echo ($jk == 'Perempuan' ? 'checked' : null); ?> name="jk" id=""> Perempuan <br>
              </div>
              <br>
              <div class="form-group">
                <label style="color:green" for="exampleInputEmail1">No KTP</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="nomor ktp" name="no_ktp" value="<?=$no_ktp?>">
            </div>
            <br>
            <div class="form-group">
             <label style="color:green" for="foto_ktp">Foto KTP</label>
             <div class="custom-file">
                <?php if ($foto_ktp !='') { ?>
                    <a href="<?= base_url(). '/assets/img/data_pengguna/'.$foto_ktp.''; ?>"?><?=$foto_ktp?></a>
                <?php } ?>
                <input type="file" name="foto_ktp" class="custom-file-input" id="foto_ktp">
                <label class="custom-file-label" for="customFile"></label>
            </div>
            <br>
            <div class="form-group">
             <label style="color:green" for="skck">SKCK</label>
             <div class="custom-file">
                <?php if ($skck !='') { ?>
                    <a href="<?= base_url(). '/assets/img/data_pengguna/'.$skck.''; ?>"?><?=$skck?></a>
                <?php } ?>
                <input type="file" name="skck" class="custom-file-input" id="skck">
                <label class="custom-file-label" for="customFile"></label>
            </div>
            <br>
            <div class="form-group">
             <label style="color:green" for="slik_ojk">iDeb SLIK OJK</label>
             <div class="custom-file">
                <?php if ($slik_ojk !='') { ?>
                    <a href="<?= base_url(). '/assets/img/data_pengguna/'.$slik_ojk.''; ?>"?><?=$slik_ojk?></a>
                <?php } ?>
                <input type="file" name="slik_ojk" class="custom-file-input" id="slik_ojk">
                <label class="custom-file-label" for="customFile"></label>
            </div>
            <br>
            <div class="form-group">
                <label style="color:green" for="exampleInputEmail1">Nama ibu kandung</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="nama ibu kandung" name="ibu_kandung" value="<?=$ibu_kandung?>">
            </div>
            <br>
            <div class="form-group">
              <label style="color:green" for="exampleInputEmail1">Status Pernikahan</label><br>
              <input class="form-check-input" type="checkbox" class="radio" value="Sudah Menikah" <?php echo ($status_pernikahan == 'Sudah Menikah' ? 'checked' : null); ?> name="status_pernikahan" id=""> Sudah Menikah <br>
              <input class="form-check-input" type="checkbox" class="radio" value="Belum Menikah" <?php echo ($status_pernikahan == 'Belum Menikah' ? 'checked' : null); ?> name="status_pernikahan" id=""> Belum Menikah <br>

          </div>
          <br>
          <div class="form-group">
              <label style="color:green" for="exampleInputEmail1">Pendidikan Terakhir</label><br>
              <input class="form-check-input" type="checkbox" class="radio" value="SD" <?php echo ($pendidikan_terakhir == 'SD' ? 'checked' : null); ?> name="pendidikan_terakhir" id=""> SD <br>
              <input class="form-check-input" type="checkbox" class="radio" value="SMP" <?php echo ($pendidikan_terakhir == 'SMP' ? 'checked' : null); ?> name="pendidikan_terakhir" id=""> SMP <br>
              <input class="form-check-input" type="checkbox" class="radio" value="SMA" <?php echo ($pendidikan_terakhir == 'SMA' ? 'checked' : null); ?> name="pendidikan_terakhir" id=""> SMA <br>
              <input class="form-check-input" type="checkbox" class="radio" value="SMK" <?php echo ($pendidikan_terakhir == 'SMK' ? 'checked' : null); ?> name="pendidikan_terakhir" id=""> SMK <br>
              <input class="form-check-input" type="checkbox" class="radio" value="Diploma" <?php echo ($pendidikan_terakhir == 'Diploma' ? 'checked' : null); ?> name="pendidikan_terakhir" id=""> Diploma <br>
              <input class="form-check-input" type="checkbox" class="radio" value="S1" <?php echo ($pendidikan_terakhir == 'S1' ? 'checked' : null); ?> name="pendidikan_terakhir" id=""> S1 <br>
              <input class="form-check-input" type="checkbox" class="radio" value="S2" <?php echo ($pendidikan_terakhir == 'S2' ? 'checked' : null); ?> name="pendidikan_terakhir" id=""> S2 <br>
              <input class="form-check-input" type="checkbox" class="radio" value="S3" <?php echo ($pendidikan_terakhir == 'S3' ? 'checked' : null); ?> name="pendidikan_terakhir" id=""> S3 <br>
          </div>
          <br>
          <div class="form-group">
              <label style="color:green" for="exampleInputEmail1">Pekerjaan</label><br>
              <input class="form-check-input" type="checkbox" class="radio" value="PNS" <?php echo ($pekerjaan == 'PNS' ? 'checked' : null); ?> name="pekerjaan" id=""> PNS <br>
              <input class="form-check-input" type="checkbox" class="radio" value="TNI/POLRI" <?php echo ($pekerjaan == 'TNI/POLRI' ? 'checked' : null); ?> name="pekerjaan" id=""> TNI/POLRI <br>
              <input class="form-check-input" type="checkbox" class="radio" value="Karyawan BUMN" <?php echo ($pekerjaan == 'Karyawan BUMN' ? 'checked' : null); ?> name="pekerjaan" id=""> Karyawan BUMN <br>
              <input class="form-check-input" type="checkbox" class="radio" value="Karyawan Swasta" <?php echo ($pekerjaan == 'Karyawan Swasta' ? 'checked' : null); ?> name="pekerjaan" id=""> Karyawan Swasta <br>
              <input class="form-check-input" type="checkbox" class="radio" value="Wiraswasta" <?php echo ($pekerjaan == 'Wiraswasta' ? 'checked' : null); ?> name="pekerjaan" id=""> Wiraswasta <br>
              <input class="form-check-input" type="checkbox" class="radio" value="Pelajar/Mahasiswa" <?php echo ($pekerjaan == 'Pelajar/Mahasiswa' ? 'checked' : null); ?> name="pekerjaan" id=""> Pelajar/Mahasiswa <br>
              <input class="form-check-input" type="checkbox" class="radio" value="Belum Bekerja" <?php echo ($pekerjaan == 'Belum Bekerja' ? 'checked' : null); ?> name="pekerjaan" id=""> Belum Bekerja <br>
          </div>
          <br>
          <div class="form-group">
            <label style="color:green" for="exampleInputEmail1">Bidang pekerjaan</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="bidang pekerjaan" name="bidang_pekerjaan" value="<?=$bidang_pekerjaan?>">
        </div>
        <br>
        <div class="form-group">
          <label style="color:green" for="exampleInputEmail1">Pendapatan per bulan
          </label><br>
          <input class="form-check-input" type="checkbox" class="radio" value="0 - Rp 2.950.000" <?php echo ($pendapatan_per_bulan == '0 - Rp 2.950.000' ? 'checked' : null); ?> name="pendapatan_per_bulan" id=""> 0 - Rp 2.950.000 <br>
          <input class="form-check-input" type="checkbox" class="radio" value="Rp 2.950.001 - Rp 5.935.000" <?php echo ($pendapatan_per_bulan == 'Rp 2.950.001 - Rp 5.935.000' ? 'checked' : null); ?> name="pendapatan_per_bulan" id=""> Rp 2.950.001 - Rp 5.935.000 <br>
          <input class="form-check-input" type="checkbox" class="radio" value="Rp 5.935.001 - Rp 11.865.000" <?php echo ($pendapatan_per_bulan == 'Rp 5.935.001 - Rp 11.865.000' ? 'checked' : null); ?> name="pendapatan_per_bulan" id=""> Rp 5.935.001 - Rp 11.865.000 <br>
          <input class="form-check-input" type="checkbox" class="radio" value="Rp 11.865.001 - Rp 24.988.000" <?php echo ($pendapatan_per_bulan == 'Rp 11.865.001 - Rp 24.988.000' ? 'checked' : null); ?> name="pendapatan_per_bulan" id=""> Rp 11.865.001 - Rp 24.988.000 <br>
          <input class="form-check-input" type="checkbox" class="radio" value="Rp 24.988.001 - Rp 208.330.000" <?php echo ($pendapatan_per_bulan == 'Rp 24.988.001 - Rp 208.330.000' ? 'checked' : null); ?> name="pendapatan_per_bulan" id=""> Rp 24.988.001 - Rp 208.330.000 <br>
          <input class="form-check-input" type="checkbox" class="radio" value="Rp 208.330.001 - Rp 4.000.233.000" <?php echo ($pendapatan_per_bulan == 'Rp 208.330.001 - Rp 4.000.233.000' ? 'checked' : null); ?> name="pendapatan_per_bulan" id=""> Rp 208.330.001 - Rp 4.000.233.000 <br>
          <input class="form-check-input" type="checkbox" class="radio" value=">4.000.233.000" <?php echo ($pendapatan_per_bulan == '>4.000.233.000' ? 'checked' : null); ?> name="pendapatan_per_bulan" id=""> >4.000.233.000 <br>
      </div>
      <br>
      <div class="form-group">
        <label style="color:green" for="exampleInputEmail1">Sumber Dana</label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="sumber dana" name="sumber_dana" value="<?=$sumber_dana?>">
    </div>
    <br>
    <div class="form-group">
      <label style="color:green" for="exampleInputEmail1">Pengalaman Kerja
      </label><br>
      <input class="form-check-input" type="checkbox" class="radio" value="Pelajar/ belum pernah bekerja" <?php echo ($pengalaman_kerja == 'Pelajar/ belum pernah bekerja' ? 'checked' : null); ?>name="pengalaman_kerja" id=""> Pelajar/ belum pernah bekerja <br>
      <input class="form-check-input" type="checkbox" class="radio" value="<1 tahun" <?php echo ($pengalaman_kerja == '<1 tahun' ? 'checked' : null); ?> name="pengalaman_kerja" id=""> <1 tahun <br>
          <input class="form-check-input" type="checkbox" class="radio" value="1-2 tahun" <?php echo ($pengalaman_kerja == '1-2 tahun' ? 'checked' : null); ?> name="pengalaman_kerja" id=""> 1-2 tahun <br>
          <input class="form-check-input" type="checkbox" class="radio" value="2-3 tahun" <?php echo ($pengalaman_kerja == '2-3 tahun' ? 'checked' : null); ?> name="pengalaman_kerja" id=""> 2-3 tahun <br>
          <input class="form-check-input" type="checkbox" class="radio" value=">3 tahun" <?php echo ($pengalaman_kerja == '>3 tahun' ? 'checked' : null); ?> name="pengalaman_kerja" id=""> >3 tahun <br>
      </div>
      <br>
      <div class="form-group">
        <label style="color:green" for="exampleInputEmail1">NPWP (opsional)</label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="npwp" name="npwp" value="<?=$npwp?>">
    </div>
    <br>
    <div class="form-group">
        <label style="color:green" for="exampleInputEmail1">Nomor HP</label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nomor HP" name="no_hp" value="<?=$no_hp?>">
    </div>
    <br>
    <div class="form-group">
        <label for="exampleFormControlTextarea1">Alamat Sesuai KTP</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="alamat_ktp"><?=$alamat_ktp?></textarea>
    </div>
    <br>
    <div class="form-group">
        <label style="color:green" for="exampleInputEmail1">Nama Bank</label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="nama bank" name="nama_bank" value="<?=$nama_bank?>">
    </div>
    <br>
    <div class="form-group">
        <label style="color:green" for="exampleInputEmail1">Nomor Rekening</label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nomor Rekening" name="no_rek" value="<?=$no_rek?>">
    </div>
    <br>
    <div class="form-group">
        <label style="color:green" for="exampleInputEmail1">Nama pemilik rekening</label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama pemilik rekening" name="nama_pemilik" value="<?=$nama_pemilik?>">
    </div>
    <br>
    <div class="form-group">
     <label style="color:green" for="rekening_koran">Rekening Koran atau Foto Transaksi Buku Tabungan (minimum 3 bulan terakhir)</label>
     <div class="custom-file">
        <?php if ($rekening_koran !='') { ?>
            <a href="<?= base_url(). '/assets/img/data_pengguna/'.$rekening_koran.''; ?>"?><?=$rekening_koran?></a>
        <?php } ?>
        <input type="file" name="rekening_koran" class="custom-file-input" id="rekening_koran">
        <label class="custom-file-label" for="customFile"></label>
    </div>
    <br>
    <div class="form-group">
        <label style="color:green" for="exampleInputEmail1">Nomor Gopay (opsional)</label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nomor Gopay" name="no_gopay" value="<?=$no_gopay?>">
    </div>
    <br>
    <div class="form-group">
        <label style="color:green" for="exampleInputEmail1">Nomor DANA (opsional)</label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nomor DANA" name="no_dana" value="<?=$no_dana?>">
    </div>
    <br>
    <div class="form-group">
        <label style="color:green" for="exampleInputEmail1">Nama ahli waris</label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama ahli waris" name="nama_ahli_waris" value="<?=$nama_ahli_waris?>">
    </div>
    <br>
    <div class="form-group">
        <label style="color:green" for="exampleInputEmail1">NIK ahli waris</label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="NIK ahli waris" name="nik_ahli_waris" value="<?=$nik_ahli_waris?>">
    </div>
    <br>
    <div class="form-group">
        <label style="color:green" for="exampleInputEmail1">Hubungan ahli waris</label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Hubungan ahli waris" name="hubungan_ahli_waris" value="<?=$hubungan_ahli_waris?>">
    </div>
    <br>
    <div class="form-group">
        <label for="exampleFormControlTextarea1">Alamat ahli waris</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="alamat_ahli_waris"><?=$alamat_ahli_waris?></textarea>
    </div>
    <br>
    <div class="form-group">
        <label style="color:green" for="exampleInputEmail1">Nomor ahli waris</label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nomor ahli waris" name="no_ahli_waris" value="<?=$no_ahli_waris?>">
    </div>
    <br>
</div>
<br>
<input type="hidden" name="id" value="<?=$id?>">
<input type="hidden" name="foto_ktp_old" value="<?=$foto_ktp?>">
<input type="hidden" name="skck_old" value="<?=$skck?>">
<input type="hidden" name="slik_ojk_old" value="<?=$slik_ojk?>">
<input type="hidden" name="rekening_koran_old" value="<?=$rekening_koran?>">
<input type="submit" type="submit" class="btn btn-primary">
</form>
</div>
</div>
<div class="row gx-4 gx-lg-5 justify-content-center">
    <div class="col-lg-4 text-center mb-5 mb-lg-0">
        <i class="bi-phone fs-2 mb-3 text-muted"></i>
        <div>+1 (555) 123-4567</div>
    </div>
</div>
</div>
</section>

<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- SimpleLightbox plugin JS-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.js"></script>
<!-- Core theme JS-->
<script src="<?php echo base_url();?>assets/startbootstrap/js/scripts.js"></script>
<!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
<!-- * *                               SB Forms JS                               * *-->
<!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
<!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
<script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript">
    // the selector will match all input controls of type :checkbox
// and attach a click event handler 
$("input:checkbox").on('click', function() {
  // in the handler, 'this' refers to the box clicked on
  var $box = $(this);
  if ($box.is(":checked")) {
    // the name of the box is retrieved using the .attr() method
    // as it is assumed and expected to be immutable
    var group = "input:checkbox[name='" + $box.attr("name") + "']";
    // the checked state of the group/box on the other hand will change
    // and the current value is retrieved using .prop() method
    $(group).prop("checked", false);
    $box.prop("checked", true);
} else {
    $box.prop("checked", false);
}
});
</script>
</body>
</html>
