//mount method
var queryString = window.location.search;
var Urlparams = new URLSearchParams(queryString);

function searchErrors() {
    //get params
    const error = Urlparams.get("ER");

    //CheckRemember
    if (localStorage.getItem("username") != null) {
        //redirectToHomePage();
    }

    if (error) {
        switch (error) {
            case "2":
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'El usuario o la contraseña es incorrecto',
                    footer: 'Ocurrió un error durante el inicio de sesión, parece que te equivocaste en algo',
                });
                break;
            default:
                break;
        }
    }
}