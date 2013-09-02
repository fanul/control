<?php

    $foto = substr($tersangka[0]->kar_foto,28);

?>
<a style="margin-left: 800px" href="#" id="previous">Kembali ke halaman sebelumnya</a>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
    <tr>
      <td  width="18%"  height="180px" rowspan="6" ><img height="100%" width="100%" height="100%" src="<?php echo base_url().$foto; ?>"</td>
    <td width="15%">NAMA</td>
    <td colspan="2"><?php echo $tersangka[0]->kar_nama; ?></td>
  </tr>
  <tr>
    <td>KELAMIN</td>
    <td colspan="2"><?php if($tersangka[0]->kar_kelamin=='L') echo 'Laki-Laki'; else 'Perempuan'; ?></td>
  </tr>
  <tr>
    <td>UNIT KERJA</td>
    <td colspan="2"><?php echo $tersangka[0]->unit_nama; ?></td>
  </tr>
  <tr>
    <td>JABATAN</td>
    <td colspan="2"><?php echo $tersangka[0]->jabatan_nama; ?></td>
  </tr>
  <tr>
    <td>PENDIDIKAN AKHIR</td>
    <td colspan="2"><?php echo $tersangka[0]->kar_pendidikanakhir; ?></td>
  </tr>
  <tr>
    <td>ALAMAT</td>
    <td colspan="2"><?php echo $tersangka[0]->kar_alamat; ?></td>
  </tr>
  <tr>
    <td>TEMTALA</td>
    <td><?php echo $tersangka[0]->kar_tempatlahir.', '.$tersangka[0]->kar_tanggallahir; ?></td>
    <td>TANGGAL MASUK KERJA</td>
    <td><?php echo $tersangka[0]->kar_masukkerja; ?></td>
  </tr>
  <tr>
    <td>NAMA PASANGAN</td>
    <td><?php echo $tersangka[0]->kar_namapasangan; ?></td>
    <td>GAJI POKOK</td>
    <td><?php echo $tersangka[0]->kar_gajipokok; ?></td>
  </tr>
  <tr>
    <td>TEMTALA PASANGAN</td>
    <td><?php echo $tersangka[0]->kar_tempatlahirpasangan.', '.$tersangka[0]->kar_tanggallahirpasangan; ?></td>
    <td>TANGGAL PENSIUN</td>
    <td><?php echo $tersangka[0]->kar_tanggalpensiun; ?></td>
  </tr>
  <tr>
    <td>TANGGAL NIKAH</td>
    <td><?php echo $tersangka[0]->kar_tanggalnikah; ?></td>
    <td width="25%">GAJI PENSIUN</td>
    <td width="42%"><?php echo $tersangka[0]->kar_gajipensiun; ?></td>
  </tr>
  <tr>
      <td colspan="4">
          <table width="100%" border="1">
      <tr>
          <td width="50%">Daftar Anak</td>
          <td width="50%">Daftar Kompetensi</td>
      </tr>
        <td width="50%">
            <!-- anak nih -->
            <?php
            if($anak!=null)
                {
                    foreach($anak as $individu)
                        {
                          echo '<table width="100%" border="0" cellpadding="0" cellspacing="0">';
                          echo '       <tr>';
                          echo '          <td colspan="2">Anak Ke: '.$individu->anak_ke.'</td>';
                          echo '          </tr>';
                          echo '        <tr>';
                          echo '          <td>NAMA ANAK</td>';
                          echo '          <td>'.$individu->anak_nama.'</td>';
                          echo '        </tr>';
                          echo '        <tr>';
                          echo '          <td>TEMTALA</td>';
                          echo '          <td>'.$individu->anak_tempatlahir.', '.$individu->anak_tanggallahir.'</td>';
                          echo '        </tr>';
                          echo '      </table>';
                        }
                }
            ?>
            </td>
            <!-- akhir anak -->
            <td width="50%" valign="top">
            <table width="100%" border="0" cellpadding="0" cellspacing="0">
                <!-- yo -->
                      <tr>
                      <td>Kategori Kompetensi</td>
                      <td>Nama Kompetensi</td>
                      </tr>
                <?php
                if(isset ($kompetensi))
                    {
                        foreach($kompetensi as $rig)
                            {
                              echo '<tr>';
                              echo '  <td>'.$rig->maskom_nama.'</td>';
                              echo '  <td>'.$rig->kompetensi_nama.'</td>';
                              echo '</tr>';
                            }
                    }
                    ?>
              <!-- yo -->

            </table>
            </td>
        </tr>
    </table>
      </td>
  </tr>
</table>
