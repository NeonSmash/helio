<?php
require_once "config.php";
 
$email = $password = $confirm_password = "";
$email_err = $password_err = $confirm_password_err = "";
 
if ($_SERVER["REQUEST_METHOD"] == "POST"){
 
    if (empty(trim($_POST["email"]))){
        $email_err = "Kérlek írj be egy e-mail címet!";
    } elseif (!filter_var(trim($_POST["email"]), FILTER_VALIDATE_EMAIL)) {
        $email_err = "Hibás e-mail formátum!";
      } else {
        $sql = "SELECT id FROM feladat_users WHERE email = ?";
        
        if ($stmt = $mysqli->prepare($sql)){
            $stmt->bind_param("s", $param_email);
            
            $param_email = trim($_POST["email"]);
            
            if ($stmt->execute()){
                $stmt->store_result();
                
                if ($stmt->num_rows == 1){
                    $email_err = "Ez az e-mail már foglalt.";
                } else {
                    $email = trim($_POST["email"]);
                }
            } else {
                echo "Valami nem sikertült. Kérlek próbáld újra később.";
            }

            $stmt->close();
        }
    }
    
    if (empty(trim($_POST["password"]))){
        $password_err = "Kérlek írj be egy jelszót.";     
    } elseif (strlen(trim($_POST["password"])) < 8){
        $password_err = "Minimum 8 karakter!";
    } else {
        $password = trim($_POST["password"]);
    }
    
    if (empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Kérlek erősítsd meg a jelszót!";     
    } else {
        $confirm_password = trim($_POST["confirm_password"]);
        if (empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "A jelszavak nem egyeznek!";
        }
    }
    
    if (empty($email_err) && empty($password_err) && empty($confirm_password_err)){
        
        $sql = "INSERT INTO feladat_users (email, password) VALUES (?, ?)";
         
        if ($stmt = $mysqli->prepare($sql)){
            $stmt->bind_param("ss", $param_email, $param_password);
            
            $param_email = $email;
            $param_password = password_hash($password, PASSWORD_DEFAULT);
            
            if ($stmt->execute()){
                header("location: login.php");
            } else {
                echo "Valami nem sikertült. Kérlek próbáld újra később.";
            }

            $stmt->close();
        }
    }
    
    $mysqli->close();
}
?>
 
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <title>Regisztráció</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body{ font: 14px sans-serif; }
        .wrapper{ width: 360px; padding: 20px; }
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Regisztráció</h2>
        <p>Kérlek töltsd ki az alábbi mezőket.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label>E-mail</label>
                <input type="text" name="email" class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $email; ?>">
                <span class="invalid-feedback"><?php echo $email_err; ?></span>
            </div>    
            <div class="form-group">
                <label>Jelszó</label>
                <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>">
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <label>Jelszó újra</label>
                <input type="password" name="confirm_password" class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $confirm_password; ?>">
                <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Regisztráció">
            </div>
            <p>Már van fiókod? <a href="login.php">Bejelentkezés</a></p>
        </form>
    </div>    
</body>
</html>