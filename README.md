# ConSchool
trerst
Datos y documentación de relevancia

# Fragmentos de CSS

Fragmento de css para uso de fuentes propias

```css
@font-face {
  font-family: myFirstFont;
  src: url("");
}
```

# Fragmento Links html

```html
<!--External CSS-->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous"
/>
<!--Own CSS-->
<link rel="stylesheet" href="css/general/general.css" />
<link rel="stylesheet" href="css/auth/auth.css" />

<!--External JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"
></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"
  integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"
></script>
<!--Own JS-->
<script src="js/auth/auth.js"></script>
```

# Fragmento JQuery

Cuando el documento esta cargado inicia todo lo que hay en su interior

```javascript
//Load document
$(document).ready(function () {
  $.get("php/getNumCapitulos.php", function (data, status) {
    mountNumberChapters(data);
  });  
});
```

Cargar un documento

```javascript
//Load from file
$.get("php/getAllData.php", function (data, status) {
  mountFilm(data);
});
```

# Información

Url para codigos de error: http://www.iana.org/assignments/http-status-codes/http-status-codes.xhtml, https://developer.mozilla.org/es/docs/Web/HTTP/Status

Url para fuentes (Letras): https://www.dafont.com/es/, https://www.1001fonts.com/

Url para sonidos sin derechos: https://freesound.org/

Url para informacion y formación: https://www.w3schools.com/default.asp

Url para imagenes:
· https://www.pngwing.com/es
· https://www.pngegg.com/es
· https://pixabay.com/
· https://www.videezy.com/
