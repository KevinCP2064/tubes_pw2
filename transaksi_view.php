<?php
$memberDao= new MemberDaoImpl();
$userDao= new UserDaoImpl();
$bahanBakarDao= new MinyakDaoImpl();
$transaksiDao= new TransaksiDaoImpl();

$submit=filter_input(INPUT_POST,"btnSubmit");
if($submit){
    //get data dari form
    $member_name=filter_input(INPUT_POST,"member_name");
    $minyak_name=filter_input(INPUT_POST,"minyak_name");
    $liter=filter_input(INPUT_POST,"liter");

    $userId=$userDao->fetchUser($_SESSION['session_user']);
    $hargaMinyak=$bahanBakarDao->fetchMinyak($minyak_name);

    $transaksi=new Transaksi();
    $transaksi->setMember($member_name);
    $transaksi->setBahanBakar($member_name);
    $transaksi->setPegawai($userId['id']);
    $transaksi->setLiter($liter);
    $transaksi->setTotalBiaya($liter*$hargaMinyak['harga']);
    $transaksiDao->addTransaksiData($transaksi);

}
?>

<h1>Transaksi</h1>
<form method="POST" action="" enctype="multipart/form-data">


            <div class="form-control">
                <label class="label">Nama Member</label>
                <div class="rs-select2 js-select-simple select--no-search">
                    <select name="member_name">
                        <option disabled="disabled" selected="selected">Pilih member</option>
                        <?php
                        $link= new PDO("mysql:host=localhost:3307; dbname=tubespw", "root","");
                        $link->setAttribute(PDO::ATTR_AUTOCOMMIT,false);
                        $link->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                        $query="SELECT * FROM member";
                        $result=$link->query($query);
                        foreach ($result as $row){
                            ?>
                            <option value="<?php echo $row['user_id']; ?>"><?php echo $row['name']; ?></option>
                            <?php
                        }
                        $link=null;
                        ?>
                    </select>

                </div>
            </div>



    <div>
        <div >
            <div class="form-control">
                <label class="label">Jenis Bahan Bakar</label>
                <div class="rs-select2 js-select-simple select--no-search">
                    <select name="minyak_name">
                        <option disabled="disabled" selected="selected">Pilih Bahan Bakar</option>
                        <?php
                        $link= new PDO("mysql:host=localhost:3307; dbname=tubespw", "root","");
                        $link->setAttribute(PDO::ATTR_AUTOCOMMIT,false);
                        $link->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                        $query="SELECT * FROM bahan_bakar";
                        $result=$link->query($query);
                        foreach ($result as $row){
                            ?>
                            <option value="<?php echo $row['id']; ?>"><?php echo $row['nama_minyak']."-".$row['harga']; ?></option>
                            <?php
                        }
                        $link=null;
                        ?>
                    </select>

                </div>
            </div>
        </div>
    </div>

    <div class="form-group">
        <label class="label">Berapa Liter</label>
        <input class="form-control" type="text" name="liter" required="">
    </div>

    <div class="p-t-15">
        <input class="btn btn--radius-2 btn--blue" type="submit" Value="Submit" name="btnSubmit"/>
    </div>
</form>




