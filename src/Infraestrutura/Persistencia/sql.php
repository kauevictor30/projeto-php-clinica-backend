<?php

$caminhoBanco = __DIR__ . "/banco.sqlite";
$pdo = new PDO("sqlite:$caminhoBanco");
$pdo->exec("
    CREATE TABLE IF NOT EXISTS medicos (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        crm TEXT,
        nome TEXT,
        especialidade TEXT
    );

    CREATE TABLE IF NOT EXISTS pacientes (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        cpf VARCHAR(11) NOT NULL UNIQUE,
        nome VARCHAR(100) NOT NULL,
        data_nascimento TIMESTAMP,
        criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    );
");