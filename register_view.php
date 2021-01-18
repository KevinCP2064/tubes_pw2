<?php
$userDao=new UserDaoImpl();
$memberDao=new MemberDaoImpl();
$register=filter_input(INPUT_POST,"btnRegister");
if($register){
    //get data dari form
    $nama=filter_input(INPUT_POST,"namleng");
    $username=filter_input(INPUT_POST,"txtUsername");
    $password=filter_input(INPUT_POST,"txtPassword");
    $md5password=md5($password);

    $users=new User();
    $users->setName($nama);
    $users->setUsername($username);
    $users->setPassword($md5password);
    $result=$userDao->addUserDataMember($users);

    $userId=$userDao->fetchUser($nama);

    $members=new Member();
    $members->setName($nama);
    $members->setUser($userId['id']);
    $memberDao->addMemberData($members);

        $_SESSION['my_session']=true;
        $_SESSION['session_user']=$result['name'];
        $_SESSION['session_role']=$result['role'];
        $_SESSION['session_id']=$result['id'];
//        if($_SESSION['session_role']=='Pegawai'){
//            $result_pegawai=fetchPegawai($result['id']);
//            $_SESSION['session_pegawai']=$result_pegawai['nama'];
//            $_SESSION['session_gender']=$result_pegawai['jenis_kelamin'];
//            $_SESSION['session_alamat']=$result_pegawai['alamat'];
//        }
        header("location:index.php");
}
?>
<form method="post">
    <h1 class="h3 mb3 font-weight-normal">Please Register</h1>
    <div class="form-group">
        <label class="label">Nama Lengkap</label>
        <input class="form-control" type="text" name="namleng" required="">
    </div>

    <div class="form-group">
        <label for="txtUsername" class="sr-only">Username</label>
        <input class="form-control" type="text" id="txtUsername" placeholder="Username" name="txtUsername" autofocus required>
    </div>

    <div class="form-group">
        <label for="txtPassword" class="sr-only">Password</label>
        <input class="form-control" type="password" id="txtPassword" placeholder="Password" name="txtPassword" autofocus required>
    </div>

    <input type="submit" value="Sign In" class="btn btn-lg btn-primary btn-block" name="btnRegister">
</form>
