# Información sobre este documento

Este documento incluye información sobre la estructuración, las variables, etc. que se usaran para desarrollar una aplicación, web u otros.

Tambien incluye un registro de las distintas aplicaciones desarrolladas.

# Registro de aplicaciónes

En este apartado se encuentran todas las aplicaciones desarrolladas.

                        ---------------------------------------------------------------------------------
                        |    Desarrollador        ||          Nombre         || Codigo de la aplicación |
                        _________________________________________________________________________________
                        |                         ||                         ||       #-#-#-#-#         |
                        _________________________________________________________________________________
                        |                         ||                         ||       #-#-#-#-#         |
                        _________________________________________________________________________________

# Tipos de archivos

En la siguiente lista estan los tipos de archivos junto con su explicación de que haran o contendran, todos estos son estandares para desarrollar.

              -------------------------------------------------------------------------------------------------------
              | Nombre del archivo || Encriptado || No Encriptado ||                  Explicacion                   |
              _______________________________________________________________________________________________________
              |    UserSettings    ||    .use    ||      .us      || Contiene la información relacionada al usuario |
              _______________________________________________________________________________________________________
              |   The name of it   ||   .ebckp   ||     .bckp     || Las copias de seguridad en la misma carpeta    |
              |                    ||            ||               || significa que los datos contienen datos de     |
              |                    ||            ||               || esta carpeta.                                  |
              _______________________________________________________________________________________________________
              |    paths folder    ||   .rpfe    ||     .rpf      || Contiene direcciónes de carpetas o archivos    |
              _______________________________________________________________________________________________________
              | ApplicationSettings||   .ase     ||      .as      || Configuración relacionada con la aplicación    |
              _______________________________________________________________________________________________________
              |   Alarms Resouces  ||   .are     ||      .ar      || Recursos, configuraciónes, etc. de             |
              |                    ||            ||               ||                             alarmas o avisos   |
              _______________________________________________________________________________________________________
              |        Keys        ||    .ke     ||      .k       || Contiene contraseña, claves u parecidos        |
              _______________________________________________________________________________________________________
              |   The name of it   ||    .le     ||      .l       || Logs del archivo o proceso, en la misma        |
              |                    ||            ||               || carpeta y en la carpeta Logs                   |
              _______________________________________________________________________________________________________
              |ThecnicalDataDevice ||    .tdde   ||      .tdd     || Información tecnica del dispositivo            |
              _______________________________________________________________________________________________________

# Nomeclatura para el codigo de la aplicación

En este apartado se explica como se debe de asignar los distintos elementos del codigo. Cada programa tiene un codigo unico.

El codigo consta de cinco posiciones, cada posicion esta separada por guiones

                                                    -------------------------
                                                    | Codigo     |#-#-#-#-# |
                                                    | Posiciones |1-2-3-4-5 |
                                                    _________________________

1.  Identificación del tipo de peticiónes que hara. (Vea el ejemplo)

                                                            -------------
                                                            | S-#-#-#-# |
                                                            _____________

    En este apartado se explica el significado de cada signo

                             --------------------------------------------------------------------------
                             | Letra | Tipo       |                  Significado                      |
                             __________________________________________________________________________
                             |   #   | null       | No tiene una asignación, no deberia de suceder    |
                             __________________________________________________________________________
                             |   W   | Wikipedias | Hace referencia a bases de datos de información   |
                             __________________________________________________________________________
                             |   G   | Games      | Todo tipo de peticiones relacionadas con juegos   |
                             __________________________________________________________________________
                             |   S   | Services   | Todo tipo de servicios como tiempo, recordatorios |
                             __________________________________________________________________________
                             |   A   | Register   |                                                   |
                             __________________________________________________________________________
                             |   M   | MultiMedia | Fotos, musica, videos, etc.                       |
                             __________________________________________________________________________

2.  Identificar el tipo de programa

                                                            -------------
                                                            | #-G-#-#-# |
                                                            _____________

    En este apartado se explica el significado de cada signo

                            -------------------------------------------------------------------------------
                            | Letra | Tipo           |                  Significado                       |
                            _______________________________________________________________________________
                            |   #   |      null      | No tiene una asignación, no deberia de suceder     |
                            _______________________________________________________________________________
                            |   A   |  Application   | Aplicaciónes que necesitan instalarse o ejecutarse |
                            _______________________________________________________________________________
                            |   W   |     Web        | Webs de todo tipo pero que no sean aplicaciones    |
                            _______________________________________________________________________________
                            |   WA  | WebApplication | Aplicaciones Webs que usan el navegador            |
                            _______________________________________________________________________________
                            |   G   | Games          | Todo tipo de juegos                                |
                            _______________________________________________________________________________
                            |   S   | Services       | Servicios: tiempo, recordatorios, optimizaciones   |
                            _______________________________________________________________________________

