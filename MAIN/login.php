<?php
// Iniciar la sesión
session_start();
 
// Verificar si el usuario tiene una sesion abierta, si es verdadero lo redirige a "welcome.php"
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: welcome.php");
    exit;
}
 
// conexión a la base de datos
require_once "config.php";
 
// Definición de las variables
$username = $password = "";
$username_err = $password_err = $login_err = "";
 
// Procesar la informacion del formulario cuando se envia datos
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // verificar si el campo "usuario" esta vacio
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Verificar si el campo "clave" está vacio
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validar las credenciales
    if(empty($username_err) && empty($password_err)){
        // Query de SQL
        $sql = "SELECT id, username, password FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // vinculacion de las variables
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // parametros
            $param_username = $username;
            
            // intento de ejecución de la declaración
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Verificar que el usuario existe, if yes entonces verificar clavev
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Clave correcta, iniciar sesión
                            session_start();
                            
                            // Guardar datos de la sesión en variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;                            
                            
                            // Redireccionar a "welcome.php"
                            header("location: welcome.php");
                        } else{
                            // Clave invalida, mostrar un error
                            $login_err = "Invalid username or password.";
                        }
                    }
                } else{
                    // Si el usuario no existe, mostrar un error
                    $login_err = "Usuario o contraseña invalida";
                }
            } else{
                echo "Algo ha salido mal, intentelo mas tarde.";
            }
            // Cerrar declaración
            mysqli_stmt_close($stmt);
        }
    }
    
    // Cerrar la conexión
    mysqli_close($link);
}
// FORMULARIO DE INICIO DE SESIÓN
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="Style.css" rel="stylesheet">
    
</head>
<body class="bg-dark">
    <div class="container">
       <img src="Logo Santorini.jpeg" class="img-thumbnail" style="border-radius: 100px;">
    </div>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-5 mx-auto">
            <div class="card">
                <div class="card-header text-center bg-warning">
                    <h2>Inicio de sesión</h2>
                </div>
                <div class="card-body">
                    <p>Por favor ingresa tus credenciales para el inicio de sesión.</p>
                    <?php 
                    if(!empty($login_err)){
                        echo '<div class="alert alert-danger">' . $login_err . '</div>';
                    }        
                    ?>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group">
                            <label>Usuario</label>
                            <input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                            <span class="invalid-feedback"><?php echo $username_err; ?></span>
                        </div>    
                        <div class="form-group">
                            <label>Clave</label>
                            <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>">
                            <span class="invalid-feedback"><?php echo $password_err; ?></span>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Iniciar sesión">
                        </div>
                        <p>¿No tienes una cuenta? <a href="register.php">Registrate aquí</a>.</p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>
</html>