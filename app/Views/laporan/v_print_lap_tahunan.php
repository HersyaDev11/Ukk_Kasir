<div class="col-12">
   <b>Tahun :</b> <?= $tahun ?>
<table class="table table-bordered table-striped">
    <tr class="text-center bg-gray">
        <th>NO</th>
        <th>Bulan</th>
        <th>Total</th>
        <th>Untung</th>
    </tr>
    <?php $no =1;
    foreach ($datatahunan as $key => $value) {
        $grandtotal[] = $value['total_harga'];
        $granduntung[] = $value['untung'];
        ?>
    <tr>
        <td class="text-center"><?= $no++ ?></td>
        <td class="text-center"><?= $value['bulan'] ?></td>
        <td class="text-right">Rp. <?= number_format($value['total_harga'],0) ?></td>
        <td class="text-right">Rp. <?= number_format($value['untung'],0) ?></td>
    </tr>
    <?php }?>
    <tr class="text-center bg-gradient bg-gray">
        <td  colspan="2">
            <h5>Grand Total</h5>
        </td>
        <td class="text-right bg-success">
          Rp.  <?= $datatahunan== null?'' : number_format(array_sum($grandtotal), 0) ?>
        </td>
        <td class="text-right bg-success">
           Rp. <?= $datatahunan== null?'' : number_format(array_sum($grandtotal), 0) ?>
        </td>
    </tr>
</table>
</div>