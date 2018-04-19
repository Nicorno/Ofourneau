<?php



$instance = App::getInstance();
$table = $instance->getTable('Category');
var_dump($table);
//$categorie = $table->getAllByCategory($_GET['id']);
$categorie = $table->all();
var_dump($categorie);
