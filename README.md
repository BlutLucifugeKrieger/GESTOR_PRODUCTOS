# GESTOR DE PRODUCTOS 


![PHP 8.2](https://img.shields.io/badge/php-8.2-blue) ![HTML5](https://img.shields.io/badge/-HTML5-E34F26?style=flat-square&logo=html5&logoColor=white) 
![CSS](https://img.shields.io/badge/-CSS3-1572B6?style=flat-square&logo=css3&logoColor=white)
![JavaScript](https://img.shields.io/badge/-JavaScript-F7DF1E?style=flat-square&logo=javascript&logoColor=black)


______________________________________________________________
**Contact info:**

**Juan Camilo Castro Velásquez**

**Email:** juan.leviathan@outlook.com




______________________________________________________________


 ## Planteamiento ##

Implementar un software para almacenar la información de un inventario de productos,
este programa debe poder leer, actualizar, borrar y crear productos,
para ello debemos utilizar el paradigma MVC.

______________________________________________________________

## Seccion de gestion ##

sobre el mismo proyecto crear una base de datos de usuarios que permita una acción para compra de producto, 
el cual recibirá el id del producto como parámetro y actualizara el campo de stock restando uno al valor actual y la fecha de ultima venta, 
( Si el producto no cuenta con stock debe devolver un mensaje de no venta por no tener productos ),  debe tener un inicio de sesión con los usuarios creados.


______________________________________________________________

## Metodologia ##


* Identificar los requerimietos funcionales.
* Trazar un plan de diseño (patrones de diseño como MVC).
* Definir tiempos estimados para el desarrollo.
* Diseñar la API usando PHP version 8.2.13.  (puro sin frameworks).
* Diseñar la vista web usando HTML,CSS y Javascript (puro sin frameworks).
* Realizar validaciones a la API.
* Consumir la API tanto usando software externos como en la misma vista web.
* Crear los templates de la vista web junto con su logica y estilos.
* Exaltar los elementos graficos usando frameworks como Bootstrap.
* Emplear herramientas como extensiones para alojar el aplicativo web de forma local y testear de forma comoda (Live Server).
* Aplicar script MySQL para crear la base de datos en el servidor local (ver ANEXOS)
* Realizar las ultimas pruebas y presentar la solucion.

___________________________________________________________________

## Instalacion y configuracion del respositorio ##
______________________________________________________________________________________________________

## FASE 1: CLONACION Y ADECUACION DE LOS DIRECTORIOS DEL REPOSITORIO ##

En primer lugar, deberas clonar el repositorio a traves del comando: "git clone https://github.com/BlutLucifugeKrieger/GESTOR_PRODUCTOS_PHP.git",
una vez lo hayas hecho, deberas mover la carpeta del repositorio al directorio de trabajo este variara si empleas XAMPP o WAMPSERVER.
_______________________________________________________________________________________________________

## FASE 2:  APERTURA DEL PROYECTO EN EL IDE DE TU PREFERENCIA ##
  
En segundo lugar, tendras que abrir el proyecto usando un IDE, en mi caso recomiento Visual Studio Code.
_____________________________________________________________________________________________________
## FASE 3: CONFIGURAR LA CONEXION A LA BASE DE DATOS

En tercer lugar, se debera crear la base de datos (MySQL), una vez ya la hayas creado, tendras que ejecutar el script que esta en anexos
del presente repositorio, con ello, podras crear las tablas necesarias para la ejecucion del proyecto.

Finalmente, cuando ya realices la creacion de la base de datos y las tablas, tendras que configurar la conexion a la base de datos.

Para ello, tendras que abrir el proyecto con un IDE y te deberas situar en la carpeta "Config" y acceder al archivo "Config.php":

![image](https://github.com/user-attachments/assets/5ea143ab-8e42-415f-a760-cf6fc1ef42b9)

En este punto, se reemplazaran las etiquetas '<server name>','<user>','<pass>','<dbname>' con las credenciales de acceso a tu servidor MySQL apuntando a la base de datos de interes.

Ejemplo: $connection = new mysqli('localhost','root','1234','gestor_db');

_____________________________________________________________________________________________________
## FASE 4: EJECUCION DE LA API DESARROLLADA EN PHP ##

En cuarto lugar, tienes que lanzar tu servidor local ya sea atraves de XAMP o WAMPSERVER, una vez lo hayas hecho, 
te dirijiras a la ruta o PATH del repositorio que clonaste.

En este punto, deberas dirigirte a la seccion o directorio de Controllers , en esta parte, abrirar los tres archivos .php que se encuentran en la carpeta.

de este modo tendras acceso a cada uno de los endpoints.
______________________________________________________________________________________________________                                           
 
 ## FASE 5: IDENTIFICACION DE LOS ENDPOINTS ##

  En mi caso en particular, los endpoits quedaron de la siguiente manera:
  
_____________________________________________________________________________

  ## ENDPOINTS DE PRODUCTOS ##
  
  ______________________________________________________________________________
  **Todos los productos: (GET)** -
  
  http://localhost/GESTOR_PRODUCTOS/Controllers/productsController.php
  
  
  _______________________________________________________________________________
  
  **Actualizar un producto: (PUT)** -


  http://localhost/GESTOR_PRODUCTOS/Controllers/productsController.php

 **Body**

 {   
    
    "NOMBRE_PRODUCTO":STRING,
    "REFERENCIA":STRING,
    "PRECIO":INT,
    "PESO":INT,
    "CATEGORIA":STRING,
    "STOCK":INT,
    "ID":INT
}

  ____________________________________________________________________________
  
  **Comprar un producto: (POST)**  -


  http://localhost/GESTOR_PRODUCTOS/Controllers/boughtItemsController.php
  

**Body**

 {   
    
    "ID_USUARIO":INT,
    "ID": INT,
    "NOMBRE_PRODUCTO": STRING,
    "REFERENCIA": STRING,
    "PRECIO": INT,
    "CATEGORIA": STRING,
    "STOCK": INT,
    "DINERO":INT
}
  
 _______________________________________________________________________________

  
  **Eliminar un producto: (DELETE)** -


   http://localhost/GESTOR_PRODUCTOS/Controllers/productsController.php

 **Body**

{   
    
    "ID":INT
}
 
_____________________________________________________________________________________________________________________

  ## ENDPOINTS DE USUARIOS ##
  

  **Todos los usuarios:(GET)** - 
  
  http://localhost/GESTOR_PRODUCTOS/Controllers/usersController.php
  
  _____________________________________________________________________________
  
  **Nuevo usuario: (POST)** - 
  
  http://localhost/GESTOR_PRODUCTOS/Controllers/usersController.php

  **Body**

 {   
    
    "NOMBRE_USUARIO":STRING,
    "CONTRASEÑA":STRING
}
  
  ______________________________________________________________________________
  
  **Actualizar un usuario: (PUT)** - 
  
  http://localhost/GESTOR_PRODUCTOS/Controllers/usersController.php

 **Body**
  

 {   
    
    "NOMBRE_USUARIO":STRING,
    "CONTRASEÑA":STRING,
    "DINERO":INT,
    "ID_USUARIO":INT
}

  _______________________________________________________________________________
  
  **Eliminar un usuario: (DELETE)** - 
  
  http://localhost/GESTOR_PRODUCTOS/Controllers/usersController.php

   **Body**
  

 {   
    
    "ID_USUARIO":INT
}
 
  ________________________________________________________________________________
  
  **Inicio de sesion: (POST)** - 

  
  http://localhost/GESTOR_PRODUCTOS/Controllers/usersController.php/userLogin

  **Body**
  

 {   
    
    "NOMBRE_USUARIO": STRING,
    "CONTRASEÑA": STRING
}

  
___________________________________________________________________________________
  **Todos los productos comprados por los usuarios:(GET)** - 
  
  
  http://localhost/GESTOR_PRODUCTOS/Controllers/boughtItemsController.php

___________________________________________________________________________________

  **Actualizar dinero: (POST)** - 
  
  
  http://localhost/GESTOR_PRODUCTOS/Controllers/usersController.php/money

  **Body**

  {   
    
   
    "ID_USUARIO": INT,
    "DINERO":INT

 }
__________________________________________________________________________________
  **Dinero actual: (POST)** - 
  
  http://localhost/GESTOR_PRODUCTOS/Controllers/usersController.php/money

 **Body**

  {   
    
   
    "ID_USUARIO": INT
    

 }
__________________________________________________________________________________
  
  **Busqueda de usuario por ID: (POST)** - 
  
  http://localhost/GESTOR_PRODUCTOS/Controllers/boughtItemsController.php/allFromID


   **Body**

  {   
    
   
    "ID_USUARIO": INT
    

 }

_______________________________________________________________________________________________________________________

## FASE 5: EJECUCION DE LA VISTA WEB ##

  En este caso en particular, te recomiendo que utilices una extension llamada "Live Server" que te permite alojar al app web mientras estas desarrollando,
  como si se tratase en las mecanicas de los frameworks de hoy dia, pero claro, mucho mas basico simplemente el host y ya.

   Entonces, para ejecutar correctamente el proyecto web, deberas, empezar o lanzar el Live Server a partir del template llamado "Home.html", ya que, esta parte,
  es la que se encarga de la gestion de usuarios, es decir, inicio de sesion y registro.

  Posteiormente, podras acceder con una cuenta que te hayas creado, y exploraras el menu principal, el cual cuenta con algunas caracteristicas.

  En primera instancia podras apreciar diferentes productos todos ellos, deplegados como elementos "Card" usando Bootstrap, alli, observaras que podras comprar dichos productos,
  y ademas, mediante el el slide bar, que esta a la derecha y veras otras opciones disponibles.

  1. Primero -> Podras actualizar tu cuenta mediante unos inputs.
     
  2. Podras ver tu cartera, de este modo podras estar al tanto de cuanto dinero tienes, para comprar productos
     (Ojo las cantidades de dinero, no se suman, pido perdon, pero no alcance a disponer de todo el tiempo que hubiera querido).
  3. Podras desconectarte de tu cuenta.
  4. Podras ver el historial de tus compras.
 
_______________________________________________________________________________________________________________________________
______________________________________________________________________________________________________________________________

## ANEXOS ##


### SCRIPT SQL ###

https://www.dropbox.com/scl/fi/uwe2g6bhqsviqqfrjao9o/php_sena_proyecto_script_camilo.sql?rlkey=k2fgft9recetd03xgnt3cradr&st=rkawjtmf&dl=0