3.  Identifica la aplicación, se expresa en hexadecimal

                                                        ----------------
                                                        | #-#-0000-#-# |
                                                        ________________

    En este apartado se pondran (Obligatorio) todas las aplicaciones, servicios, etc.

                                                    ---------------------------
                                                    |   Codigo  |   Nombre    |
                                                    ___________________________
                                                    |    0001   |             |
                                                    ___________________________
                                                    |    0002   |             |
                                                    ___________________________

4.  Identifica si el acceso es por tipo de usuario.

                                                        -----------------
                                                        || #-#-#-0|6-# ||
                                                        _________________

    En caso de que contenga mas de una opcion esta se separa con "|" cada uno de ellos.

                            -------------------------------------------------------------------------------
                            | Letra | Tipo           |                  Significado                       |
                            _______________________________________________________________________________
                            |   #   |      null      | No tiene una asignación, no deberia de suceder     |
                            _______________________________________________________________________________
                            |   0   |      free      | No requiere ningun tipo de usuario                 |
                            _______________________________________________________________________________
                            |   1   |   registered   | Requiere tener una cuenta, se puede registrar      |
                            _______________________________________________________________________________
                            |   2   |   recomended   | Requiere que alguien pida la creación de una centa |
                            _______________________________________________________________________________
                            |   3   |    Payment     | Requiere un pago monetario u otro tipo de pago     |
                            _______________________________________________________________________________
                            |   4   |    Adult       | Requiere ser adulto debido al contenido            |
                            _______________________________________________________________________________
                            |   5   |    Childrens   | Contenido enfocado a niños/as                      |
                            _______________________________________________________________________________
                            |   6   |    Teenagers   | Contenido enfocado a adolescentes                  |
                            _______________________________________________________________________________

5.  Tipo de contenido en el sitio o aplicación

                                                        -----------------
                                                        || #-#-#-#-2|3 ||
                                                        _________________

    En caso de que contenga mas de una opcion esta se separa con "|" cada uno de ellos.

                    -----------------------------------------------------------------------------------------
                    | Letra |          Tipo       |                  Significado                            |
                    _________________________________________________________________________________________
                    |   #   |         null        | No tiene una asignación, no deberia de suceder          |
                    _________________________________________________________________________________________
                    |   1   |  Sensitive content  | Contiene contenido sensible, para el publico            |
                    _________________________________________________________________________________________
                    |   2   |    Adult content    | Contiene contenido para adultos                         |
                    _________________________________________________________________________________________
                    |   3   | Profesional content | Contiene contenido profesional o con tecnicismos        |
                    _________________________________________________________________________________________
                    |   4   |    Safe content     | Contenido sin violencia o restringido por edad          |
                    _________________________________________________________________________________________
                    |   5   | Information content | Contenido Informativo o relacionado                     |
                    _________________________________________________________________________________________
                    |   6   |       Programs      | Contiene programas, aplicaciones, jegos, etc.           |
                    _________________________________________________________________________________________

# Variables para el Url

En este apartado se pondran los tipos de parametros para incluir en una url.

1.  La siguiente lista muestra el tipo de variable que se pueden incluir en la url.

                        ---------------------------------------------------------------------------------
                        |       Nombre        || Variable/Parametro ||          Explicación             |
                        _________________________________________________________________________________
                        |       Error         ||         ER         ||       #-#-#-#-#                  |
                        _________________________________________________________________________________
                        |       Message       ||         MSG        ||       #-#-#-#-#                  |
                        _________________________________________________________________________________
                        |      Data User      ||         DU         ||       #-#-#-#-#                  |
                        _________________________________________________________________________________
                        |      Edit Item      ||         EI         ||       #-#-#-#-#                  |
                        _________________________________________________________________________________
                        |      See Item       ||         SI         ||       #-#-#-#-#                  |
                        _________________________________________________________________________________
                        |   Success procces   ||         SP         ||       #-#-#-#-#                  |
                        _________________________________________________________________________________
                        |  Config Parameters  ||         CP         ||       #-#-#-#-#                  |
                        _________________________________________________________________________________
