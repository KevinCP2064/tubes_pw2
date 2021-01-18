<?php
$minyakDao= new MinyakDaoImpl();
$id=filter_input(INPUT_GET,"id");
if(isset($id)){
    $minyaks=new BahanBakar();
    $minyaks->setId($id);
    $result=$minyakDao->fetchMinyak($minyaks);
}

$submit=filter_input(INPUT_POST,"btnSubmit");
if($submit){
    //get data dari form
    $harga=filter_input(INPUT_POST,"harga");
    $minyaks=new BahanBakar();
    $minyaks->setHarga($harga);
    $minyaks->setId($id);
    $result=$minyakDao->updateMinyakData($minyaks);
    header("location:index.php?navito=harga_view");
}
?>
<h1>Update Harga Minyak</h1>
<form method="POST" action="">
    <div class="form-control">
                <div class="form-group">
                    <label class="label">Harga Minyak</label>
                    <input class="form-control" type="text" name="harga" required="" value="<?php echo $result->getHarga(); ?>">
                </div>
        <div class="p-t-15">
            <input class="btn btn--radius-2 btn--blue" type="submit" Value="Submit" name="btnSubmit"/>
        </div>
    </div>
</form>




