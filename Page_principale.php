<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>







<?php

spl_autoload_register(function($className){
  $className = str_replace("\\","/",$className);
  require "classes/" . $className . ".php";
});

use Roles\Lecteur;
use Roles\Auteur;
use Roles\Admin;
use Roles\SuperAdmin;