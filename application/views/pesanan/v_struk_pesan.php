<?php echo link_tag('assets/css/struk-mitra.css'); ?>
<script type="text/javascript">
function PrintStruk()
{
   // location.href="<?php echo base_url()?>index.php/pesanan/c_pesan";
    print();        
}
</script>

    <div class="book">

        <div class="page" onclick="window.print()">

            <div class="subpage"> 

                <table class="slip">
                    
                    <tr>
                        
                        <td><img style="margin-right: 20mm;" src="<?php echo base_url()?>assets/images/logo.png" width="100"></td>

                        <td align="center">Kode Pesan <br><h1><?php echo $pesan->kode_pesan; ?></h1></td>

                    </tr>

                    <tr>

                        <td colspan="2"><div style=" border: 1px #000000 solid;"></div><br></td>

                    </tr>

                    <tr>

                        <td align="center" colspan="2">Tgl Pesan : <b><?php echo date('d M y', strtotime($pesan->tgl_pesan)); ?></b> | Ekspedisi : 

                            <b><?php 

                                if($pesan->ekspedisi == "OJOL"){

                                    echo "Go-Jek/Grab";}

                                else{

                                    echo $pesan->ekspedisi;

                                } ?></b><br><br></td>

                    </tr>

                    <tr>
                        
                        <td colspan="2"><b>Dari : </b>Distro Zalfa Miracle Skincare <br>(0812-2001-5400/0813-1942-1495)<br><br></td>

                    </tr>

                    <tr>
                        
                        <td colspan="2" width="5"><b>Untuk : </b><?php echo $pesan->untuk." (".$pesan->no_hp.")"; ?>

                        <br><br><?php echo $pesan->alamat; ?><br><br></td>

                    </tr>

                    <tr><td colspan="2">

                    <table width="100%" cellpadding="3">

                    <tr>

                        <td align="center" colspan="2"><br>Tgl Pesan : <b><?php echo date('d M y', strtotime($pesan->tgl_pesan)); ?></b> | Kode : <b><?php echo $pesan->kode_pesan; ?></b></td>

                    </tr>

                    <tr>
                        
                        <td align="center" colspan="2" width="5"><b>Nama : </b><?php echo $pesan->untuk." (".$pesan->no_hp.")"; ?></td>

                    </tr>

                    <tr>

                        <th><br>Nama Produk</th>                 

                        <th><br>Qty</th>

                    </tr>              

                    <?php

                    foreach ($detailpesan->result() as $row){
                                          
                    ?>  

                    <tr>

                        <td id="produk"><?php echo $row->nama_produk; ?></td>    

                        <td id="produk" align="center"><?php echo $row->jumlah_pesan; ?></td>  

                    <?php 

                    }

                    ?>              

                    </tr>

                    <tr>
                        
                        <td align="center" colspan="2" width="5"><br>(Jika ada kesalahan dalam pengiriman, mohon simpan nota ini sebagai bukti)</td>

                    </tr>

                    </table>

                    </td></tr>

                </table>

            </div> 



        </div>

    </div>