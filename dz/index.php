<?php

require 'vendor/autoload.php';
require 'DB.php';

$loader = new \Twig\Loader\FilesystemLoader('templates');
$twig = new \Twig\Environment($loader);



if (isset($_GET['from'])) {
    $goods = DB::getInstance()->getTableDataPart(DB::TABLE_GOODS, $_GET['from'], 5);

    echo $twig->render('goods.twig', [
        'items' => $goods,
    ]);
    exit;

}



echo $twig->render('index.twig');
//print_r(DB::getInstance()->getTableDataPart(DB::TABLE_GOODS, 3, 2));
//print_r(DB::getInstance()->getTableDataCount(DB::TABLE_GOODS));



