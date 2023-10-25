<?php
@session_start();
require '../login/connection.php';
if(@$_SESSION['Admin']){
    header("location:../layout/wrapperadmin/wrapper.php");
}else if(@$_SESSION['User']){
    header("location:../layout/wrapperuser/wrapper.php");
} else {
    header("location:../login/index.php");
}
 ?>