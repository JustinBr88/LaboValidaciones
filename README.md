
# Laboratorio - Validaciones de Formulario

En este laboratorio, el estudiante replica una solución funcional de validación de formularios en PHP y JavaScript, analizando cada parte del código e implementando mejoras. Se busca reforzar conceptos como:

- Validación del lado del cliente con JavaScript.
- Validación del lado del servidor con PHP.
- Envío de datos usando fetch().
- Manejo de respuestas dinámicas.
- Uso de Git y GitHub para control de versiones.

 


## Objetivos del laboratorio

- Clonar un repositorio base desde GitHub.
- Analizar y comprender el flujo de validación de formularios.
- Implementar sus propias validaciones adicionales.
- Hacer pruebas locales y subir evidencia o código final.
- Recibir retroalimentación y nota.


## Preguntas

#### ¿Qué validaciones se aplican?

En validate.php (lado servidor):

   1. Se valida el campo nombre: solo permite letras y espacios en blanco.
   2. Se valida el campo email: debe tener formato de correo electrónico válido.
   3. Se valida el campo teléfono: debe tener el formato 123-456-7890 (usando preg_match).
   4. Se valida el campo CAPTCHA: el código ingresado debe coincidir con el generado y guardado en sesión.

En form-handler.js (lado cliente):

   1. Se valida el campo nombre: solo permite letras y espacios.
   2. Se valida el campo email: debe tener formato de correo electrónico válido.
   3. Se valida el campo teléfono: debe tener el formato 123-456-7890.
   4. Se valida que el campo captcha no esté vacío.
   5. Todos los errores detectados en el cliente se muestran juntos antes de enviar el formulario.

#### ¿Qué pasa si no se valida bien?

#### ¿Qué hace fetch()?



#### ¿Cómo se recibe y muestra la respuesta?



## Documentacion

- [Repositorio Original](https://github.com/Salomon2514/EjemploValidaciones.git)
- [PHP Form Validation Blog](https://mailtrap.io/blog/php-form-validation/#How-to-validate-a-form-in-PHP-using-script)

