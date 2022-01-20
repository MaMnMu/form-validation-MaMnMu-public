
<?php
                // Si el formulario está vacio se redirige de nuevo al mismo formulario
                if (empty($_POST)) {
                    header("Location: index.php");
                }
                
                // Validación del nombre
                if (isset($_POST['nombre']))
                    $nombre = $_POST['nombre'];
                if (preg_match("/[A-Z]/", $nombre) && preg_match("/[a-z]/", $nombre) && preg_match("/[ ]/", $nombre) && strlen($nombre) >= 3 && strlen($nombre) <= 25) {
                    $nombre_valido = true;
                } else {
                    $nombre_valido = false;
                }  
                
                //Validación de contraseña
                if (isset($_POST['contrasenia']))
                    $contrasenia = $_POST['contrasenia'];
                if (preg_match("/[A-Za-z]/", $contrasenia) && preg_match("/[0-9]/", $contrasenia) && strlen($contrasenia) >= 6 && strlen($contrasenia) <= 8) {
                    $contrasenia_valida = true;
                } else {
                    $contrasenia_valida = false;
                }
                
                //Validación de email
                if (isset($_POST['email']))
                    $email = $_POST['email'];
                if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $email_valido = true;
                } else {
                    $email_valido = false;
                }
                
                //Validación de teléfono movil
                if (isset($_POST['tel']))
                    $tel = $_POST['tel'];
                if (preg_match("/[0-9]/", $tel) && strlen($tel) == 9) {
                    $tel_valido = true;
                } else {
                    $tel_valido = false;
                }
                
                // Asignaciones
                if (isset($_POST['fecha'])) 
                    $fecha = $_POST['fecha'];
                
                if (isset($_POST['poblacion']))
                    $tienda = $_POST['poblacion'];
                
                if (isset($_POST['edad']))
                    $edad = $_POST['edad'];
                
                if (isset($_POST['suscripcion']))
                    $suscripcion = $_POST['suscripcion'];
                
                // Todo está correcto
                $todo_valido = false;
                if ($nombre_valido == true && $contrasenia_valida == true && $email_valido == true && $tel_valido == true && !empty($fecha) && isset($edad)) {
                    $todo_valido = true;
                } 
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Formulario de Registro</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width">
        <link rel="stylesheet" href="stylesheet.css">
    </head>
    
    <?php if ($todo_valido == true) { ?>
        <body>
            <div class="flex-page">
                <h1>Información del Cliente</h1>
                <div class="form-font capaform">
                        <p>Nombre: <?php echo $_POST['nombre'];?></p>
                        <p>Contraseña: <?php echo $_POST['contrasenia'];?></p> 
                        <p>Email: <?php echo $_POST['email'];?></p>
                        <p>Fecha de nacimiento: <?php echo $_POST['fecha'];?></p>
                        <p>Teléfono movil: <?php echo $_POST['tel'];?></p>
                        <p>Tienda: <?php echo $_POST['poblacion'];?></p>
                        <p>Edad: <?php 
                                if (isset($_POST['edad'])) {
                                   if ($_POST['edad'] == "-25") {
                                        echo "Menor de 25";
                                    } elseif ($_POST['edad'] == "25-50") {
                                        echo "Entre 25 y 50";
                                    } else {
                                        echo "Mayor de 50";
                                    }
                                }
                                ?></p>
                        <p><?php 
                                if (isset($_POST['suscripcion'])) {
                                    echo "Te has suscrito a la revista semanal";
                                } else {
                                    echo "No te has suscrito a la revista semanal";
                                } 
                                ?></p> 
                </div>
            </div>
        </body>                   
    <?php } else { ?>
        <body>
            <div class="flex-page">
                <h1>Registro de Cliente</h1>
                <form class="form-font capaform" name="Formregistro" 
                      action="procesaformulario.php" method="POST">
                    <div class="flex-outer">
                        <div class="form-section">
                            <?php if ($nombre_valido == true) { ?>
                                <label for="nombre">Nombre de Usuario:</Label> 
                                <input id="nombre" type="text" name="nombre" value="<?php echo $nombre ?>" placeholder="Escribe tu nombre"/>
                            <?php } else { ?>
                                <label for="nombre">Nombre de Usuario:</Label> 
                                <input id="nombre" type="text" name="nombre" placeholder="Escribe tu nombre"/>
                                <p style="color:red">El nombre debe contener mayúsculas, minúsculas y espacios y una longitud entre 3 y 25 caracteres</p>
                            <?php } ?>
                        </div>
                        <div class="form-section">
                            <?php if ($contrasenia_valida == true) { ?>
                                <label for="contrasenia">Contraseña:</label> 
                                <input id="contrasenia" type="password" name="contrasenia" value="<?php echo $contrasenia ?>"  placeholder="Escribe tu contraseña"/>
                            <?php } else { ?>
                                <label for="contrasenia">Contraseña:</label> 
                                <input id="contrasenia" type="password" name="contrasenia" placeholder="Escribe tu contraseña"/>
                                <p style="color:red">La contraseña debe contener caracteres alfanuméricos y una longitud entre 6 y 8 caracteres</p>
                            <?php } ?>
                        </div>
                        <div class="form-section">
                            <?php if ($email_valido == true) { ?>
                                <label for="email">Email:</label> 
                                <input id="email" type="text"  name="email" value="<?php echo $email ?>" placeholder="Escribe tu correo">
                            <?php } else { ?>
                                <label for="email">Email:</label> 
                                <input id="email" type="text"  name="email" placeholder="Escribe tu correo">
                                <p style="color:red">El correo electrónico debe tener el formato correcto</p>
                            <?php } ?>
                        </div>
                        <div class="form-section">
                            <?php if (!empty($fecha)) { ?>
                                <label for="fechanac">Fecha de Nacimiento:</label>
                                <input id="fechanac" type="date" name="fecha" value="<?php echo $fecha ?>" placeholder="Escribe tu fecha de nacimiento">
                            <?php } else { ?>
                                <label for="fechanac">Fecha de Nacimiento:</label>
                                <input id="fechanac" type="date" name="fecha" placeholder="Escribe tu fecha de nacimiento">
                                <p style="color:red">La fecha debe ser marcada</p>
                            <?php } ?>
                        </div>
                        <div class="form-section">
                            <?php if ($tel_valido == true) { ?>
                                <label for="telefono">Telefono Móvil:</label> 
                                <input id="telefono" type="tel" name="tel" value="<?php echo $tel ?>" placeholder="Escribe tu telefono">
                            <?php } else { ?>
                                <label for="telefono">Telefono Móvil:</label> 
                                <input id="telefono" type="tel" name="tel" placeholder="Escribe tu telefono">
                                <p style="color:red">El teléfono movil solo debe contener números y 9 dígitos</p>
                            <?php } ?>
                        </div>
                        <div class="form-section">
                            <label for="nomtienda">Tienda:</label> 
                            <select id="nomtienda" name="poblacion">
                                <?php if ($tienda == "Madrid") { ?>
                                    <option value="Madrid" selected>Madrid</option>
                                    <option value="Barcelona">Barcelona</option>
                                    <option value="Valencia">Valencia</option>
                                <?php } elseif ($tienda == "Barcelona") { ?>
                                    <option value="Madrid">Madrid</option>
                                    <option value="Barcelona" selected>Barcelona</option>
                                    <option value="Valencia">Valencia</option>
                                <?php } else { ?>
                                    <option value="Madrid">Madrid</option>
                                    <option value="Barcelona">Barcelona</option>
                                    <option value="Valencia" selected>Valencia</option>
                                <?php } ?>
                            </select> 
                        </div>
                        <div class="form-section">
                            <label>Edad:</label>
                            <div class="select-section">
                                <?php if (!empty($edad)) { ?>  
                                    <div>
                                            <?php if ($edad == "-25") { ?>
                                                <input id="-25" type="radio" name="edad" value="-25" checked/> 
                                                <label for="-25">Menor de 25</label>
                                            <?php } else { ?>
                                                <input id="-25" type="radio" name="edad" value="-25"/> 
                                                <label for="-25">Menor de 25</label>
                                            <?php } ?>
                                    </div>
                                    <div>
                                            <?php if ($edad == "25-50") { ?>
                                                <input id="25-50" type="radio" name="edad" value="25-50" checked /> 
                                                <label for="25-50">Entre 25 y 50</label>
                                            <?php } else { ?>
                                                <input id="25-50" type="radio" name="edad" value="25-50"/> 
                                                <label for="25-50">Entre 25 y 50</label>
                                            <?php } ?>       
                                    </div>
                                    <div>
                                        <?php if ($edad == "50-") { ?>
                                            <input id="50-" type="radio" name="edad" value="50-" checked />
                                            <label for="50-">Mayor de 50</label>
                                        <?php } else { ?>
                                            <input id="50-" type="radio" name="edad" value="50-" />
                                            <label for="50-">Mayor de 50</label>
                                        <?php } ?>
                                    </div>
                                <?php } else { ?>
                                    <div>
                                        <input id="-25" type="radio" name="edad" value="-25" /> 
                                        <label for="-25">Menor de 25</label>
                                    </div>
                                    <div>
                                        <input id="25-50" type="radio" name="edad" value="25-50" /> 
                                        <label for="25-50">Entre 25 y 50</label>
                                    </div>
                                    <div>
                                        <input id="50-" type="radio" name="edad" value="50-" />
                                        <label for="50-">Mayor de 50</label>
                                    </div>
                                    <p style="color:red">Debes seleccionar una edad</p>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="form-section">
                            <?php if (isset($suscripcion)) { ?>
                                <label for="suscripcion">Suscripción a la revista semanal</label>
                                <input id="suscripcion" type="checkbox"  name="suscripcion" checked/> 
                            <?php } else { ?>
                                <label for="suscripcion">Suscripción a la revista semanal</label>
                                <input id="suscripcion" type="checkbox"  name="suscripcion"/>
                            <?php } ?>
                        </div>
                        <div class="form-section">
                            <div class="submit-section">
                                <input class="submit" type="submit" 
                                       value="Enviar" name="botonenvio" /> 
                            </div>
                        </div>
                    </div>
                </form> 
            </div>
        </body>
    <?php } ?>  
</html>


