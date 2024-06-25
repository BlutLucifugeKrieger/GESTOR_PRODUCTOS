# GESTOR DE PRODUCTOS 


![PHP 8.2](https://img.shields.io/badge/php-8.2-blue) ![HTML5](https://img.shields.io/badge/-HTML5-E34F26?style=flat-square&logo=html5&logoColor=white) 
![CSS](https://img.shields.io/badge/-CSS3-1572B6?style=flat-square&logo=css3&logoColor=white)
![JavaScript](https://img.shields.io/badge/-JavaScript-F7DF1E?style=flat-square&logo=javascript&logoColor=black)


______________________________________________________________
**Contact info:**

**Juan Camilo Castro Velásquez**

**Email:** juan.leviathan@outlook.com




______________________________________________________________


**Planteamiento**

Implementar un software para almacenar la información de un inventario de productos,
este programa debe poder leer, actualizar, borrar y crear productos (CRUD),
para ello debemos utilizar el paradigma MVC.

______________________________________________________________

**Seccion Opcional**

sobre el mismo proyecto crear una base de datos de usuarios que permita una acción para compra de producto, 
el cual recibirá el id del producto como parámetro y actualizara el campo de stock restando uno al valor actual y la fecha de ultima venta, 
( Si el producto no cuenta con stock debe devolver un mensaje de no venta por no tener productos ),  debe tener un inicio de sesión con los usuarios creados.


______________________________________________________________

**Metodologia**


* Identificar los requerimietos funcionales.
* Trazar un plan de diseño (patrones de diseño como MVC).
* Definir tiempos estimados para el desarrollo (Aprox 1 dia).
* Diseñar la API usando PHP version 8.2.13.  (puro sin frameworks).
* Diseñar la vista web usando HTML,CSS y Javascript (puro sin frameworks).
* Realizar validaciones a la API.
* Consumir la API tanto usando software externos como en la misma vista web.
* Crear los templates de la vista web junto con su logica y estilos.
* Exaltar los elementos graficos usando frameworks como Bootstrap.
* Emplear herramientas como extensiones para alojar el aplicativo web de forma local y testear de forma comoda (Live Server).
* Desplegar un servidor cloud en AZURE en donde se aloja la base de datos en MYSQL.
* Realizar las ultimas pruebas y presentar la solucion.

___________________________________________________________________

**Instalacion y configuracion del respositorio**

**NOTA:** La conexion de la base de datos, en este caso, no la trabaje de forma local, es decir, 
          gracias a una licencia que poseo, desplegue un servidor en la nube de AZURE, y alli, una base de datos MYSQL.
          Asimismo, configure el servidor para dar acceso desde cualquier IP, asi que no tendrias que configurar ni aplicar scripts para crear bases locales.
          No obstante, en la ultima parte del repositorio, dejo el script que aloja todas las sentencias SQL que aplique. Gracias.

* **FASE 1:** CLONACION Y ADECUACION DE LOS DIRECTORIOS DEL REPOSITORIO

En primer lugar, deberas clonar el repositorio a traves del comando: "git clone https://github.com/BlutLucifugeKrieger/GESTOR_PRODUCTOS_PHP.git",
una vez lo hayas hecho, deberas mover la carpeta del repositorio al directorio de trabajo este variara si empleas XAMPP o WAMPSERVER.

* **FASE 2:**  APERTURA DEL PROYECTO EN EL IDE DE TU PREFERENCIA
* 
En segundo lugar, tendras que abrir el proyecto usando un IDE, en mi caso recomiento Visual Studio Code.

* **FASE 3:** EJECUCION DE LA API DESARROLLADA EN PHP

En tercer lugar, tienes que lanzar tu servidor local ya sea atraves de XAMP o WAMPSERVER, una vez lo hayas hecho, 
te dirijiras a la ruta o PATH del repositorio que clonaste.

En este punto, deberas dirigirte a la seccion o directorio de Controllers , en esta parte, abrirar los tres archivos .php que se encuentran en la carpeta.

de este modo tendras acceso a cada uno de los endpoints.

* **FASE 4:** IDENTIFICACION DE LOS ENDPOINTS

  En mi caso en particular, los endpoits quedaron de la siguiente manera:
  

  **ENDPONITS DE PRODUCTOS**
  
  
  **Todos los productos: (GET)** -
  
  http://localhost/prueba_tecnica_juanCastro/Controllers/productsController.php
  
  
  **Actualizar un producto: (PUT)** -


  http://localhost/prueba_tecnica_juanCastro/Controllers/productsController.php
  
  
  **Comprar un producto: (POST)**  -


  http://localhost/prueba_tecnica_juanCastro/Controllers/boughtItemsController.php
  
  
  **Eliminar un producto: (DELETE)** -


   http://localhost/prueba_tecnica_juanCastro/Controllers/productsController.php
_____________________________________________________________________________________________________________________

  **ENDPOINTS DE USUARIOS**
  

  **Todos los usuarios:(GET)** - 
  
  http://localhost/prueba_tecnica_juanCastro/Controllers/usersController.php
  
  
  **Nuevo usuario: (POST)** - 
  
  http://localhost/prueba_tecnica_juanCastro/Controllers/usersController.php
  
  
  **Actualizar un usuario: (PUT)** - 
  
  http://localhost/prueba_tecnica_juanCastro/Controllers/usersController.php
  
  
  **Eliminar un usuario: (DELETE)** - 
  
  http://localhost/prueba_tecnica_juanCastro/Controllers/usersController.php
  
  
  **Inicio de sesion: (POST)** - 

  
  http://localhost/prueba_tecnica_juanCastro/Controllers/usersController.php/userLogin
  

  **Todos los productos comprados por los usuarios:(GET)** - 
  
  
  http://localhost/prueba_tecnica_juanCastro/Controllers/boughtItemsController.php
  
  **Actualizar dinero: (PUT)** - 
  
  
  http://localhost/prueba_tecnica_juanCastro/Controllers/usersController.php/money
  
  **Dinero actual: (POST)** - 
  
  http://localhost/prueba_tecnica_juanCastro/Controllers/usersController.php/money
  
  **Busqueda de usuario por ID: (POST)** - 
  
  http://localhost/prueba_tecnica_juanCastro/Controllers/boughtItemsController.php/allFromID

_______________________________________________________________________________________________________________________

* **FASE 5**: EJECUCION DE LA VISTA WEB

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

**CONCLUSIONES**

* En lo personal siento que fue una prueba muy interesante y permite que vuelvas a los origenes de la programacion
  para intentar algo cotidiano, pero sin todas las comodidades que suelen tener los frameworks.

* Tambien presente algunos pequeños problemas alfinal, sin embargo, logre avanzar en un buen tiempo. 

______________________________________________________________________________________________________________________________

**ANEXOS**

**VIDEO INSTALACION Y CONFIGURACION DEL REPOSITORIO**
