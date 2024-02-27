<div class="row">
<div class="col-12 text-center">

<address>
<i class="fas fa-shopping-cart fa-3x text-primary"></i> 
<font size=9 class="text-primary"><?= $web['nama_toko']?></font><br>
<strong class="text-primary"><?= $web['slogan']?></strong><br>
 <strong><?= $web['alamat']?></strong><br>
 <strong><?= $web['no_telpon']?></strong><br>
</address>

</div>
<div class="col-12 text-center">
<hr>
<b>
<h4><?= $judul ?></h4>
</b>
</div>

<div class="col-12">
    <b>Tanggal :</b> <?= $tgl ?>
<table class="table table-bordered table-striped">
    <tr class="text-center">
        <th>NO</th>
        <th>Barcode/Kode</th>
        <th>Nama Produk</th>
        <th>Harga Beli</th>
        <th>Harga Jual</th>
        <th>QTY</th>
        <th>Total Harga</th>
        <th>Total Untung</th>
    </tr>
    <?php $no =1;
    foreach ($dataharian as $key => $value) {
        $grandtotal[] = $value['total_harga'];
        $granduntung[] = $value['untung'];
        ?>
    <tr>
        <td class="text-center"><?= $no++ ?></td>
        <td class="text-center"><?= $value['kode_produk'] ?></td>
        <td><?= $value['nama_produk'] ?></td>
        <td class="text-right">Rp. <?= number_format($value['modal'],0) ?></td>
        <td class="text-right">Rp. <?= number_format($value['harga'],0) ?></td>
        <td class="text-center"><?= $value['qty'] ?></td>
        <td class="text-right">Rp. <?= number_format($value['total_harga'],0) ?></td>
        <td class="text-right">Rp. <?= number_format($value['untung'],0) ?></td>
    </tr>
    <?php }?>
    <tr class="text-center bg-gradient bg-gray">
        <td  colspan="6">
            <h5>Grand Total</h5>
        </td>
        <td class="text-right bg-success">
          Rp.  <?= $dataharian== null?'' : number_format(array_sum($grandtotal), 0) ?>
        </td>
        <td class="text-right bg-success">
           Rp. <?= $dataharian== null?'' : number_format(array_sum($grandtotal), 0) ?>
        </td>
    </tr>
</table>
</div>
</div>