2. Variables de session
En este apartado se muestra el tipo de variables a utilizar

    userProfile --> Class profile

    userSettings --> Class userSettings

    editItem --> Class item

# Codigos de mensajes de errores

En este apartado se pondran los errores posibles. En caso de un nuevo error añadirlo a la sección segun corresponda

1.  Errores en conexiones php, en caso de uno nuevo añadelo. Se envia el codigo junto la explicación como respuesta

                        ---------------------------------------------------------------------------------
                        | Codigo |                           Explicación                                |
                        _________________________________________________________________________________
                        |    1   | Correcto                                                             |
                        _________________________________________________________________________________
                        |    2   | El usuario es incorrecto                                             |
                        _________________________________________________________________________________
                        |    3   | El usuario ya existe                                                 |
                        _________________________________________________________________________________
                        |    4   | Usuario no encontrado                                                |
                        _________________________________________________________________________________
                        |    5   | La contraseña no coincide                                            |
                        _________________________________________________________________________________
                        |    6   | La contraseña es incorrecta                                          |
                        _________________________________________________________________________________
                        |    7   | Error al cambiar el estado de conexión                               |
                        _________________________________________________________________________________
                        |    8   | Error al guardar los cambios                                         |
                        _________________________________________________________________________________
                        |    9   | Error al crear el registro                                           |
                        _________________________________________________________________________________
                        |    10  | Error al cargar los datos                                            |
                        _________________________________________________________________________________
                        |    11  | Correo no encontrado                                                 |
                        _________________________________________________________________________________

