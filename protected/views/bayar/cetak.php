<html>
    <?php
        // echo "<pre>";
        // print_r($model);
        // echo "</pre>";
    ?>
    <style>
        table{
            border-spacing: 0;
             border-collapse: collapse; 
        }
        tr{
            padding:0;
        }
        td{
            padding:10px;
        }
        tr{
            border:1px solid #000;
        }
    </style>
    <table>
            <tr>
                <td>Pasien : </td>
                <td><?= $model->pasien->nama ?></td>
            </tr>
            <tr>
                <td>tanggal:</td>
                <td><?= $model->tanggal ?></td>
            </tr>
            <tr>
                <td>dokter:</td>
                <td><?= $model->dokter->nama ?></td>
            </tr>
            <tr><td></td></tr>
            <tr>
                <td>obat</td>
                <td>qty</td>
                <td>harga</td>
                <td>total</td>
            </tr>
            <?php
                foreach ($model->detilResep as $resep) { ?>
                    <tr>
                        <td><?= $resep->obat->nama ?></td>
                        <td><?= $resep->jumlah ?> <?= $resep->obat->satuan ?></td>
                        <td><?= $resep->harga ?></td>
                        <td><?= $resep->harga*$resep->jumlah ?></td>
                    </tr>
                <?php }
            ?>
            <tr>
                <td></td>
                <td></td>
                <td>Total</td>
                <td><?= $model->biaya_obat ?></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>Jasa</td>
                <td><?= $model->biaya_jasa ?></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>Total</td>
                <td><?= $model->bayar ?></td>
            </tr>
            <tr>
                <td>user:</td>
                <td><?= $model->user->username ?></td>
            </tr>
    </table>
</html>