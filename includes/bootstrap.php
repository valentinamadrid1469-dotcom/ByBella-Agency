<?php
declare(strict_types=1);
if (session_status() !== PHP_SESSION_ACTIVE) session_start();
function db(): PDO {
    static $db = null;
    if ($db instanceof PDO) return $db;
    $path = dirname(__DIR__).'/data/bybella.sqlite';
    if (!is_dir(dirname($path))) mkdir(dirname($path), 0775, true);
    $db = new PDO('sqlite:'.$path);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $db->exec('PRAGMA busy_timeout=5000; PRAGMA foreign_keys=ON;');
    $db->exec("CREATE TABLE IF NOT EXISTS solicitudes (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        nombre TEXT NOT NULL, email TEXT NOT NULL,
        empresa TEXT NOT NULL DEFAULT '', telefono TEXT NOT NULL DEFAULT '',
        servicio TEXT NOT NULL, mensaje TEXT NOT NULL,
        estado TEXT NOT NULL DEFAULT 'Nueva' CHECK (estado IN ('Nueva','En proceso','Contactada','Cerrada')),
        created_at TEXT NOT NULL DEFAULT CURRENT_TIMESTAMP,
        updated_at TEXT NOT NULL DEFAULT CURRENT_TIMESTAMP
    )");
    return $db;
}
function e(?string $s): string { return htmlspecialchars($s ?? '', ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'); }
function csrf(): string { if(empty($_SESSION['csrf'])) $_SESSION['csrf'] = bin2hex(random_bytes(32)); return $_SESSION['csrf']; }
function check_csrf(): void { if (!hash_equals(csrf(), (string)($_POST['csrf'] ?? ''))) { http_response_code(403); exit('Solicitud inválida (CSRF).'); } }
function redirect(string $where): never { header('Location: '.$where); exit; }
function admin(): bool { return !empty($_SESSION['admin']); }
function require_admin(): void { if (!admin()) redirect('login.php'); }
function flash(string $type, string $message): void { $_SESSION['flash'] = [$type, $message]; }
function get_flash(): ?array { $v=$_SESSION['flash']??null; unset($_SESSION['flash']); return $v; }
function service_groups(): array {
    return [
        'Paquetes de marketing' => ['Calendar', 'Starter', 'Premium', 'Diamante'],
        'Diseño editorial' => ['Revistas', 'Catálogos', 'Workbooks', 'Menús', 'Manuales', 'Stickers', 'Otros proyectos editoriales'],
        'Paquetes de branding' => ['Branding Básico', 'Branding Intermedio', 'Branding Avanzado'],
        'Páginas web' => ['Páginas web'],
        'Experiencias' => ['Eventos', 'Talleres'],
        'Otros' => ['Otro servicio / proyecto personalizado'],
    ];
}
function service_options(): array {
    return array_merge(...array_values(service_groups()));
}
function selected_services(mixed $input): array {
    if (is_string($input)) {
        // Compatibilidad con solicitudes anteriores que guardaban un solo servicio.
        $legacy = ['Branding y diseño'=>'Branding Intermedio', 'Evento empresarial'=>'Eventos',
            'Taller'=>'Talleres', 'Diseno editorial'=>'Otros proyectos editoriales',
            'Pagina web'=>'Páginas web', 'Paquete de Básico'=>'Branding Básico',
            'Paquete de Intermedio'=>'Branding Intermedio', 'Paquete de Avanzado'=>'Branding Avanzado'];
        $input = $legacy[$input] ?? $input;
        $input = array_map('trim', explode(', ', $input));
    }
    if (!is_array($input)) return [];
    $allowed = service_options();
    $unique = [];
    foreach ($input as $item) {
        if (!is_string($item)) continue;
        $item = trim($item);
        if (in_array($item, $allowed, true) && !in_array($item, $unique, true)) $unique[] = $item;
    }
    return $unique;
}
function validate_request(array $p): array {
    $v=[];
    foreach (['nombre','email','empresa','telefono','mensaje'] as $f)
        $v[$f]=is_string($p[$f]??null) ? trim($p[$f]) : '';
    $chosen = selected_services($p['servicio']??[]);
    $v['servicio'] = implode(', ', $chosen);
    $errors=[];
    if(strlen($v['nombre'])<2 || strlen($v['nombre'])>100) $errors[]='Escribe un nombre de 2 a 100 caracteres.';
    if(!filter_var($v['email'], FILTER_VALIDATE_EMAIL) || strlen($v['email'])>150) $errors[]='Escribe un correo válido.';
    if(strlen($v['empresa'])>120) $errors[]='La empresa es demasiado larga.';
    if(strlen($v['telefono'])>40) $errors[]='El teléfono es demasiado largo.';
    if (!$chosen) $errors[]='Selecciona al menos un servicio válido.';
    if (strlen($v['servicio'])>1000) $errors[]='Has seleccionado demasiados servicios.';
    if(strlen($v['mensaje'])<10 || strlen($v['mensaje'])>2500) $errors[]='El mensaje debe tener entre 10 y 2500 caracteres.';
    return [$v,$errors];
}
// Inicializa la base para que el archivo SQLite se cree en la primera visita.
db();
