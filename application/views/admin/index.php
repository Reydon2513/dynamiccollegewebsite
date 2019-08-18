<?php

require_once("common/header.php");
require_once("common/sidebar.php");
require_once($pagename.'.php');

if($response['errorcode'] == 0){
    echo "<script>alert('".$response['msg']."')</script>";
}else if($response['errorcode'] == 1){
    echo "<script>alert('".$response['msg']."')</script>";
}
require_once("common/footer.php");

?>