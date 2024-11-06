function validarFormulario() {
    const dni = document.getElementById('dni').value.trim();
    const nombre = document.getElementById('nombre').value.trim();
    const apellido = document.getElementById('apellido').value.trim();
    const telefono = document.getElementById('telefono').value.trim();

    // Validación básica
    if (dni === '' || nombre === '' || apellido === '' || telefono === '') {
        alert('Todos los campos son obligatorios.');
        return false;
    }

    // Validación de formato de DNI (Debería adaptarse según el formato requerido)
    if (!/^\d{7,8}$/.test(dni)) {
        alert('El DNI debe tener entre 7 y 8 dígitos.');
        return false;
    }

    // Validación de teléfono (Ajustar al formato requerido)
    if (!/^\d{10}$/.test(telefono)) {
        alert('El teléfono debe tener 10 dígitos.');
        return false;
    }

    // Si todo es válido
    return true;
}
