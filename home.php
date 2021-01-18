<?php
if($_SESSION['my_session']) {
    echo 'Welcome,' . $_SESSION['session_user'].' ';
    echo 'You are an ' . $_SESSION['session_role'];
}else{
    echo 'Welcome,guest';
    include_once './login_view.php';
    include_once './register_view.php';
}
?>
