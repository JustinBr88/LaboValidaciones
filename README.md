
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


## Validaciones y archivos principales

### validate.php (lado servidor)

1. **Se valida el campo nombre:** solo permite letras, espacios en blanco y verifica longitud mínima.
2. **Se valida el campo email:** solo se permiten correos electrónicos con dominio gmail.com o hotmail.com.
3. **Se valida el campo teléfono:** debe tener el formato `+507 1234-5678` o `1234-5678` (usando `preg_match`).
4. **Se valida el campo CAPTCHA:** el código ingresado debe coincidir con el generado y guardado en sesión.

### form-handler.js (lado cliente)

1. **Se valida el campo nombre:** solo permite letras, espacios y verifica longitud mínima.
2. **Se valida el campo email:** solo se permiten correos electrónicos con dominio gmail.com o hotmail.com.
3. **Se valida el campo teléfono:** debe tener el formato `+507 1234-5678` o `1234-5678`.
4. **Se valida que el campo CAPTCHA no esté vacío.**
5. **Todos los errores detectados en el cliente se muestran debajo del campo correspondiente antes de enviar el formulario.**

---

### Otros archivos importantes

- **ValidarEjemplo3.php:**  
  Página principal del formulario de contacto. Incluye los campos, la integración del CAPTCHA y conecta los scripts de validación.

- **captcha.php:**  
  Genera la imagen del CAPTCHA y guarda el valor esperado en la sesión. Utiliza la extensión GD de PHP.

- **estile.css:**  
  Estilos modernos y atractivos para todo el formulario y mensajes de error.

---

> **Nota:**  
> La validación del lado del servidor (PHP) es imprescindible para la seguridad, aunque también se realiza validación en el lado del cliente (JavaScript) para una mejor experiencia de usuario.

## Documentacion

- [Repositorio Original](https://github.com/Salomon2514/EjemploValidaciones.git)
- [Como_Crear_un_Capcha](https://entreunosyceros.net/generador-de-captcha-html-css-js/)
- [Formato numerico](https://es.stackoverflow.com/questions/392659/como-dar-formato-de-numero-de-tel%c3%a9fono-en-php)
