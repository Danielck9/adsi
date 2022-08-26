<?php
// conexión a la base de datos
require_once "config.php";
 
// Definir variables e inicializar con valores vacíos
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";
 
// Procesar la informacion del formulario cuando se envia datos
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validar usuario
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
    } else{
        // SQL Query
        $sql = "SELECT id FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // vinculación de las variables
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // parametros
            $param_username = trim($_POST["username"]);
            
            // intento de ejecución del parametro establecido
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "Este nombre de usuario ya existe";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Algo salió mal, intentelo mas tarde";
            }
            // Cerrar declaración
            mysqli_stmt_close($stmt);
        }
    }
    
    // Validar clave
    if(empty(trim($_POST["password"]))){
        $password_err = "Por favor introduzca la clave";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "La clave debe tener almenos 6 caracteres";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validar confirmación de clave
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Por favor confirme la clave";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Las claves no coinciden";
        }
    }
    
    // Verificar errores de inputs antes de ingresarlos a la base de datos
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
        
        // SQL Query
        $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // vinculación de variables
            mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);
            
            // parametros
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            
            // Intento de ejecutar la declaración
            if(mysqli_stmt_execute($stmt)){
                // redireccionar a "login"
                header("location: login.php");
            } else{
                echo "Algo salio mal. intentelo más tarde";
            }
            // Cerrar declaración
            mysqli_stmt_close($stmt);
        }
    }
    
    // Cerrar la conexión
    mysqli_close($link);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registrate</title>
    <link href="Style.css" rel="stylesheet">
   
<body class="bg-dark">
<div class="container">
       <img src="Logo Santorini.jpeg" class="img-thumbnail" style="border-radius: 100px;">
    </div>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-5 mx-auto">
                <div class="card">
                    <div class="card-header text-center bg-warning">
                        <h1>Regístrate</h1>
                    </div>
                    <div class="card-body">
                        <p>Por favor llena este formulario para crear una cuenta.</p>
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                            <div class="form-group">
                                <label>Usuario</label>
                                <input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                                <span class="invalid-feedback"><?php echo $username_err; ?></span>
                            </div>    
                            <div class="form-group">
                                <label>Clave</label>
                                <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>">
                                <span class="invalid-feedback"><?php echo $password_err; ?></span>
                            </div>
                            <div class="form-group">
                                <label>Confirmar clave</label>
                                <input type="password" name="confirm_password" class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $confirm_password; ?>">
                                <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Registrar">
                                <input type="reset" class="btn btn-dark ml-2" value="Reiniciar">
                            </div>
                            <p>¿Ya tienes una cuenta? <a href="login.php">Inicia sesión aquí</a>.</p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>