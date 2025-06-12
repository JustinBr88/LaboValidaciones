<!DOCTYPE html>
<html>
<head>
    <title>Contacto Moderno</title>
    <link rel="stylesheet" href="estile.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <div class="wrapper">
        <form id="contactForm" action="validate.php" method="post" autocomplete="off" novalidate>
            <h1>Contáctanos</h1>

            <div class="input-box">
                <label for="name">Nombre Completo</label>
                <div class="input-field">
                    <input type="text" placeholder="Ej: Juan Pérez" name="name" id="name" required>
                    <i class='bx bxs-user'></i>
                </div>
                <div class="field-error" id="error-nombre"></div>
            </div>

            <div class="input-box">
                <label for="email">Correo Electrónico</label>
                <div class="input-field">
                    <input type="email" placeholder="Ej: juan@email.com" name="email" id="email" required>
                    <i class='bx bxs-envelope'></i>
                </div>
                <div class="field-error" id="error-email"></div>
            </div>
            
            <div class="input-box">
                <label for="telephone">Teléfono</label>
                <div class="input-field">
                    <input type="text" placeholder="Ej: +507 1234-5678" name="telephone" id="telephone" required>
                    <i class='bx bxs-phone'></i>
                </div>
                <div class="field-error" id="error-telefono"></div>
            </div>

            <!-- CAPTCHA -->
            <div class="input-box">
                <img src="captcha.php" alt="CAPTCHA Image" style="border-radius: 7px;">
            </div>
            <div class="input-box">
                <label for="captcha">Introduce el código mostrado</label>
                <div class="input-field">
                    <input type="text" name="captcha" id="captcha" required placeholder="Código CAPTCHA">
                </div>
                <div class="field-error" id="error-captcha"></div>
            </div>
            
            <button type="submit" class="btn">Enviar Mensaje</button>
        </form>
        <div id="response"></div>
    </div>
    <script src="form-handler.js" defer></script>
</body>
</html>