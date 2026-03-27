<?php

$caminhoDoBanco = __DIR__ . "/banco.sqlite";

$pdo = new PDO("sqlite:$caminhoDoBanco");

echo "conectei\n";