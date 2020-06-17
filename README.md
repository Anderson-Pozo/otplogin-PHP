# Login OTP con PHP
Este es un ejemplo muy simple de como desarrollar
un sistema de login y registro de usuarios utilizando un doble factor de autenticidad

### Instalación
1. Clonar el repositorio
2. Crear archivo de configuración
3. Descargar la libreria de [Twilio master](https://github.com/twilio/twilio-php/archive/master.zip)
4. Ubicar el archivo de Twilio en la raíz del proyecto
5. Generar una cuenta en Twilio y obtener token de autorización para usar la API
6. Ubicar el token y SSID de Twilio en el archivo de configuración

Ejemplo del archivo de configuración

```php
<?php
define('HOST', '');
define('DB', '');
define('USER', '');
define('PASSWORD', '');

//Twilio API
define('SSID', 'xxxxxxxxxxxxxxxxxxxxxxxx');
define('TOKEN', 'xxxxxxxxxxxxxxxxxxxxxxxx');
```
El archivo config.php se debe ubicar en la ruta /lib

## Autores
* **Anderson Pozo**
* **Jhon Paillacho**
* **Wladimir Chiliquinga**

