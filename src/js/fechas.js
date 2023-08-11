(function(){
    const nuevoEstado = document.querySelector('#estado');
    nuevoEstado.addEventListener('dblclick', mostrar);
   
    function mostrar(){
        cambiarEstado(estado);
    
    }

    function cambiarEstado(estado){
        console.log(estado);
        const estadoText = nuevoEstado.textContent.trim();
        if (estadoText === 'Pendiente') {
            nuevoEstado.textContent = 'Completo';
            nuevoEstado.style.backgroundColor = 'gray';
            nuevoEstado.style.color = 'white';
            nuevoEstado.style.borderRadius = '5px';


        } else if (estadoText === 'Completo') {
            nuevoEstado.textContent = 'Pendiente';
            nuevoEstado.style.backgroundColor = 'white';
            nuevoEstado.style.color = 'gray';
            nuevoEstado.style.borderRadius = '5px';
        }
        
    }




    
})();
