<section class="w3l-ecommerce-main">
    <div class="ecom-contenthny py-5">
        <div class="container py-lg-5">
            <form action="<?php echo base_url('api/checkout/update/'.$order->id); ?>" method="post" class="row">
                <div class="col-md-3">
                    Penerima : <?php echo $order->name;?>
                    <br>
                    Subtotal &nbsp;: <?php echo 'Rp.'.$order->subtotal;?>
                    <br>
                    Rekening : <?php echo $this->config->item('atm');?>
                    <br>

                </div>
                <div class="col-md-1">
                    Alamat
                </div>
                <div class="col-md-5">
                  <textarea name="address" id="" class="form-control" required></textarea>
                </div>
                <div class="col-md-3">
                    <button type="submit" class='btn btn-success'>Submit</button>
                </div>

                <br>
                <br>
                <br>
                <table style="width:100%">
                    <tr>
                        <th>Id Pesanan</th>
                        <th>Produk</th>
                        <th>Harga</th>
                        <th>Qty</th>
                        <th>Total</th>
                        <th>Opsi</th>
                    </tr>
                    <?php foreach($detail as $item) : ?>
                    <tr>
                        <td><?php echo $item->id ?></td>
                        <td><?php echo $item->product ?></td>
                        <td><?php echo $item->price ?></td>
                        <td><?php echo $item->qty ?></td>
                        <td><?php echo $item->total ?></td>
                        <td> <a class='btn btn-danger' href='<?php echo base_url('api/checkout/delete/'.$item->id); ?>'>Hapus</a> </td>
                    </tr>
                    <?php endforeach; ?>
                </table>
            </form>
        
        </div>
    </div>
</div>