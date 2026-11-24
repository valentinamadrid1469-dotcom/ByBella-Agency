
# ByBella Agency

## Descripción del proyecto

ByBella Agency es una plataforma web desarrollada para una agencia creativa especializada en marketing digital, branding, diseño gráfico, desarrollo web, eventos y talleres.

El objetivo del proyecto es ofrecer un espacio digital donde los usuarios puedan conocer los servicios de la agencia, explorar su portafolio y solicitar cotizaciones personalizadas.

El sitio también incluye un sistema administrativo para consultar, actualizar y gestionar las solicitudes recibidas.

## Tecnologías utilizadas

- HTML5: estructura de las páginas.
- CSS3: estilos y diseño visual.
- Bootstrap 5: diseño adaptable a dispositivos móviles.
- JavaScript: interactividad y filtros del portafolio.
- PHP 8: procesamiento de formularios y lógica del servidor.
- SQLite: almacenamiento de solicitudes.
- PDO: conexión entre PHP y SQLite.
- WampServer: servidor local de desarrollo.
- Git y GitHub: control de versiones.

## Requisitos

- WampServer con Apache y PHP 8.
- Extensiones PDO_SQLite y SQLite3 habilitadas.
- Navegador web actualizado.

## Instrucciones de ejecución

1. Descargar o clonar este repositorio.
2. Copiar la carpeta del proyecto en `C:\wamp64\www\ByBella-Agency`.
3. Iniciar WampServer y verificar que Apache esté funcionando.
4. Abrir el navegador.
5. Acceder a `http://localhost/ByBella-Agency/`.

La base de datos se encuentra en `data/bybella.sqlite`.

El sistema utiliza PHP y PDO para establecer la conexión con SQLite y crear la tabla de solicitudes si no existe.

## Funcionalidades

- Página de inicio con navegación interactiva.
- Presentación de las fundadoras.
- Catálogo de servicios y paquetes de marketing.
- Paquetes de branding y diseño editorial.
- Información sobre desarrollo de páginas web.
- Apartado de eventos y talleres.
- Portafolio con filtros de Branding, Social Media y Web.
- Formulario para solicitar múltiples servicios.
- Registro de solicitudes mediante SQLite.
- Panel administrativo para gestionar solicitudes.
- Diseño adaptable a computadoras, tablets y celulares.

## Base de datos

Se utiliza SQLite para almacenar las solicitudes enviadas desde el formulario de contacto.

La tabla `solicitudes` contiene información del cliente, los servicios solicitados, el mensaje, el estado de seguimiento y las fechas de registro y actualización.

## Acceso administrativo

El panel administrativo se encuentra en `login.php`.

Para habilitarlo debe configurarse la variable de entorno `BYBELLA_ADMIN_PASSWORD` en el servidor PHP.

Por seguridad, el repositorio no incluye una contraseña predeterminada.

## Autora

Valentina Isabella Madrid Vieira.

## Proyecto académico

Proyecto final de Programació Web.
