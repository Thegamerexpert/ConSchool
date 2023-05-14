$(document).ready(function () {
    try {
        //formSignIn.addEventListener("submit", validateFormSignIn);
        document.getElementById("btnSignIn").addEventListener("click", validateFormSignIn);
    }
    catch (error) {
    }
    try {
        //checkEmail.addEventListener("submit", formResetPasswd);
        document.getElementById("BtnCheckEmail").addEventListener("click", formResetPasswd);
    } catch (error) {
    }
    try {
        changePasswd.addEventListener("focusout", formChangePasswd);
    } catch (error) {
    }
});

function validateFormSignIn() {
    let username = formSignIn.elements["username"].value; //Acces by name ? can by id
    let userPassword = formSignIn.elements["password"].value; //Acces by name ? can by id    

    //console.log("Username: " + username + "\nPassword: " + userPassword);

    //Load from file
    $.post("../../ConSchool/php/auth/login.php", {
        username: username, //Datos usuario
        password: userPassword //Datos contraseña
    }, function (data, status) {
        var response = data.split("#"); //Separa los valores
        //console.table(response);
        if (response[0] == 200) {
            //Crea la session
            sessionStorage.setItem("userName", response[2]);
            sessionStorage.setItem("lastName", response[3]);
            sessionStorage.setItem("userType", response[4]);
            sessionStorage.setItem("center", response[5]);
            sessionStorage.setItem("lifeTime", 5);
            //Intente con un switch pero no funcionaba
            if (response[4] == 1) {
                window.location.href = "../ConSchool/pages/teachers/dashboard.html";
            } else if (response[4] == 2) {
                window.location.href = "../ConSchool/pages/students/dashboard.html";

            } else if (response[4] == 3) {
                window.location.href = "../ConSchool/pages/parents/dashboard.html";

            } else if (response[4] == 4) {
                window.location.href = "../ConSchool/pages/administration/dashboard.html";
            }
        } else if (response[0] == 401) {
            msg.innerHTML = response[1];
            msg.classList = "mt-4 text-danger fs-6";
        }
    });

}

function formResetPasswd() {
    let userEmail = checkEmail.elements["userEmail"].value; //Acces by name ? can by id
    let password = null; //Acces by name ? can by id    

    //console.log("Verify email: " + userEmail);

    $.post("../../ConSchool/php/auth/resetPasswd.php", {
        idUser: idUser,
        password: password,
        userEmail: userEmail
    }, function (data, status) {
        var response = data.split("#"); //Separa los valores
        console.table(response);
        if (response[0] == 200) {
            idUser = response[1];
            changePasswd.classList.remove("d-none");
            checkEmail.classList.add("d-none");
        } else if (response[0] == 401) {
            msg.innerHTML = response[1];
            msg.classList = "mt-4 text-danger fs-6";
        }
    });
}

function formChangePasswd() {
    let newPasswd = changePasswd.elements["password1"].value; //Acces by name ? can by id
    let newPasswd1 = changePasswd.elements["password2"].value; //Acces by name ? can by id
    let userEmail = null; //Acces by name ? can by id        


    //console.log("New password: " + newPasswd + "\nConfirm New password: " + newPasswd1);

    if (newPasswd == newPasswd1) {
        msg.innerHTML = "";
        msg.classList = "mt-2 text-danger fs-6";

        document.getElementById("BtnChangePasswd").addEventListener("click", () => {
            console.log(idUser);
            $.post("../../ConSchool/php/auth/resetPasswd.php", {
                idUser: idUser,
                password: newPasswd,
                userEmail: userEmail
            }, function (data, status) {
                var response = data.split("#"); //Separa los valores
                console.table(response);
                if (response[0] == 200) {
                    window.location.href = "../ConSchool";
                } else if (response[0] == 401) {
                    msg.innerHTML = response[1];
                    msg.classList = "mt-4 text-danger fs-6";
                }
            });
        });
    } else {
        msg.innerHTML = "Las contraseñas no coinciden";
        msg.classList = "mt-2 text-danger fs-6";
    }

}


const formSignIn = document.getElementById("formSignin");
const checkEmail = document.getElementById("checkEmail");
const changePasswd = document.getElementById("changePasswd");
var msg = document.getElementById("msgOut");
var idUser = null;