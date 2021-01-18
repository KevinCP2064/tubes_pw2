<div class="p-3">

    <table id="tableId" class="table table-striped table-bordered">
        <thead class="thead-dark">
        <tr>
            <th>Nama Pegawai</th>
            <th>Nama Member</th>
            <th>Jenis Minyak</th>
            <th>Banyak Liter</th>
            <th>Total Biaya</th>

        </tr>
        </thead>

        <tbody>
        <?php
        $transaksiDao=new TransaksiDaoImpl();
        $result=$transaksiDao->fetchTransaksiData();
        /* @var $row Transaksi*/
        foreach ($result as $row){
            ?>
            <tr>
                <td><?php echo $row->getPegawai(); ?></td>
                <td><?php echo $row->getMember(); ?></td>
                <td><?php echo $row->getBahanBakar(); ?></td>
                <td><?php echo $row->getLiter(); ?></td>
                <td><?php echo $row->getTotalBiaya(); ?></td>

            </tr>
            <?php
        }
        $link=null;
        ?>
        </tbody>
    </table>
</div>