<?php
$db = new PDO("mysql:host=127.0.0.1;dbname=115", '115', '!@#qwe123');
$db->query("set names utf8");
$count = $db->query("select * from 115_dateinfo where is_show = 1");
$res = $count->fetchAll(PDO::FETCH_OBJ);
//echo $count;
print_r($res);
// echo json_encode($res);
$db = null;