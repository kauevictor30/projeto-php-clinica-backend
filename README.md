# Projeto Clínica Médica - PHP (CRUD & Arquitetura)

Este projeto foi desenvolvido como parte do curso de **Análise e Desenvolvimento de Sistemas (ADS)** na UNINASSAU Parnaíba. O objetivo foi a implementação de um ecossistema de gestão clínica utilizando PHP orientado a objetos, aplicando padrões de projeto e persistência em banco de dados relacional.

## 🏗️ Arquitetura do Projeto

O projeto segue uma estrutura baseada em camadas, garantindo a separação entre a lógica de domínio e a implementação de infraestrutura:



* **Domínio (Domain):** Contém as entidades de negócio (`Medico`, `Paciente`, `Consulta`) e as interfaces (contratos) dos repositórios.
* **Infraestrutura (Infrastructure):** Responsável pela comunicação externa, incluindo a conexão com o banco de dados via PDO e a implementação dos repositórios em SQL.

## 🛠️ Tecnologias e Padrões

* **Linguagem:** PHP 8.2+
* **Banco de Dados:** SQLite (Persistência via PDO)
* **Gestão de Dependências:** Composer (PSR-4 Autoload)
* **Padrões:** Repository Pattern, Dependency Injection (Injeção de Dependência) e Hidratação de Objetos.

## 📁 Estrutura de Diretórios

'''bash
.
├── src/
│   ├── Dominio/
│   │   ├── Modulos/
│   │   │   ├── Consulta.php
│   │   │   ├── Medico.php
│   │   │   └── Paciente.php
│   │   └── Repositorios/
│   │       ├── RepositorioConsultaInterface.php
│   │       ├── RepositorioMedicoInterface.php
│   │       └── RepositorioPacienteInterface.php
│   └── Infraestrutura/
│       ├── Persistencia/
│       │   └── FabricaConexao.php
│       └── Repositorios/
│           ├── RepositorioConsulta.php
│           ├── RepositorioMedico.php
│           └── RepositorioPaciente.php
├── vendor/
├── atualizar-consulta.php
├── banco.sqlite
├── composer.json
├── index.php
├── inserir-consulta.php
├── listar-consultas.php
├── remover-consulta.php
└── sql.php


## 🚀 Como Executar
**​1. Instalar dependências:**
composer install
**​2. Gerar Autoload:**
composer dump-autoload
**​3. Executar scripts de teste:**
php inserir-consulta.php

## ​💭 Agradecimentos e Reflexão
​"Nesse projeto aprendi bastante, gostaria de agradecer ao professor Luiz Lins, nesse projeto eu me senti um programador de verdade, depois de muitos projetos criados, logo este projeto foi especial. obrigado!"

​Autor: Kauê Victor

Instagram @kauevictor.dev | https://vksdesigner.com.br