2.  Errores de codigos de estado, Se adjunta el codigo junto a la causa.

    Codigos de Estado 100.

        ---------------------------------------------------------------------------------------------------------
        | Codigo |        Estdo        |                       Motivo                                           |
        _________________________________________________________________________________________________________
        |   100  |      Continue       | Indica al navegador que continúe haciendo su petición                  |
        _________________________________________________________________________________________________________
        |   101  | Switching Protocols | Indica al navegador que acepta el cambio de protocolo pedido           |
        _________________________________________________________________________________________________________
        |   102  |      Processing     | Indica al navegador que ha recibido la petición y está aun procesándola|
        _________________________________________________________________________________________________________
        |   103  |      Checkpoint     | Reanudará una petición cancelada con anterioridad                      |
        _________________________________________________________________________________________________________

    Códigos de estado 200.

        ------------------------------------------------------------------------------------------------------------------------------------
        | Codigo |              Estdo            |                                Motivo                                                   |
        ____________________________________________________________________________________________________________________________________
        |   200  |                OK             | Todo se ha procesado de forma correcta                                                  |
        ____________________________________________________________________________________________________________________________________
        |   201  |            Created            | La petición se ha procesado y como resultado se ha creado un nuevo recurso              |
        ____________________________________________________________________________________________________________________________________
        |   202  |           Accepted            | La petición ha sido aceptada pero todavía no se ha completado                           |
        ____________________________________________________________________________________________________________________________________
        |   203  | Non-Authoritative Information | Indica que la petición se ha completado, pero se ha obtenido el recurso de otro servidor|
        ____________________________________________________________________________________________________________________________________
        |   204  |           No Content          | La petición se ha procesado con éxito, pero el resultado está vacío                     |
        ____________________________________________________________________________________________________________________________________
        |   205  |         Reset Content         | Igual que el anterior, pero indicando al navegador que debe inicializar                 |
        |        |                               | la página desde la que se realizó la petición                                           |
        ____________________________________________________________________________________________________________________________________
        |   206  |        Partial Content        | Se está devolviendo el contenido pedido de forma parcial.                               |
        |        |                               | Útil para reanudar descargas que se han pausado                                         |
        ____________________________________________________________________________________________________________________________________
        |   207  |         Multi-Status          | Devuelve varias peticiones a la vez                                                     |
        ____________________________________________________________________________________________________________________________________
        |   208  |       Already Reported        | Ya se devolvió el listado de elementos, así que no se vuelve a listar                   |
        ____________________________________________________________________________________________________________________________________

    Códigos de estado 300.

        ------------------------------------------------------------------------------------------------------------------------------------
        | Codigo |        Estdo        |                       Motivo                                                                      |
        ____________________________________________________________________________________________________________________________________
        |   300  |      Multiple Choices       | Indica al navegador que existen varias alternativas para el contenido que ha pedido.      |
        |        |                             | Por ejemplo, un vídeo puede estar disponible en distintos formatos o calidades            |
        ____________________________________________________________________________________________________________________________________
        |   301  |    Moved Permanently        | La página que estás buscando no está aquí y se ha movido permanentemente                  |
        |        |                             | a una nueva ubicación                                                                     |
        ____________________________________________________________________________________________________________________________________
        |   302  |            Found            | Indica que la página o recurso está disponible en otra ubicación                          |
        ____________________________________________________________________________________________________________________________________
        |   303  |         See Other           | Igual al anterior                                                                         |
        ____________________________________________________________________________________________________________________________________
        |   304  |       Not Modified          | Indica al navegador que la página no se ha modificado desde la última vez que se pidió.   |
        |        |                             | Así se puede evitar descargarla de nuevo, ahorrando ancho de banda                        |
        ____________________________________________________________________________________________________________________________________
        |   305  |          Use Proxy          | Este recurso solo está disponible desde un proxy                                          |
        ____________________________________________________________________________________________________________________________________
        |   306  |        Switch Proxy         | Este código ya no se usa                                                                  |
        ____________________________________________________________________________________________________________________________________
        |   307  |     Temporary Redirect      | Indica al navegador que este recurso o página se ha movido de sitio,                      |
        |        |                             | pero todavía está disponible en esta dirección                                            |
        ____________________________________________________________________________________________________________________________________
        |   308  |      Permanent Redirect     | Similar al código 301, la página ha cambiado de lugar permanentemente                     |
        ____________________________________________________________________________________________________________________________________

    Códigos de estado 400.

        -------------------------------------------------------------------------------------------------------------------------------------
        | Codigo |        Estdo         |                       Motivo                                                                      |
        _____________________________________________________________________________________________________________________________________
        |   400  |      Bad Request     | Algo ha ido mal con la petición. Si recibes este error, prueba a refrescar la página              |
        |        |                      |  o actualizar tu navegador                                                                        |
        _____________________________________________________________________________________________________________________________________
        |   401  |     Unauthorized     | No tienes permiso para recibir ese contenido                                                      |
        _____________________________________________________________________________________________________________________________________
        |   402  |   Payment Required   | En desuso por ahora                                                                               |
        _____________________________________________________________________________________________________________________________________
        |   403  |       Forbidden      | La petición es correcta pero el servidor se niega a ofrecerte el recurso o página web.            |
        |        |                      | Es posible que necesites una cuenta en el servicio e iniciar sesión antes de poder acceder        |
        _____________________________________________________________________________________________________________________________________
        |        |                      | El código de estado más famoso de todos indica que el recurso no está disponible en el servidor.  |
        |        |                      | Quizá lo estuvo en el pasado y ha sido borrado o quizá has escrito la dirección web mal. Si       |
        |   404  |      Not Found       | recibes este error, comprueba que la dirección que has introducido es correcta y no le falta      |
        |        |                      | sobra nada. También puedes insertar la dirección en Wayback Machine para ver si existió en el     |
        |        |                      | asado                                                                                             |
        _____________________________________________________________________________________________________________________________________
        |   405  | Method Not Allowed   | No se permite el uso de ese método                                                                |
        _____________________________________________________________________________________________________________________________________
        |   406  |    Not Acceptable    | La petición solo puede generar un tipo de contenido distinto al que se especificó como aceptable  |
        _____________________________________________________________________________________________________________________________________
        |   407  | Proxy Authentication | La petición solo puede generar un tipo de contenido distinto al que se especificó como aceptable  |
        |        |       Required       |                                                                                                   |
        _____________________________________________________________________________________________________________________________________
        |   408  |   Request Timeout    | El servidor ha pasado demasiado tiempo esperando una respuesta por parte del cliente              |
        _____________________________________________________________________________________________________________________________________
        |   409  |      Conflict        | La petición no se pudo completar porque hubo un problema con ella                                 |
        _____________________________________________________________________________________________________________________________________
        |   410  |        Gone          | Esa página no existe, se borró. Este código es usado por buscadores como Google, que usan         |
        |        |                      | la información para eliminar contenido de su base de datos                                        |
        _____________________________________________________________________________________________________________________________________
        |   411  |   Length Required    | El cliente debía indicar la longitud del contenido, pero no lo hizo                               |
        _____________________________________________________________________________________________________________________________________
        |   412  | Precondition Failed  | El servidor no cumple las condiciones previas que se indicaban en la petición                     |
        _____________________________________________________________________________________________________________________________________
        |   413  |  Payload Too Large   | La petición es demasiado larga y el servidor se niega a procesarla                                |
        _____________________________________________________________________________________________________________________________________
        |   414  |    URI Too Long      | La dirección web es demasiado larga. Si recibes este error, difícilmente podrás                   |
        |        |                      | solucionarlo pues no es problema tuyo, sino de la página que generó dicho enlace                  |
        _____________________________________________________________________________________________________________________________________
        |   415  |Unsupported Media Type| El tipo de archivo que se ha recibido es distinto al que se esperaba                              |
        _____________________________________________________________________________________________________________________________________
        |   416  |Range Not Satisfiable | El cliente ha pedido una porción de un recurso que es incorrecta                                  |
        _____________________________________________________________________________________________________________________________________
        |   417  | Expectation Failed   | El servidor no puede cumplir con las expectaciones de la cabecera                                 |
        _____________________________________________________________________________________________________________________________________
        |   418  |     I'm a teapot     | Es un código de estado que nació como una broma de April's Fools.                                 |
        |        |                      | Puedes recibir uno visitando esta web                                                             |
        _____________________________________________________________________________________________________________________________________
        |   421  | Misdirected Request  | El servidor es incapaz de producir una respuesta                                                  |
        _____________________________________________________________________________________________________________________________________
        |   422  | Unprocessable Entity | La petición era correcta pero tenía algún error semántico                                         |
        _____________________________________________________________________________________________________________________________________
        |   423  |       Locked         | Este recurso está bloqueado                                                                       |
        _____________________________________________________________________________________________________________________________________
        |   424  |  Failed Dependency   | Este recurso depende de otra respuesta, que falló                                                 |
        _____________________________________________________________________________________________________________________________________
        |   426  |   Upgrade Required   | El cliente debe usar un protocolo distinto                                                        |
        _____________________________________________________________________________________________________________________________________
        |   428  | Precondition Required| El servidor requiere que la petición sea condicional                                              |
        _____________________________________________________________________________________________________________________________________
        |   429  |  Too Many Requests   | Se han enviado demasiadas peticiones en un corto período de tiempo                                |
        _____________________________________________________________________________________________________________________________________
        |   431  | Request Header       | La cabecera o algunos de los campos de la cabecera son demeasiado grandes                         |
        |        | Fields Too Large     |                                                                                                   |
        _____________________________________________________________________________________________________________________________________
        |   452  | Unavailable for      | El servidor deniega el accceso a este recurso por motivos legales                                 |
        |        | Legal reasons        |                                                                                                   |
        _____________________________________________________________________________________________________________________________________
        |   000  |                      |                                                                                                   |
        _____________________________________________________________________________________________________________________________________

    Códigos de estado 500.

        -------------------------------------------------------------------------------------------------------------------------------------
        | Codigo |              Estdo            |                                Motivo                                                    |
        _____________________________________________________________________________________________________________________________________
        |   500  |     Internal Server Error     | Error interno en el servidor                                                             |
        _____________________________________________________________________________________________________________________________________
        |        |                               | Segundo en popularidad tras el error 404, el error 500 es un error genérico que indica   |
        |        |                               | que hay un problema en el servidor. No se especifica nada más concreto, de modo que el   |
        |   500  |            airbnb             | problema puede ser de cualquier tipo, desde que esté sobrecargado hasta que esté en ese  |
        |        |                               | momento realizando algunos cambios internos de modo que algo haya dejado de funcionar.   |
        |        |                               | Como usuario solo puedes esperar y probar de nuevo más tarde                             |
        _____________________________________________________________________________________________________________________________________
        |   501  |        Not Implemented        | El servidor aun no ha implementado el método que se ha pedido,                           |
        |        |                               | aunque es probable que se añada en un futuro                                             |
        _____________________________________________________________________________________________________________________________________
        |   502  |          Bad Gateway          | El servidor está actuando como un proxy o gateway y ha recibido                          |
        |        |                               | una respuesta inválida del otro servidor                                                 |
        _____________________________________________________________________________________________________________________________________
        |        |                               | el servidor no está disponible en ese momento. Puede que sea porque está sobrecargado    |
        |   503  |      Service Unavailable      | con demasiadas peticiones o porque en ese momento está con tareas de mantenimiento.      |
        |        |                               | Prueba de nuevo en unos minutos                                                          |
        _____________________________________________________________________________________________________________________________________
        |   504  |       Gateway Timeout         | El servidor está actuando como una gateway o proxy y no recibió respuesta del servidor   |
        _____________________________________________________________________________________________________________________________________
        |   505  |   HTTP Version Not Supported  | El servidor no soporta la versión del protocolo HTTP que se le pidió                     |
        _____________________________________________________________________________________________________________________________________
        |   506  |    Variant Also Negotiates    | La petición resulta en una petición con referencias circulares                           |
        _____________________________________________________________________________________________________________________________________
        |   507  |     Insufficient Storage      | El servidor no tiene espacio suficiente para completar la petición                       |
        _____________________________________________________________________________________________________________________________________
        |   508  |         Loop Detected         | El servidor ha detectado un bucle infinito                                               |
        _____________________________________________________________________________________________________________________________________
        |   510  |         Not Extended          | El servidor requiere de extensiones para completar la petición                           |
        _____________________________________________________________________________________________________________________________________
        |   511  |Network Authentication Required| El cliente necesita identificarse                                                        |
        _____________________________________________________________________________________________________________________________________

