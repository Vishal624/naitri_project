<?php
session_start();
$con=mysqli_connect("localhost","root","","ecomm");
define('SERVER_PATH',$_SERVER['DOCUMENT_ROOT'].'/project/ecom/');
define('SITE_PATH','http://127.0.0.1/project/ecom/');

define('INSTAMOJO_REDIRECT',SITE_PATH.'payment_complete.php');

define('PRODUCT_IMAGE_SERVER_PATH',SERVER_PATH.'media/product/');
define('PRODUCT_IMAGE_SITE_PATH',SITE_PATH.'media/product/');

define('PRODUCT_MULTIPLE_IMAGE_SERVER_PATH',SERVER_PATH.'media/product_images/');
define('PRODUCT_MULTIPLE_IMAGE_SITE_PATH',SITE_PATH.'media/product_images/');

define('BANNER_SERVER_PATH',SERVER_PATH.'media/banner/');
define('BANNER_SITE_PATH',SITE_PATH.'media/banner/');

define('INSTAMOJO_KEY','key');
define('INSTAMOJO_TOKEN','token');
//https://www.youtube.com/watch?v=zWLKQ_loJqI&list=PLWCLxMult9xfYlDRir2OGRZFK397f3Yeb&index=24


define('SMTP_EMAIL','vishal0786sandhu@gmail.com');
define('SMTP_PASSWORD','bneauqbbppwvxhdb');
// https://www.youtube.com/watch?v=aBbmo1pi5B0&list=PLWCLxMult9xfY_dsYicKGcCLhlZ6YXFMh&index=1


define('SMS_KEY','pVmJMoYOXlLsczICQd6j7qkvFEAiUtg0yDRZ92a13GTw5bHuPhqpeGkdDl5xzvTKVNtcfJ7mMBuRi2Ya');
//https://www.youtube.com/watch?v=_XaaIJlkNV4&list=PLWCLxMult9xfYlDRir2OGRZFK397f3Yeb&index=27
?>