# Proyecto de Gestión de Pedidos con Laravel

Este proyecto es una aplicación web desarrollada con Laravel para gestionar pedidos, roles, permisos, productos y más. A continuación, se detallan los pasos necesarios para configurar y ejecutar este proyecto en cualquier computadora con Windows.

---
## **Requisitos previos**

Antes de comenzar, asegúrate de que tu computadora cumpla con los siguientes requisitos:
1. **PHP**: Versión 8.3.2. 
https://windows.php.net/download#php-8.3 - VS16 x64 Thread Safe (2025-Apr-08 22:21:18)
2. **Composer**: Administrador de dependencias para PHP - Version 2.8.6.
https://getcomposer.org/download/    
3. **Git Bash** : Para clonar el repositorio.
4. **Base de datos Oracle**: Configurada y accesible en el puerto 1521 .
Instalar InstantClient_23_7.  Basic Usage y SDK files
1. **Servidor web**: Apache o Nginx (puedes usar XAMPP o Laragon para simplificar).

---
## **Pasos para configurar el proyecto**

### **1. Descargar Oracle Instant Cliente 23_7, SQl*Plus Package, SDK Package . Tener instalado Oracle Database 21C. Para el uso e instalaciones de la base de datos.
La información de la base de datos se encuentra el archivo proyecto.sql para la instalación de la base de datos en SQL Developer.
Instalar el archivo proyecto.sql e instalar la base de datos.

### **2. Instalar Composer para las dependencias y paquetes**
https://getcomposer.org/download/    
Nota: Apuntar la ruta de instalaciones a la carpeta de PHP con la Version 2.8.6. C:/XAMPP/PHP/PHP.EXE         

Comprobar que esta instalado, corriéndo el comando.
composer —v   

### **3. Clonar el repositorio**
Clonamos el repositorio en tu computadora desde gitbash:

```bash
git clone https://github.com/karaya10824/sc502-1c2025-g1.git    

### **4. Configuración inicial** 
Buscamos el archivo resources.zip en la carpeta raíz de nuestro proyecto, y copiaremos los archivos menos env, donde tenemos instalado las dependencias y librerías. 
Córremeos el siguiente comando si no sabemos donde tenemos ubicado el servicio de php. 
php --ini 

Cuando lo identifiquémos el archivo php.ini, lo vamos a abrir para seleccionar las extensiones que necesitamos para nuestro proyecto. Buscamos las siguientes y le eliminamos el ;
extension=fileinfo
extension=exif
extension=sodium          

### **5. Actualizamos e instalamos dependencias necesarias para correr este proyecto**
Luego dirigirnos a la carpeta del repositorio clonado por terminal y corremos los comandos.
composer update
composer Install 

### **6. Conectamos el proyecto con nuestra base de datos corriéndo en el puerto 1521*
Ir al archivo .env (Si no esta, crear archivo .env, irse a recursos y abrir el archivo env, se copia y pega en el archivo de nuestro proyecto) y configurar la linea 23 con la información de la base de datos Oracle.
DB_CONNECTION=oracle
DB_HOST=127.0.0.1
DB_PORT=1521
DB_SERVICE_NAME=ORCLCDB
DB_USERNAME=FIDE_TECHLAB_USER
DB_PASSWORD=FIDE_TECHLAB_USER

### **7. Creamos las tablas faltantes para los permisos, usuarios e imágenes.**
 php artisan migrate
 php artisan db:seed

### **8. Final. Corremos el siguiente comando y podremos abrir el proyecto en nuestro navegador con la url. localhost:8000
php artisan serve
