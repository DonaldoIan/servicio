const displayTime = () => {
    // Se define el objeto de configuración para el idioma español
    const options = {
        year: 'numeric',
        month: 'long',
        day: 'numeric',
        weekday: 'long'
    };

    // Se obtiene la fecha actual
    let date = new Date();
    let hora = date.getHours();
    let minuto = date.getMinutes();
    let segundo = date.getSeconds();
    let dia = date.getDate();
    let mes = date.getMonth();
    let anio = date.getFullYear();
    let meridiano = '';
    let fechaCompleta = new Intl.DateTimeFormat('es-ES', options).format(date); // Obtiene la fecha en español

    // Se define el meridiano
    hora < 12 ? meridiano = 'AM' : meridiano = 'PM';
    if (hora > 12) {
        hora -= 12;
    }
    let padHora = String(hora).padStart(2, '0');
    let padMin = String(minuto).padStart(2, '0');
    let padSeg = String(segundo).padStart(2, '0');

    horaReloj.textContent = `${padHora} :`;
    minutoReloj.textContent = `${padMin}`;
    meridianoReloj.textContent = `${meridiano}`;
    segundoReloj.textContent = `${padSeg}`;
    fechaReloj.textContent = `${fechaCompleta.toUpperCase()}`; // Mostrar la fecha en mayúsculas

    requestAnimationFrame(displayTime);
};

displayTime();
