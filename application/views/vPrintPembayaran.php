<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>PEMBAYARAN<?php echo $dataheader['id_pembayaran'].'#'.$dataheader['no_registrasi'];?></title>
</head>
  <?php
      if($dataheader['tipe_pembayaran'] == 'S' ){
          $tipe_pembayaran = 'SEMESTER';
          $status          = '';
          $item            = 'ket_semester';
      }
      else{
          $tipe_pembayaran = 'BULANAN';
          $status          = 'BULAN KE-';
          $item            = 'ket_bulan';
      }
  ?>
<body>
<table width="100%" border="0" align="center">
  <tbody>
    <tr>
      <td align="left" valign="top"> 
        <p>ID Pembayaran      : <?php echo $dataheader['id_pembayaran'];?></p>
        <p>Tanggal            : <?php echo $dataheader['tanggal'];?></p>
        <p>Tipe Pembayaran    : <?php echo $tipe_pembayaran;?></p>
        <p>Semester           : <?php echo substr($dataheader['semester'],-1);?></p>
    </td>
      <td align="left" valign="top">
        <p>No Registrasi      : <?php echo $dataheader['no_registrasi'];?></p>
        <p>Nama               : <?php echo $dataheader['nama_lengkap'];?></p>
      </td>
      <td align="left" valign="bottom"><p>Keterangan      : <?php echo $dataheader['keterangan'];?></p></td>
    </tr>
  </tbody>
</table>
<p>&nbsp;</p>
<table width="100%" border="0" align="center">
  <tbody>
    <tr>
        <td width="100%"  align="center" valign="middle">#</td>
        <td width="100%"  align="center" valign="middle">ITEM</td>
        <td width="100%"  align="center" valign="middle">TOTAL</td>
    </tr>
      <?php  $no =1;  $grantotal = 0;                                            
        foreach ($databody as $row) { ?>
    <tr>
        <td width="100%"  align="center" valign="middle"> <?php echo $no ?> </td>
        <td width="100%"  align="center" valign="middle"> PEMBAYARAN <?php echo $status.' '.$row[$item]  ;?></td>
        <td width="100%"  align="center" valign="middle"> Rp.<?php echo number_format($row['nominal']) ;?> </td>
    </tr>
    <?php ; $grantotal+= $row['nominal']; $no++;} ?>
  </tbody>
</table>
<table width="100%" border="0" align="center">
  <tbody>
    <tr>
      <td width="59">&nbsp;</td>
      <td width="59">TOTAL BAYAR</td>
      <td width="60"><?php echo 'Rp.'.number_format($grantotal);?> </td>
    </tr>
  </tbody>
</table>
<p>&nbsp;</p>
</body>
</html>
