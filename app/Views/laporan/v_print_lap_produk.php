<div class="col-12">
<table id="example1" class="table table-bondered table-striped">
                    <thead>
                    <tr class= "text-center">
                        <th width="50px">No</th>
                        <th>Kode/Barcode</th>
                        <th>Nama Produk</th>
                        <th>Kategori</th>
                        <th>Satuan</th>
                        <th>Harga Beli</th>
                        <th>Harga Jual</th>
                        <th>Stok</th>
                    </tr>
                    </thead>
                    <tbody>
                      
                    <?php  $no =1;
                    foreach ($produk as $key => $value) { ?>
                        <tr class="<?= $value['stok']==0 ? 'text-danger' :'' ?>">
                          <td class= "text-center"><?= $no++ ?></td>
                          <td class= "text-center"><?= $value['kode_produk'] ?></td>
                          <td><?= $value['nama_produk'] ?></td>
                          <td class= "text-center"><?= $value['nama_kategori'] ?></td>
                          <td class= "text-center"><?= $value['nama_satuan'] ?></td>
                          <td>Rp. <?= number_format( $value['harga_beli'], 0) ?></td>
                          <td class= "text-right">Rp. <?= number_format( $value['harga_jual'], 0) ?></td>
                          <td class= "text-right"><?= $value['stok'] ?></td>
                        </tr>
                    <?php } ?>
                    </tbody>
                    <b>Print Date : </b><?= date('d M Y H:i:s')?>
                </table>
</div>