# Permisos y claves de contenido

Las distintas claves se dividiran por aplicación

                    --------------------------------------------------------------------------------------------------
                    |   Nombre    ||         Codigo          ||  Clave  ||                Explicación               ||
                    __________________________________________________________________________________________________
                    |             ||         #-#-#-#-#       ||  null   ||                                          ||
                    __________________________________________________________________________________________________
                    |             ||         #-#-#-#-#       ||  null   ||                                          ||
                    __________________________________________________________________________________________________

# Configuración del archivo "config.js" o sus variantes

En este apartado se muestra la configuración del archivo. Así como su metodo de exportación e importación.
En caso de añadir nuevas configuraciónes añadelas a la parte que segun corresponda respectivamente

1. Importar la configuración (Se añade al documento html o al js respectivo).
   ```html
   <!--Etiqueta para importar es importante importarlo como modulo--->
   <script type="module">
     //Cada importación se puede acceder a su contenido mediante name.name
     import { config, Themes, serverSettings } from "./config.js";
   </script>
   ```
2. Exportar las configuraciones (Se añade al archivo de config.js).

   ```js
   //Se exportan las variables
   export { config, Themes, serverSettings };
   ```

3. Contenido del archivo config.js o sus variantes (dependiendo del tipo habra que adaptarlo, pero las variables y otros no se tocan que nos conocemos).

   ```js
   //Configuración relacionada con el servidor y la propia aplicación o sitio
   const serverSettings = {
       port: 0000,
       ip: "0.0.0.0",
       codeApp: "#-#-#-#-#",
       useResource: [
        "./",
        "http://",
        "https://",
       ],
   }

   //En cada tema se establece un nombre, la dirección del arhcivo css y js
   const Themes = [
       {
           name: "light",
           path_Styles: "./css",
           path_Functions: "./js",
       }, {
           name: "night",
           path_Styles: "./css",
           path_Functions: "./js",
       }
   ]

   //Configuración relacionada con el sitio o aplicación
   const config = {
       cookies: {
           lifeSesion: {
               maxAge: 10000,
               path: "",
               domain: "",
           },
           selectedColorTheme: {
               choosed: 0
           },
       },
       userProfile: {
           name: "",
           userName: "",
           email: "",
       },
       resourceStyle: serverSettings.useResource[0],
   }
   ```

