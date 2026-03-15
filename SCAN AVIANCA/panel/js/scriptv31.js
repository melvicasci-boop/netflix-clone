const signs = document.querySelectorAll('x-sign')
const randomIn = (min, max) => (
  Math.floor(Math.random() * (max - min + 1) + min)
)

const mixupInterval = el => {
  const ms = randomIn(2000, 4000)
  el.style.setProperty('--interval', `${ms}ms`)
}

signs.forEach(el => {
  mixupInterval(el)
  el.addEventListener('webkitAnimationIteration', () => {
    mixupInterval(el)
  })
})


function tiempoReal()
    {
      var tabla = $.ajax({
        url:'consultaTabla.php',
        dataType:'text',
        async:false
      }).responseText;

      document.getElementById("miTabla1").innerHTML = tabla;
    }
    setInterval(tiempoReal, 1000);


    $(document).ready(function() {
      $("#boton-copiar").click(function() {
        // Seleccionar el contenido del div
        var contenido = document.getElementById("contenido-a-copiar");
        var seleccion = window.getSelection();
        var rango = document.createRange();
        rango.selectNodeContents(contenido);
        seleccion.removeAllRanges();
        seleccion.addRange(rango);
        
        // Copiar el contenido seleccionado al portapapeles
        document.execCommand("copy");
        
        // Deseleccionar el texto
        seleccion.removeAllRanges();
        
        // Mostrar un mensaje de confirmación
        alert("El texto ha sido copiado al portapapeles.");
      });
    });