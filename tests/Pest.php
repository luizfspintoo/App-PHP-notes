<?php
use Dotenv\Dotenv;

const BASE_PATH = __DIR__ . '/../';

$dotenv = Dotenv::createImmutable(__DIR__ . '/../', '.env.test');
$dotenv->load();