import { API_URL } from "../utils/constants.js";


function formatNumberToGTQ(number) {
    let numberString = number.toString();
    let [integerPart, decimalPart] = numberString.split('.');
    
    integerPart = integerPart.replace(/\B(?=(\d{3})+(?!\d))/g, ',');

    let formattedNumber = `Q${integerPart}`;
    if (decimalPart) {
        formattedNumber += `.${decimalPart}`;
    }

    return formattedNumber;
}

function getLast7Days() {
    const today = new Date();
    const days = [];
    
    // Encuentra el último viernes
    const dayOfWeek = today.getDay();
    const daysToLastFriday = (dayOfWeek + 2) % 7;  // Día de la semana para el último viernes
    
    const lastFriday = new Date(today);
    lastFriday.setDate(today.getDate() - daysToLastFriday);
    
    // Rellena los últimos 7 días
    for (let i = 0; i < 7; i++) {
        const day = new Date(lastFriday);
        day.setDate(lastFriday.getDate() - i);
        days.push(day.toDateString());  // O usa day.toISOString() si prefieres
    }
    
    return days;
}
    
document.addEventListener('DOMContentLoaded', () => {
    // Cargar los datos a los indicadores
    fetch(API_URL + 'dashboard/getIndicators')
        .then(response => response.json())
        .then(data => {
            const indicators = data[0];
            document.getElementById("ventasTotales").textContent = `${formatNumberToGTQ(indicators.VentasTotales ?? 0)}`;
            document.getElementById("numTransacciones").textContent = indicators.NumTransacciones ?? 0;
            document.getElementById("productoMasVendido").textContent = indicators.ProductoMasVendido ?? 0;
            document.getElementById("cantidadVendida").textContent = `(${indicators.CantidadVendida ?? 0} vendidos)`;
            const last7Days = getLast7Days();

            var options = {
               
                chart: {
                  type: 'bar'
                },
                series: [{
                  name: 'total vendido',
                  data: indicators.VentasUltimos7Dias.split(',').map(Number).reverse()
                }],
                xaxis: {
                  categories: last7Days
                },
                colors: ['goldenrod'],
                title: {
                    text: 'Ventas de los Últimos 7 Días',  // Título del gráfico
                    align: 'center',  // Alineación del título
                    margin: 10,  // Margen del título
                    offsetX: 0,  // Desplazamiento horizontal del título
                    offsetY: 0,  // Desplazamiento vertical del título
                    style: {
                        fontSize: '16px',  // Tamaño de la fuente
                        fontWeight: 'bold',  // Peso de la fuente
                        color: '#333'  // Color de la fuente
                    }
                }
              }
              
              var chart = new ApexCharts(document.querySelector("#chart"), options);
              
              chart.render();

        }).catch(error => console.error('Error:', error));
});
