# Parquealo

Demo :  https://parquealo.000webhostapp.com/


Es una aplicacion web, tanto para usuarios de parqueaderos como para administrar parqueaderos, en la cual como usuario puedes ver los parqueaderos que tienes cerca de ti, asi como sus datos tales como, nombre, direccion, precio por hora y tambien su ubicacion en google maps, y como administrador de parqueadero podras llevar el registro de los carros que estan en tu parqueadero y ver los cupos restantes que hay en tu parqueadero.

En esta aplicacion hacemos uso de HTML5, CSS, JAVASCRIPT, JQUERY, PHP, MYSQL, DATATABLES Y BOOTSTRAP

Los usuarios al entrar a la aplicacion podran ver un mapa con su ubicacion (la pagina pedira permisos de ubicacion para esto) y apareceran marcadores los cuales indicaran que estos son parqueaderos cercanos

![image](https://user-images.githubusercontent.com/33914923/169715744-e2e09e64-3ad3-4086-b076-8ff04e7eb774.png)

Al hacer click en un parqueadero podremos ver la informacion de ese parqueadero

![image](https://user-images.githubusercontent.com/33914923/169715825-5fc00da4-cfa8-4650-ad3f-9a1b53051440.png)

-----------------------------------------------------------------------------------------------------------------------

Como administrador podremos registrar la entrada de carros con sus datos y ver el recuento de cuantos cupos nos quedan restantes, esta sera la vista que tendremos como administrador del parqueadero

![image](https://user-images.githubusercontent.com/33914923/169716011-a5bf41c5-12b9-4289-b2c6-bc0ec23e2d64.png)

Al editar un carro veremos lo siguiente

![image](https://user-images.githubusercontent.com/33914923/169716078-d0748094-644a-4321-a82f-bad99604ee5a.png)

Tambien podemos modificar datos del parqueadero y al hacerlo veremos lo siguiente

![image](https://user-images.githubusercontent.com/33914923/169716119-907d368d-128c-40be-ac17-5337cfdcd206.png)


En la base de datos conectada debemos tener las siguientes tablas:

Para los carros parqueados:
![image](https://user-images.githubusercontent.com/33914923/169715654-92d66d18-bc8d-43b6-bd8b-ae990bbb531b.png)

Para los usuarios registrados:
![image](https://user-images.githubusercontent.com/33914923/169715677-1218f76a-02a5-4f7c-9ac5-0b3d437ad362.png)

Debemos tambien tener en cuenta que debemos modificar la API de Google Maps para que esta nos permita mostrar el mapa, esta se ubica en el archivo header.php

![image](https://user-images.githubusercontent.com/33914923/169716185-d6c1a48f-f8fe-4def-a710-cb3623cee065.png)

Tambien debemos tener en cuenta que el archibo db.php debemos modificar los datos de la conexion con la base de datos a los que tengamos nosotros

![image](https://user-images.githubusercontent.com/33914923/169716260-527bc0d1-4b1e-4d74-a79b-ec3546c79a45.png)


