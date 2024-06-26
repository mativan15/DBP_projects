<?php
    $servername = "localhost"; 
    $username = "root"; 
    $password = ""; 
    $database = "procesarformulario"; 
    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombre = $_POST["nombre"] ?? '';
        $fecha_nacimiento = $_POST["fecha_nacimiento"] ?? '';
        $ocupacion = $_POST["ocupacion"] ?? '';
        $telefono = $_POST["telefono"] ?? '';
        $email = filter_var($_POST["email"] ?? '', FILTER_SANITIZE_EMAIL);
        $ig = $_POST["ig"] ?? '';
        $nacionalidad = $_POST["nacionalidad"] ?? '';
        $nivel_ingles = $_POST["nivel_ingles"] ?? '';
        $nivel_frances = $_POST["nivel_frances"] ?? '';
        $lenguajes_programacion = isset($_POST["lenguajes_programacion"]) ? implode(",", $_POST["lenguajes_programacion"]) : '';
        $aptitudes = $_POST["aptitudes"] ?? '';
        $habilidades = isset($_POST["habilidades"]) ? implode(",", $_POST["habilidades"]) : '';
        $perfil = $_POST["perfil"] ?? '';
        $formacion1 = $_POST["formacion1"] ?? '';
        $formacion2 = $_POST["formacion2"] ?? '';

        $stmt = $conn->prepare("INSERT INTO formularioo (nombre, fecha_nacimiento, ocupacion, telefono, email, ig, nacionalidad, nivel_ingles, nivel_frances, lenguajes_programacion, aptitudes, habilidades, perfil, formacion1, formacion2) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssssssssssss", $nombre, $fecha_nacimiento, $ocupacion, $telefono, $email, $ig, $nacionalidad, $nivel_ingles, $nivel_frances, $lenguajes_programacion, $aptitudes, $habilidades, $perfil, $formacion1, $formacion2);

        $stmt->execute();
        $stmt->close();
        $conn->close();
        header("Location: CVformulario.php");
        exit;
    } else {
        echo "Error: No se recibieron datos.";
        $conn->close();
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Datos Personales</title>
    <link rel="stylesheet" href="formulario.css">
</head>
<body>
    <h1>Formulario de Datos Personales</h1>
    <form id="formulario" action="procesar_formulario.php" method="post">
        <h2>Datos Básicos</h2>
        <label for="nombre">Nombre y Apellidos:</label>
        <input type="text" id="nombre" name="nombre" required>

        <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
        <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" required>

        <label for="ocupacion">Ocupación:</label>
        <input type="text" id="ocupacion" name="ocupacion" required>

        <h2>Contacto</h2>
        <label for="contacto"> Teléfono:</label>
        <input type="text" id="telefono" name="telefono" >

        <label for="contacto">Email:</label>
        <input type="text" id="email" name="email" >

        <label for="contacto">Instagram:</label>
        <input type="text" id="ig" name="ig" >

        <h2>Nacionalidad</h2>
        <label for="nacionalidad">Seleccione una nacionalidad:</label>
        <select id="nacionalidad" name="nacionalidad" >
            <option value="Argentina">Argentina</option>
            <option value="Boliviana">Boliviana</option>
            <option value="Brasileña">Brasileña</option>
            <option value="Chilena">Chilena</option>
            <option value="Colombiana">Colombiana</option>
            <option value="Costarricense">Costarricense</option>
            <option value="Cubana">Cubana</option>
            <option value="Ecuatoriana">Ecuatoriana</option>
            <option value="Salvadoreña">Salvadoreña</option>
            <option value="Guatemalteca">Guatemalteca</option>
            <option value="Hondureña">Hondureña</option>
            <option value="Mexicana">Mexicana</option>
            <option value="Nicaragüense">Nicaragüense</option>
            <option value="Panameña">Panameña</option>
            <option value="Paraguaya">Paraguaya</option>
            <option value="Peruana">Peruana</option>
            <option value="Puertorriqueña">Puertorriqueña</option>
            <option value="Dominicana">Dominicana</option>
            <option value="Uruguaya">Uruguaya</option>
            <option value="Venezolana">Venezolana</option>
        </select>

        <h2>Idiomas</h2>
        <label for="nivel_ingles">Nivel de Inglés:</label>
        <br>
        <input type="radio" id="ingles_basico" name="nivel_ingles" value="Básico" checked>
        <label for="ingles_basico">Básico</label>
        <br>
        <input type="radio" id="ingles_intermedio" name="nivel_ingles" value="Intermedio">
        <label for="ingles_intermedio">Intermedio</label>
        <br>
        <input type="radio" id="ingles_avanzado" name="nivel_ingles" value="Avanzado">
        <label for="ingles_avanzado">Avanzado</label>
        <br>
        <input type="radio" id="ingles_fluido" name="nivel_ingles" value="Fluido">
        <label for="ingles_fluido">Fluido</label>
        <br> 
        <label for="nivel_ingles">Nivel de Francés:</label>
        <br>
        <input type="radio" id="frances_basico" name="nivel_frances" value="Básico" checked>
        <label for="frances_basico">Básico</label>
        <br>
        <input type="radio" id="frances_intermedio" name="nivel_frances" value="Intermedio">
        <label for="frances_intermedio">Intermedio</label>
        <br>
        <input type="radio" id="frances_avanzado" name="nivel_frances" value="Avanzado">
        <label for="frances_avanzado">Avanzado</label>
        <br>
        <input type="radio" id="frances_fluido" name="nivel_frances" value="Fluido">
        <label for="frances_fluido">Fluido</label>

        <h2>Lenguajes de Programación</h2>
        <label for="lenguajes_programacion">Seleccione uno o más lenguajes</label>
        <select id="lenguajes_programacion_select" name="lenguajes_programacion[]" multiple >
            <option value="Assembler">Assembler</option>
            <option value="Java">Java</option>
            <option value="Python">Python</option>
            <option value="JavaScript">JavaScript</option>
            <option value="C++">C++</option>
            <option value="PHP">PHP</option>
        </select>
        

        <label for="aptitudes">Aptitudes:</label>
        <br>
        <datalist id="aptitudes_lista">
            <option value="Comunicación efectiva"></option>
            <option value="Trabajo en equipo"></option>
            <option value="Resolución de problemas"></option>
            <option value="Capacidad de análisis"></option>
            <option value="Organización y planificación"></option>
        </datalist>
        <input type="text" id="aptitudes" name="aptitudes" list="aptitudes_lista">

        <label for="habilidades">Habilidades:</label>

        <input type="checkbox" id="habilidad_1" name="habilidades[]" value="Manejo de Bases de Datos">
        <label for="habilidad_1">Manejo de Bases de Datos</label>

        <input type="checkbox" id="habilidad_2" name="habilidades[]" value="Programación competitiva">
        <label for="habilidad_2">Programación competitiva</label>
        <br>   
        <input type="checkbox" id="habilidad_3" name="habilidades[]" value="Dominio de Servidores">
        <label for="habilidad_3">Dominio de Servidores</label>
        <br>
        <input type="checkbox" id="habilidad_4" name="habilidades[]" value="Machine Learning">
        <label for="habilidad_4">Machine Learning</label>

        <h2>Perfil Personal:</h2>
        <label for="perfil">Descripción</label>
        <textarea id="perfil" name="perfil" rows="4" cols="50"></textarea>
        <p>Perfil Personal:</p>
        <label for="formacion1">1.</label>
        <input type="text" id="formacion1" name="formacion1" required>
        <label for="formacion2">2. </label>
        <input type="text" id="formacion2" name="formacion2" required>

        <button type="submit">Generar CV</button>
    </form>
   
</body>
</html>


