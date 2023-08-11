<?php include_once __DIR__ . '/header-dashboard.php'; ?>

<div class="contenedor-sm">

        <div class="contenedor-modificar">
            <div class="contenedor-nuevo-menu">
                <button type="button" class="agregar-menu" id="agregar-menu">
                    &#43; Agregar Comida
                </button>
            </div>

            <div id="filtros" class="filtros">
                <div class="filtros-inputs">
                    <h2>Filtros:</h2>
                        <div class="campo">
                            <label for="todas">Todas</label>
                            <input type="radio"
                                    id="todas"
                                    name="filtro"
                                    value=""
                                    checked
                            />
                            
                        </div>

                        <div class="campo">
                            <label for="cena/almuerzo">Cena/Almuerzo</label>
                            <input type="radio"
                                    id="cena/amuerzo"
                                    name="filtro"
                                    value="cena"
                                   
                            />
                            
                        </div>

                        <div class="campo">
                            <label for="desayuno">Desayuno</label>
                            <input type="radio"
                                    id="desayuno"
                                    name="filtro"
                                    value="desayuno"
                                   
                            />
                            
                        </div>

                        <div class="campo">
                            <label for="postre">Postre</label>
                            <input type="radio"
                                    id="postre"
                                    name="filtro"
                                    value="postre"
                                   
                            />
                            
                        </div>

                        <div class="campo">
                            <label for="bebida">Bebida</label>
                            <input type="radio"
                                    id="bebida"
                                    name="filtro"
                                    value="bebida"
                                   
                            />
                            
                        </div>
                </div>

            </div>

              
        </div>
        <ul id="listado-menu" class="listado-menu"></ul>
</div>

<?php include_once __DIR__ . '/footer-dashboard.php'; ?>

<?php 
    $script .='
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="build/js/reservas.js"></script>
    ';
    
    ?>