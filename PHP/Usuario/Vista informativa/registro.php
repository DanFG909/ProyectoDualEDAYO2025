<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Regisro - Expoaprende</title>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: #f5f5f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        

        .login-container {
            width: 450px;
            background-color: #7a1224;
            border-radius: 30px;
            border-radius: 6px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.3);
            overflow: hidden;
        }

        .header {
            background-color: #ffffff;
            text-align: center;
            padding: 10px 0;
        }

        .header img {
            width: 120px;
        }

        .form-content {
            padding: 30px 20px;
            text-align: center;
            color: #fff;
        }

        h2 {
            font-size: 16px;
            margin-bottom: 5px;
            font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

      .input-container >input{
            width: 100%;
            padding: 17px 15px 17px 66px;
            margin-bottom: 25px;
            border: 1px solid #d7a94b;
            border-radius: 60px;
            outline: none;
            background-color: transparent;
            color: white;

            
        }

        input::placeholder {
            color: #d3d3d3;
        }

        .btn {
            background-color: #b88a4a;
            border: none;
            padding: 10px 30px;
            border-radius: 20px;
            color: white;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s;
        }

        .btn:hover {
            background-color: #c79b5e;
        }

        a {
            display: block;
            color: #ffffff;
            margin-top: 10px;
            font-size: 14px;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        .extra-links {
            margin-top: 2px;
        }

        .input-container{
            position: relative;
        }

          .input-container > i {
            width: 56px;
            height: 56px;

            padding: 20px;
            border-radius: 60%;
            background: linear-gradient(
                90deg,
                rgb(124, 53, 65) 0%,
                rgb(202, 70, 81) 50%
            );
            color: #FCFEF7;
            position: absolute;
            font-size: 15px;
            top: 24px;
            left: 100;

            display: flex;
            align-items: center;
            justify-content: center;
        }
        

    </style>
</head>
<body>

    <div class="login-container">
        <div class="header">
            <img src="images/logo.png" alt="Logo Expoaprende">
        </div>

        <div class="form-content">

              <div class="input-container">
                <h2>Nombre</h2>
                <input type="text" name="name" placeholder="Nombre">
                <i class="fa-solid fa-user"></i>
                </div>

            <div class="input-container">
            <h2>Correo Electrónico</h2>
            <input type="email" placeholder="ingrese su correo">
            <i class="fa-solid fa-envelope"></i>
            </div>

            <div class="input-container">
            <h2>Contraseña</h2>
            <input type="password" placeholder="ingrese su contraseña">
            <i class="fa-solid fa-lock"></i>
            </div>

            <div class="input-container">
                <h2>Teléfono</h2>
                <input type="tel" name="phone" placeholder="Teléfono">
                <i class="fa-solid fa-phone"></i>
            </div>

            <button class="btn">Ingresar</button>

            <div class="extra-links">
                <a href="#">¿Olvidaste tu contraseña?</a>
                
            </div>
        </div>
    </div>

</body>
</html>