# Importar fragmentos de codigo html u otros

1. Importa el fragmento como codigo y lo inserta directamente
   ```js
   async function addTest() {
     const resp = await fetch("./import.html");
     const html = await resp.text();
     document.body.innerHTML = html;
   }
   ```
2. Importa el fragmento como codigo ademas de que se indica la posición de este

   ```js
   /*
   posición
   Un DOMString que representa la posición relativa al elemento, y deberá ser una de las siguientes cadenas:
   
   'beforebegin': Antes que el propio elemento.
   'afterbegin': Justo dentro del elemento, antes de su primer elemento hijo.
   'beforeend': Justo dentro del elemento, después de su último elemento hijo.
   'afterend': Después del propio elemento.
   */
   async function addTest1() {
     const resp = await fetch("./import.html");
     const html = await resp.text();
     document.body.insertAdjacentHTML("afterbegin", html);
   }
   ```

# Bibliotecas externas

Axios [Documentación](https://axios-http.com/es/docs/intro)
```html
<script src="https://cdn.jsdelivr.net/npm/axios@1.1.2/dist/axios.min.js"></script>
```

JQuery [Documentación](https://jquery.com/)
```html
<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
```

# Para Comprobar si un elemento es compatible con los distintos navegadores no lo cp directamente
[Can I Use](https://caniuse.com/)