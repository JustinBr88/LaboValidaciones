document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('contactForm');
    const errors = {
        nombre: document.getElementById('error-nombre'),
        email: document.getElementById('error-email'),
        telefono: document.getElementById('error-telefono'),
        captcha: document.getElementById('error-captcha'),
    };
    const responseDiv = document.getElementById('response');

    function clearErrors() {
        errors.nombre.textContent = '';
        errors.email.textContent = '';
        errors.telefono.textContent = '';
        errors.captcha.textContent = '';
        responseDiv.style.display = 'none';
    }

    form.addEventListener('submit', async function(event) {
        event.preventDefault();
        clearErrors();

        let hasError = false;

        // Validación de nombre
        const nombre = form.name.value.trim();
        if (nombre.length < 8) {
            errors.nombre.textContent = "El nombre debe tener al menos 8 caracteres.";
            hasError = true;
        } else if (!/[A-Z]/.test(nombre) || !/[a-z]/.test(nombre)) {
            errors.nombre.textContent = "El nombre debe contener al menos una letra mayúscula y una minúscula.";
            hasError = true;
        }

        // Validación de email
        const email = form.email.value.trim();
        if (!/^([a-zA-Z0-9_.+-])+@(gmail\.com|hotmail\.com)$/.test(email)) {
            errors.email.textContent = "Solo se permiten correos de gmail.com o hotmail.com.";
            hasError = true;
        }

        // Validación de teléfono panameño (+507 1234-5678)
        const telefono = form.telephone.value.trim();
        if (!/^\d{4}-\d{4}$/.test(telefono)) {
            errors.telefono.textContent = "El teléfono debe ser de Panamá: 1234-5678";
            hasError = true;
        }

        // Validación de captcha
        const captcha = form.captcha.value.trim();
        if (captcha === "") {
            errors.captcha.textContent = "El código CAPTCHA es obligatorio.";
            hasError = true;
        }

        if (hasError) return;

        // Si no hay errores en cliente, envía al backend
        const formData = new FormData(form);
        try {
            const response = await fetch(form.action, {
                method: form.method,
                body: formData,
            });
            const result = await response.json();

            clearErrors();

            if (!result.success) {
                if (typeof result.errors === 'object' && result.errors !== null) {
                    // Errores por campo
                    Object.keys(result.errors).forEach(function(key) {
                        if (errors[key]) errors[key].textContent = result.errors[key];
                    });
                } else if (typeof result.errors === 'string') {
                    responseDiv.innerHTML = result.errors;
                    responseDiv.style.display = 'block';
                }
            } else {
                responseDiv.innerHTML = "¡Registro exitoso!";
                responseDiv.style.display = 'block';
                form.reset();
            }
        } catch (err) {
            responseDiv.innerHTML = "Error de conexión con el servidor.";
            responseDiv.style.display = 'block';
        }
    });
});