<?php
// Router para el servidor de desarrollo php -S. Evita servir la base de datos y carpetas privadas.
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$path = rawurldecode($path ?: '/');
if (preg_match('~(^|/)(data|includes)(/|$)|(^|/)\.|\.sqlite(?:-(?:wal|shm|journal))?$~i', $path)) {
    http_response_code(403); echo '403 Forbidden'; return true;
}
if ($path === '/') {require __DIR__.'/index.php';return true;}
$file = realpath(__DIR__ . $path);
if ($file && str_starts_with($file, __DIR__ . DIRECTORY_SEPARATOR) && is_file($file)) return false;
http_response_code(404); echo '404 Not Found'; return true;
