<?php
@session_start();

if (@!$_SESSION['userId']) {
    echo "<script>window.location='../index.php'</script>";
    exit();
}
