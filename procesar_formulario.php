<?php
echo "<pre>";
print_r($_POST);
echo "</pre>";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Define default values if form fields are not set
    $nombre = $_POST["nombre"] ?? '';
    $fecha_nacimiento = $_POST["fecha_nacimiento"] ?? '';
    $ocupacion = $_POST["ocupacion"] ?? '';
    $telefono = $_POST["telefono"] ?? '';
    $email = filter_var($_POST["email"] ?? '', FILTER_SANITIZE_EMAIL);
    $ig = $_POST["ig"] ?? '';
    $nacionalidad = $_POST["nacionalidad"] ?? '';
    $nivel_ingles = $_POST["nivel_ingles"] ?? '';
    $nivel_frances = $_POST["nivel_frances"] ?? '';
    $lenguajes_programacion = $_POST["lenguajes_programacion"] ?? '';
    $aptitudes = $_POST["aptitudes"] ?? '';
    $habilidades = $_POST["habilidades"] ?? '';
    $perfil = $_POST["perfil"] ?? '';
    $formacion1 = $_POST["formacion1"] ?? '';
    $formacion2 = $_POST["formacion2"] ?? '';
    
    // Write data to a file (optional)
    $file = 'datos.txt';
    $data = "Nombre: $nombre\nEmail: $email\nig: $ig\nMensaje: $ocupacion\n\n";
    file_put_contents($file, $data, FILE_APPEND | LOCK_EX); // Append data to file

    // Redirect user to summary page along with the data
    header("Location: CVformulario.html?nombre=$nombre&fecha_nacimiento=$fecha_nacimiento&ocupacion=$ocupacion&telefono=$telefono&email=$email&ig=$ig&nacionalidad=$nacionalidad&nivel_ingles=$nivel_ingles&nivel_frances=$nivel_frances&lenguajes_programacion=$lenguajes_programacion&aptitudes=$aptitudes&habilidades=$habilidades&perfil=$perfil&formacion1=$formacion1&formacion2=$formacion2");
    
    exit; // End script execution after redirection
} else {
    // Handle non-POST requests
    echo "Error: No se recibieron datos.";
}


