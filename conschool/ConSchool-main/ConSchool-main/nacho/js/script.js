document.getElementById('login-form').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent form submission
    
    // Obtener los valores de los campos del formulario
    var username = document.getElementById('username').value;
    var password = document.getElementById('password').value;
    var userType = document.getElementById('user-type').value;
    
    // Aquí puedes realizar acciones adicionales, como enviar los datos a un servidor para autenticar al usuario
    
    // Ejemplo de impresión de los valores en la consola
    console.log('Usuario:', username);
    console.log('Contraseña:', password);
    console.log('Tipo de Usuario:', userType);
});
