<?php

if(isset($_COOKIE['session'])){
    header("Location: public/dashboard.php");
}else{
    header("Location: public/index.php");
}