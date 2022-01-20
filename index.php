<!DOCTYPE html>
<html>
    <head>
        <title>Formulario de Registro</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width">
        <link rel="stylesheet" href="stylesheet.css">
    </head>
    <body>
        <div class="flex-page">
            <h1>Registro de Cliente</h1>
            <form class="form-font capaform" name="Formregistro" 
                  action="procesaformulario.php" method="POST">
                <div class="flex-outer">
                    <div class="form-section">
                        <label for="nombre">Nombre de Usuario:</Label> 
                        <input id="nombre" type="text" name="nombre" placeholder="Escribe tu nombre"/> 
                    </div>
                    <div class="form-section">
                        <label for="contrasenia">Contraseña:</Label> 
                        <input id="contrasenia" type="password" name="contrasenia" placeholder="Escribe tu contraseña"/> 
                    </div>
                    <div class="form-section">
                        <label for="email">Email:</Label> 
                        <input id="email" type="text"  name="email" placeholder="Escribe tu correo">
                    </div>
                    <div class="form-section">
                        <label for="fechanac">Fecha de Nacimiento:</Label> 
                        <input id="fechanac" type="date" name="fecha" placeholder="Escribe tu fecha de nacimiento">
                    </div>
                    <div class="form-section">
                        <label for="telefono">Telefono Móvil:</Label> 
                        <input id="telefono" type="tel" name="tel" placeholder="Escribe tu telefono">
                    </div>
                    <div class="form-section">
                        <label for="nomtienda">Tienda:</Label> 
                        <select id="nomtienda" name="poblacion">
                            <option value="Madrid">Madrid</option>
                            <option value="Barcelona">Barcelona</option>
                            <option value="Valencia">Valencia</option>
                        </select> 
                    </div>
                    <div class="form-section">
                        <label>Edad:</label>
                        <div class="select-section">
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
                        </div>
                    </div>
                    <div class="form-section">
                        <label for="suscripcion">Suscripción a la revista semanal</label>
                        <input id="suscripcion" type="checkbox"  name="suscripcion"/> 
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
</html>

