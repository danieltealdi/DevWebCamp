
<h2 class="dashboard__heading"><?php echo $titulo; ?></h2>
<div class="dashboard__contenedor-boton">
    <a href="/admin/ponentes/crear" class="dashboard__boton">
    <i class="fa-solid fa-circle-plus"></i>    
    Registrar Ponente</a>    
</div>
<div class="dashboard__contenedor">
    <?php if(count($ponentes) === 0) { ?>
        <p class="text-center">No Hay Ponentes Aún</p>
    <?php } else { ?>
        <table class="table">
            <thead class="table__thead">
                <tr>
                    <th scope="col" class="table__th">Nombre</th>
                    <th scope="col" class="table__th">Ubicación</th>
                    <th scope="col" class="table__th"></th>
                </tr>
            </thead>
            <tbody class="table__tbody">
                <?php foreach($ponentes as $ponente) { ?>
                    <tr class="table__tr">
                        <td class="table__td">
                            <?php echo $ponente->nombre . ' ' . $ponente->apellido; ?>
                        </td>
                        <td class="table__td">
                            <?php echo $ponente->ciudad . ', ' . $ponente->pais; ?>
                        </td>
                        <td class="table__td--acciones">
                            <a class="table__acciones table__acciones--editar" href="/admin/ponentes/editar?id=<?php echo $ponente->id; ?>" class="table__boton">
                                <i class="fa-solid fa-user-pen"></i>
                                Editar</a>
                            <form  method="POST" action="/admin/ponentes/eliminar" class="table__formulario">
                                <input type="hidden" id="id" value="<?php echo $ponente->id; ?>">    
                            <button class="table__acciones table__acciones--eliminar" type="submit">
                                    <i class="fa-solid fa-circle-xmark"></i>
                                    Eliminar
                                </button>
                                <input type="hidden" name="id" value="<?php echo $ponente->id; ?>">
                            </form>
                        </td>
                        
            <?php } ?>
            </table>
    <?php } 
    echo $paginacion;
    ?>