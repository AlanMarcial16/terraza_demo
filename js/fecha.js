// Obtener la fecha actual
const fecha = new Date();

// Obtener las opciones de formato para mostrar la fecha en el idioma español y en el formato deseado
const options = {
weekday: 'long',
day: 'numeric',
month: 'long',
year: 'numeric'
};

// Dar formato a la fecha y guardarla en una variable
const fechaFormateada = fecha.toLocaleDateString('es-ES', options);

// Actualizar el contenido del elemento de texto con la fecha formateada
document.getElementById('fecha').textContent = fechaFormateada;