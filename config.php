<?php
// Tự động tính base URL dựa vào vị trí project
$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' 
             || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";

$host = $_SERVER['HTTP_HOST'];
#link direct
$addLink = "/xampp/htdocs/Experiment";
// Lấy thư mục gốc của project (trong trường hợp project không nằm ở thư mục gốc của web server)
$project_folder = basename(dirname(__FILE__));
$base_url = $protocol . $host . $addLink . "/" . $project_folder;
?>
