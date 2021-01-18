<?php
$pegawaiDao= new PegawaiDaoImpl();
$userDao= new UserDaoImpl();

$submit=filter_input(INPUT_POST,"btnSubmit");
if($submit){
    //get data dari form
    $nampeg=filter_input(INPUT_POST,"nampeg");
    $jk=filter_input(INPUT_POST,"jk");
    $alamat=filter_input(INPUT_POST,"alamat");
    $username=filter_input(INPUT_POST,"username");
    $password=filter_input(INPUT_POST,"password");

    $users=new User();
    $users->setName($nampeg);
    $users->setUsername($username);
    $users->setPassword(md5($password));
    $userDao->addUserDataPegawai($users);

    $userId=$userDao->fetchUser($nampeg);
    $users2=new User();
    $users2->setId($userId['id']);


    $pegawais=new Pegawai();
    $pegawais->setNama($nampeg);
    $pegawais->setJenisKelamin($jk);
    $pegawais->setAlamat($alamat);
    $pegawais->setUser($userId['id']);
    $pegawaiDao->addPegawaiData($pegawais);



}
?>

<div class="p-3">
    <form method="POST" action="">
        <div class="form-group">
            <label class="label">Nama Pegawai</label>
            <input class="form-control" type="text" name="nampeg" required="">
        </div>

        <div class="form-group">
            <label class="label">Jenis Kelamin</label>
            <input class="form-control" type="text" name="jk" required="">
        </div>

        <div class="form-group">
            <label class="label">Alamat</label>
            <input class="form-control" type="text" name="alamat" required="">
        </div>

        <div class="form-group">
            <label class="label">Username</label>
            <input class="form-control" type="text" name="username" required="">
        </div>

        <div class="form-group">
            <label class="label">Password</label>
            <input class="form-control" type="password" name="password" required="">
        </div>



        <div class="p-t-15">
            <button type="submit" class="btn btn-lg btn-primary btn-block" name="btnSubmit" Value="Submit">Submit</button>
        </div>
    </form>

<br/>
    <table id="tableId" class="table table-striped table-bordered">
        <thead class="thead-dark">
        <tr>
            <th scope="col">Nama</th>
            <th scope="col">Alamat</th>
        </tr>
        </thead>

        <tbody>
        <?php
        $pegawaiDao=new PegawaiDaoImpl();
        $result=$pegawaiDao->fetchPegawaiData();
        /* @var $row Pegawai*/
        foreach ($result as $row){
            ?>
            <tr>
                <td><?php echo $row->getNama(); ?></td>
                <td><?php echo $row->getAlamat(); ?></td>
            </tr>
            <?php
        }
        $link=null;
        ?>
        </tbody>
    </table>
    <div>