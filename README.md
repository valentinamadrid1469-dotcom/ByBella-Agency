# ByBella Agency — Proyecto Final de Programación Web

Sitio web responsivo de una agencia creativa fundada por **Valeria Madrid y Valentina Madrid**, con paquetes reales de marketing, servicios de branding, eventos y capacitaciones, formulario de cotización y **CRUD de solicitudes de clientes**.

## Tecnologías
- HTML5 semántico generado desde PHP
- CSS3 + Bootstrap 5.3.3 (CDN)
- JavaScript: validación, filtrado del portafolio, contador de caracteres, confirmación de eliminación
- PHP 8.1 o superior + PDO SQLite
- Base de datos SQLite (incluida en `data/bybella.sqlite` y también creada automáticamente si no existe)

## Cómo ejecutarlo en VS Code
1. Instala PHP 8.1+ y asegúrate de tener habilitadas las extensiones `pdo_sqlite` y `sqlite3`.
2. Abre la carpeta `bybellagency` en Visual Studio Code.
3. Abre una terminal integrada dentro de esa carpeta y ejecuta:
   ```bash
   php -S localhost:8000 router.php
   ```
4. Visita **http://localhost:8000/** (requiere conexión para cargar Bootstrap y las fuentes).
5. Entra en **http://localhost:8000/contacto.php** y envía una solicitud; queda guardada en SQLite.
6. Accede a **http://localhost:8000/login.php** para administrar las solicitudes.

Alternativa XAMPP: copia la carpeta a `htdocs/bybellagency`, inicia Apache y entra a `http://localhost/bybellagency/`. En XAMPP, SQLite/PDO SQLite deben estar activados.

**Importante:** No se ejecuta correctamente con Live Server ni abriendo el archivo `index.php` directamente, porque se requiere un servidor PHP.

## Acceso para evaluación (solo ambiente local)
- Contraseña de demostración: `Cambiar123!`
- En un servidor real, define una variable de entorno `BYBELLA_ADMIN_PASSWORD` con una contraseña propia y larga ANTES de iniciar PHP. El valor de demostración es **solo para clase**, nunca lo uses en producción.

## CRUD en `admin.php`
- **Create:** formulario “Agregar solicitud” o formulario público de contacto.
- **Read:** tabla que lee solicitudes de SQLite, con filtro por estado.
- **Update:** botón “Editar” y formulario con valores actuales.
- **Delete:** botón “Eliminar” con confirmación JavaScript.
- **Persistencia:** los cambios aparecen al recargar el listado porque se consultan directamente desde la base de datos.

Tabla: `solicitudes` (`id`, `nombre`, `email`, `empresa`, `telefono`, `servicio`, `mensaje`, `estado`, `created_at`, `updated_at`).

## Páginas
`index.php`, `nosotras.php`, `servicios.php`, `eventos.php`, `portafolio.php`, `contacto.php`, `login.php`, `admin.php`.

## Seguridad de demo
Consultas preparadas PDO, salida escapada con `htmlspecialchars`, validación HTML/JavaScript y PHP, tokens CSRF, sesiones para admin, regeneración de ID de sesión y bloqueo de acceso HTTP a archivos de la base de datos mediante `router.php` (PHP embebido) / `.htaccess` (Apache). Para producción faltaría añadir autenticación con hash de contraseñas, recuperación de cuenta, limitación de intentos, HTTPS, política de privacidad y protección antispam.

## Archivos y entregables
- El archivo `data/bybella.sqlite` **ya está incluido en este ZIP**, vacío y con su tabla preparada. Si se borra, el proyecto lo recrea en la primera visita. **No publiques datos reales de clientes.** El `.gitignore` evita subir el archivo a GitHub; para el entregable escolar puedes adjuntarlo por separado.
- Repositorio GitHub: debes crearlo en tu cuenta; no se crea automáticamente.
- Commits sugeridos: `estructura inicial y navegación`, `diseño responsivo y paquetes`, `base de datos y formulario`, `CRUD y validaciones`, `README y pruebas`.
- No subir solicitudes reales de clientes a GitHub. Usa datos ficticios para tu demostración.

## Contenido y referencias
Paquetes y precios del PDF **Paquetes de MKT** proporcionado para este proyecto. Colores, tono y estética inspirados en el perfil de Instagram **@bybellagency** enviado por las fundadoras. Portafolio: visuales recreados expresamente para la demostración, no se afirman resultados reales de clientes. Dirección de arte editorial inspirada de forma general por sitios de agencias creativas. No se copió código de otros sitios.

## Guía para entrevista
1. Explica por qué usaste PHP (para conectar interfaz y SQLite).
2. Enseña `includes/bootstrap.php`: creación de tabla, función `db()` y consultas con PDO.
3. Crea un registro desde `contacto.php` y muéstralo en `admin.php`.
4. Edita el estado, elimina otro registro y recarga para comprobar persistencia.
5. Muestra JavaScript en `assets/js/main.js` y Bootstrap en `includes/header.php`.
6. Reduce el ancho de la ventana para comprobar diseño responsivo.
