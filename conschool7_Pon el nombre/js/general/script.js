$(document).ready(function () {
    getErrors();
});

function getErrors() {
    //get params
    const error = Urlparams.get("ER");

    if (error != null) {
        switch (error) {
            case "2":                                 
                Swal.fire({
                   icon: 'error',
                   title: 'Oops...',
                   text: 'El usuario no existe',                        
                 });
                break;        
                case "5":                     
                    Swal.fire({
                       icon: 'error',
                       title: 'Oops...',
                       text: 'La contraseña es incorrecta',                        
                     });
                    break;
                    case "6":
                       Swal.fire({
                           icon: 'error',
                           title: 'Oops...',
                           text: 'Ocurrió un error interno',                        
                           footer: 'Ocurrió un error durante el inicio de sesión, contacte con soporte',
                         });
                        break;
            default:
                break;
        }  
    }
}

function logout() {
    location.href = "../../php/login/logout.php";
}

//const para recoger campos de url
const queryString = window.location.search;
const Urlparams = new URLSearchParams(queryString);

