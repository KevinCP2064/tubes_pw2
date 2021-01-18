<div class="p-3">

<table id="tableId" class="table table-striped table-bordered">
    <thead class="thead-dark">
    <tr>
        <th>Nama Minyak</th>
        <th>Harga</th>
        <th>Action</th>

    </tr>
    </thead>

    <tbody>
    <?php
    $minyakDao=new MinyakDaoImpl();
    $result=$minyakDao->fetchMinyakData();
    /* @var $row BahanBakar*/
    foreach ($result as $row){
        ?>
        <tr>
            <td><?php echo $row->getNamaMinyak(); ?></td>
            <td><?php echo $row->getHarga(); ?></td>
            <td>
                <button onclick="updateMinyakValue(<?php echo $row->getId(); ?>)">Update</button>
            </td>
        </tr>
        <?php
    }
    $link=null;
    ?>
    </tbody>
</table>
</div>