<?php
session_start();
include_once 'util/db_util.php';
include_once 'util/PDOUtil.php';
include_once 'db_function/user_function.php';
include_once 'dao/PegawaiDaoImpl.php';
include_once 'dao/MemberDaoImpl.php';
include_once 'dao/MinyakDaoImpl.php';
include_once 'dao/TransaksiDaoImpl.php';
include_once 'dao/UserDaoImpl.php';
include_once 'entity/Pegawai.php';
include_once 'entity/Member.php';
include_once 'entity/Transaksi.php';
include_once 'entity/User.php';
include_once 'entity/BahanBakar.php';
if(!isset($_SESSION['my_session'])){
    $_SESSION['my_session']=false;
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Colorlib Templates">
        <meta name="author" content="Colorlib">
        <meta name="keywords" content="Colorlib Templates">

        <title>Tubes PW 2</title>

        <!-- Icons font CSS-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <script>
            function updateMinyakValue(id){
                window.location="?navito=harga_update&id="+id;
            }

            function deleteArtistValue(id){
                window.location="?navito=artist&cmd=del&id="+id;
            }

            function updateAlbumValue(id){
                window.location="?navito=album_update&idalbums="+id;
            }

            function deleteAlbumValue(id){
                window.location="?navito=album&cmd=del&idalbums="+id;
            }
        </script>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">SPBYou</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="?navito=home">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <?php
                    if($_SESSION['my_session'] && $_SESSION['session_role']=='Owner'){
                    ?>
                        <li class="nav-item">
                            <a class="nav-link" href="?navito=data_pegawai">Data Pegawai</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="?navito=harga_view">Data Harga</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="?navito=transaksi_view">Data Transaksi</a>
                        </li>
                        <?php
                    }
                    ?>

                    <?php
                    if($_SESSION['my_session'] && $_SESSION['session_role']=='Pegawai'){
                    ?>
                    <li class="nav-item">
                        <a class="nav-link" href="?navito=transaksi">Data Transaksi</a>
                    </li>

                        <?php
                    }
                    ?>

                    <?php
                    if($_SESSION['my_session'] && $_SESSION['session_role']=='Member'){
                    ?>
                    <li class="nav-item">
                        <a class="nav-link" href="?navito=point">Point</a>
                    </li>
                        <?php
                    }
                    ?>

                    <li class="nav-item">
                        <a class="nav-link" href="?navito=logout">Logout</a>
                    </li>

                </ul>
            </div>
        </nav>

        <div style="clear:both;"></div>
        <!--Tag for content-->
        <main>
            <?php
            $nav = filter_input(INPUT_GET, "navito");
            switch ($nav) {
                case 'home':
                    include_once './home.php';
                    break;
                case 'data_pegawai':
                    include_once './pegawai_data_view.php';
                    break;
                case 'transaksi':
                    include_once './transaksi_view.php';
                    break;
                case 'transaksi_view':
                    include_once './transaksi_view_owner.php';
                    break;
                case 'profil':
                    include_once './profil_pegawai.php';
                    break;
                case 'point':
                    include_once './point_view.php';
                    break;
                case 'harga_view':
                    include_once './harga_view.php';
                    break;
                case 'harga_update':
                    include_once './harga_update.php';
                    break;
                case 'logout':
                    session_unset();
                    session_destroy();
                    header("location:index.php");
                    break;
                default:
                    include_once './home.php';
                    break;
            }
            ?>
        </main>
        
        
        <!-- Jquery JS-->
        <script src="vendor/jquery/jquery.min.js"></script>
        <!-- Vendor JS-->
        <script src="vendor/select2/select2.min.js"></script>
        <script src="vendor/datepicker/moment.min.js"></script>
        <script src="vendor/datepicker/daterangepicker.js"></script>

        <!-- Main JS-->
        <script src="js/global.js"></script>

        <!-- Datatable -->
        <script type="text/javascript" src="js/datatables.js"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $('#tableId').DataTable();
            });
        </script>

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
</html>
