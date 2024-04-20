<?php
    $mysqli = new mysqli("localhost", "root", "", "procesarformulario");
    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }
    $sql = "SELECT nombre, fecha_nacimiento, ocupacion, telefono, email, ig, nacionalidad, nivel_ingles, nivel_frances, lenguajes_programacion, aptitudes, habilidades, perfil, formacion1, formacion2 FROM formularioo";
    $result = $mysqli->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $nombre = $row["nombre"];
            $ocupacion = $row["ocupacion"];
            $fecha_nacimiento = $row["fecha_nacimiento"];
            $telefono = $row["telefono"];
            $email = $row["email"];
            $ig = $row["ig"];
            $nivel_ingles = $row["nivel_ingles"];
            $nivel_frances = $row["nivel_frances"];
            $lenguajes_programacion = $row["lenguajes_programacion"];
            $aptitudes = $row["aptitudes"];
            $habilidades = $row["habilidades"];
            $perfil = $row["perfil"];
            $formacion1 = $row["formacion1"];
            $formacion2 = $row["formacion2"];
        }
    } else {
        echo "No data found.";
    }
    $mysqli->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CV de formulario</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="FormCVstyle.css">
</head>
<body>
    <div class = "contenedor1">
        <div class = "header">
            <div class="grupo_header">
                <div class="photo">
                    <img
                    class="foto-perfil"
                    src="https://media.tenor.com/NPFbJouWeHQAAAAM/cr7-siuu.gif"
                    height="180"
                    width="180">
                </div>
                <div class="nombree">
                    <h3><span id="nombre"><?php echo $nombre; ?></span></h3>
                    <h1><span id="ocupacion"><?php echo $ocupacion; ?></span> </h1>
                </div>
            </div>

        </div>
        <div class = "parte_inferior">
            <div class = "barra_izq">
                <h4>CONTACTO</h4>
                <hr>
                <ul class = "contqctoo">
                    <li>
                        <span class = "icon"><i class="fa-solid fa-phone"></i></span>
                        <span id="telefono"> <?php echo $telefono; ?></span>
                    </li>
                    <li>
                        <span class = "icon"><i class="fa-solid fa-envelope"></i></span>
                        <span class = "text"><span id="email"><?php echo $email; ?></span>
                    </li>
                    <li>
                        <span class = "icon"><i class="fa-solid fa-location-dot"></i></span>
                        <span class = "text">Arequipa,Peru</span>
                    </li>
                    <li>
                        <span class = "icon"><i class="fa-brands fa-square-instagram"></i></span>
                        <span class = "text"><span id="ig"><?php echo $ig; ?></span>
                    </li>
                </ul>
    
                <h4>IDIOMAS</h4>
                <hr>
                <ul class = "idiomas">
                    <li class = "text"> Español: Nativo</li>
                    <li class = "text"> Inglés:<span id="nivel_ingles"><?php echo $nivel_ingles; ?></span></li>    
                    <li class = "text"> Francés:<span id="nivel_frances"><?php echo $nivel_frances; ?></span></li>
                </ul>
    
                <h4>APTITUDES</h4>
                <hr>
                <ul class="aptitudes_listaa">
                    <li class="text"><span id="aptitudes"><?php echo $aptitudes; ?></span></li> <!-- si funciona, extender a los demas items-->
                    <li class="text">Análisis de datos</li>
                    <li class="text">Machine Learning</li>
                    <li class="text">Visualización de datos - Tableau - Power BI</li>
                </ul>
    
                <h4>HARD SKILLS</h4><!--poner aqui los lenguajes de p-->
                <hr> 
               <span id="lenguajes_programacion"></span>
                <ul class="intereses">
                    <li class="text">Bases de datos - SQL<?php echo $lenguajes_programacion; ?></li>    
                    <li class="text">Machine Learning</li>
                </ul>
                
                <h4>SOFT SKILLS</h4><!--habilidades-->
                <hr>
                <ul class="habilidades_listaa">
                    <li class="text"><span id="habilidades"><?php echo $lenguajes_programacion; ?></span></li>
                </ul>
                
            </div>
            <div class="barra_der">
                <h4>DESCRIPCIÓN</h4>
                <hr>
                <div class="formacion">
                    <p><span id="perfil"><?php echo $perfil; ?></span></p>
                </div>
            
                <h4>EXPERIENCIA LABORAL</h4>
                <hr>
                <div class="experiencia">
                    <div class="exp">
                        <h5>Gerente de Marketing</h5>
                        <div class="fecha_ubicacion">
                            <span class="ciudad">Nueva York</span>, | <span class="tiempo">2019-2023</span>
                        </div>
                        <ul class="roles">
                            <li class="text">Lideré equipos multidisciplinarios para crear estrategias de marketing innovadoras que aumentaron las ventas en un 30%.</li>
                            <li class="text">Desarrollé campañas publicitarias creativas que posicionaron nuestra marca como líder en el mercado.</li>
                            <li class="text">Establecí alianzas estratégicas con influencers y celebridades para promover nuestros productos.</li>
                        </ul>
                    </div>
            
                    <div class="exp">
                        <h5>Especialista en Desarrollo de Negocios</h5>
                        <div class="fecha_ubicacion">
                            <span class="ciudad">Londres</span>, | <span class="tiempo">2017-2019</span>
                        </div>
                        <ul class="roles">
                            <li class="text">Identifiqué oportunidades de crecimiento y expansión para la empresa en mercados internacionales.</li>
                            <li class="text">Negocié contratos comerciales favorables con socios estratégicos para aumentar la presencia de la marca en nuevos territorios.</li>
                        </ul>
                    </div>
            
                    <div class="exp">
                        <h5>Asistente de Investigación</h5>
                        <div class="fecha_ubicacion">
                            <span class="ciudad">Berlín</span>, | <span class="tiempo">2015-2017</span>
                        </div>
                        <ul class="roles">
                            <li class="text">Colaboré en proyectos de investigación que resultaron en publicaciones académicas de alto impacto.</li>
                            <li class="text">Recopilé y analicé datos cualitativos y cuantitativos para apoyar la toma de decisiones estratégicas.</li>
                        </ul>
                    </div>
                </div>
            
                <h4>FORMACIÓN</h4>
                <hr>
                <div class="formacion">
                    <div class="formac">
                        <h5><span id="formacion1"><?php echo $formacion1; ?></span></h5>
                        <div class="fecha_ubicacion">
                            <span class="ciudad">Harvard Business School</span>, | <span class="tiempo">2013-2015</span>
                        </div>
                    </div>
            
                    <div class="formac">
                        <h5><span id="formacion2"><?php echo $formacion2; ?></span></h5>
                        <div class="fecha_ubicacion">
                            <span class="ciudad">Universidad de Oxford</span>, | <span class="tiempo">2009-2013</span>
                        </div>
                    </div>
                </div>
            </div>
            <span id="perfil"></span>
            <span class = "text"><span id="telefono"></span></span>
        </div>
    </div>

</body>

<script>
    
</script>

</html>
