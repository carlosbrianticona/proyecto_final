document.getElementById('aceptarButton').addEventListener('click', function() {
    var formulario1 = document.getElementById('formulario-1');
    var formulario2 = document.getElementById('formulario-2');
    var formulario3 = document.getElementById('formulario-3');

    formulario1.style.display = 'none';
    formulario2.style.display = 'none';
    formulario3.style.display = 'none';

    if (document.getElementById('mostrarFormulario1').checked) {
        formulario1.style.display = 'block';
    } else if (document.getElementById('mostrarFormulario2').checked) {
        formulario2.style.display = 'block';
    } else if (document.getElementById('mostrarFormulario3').checked) {
        formulario3.style.display = 'block';
    }
});

document.getElementById('atrasButton').addEventListener('click', function() {
    var formularios = document.querySelectorAll('#formulario-1, #formulario-2, #formulario-3');
    formularios.forEach(function(form) {
        form.style.display = 'none';
    });
});
