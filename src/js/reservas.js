(function(){

    obtenerMenu();
    let menu = [];
    let filtradas = [];

  //boton para mostrar el modal////////////////////////////////////////////////////////////////////////////////////////////////
  const nuevoMenuBtn = document.querySelector('#agregar-menu');//el ID del boton de mod en reserca
  nuevoMenuBtn.addEventListener('click',function(){
    mostrarFormulario();
  } );// al darle click va llmar la funcion mostar formulari

  //filtros de busqueda///////////////////////////////////////////////////////////////////////////////////////////////
  const filtros = document.querySelectorAll('#filtros input[type="radio');
    filtros.forEach(radio => {
        radio.addEventListener('input', filtrarMenu);
    })
    const filtroTiposComida = {
        '': () => menu,
        'cena': (menus) => menus.tipo_comida === 'cena',
        'desayuno': (menus) => menus.tipo_comida === 'desayuno',
        'postre': (menus) => menus.tipo_comida === 'postre',
        'bebida': (menus) => menus.tipo_comida === 'bebida'
    };
    
    function filtrarMenu(e) {
        const filtro = e.target.value;
        filtradas = menu.filter(filtroTiposComida[filtro]);
        console.log(filtradas);

        mostrarMenu();
    }
   

    //obtener menu/////////////////////////////////////////////////////////////////////////////////////////////////////////////
  async function obtenerMenu(){
        try {
            const url = '/api/menu';
            const respuesta = await fetch(url);
            const resultado = await respuesta.json();
            menu = resultado.menu;
            mostrarMenu();
        } catch (error) {
            console.log(error);
        }
  }

    //mostrar menu/////////////////////////////////////////////////////////////////////////////////////////////////////////////

  function mostrarMenu(){
    limpiarMenu();


    const arrayMenu = filtradas.length ? filtradas : menu;
    
    if (arrayMenu.length === 0){
        const contenedorMenu = document.querySelector('#listado-menu');
        const textoNoMenu = document.createElement('LI');
        textoNoMenu.textContent = 'no hay datos';
        textoNoMenu.classList.add('no-menu');

        contenedorMenu.appendChild(textoNoMenu);
        return;
    }

        arrayMenu.forEach(menus =>{
            const contenedorMenu = document.createElement('LI');
            contenedorMenu.dataset.menuId = menus.id;
            contenedorMenu.classList.add('contenedor-menu');

            const nombreMenu = document.createElement('P')
            nombreMenu.textContent = menus.nombre_comida;
            nombreMenu.classList.add('nombre-comida');


            const receta = document.createElement('P')
            receta.textContent = menus.receta;

            const tipoComida = document.createElement('P')
            tipoComida.textContent = menus.tipo_comida;
            tipoComida.classList.add('tipo-comida');

            const opcionesDiv = document.createElement('DIV');
            opcionesDiv.classList.add('opciones');

            const btnEliminarMenu = document.createElement('BUTTON');
            btnEliminarMenu.classList.add('eliminar-menu');
            btnEliminarMenu.dataset.idMenu = menu.id;
            btnEliminarMenu.textContent = 'X';
            btnEliminarMenu.ondblclick = function(){
                confirmarEliminarMenu({...menus});
            }
         
            opcionesDiv.appendChild(btnEliminarMenu);
            contenedorMenu.appendChild(nombreMenu);
            contenedorMenu.appendChild(receta);
            contenedorMenu.appendChild(tipoComida);
            contenedorMenu.appendChild(opcionesDiv);

            const listadoMenu = document.querySelector('#listado-menu');
            listadoMenu.appendChild(contenedorMenu);
        });
  }


    // mostrar formulario////////////////////////////////////////////////////////////////////////////////////////////////////
  
    function mostrarFormulario(){
    const modal = document.createElement('DIV');//crea el div
    modal.classList.add('modal');//la agrega la clases 
    modal.innerHTML = `
    <form class="formulario nuevo-menu">
    <legend>Añade una nueva comida</legend>
    <div class="campo">
            <label>Nombre</label>
         <input 
            type="text"
            name="menu"
            placeholder="Nombre de la comida o bebida"
            id="menu" 
        />
    </div>


    <div class="campo">
    <label>Receta</label>
    <textarea name="receta" rows="10" cols="40" id="receta"></textarea>
    </div>

    <div class="campo">
    <label for="tipo_comida">Tipo de comida:</label>
    <select id="tipo_comida" name="tipo_comida">
      <option value="cena">Cena/Almuerzo</option>
      <option value="desayuno">Desayuno</option>
      <option value="bebida">Bebida</option>
      <option value="postre">Postre</option>
    </select>
  </div>


    <div class="opciones">
    <input type="submit" class="submit-nuevo-menu" value="Añadir Comida" />
        <button type="button" class="cerrar-modal">Cerrar</button>
    </div>


</form> 
`;
        setTimeout(() => {
            const formulario = document.querySelector('.formulario');
            formulario.classList.add('animar');
        }, 0);

    modal.addEventListener('click', function(e){
        e.preventDefault();

        if(e.target.classList.contains('cerrar-modal')){
            
        const formulario = document.querySelector('.formulario');
        formulario.classList.add('cerrar');

        setTimeout(() => {
            modal.remove();
        }, 500);

        }
        if(e.target.classList.contains('submit-nuevo-menu')){
            submitFormularioNuevaComida();
        }
    })

    document.querySelector('.dashboard').appendChild(modal);
  }

        //alerta eliminar////////////////////////////////////////////////////////////////////////////////////////////////

        function confirmarEliminarMenu(menu){
            Swal.fire({
                title: 'Quieres eliminar el registro?',
                showCancelButton: true,
                confirmButtonText: 'Si',
                cancelButtonText: 'No',
              }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                 eliminarMenu(menu);
                } 
              })
        }

             //funcion eliminar//////////////////////////////////////////////////////////////////////////////////////////////////
             async function eliminarMenu(menu){
       
                const {id, nombre_comida, receta, tipo_comida} = menu;
               
                const datos = new FormData();
                datos.append('id', id);
                datos.append('nombre_comida',nombre_comida);
                datos.append('receta',receta);
                datos.append('tipo_comida',tipo_comida);
                try {
                    const url = 'api/menu/eliminar';
                    const respuesta = await fetch(url, {
                        method: 'POST',
                        body: datos
                    });
                
                    const resultado = await respuesta.json();
                    if(resultado.resultado){
                        mostrarAlerta(
                            resultado.mensaje,
                            resultado.tipo,
                            document.querySelector('.contenedor-nuevo-menu')
                            
                        );
                 
                        window.location.reload();
                    }
                } catch (error) {
                    
                }
            }



        //enviar formulario del modal y validaciones///////////////////////////////////////////////////////////////////////////
        
        function submitFormularioNuevaComida(){
            const menu = document.querySelector('#menu').value.trim();
            const receta = document.querySelector('#receta').value.trim();
            const tipo_comida = document.querySelector('#tipo_comida').value; 
            if(menu === ''){
                //mostrar una alerta de error
                mostrarAlerta('se debe incluir un nombre para la comida o bebida', 'error', document.querySelector('.formulario legend'));
                return;
            }

            agregarComida(menu,receta,tipo_comida);
        }


        //miestra un msj en la interfaz////////////////////////////////////////////////////////////////////////////////////////
        function mostrarAlerta(mensaje, tipo, referencia){

            //previene la creacion de multiples alertas
            const alertaPrevia = document.querySelector('.alerta');
            if(alertaPrevia){
                alertaPrevia.remove();
            }
            const alerta = document.createElement('DIV');
            alerta.classList.add('alerta', tipo);
            alerta.textContent = mensaje;

            referencia.parentElement.insertBefore(alerta, referencia. nextElementSibling);

            //elimiar la alerta despues de 5segs
            setTimeout(() => {
                alerta.remove();
            }, 4000);
        }

        //consultar el servidor para añadir una nueva comida///////////////////////////////////////////
         async function agregarComida(nombre_comida, receta, tipo_comida){
                //construir peticion
                const datos = new FormData();
                datos.append('nombre_comida',nombre_comida);
                datos.append('receta',receta);
                datos.append('tipo_comida',tipo_comida);

                try{
                    const url = '/api/menu';
                    const respuesta = await fetch(url, {
                        method: 'POST',
                        body: datos
                    });
                
                const resultado = await respuesta.json();
                console.log(resultado);

                    mostrarAlerta(resultado.mensaje, resultado.tipo, document.querySelector('.formulario legend'));

                if(resultado.tipo === 'exito'){
                    const modal = document.querySelector('.modal')
                    setTimeout(() => {
                        modal.remove();
                    }, 3000);

                    //agregar el objeto de menu al global de menu
                    const menuObj = {
                        id : String(resultado.id),
                        nombre_comida: nombre_comida,
                        receta : receta,
                        tipo_comida : tipo_comida
                    }

                    menu = [...menu, menuObj];
                  mostrarMenu();
                }

                }catch(error){
                    console.log(error);
                }
         }

   

         //funcion limpiar menu///////////////////////////////////////////////////////////////////////////////////////////
         function limpiarMenu(){
            const listadoMenu = document.querySelector('#listado-menu');
            
            while(listadoMenu.firstChild){
                listadoMenu.removeChild(listadoMenu.firstChild);
            }
         }

})();


