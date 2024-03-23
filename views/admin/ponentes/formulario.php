<fieldset class="formulario__fieldset">
    <legend class="formulario__legend">Información Personal</legend>
    <div class="formulario__campo">
        <label class="formulario__label" for="nombre">Nombre</label>
        <input 
        class="formulario__input" 
        type="text" 
        placeholder="Nombre Ponente" 
        id="nombre" 
        name="nombre" 
        value="<?php echo $ponente->nombre ?? ''; ?>">
    </div>
    <div class="formulario__campo">
        <label class="formulario__label" for="apellido">Apellido</label>
        <input 
        class="formulario__input" 
        type="text" 
        placeholder="Apellido Ponente" 
        id="apellido" 
        name="apellido" 
        value="<?php echo $ponente->apellido ?? ''; ?>">
    </div>
    <div class="formulario__campo">
        <label class="formulario__label" for="ciudad">Ciudad</label>
        <input 
        class="formulario__input" 
        type="text" 
        placeholder="Ciudad Ponente" 
        id="ciudad" 
        name="ciudad" 
        value="<?php echo $ponente->ciudad ?? ''; ?>">
    </div>
    <div class="formulario__campo">
        <label class="formulario__label" for="pais">Pais</label>
        <input 
        class="formulario__input" 
        type="text" 
        placeholder="Pais Ponente" 
        id="pais" 
        name="pais" 
        value="<?php echo $ponente->pais ?? ''; ?>">
    </div>
    <div class="formulario__campo">
        <label class="formulario__label" for="imagen">Imagen</label>
        <input 
        class="formulario__input formulario__input--file" 
        type="file" 
        id="imagen" 
        name="imagen">
    </div>

</fieldset>
<fieldset class="formulario__fieldset">
    <legend class="formulario__legend">Información Extra</legend>
    <div class="formulario__campo">
        <label class="formulario__label" for="tags_input">Areas de Experiencia (separadas por coma) </label>
        <input 
        class="formulario__input" 
        type="text" 
        placeholder="Ej.: Node.js, Laravel, PHP, UX/UI" 
        id="tags_input" 
        name="tags_input"> 
    </div>
    <div id="tags" class="formulario__listado">
        <input type="hidden" name="tags" value="<?php echo $ponente->tags ?? ''; ?>">

    </div>
</fieldset>
<fieldset class="formulario__fieldset">
    <legend class="formulario__legend">Redes Sociales</legend>
    <div class="formulario__campo">
        <div class="formulario__contenedor-icono">
        <div class="formulario__icono">
            <i class="fa-brands fa-facebook"></i></i>
        </div>            
                <input 
                class="formulario__input--sociales" 
                type="text"                
                name="redes[facebook]"
                placeholder="Facebook" 
                value="<?php echo $ponente->facebook ?? ''; ?>">
        </div>
        
    </div>
    
    <div class="formulario__campo">
        <div class="formulario__contenedor-icono">
        <div class="formulario__icono">
            <i class="fa-brands fa-twitter"></i></i>
        </div>            
                <input 
                class="formulario__input--sociales" 
                type="text"                
                name="redes[twitter]"
                placeholder="Twitter" 
                value="<?php echo $ponente->twitter ?? ''; ?>">
        </div>
        
    </div>
    <div class="formulario__campo">
        <div class="formulario__contenedor-icono">
        <div class="formulario__icono">
            <i class="fa-brands fa-youtube"></i></i>
        </div>            
                <input 
                class="formulario__input--sociales" 
                type="text"                
                name="redes[youtube]"
                placeholder="YouTube" 
                value="<?php echo $ponente->youtube ?? ''; ?>">
        </div>
        
    </div>
    <div class="formulario__campo">
        <div class="formulario__contenedor-icono">
        <div class="formulario__icono">
            <i class="fa-brands fa-instagram"></i></i>
        </div>            
                <input 
                class="formulario__input--sociales" 
                type="text"                
                name="redes[instagram]"
                placeholder="Instagram" 
                value="<?php echo $ponente->instagram ?? ''; ?>">
        </div>
        
    </div>
    <div class="formulario__campo">
        <div class="formulario__contenedor-icono">
        <div class="formulario__icono">
            <i class="fa-brands fa-tiktok"></i></i>
        </div>            
                <input 
                class="formulario__input--sociales" 
                type="text"                
                name="redes[tiktok]"
                placeholder="Tiktok" 
                value="<?php echo $ponente->tiktok ?? ''; ?>">
        </div>
        
    </div>
    <div class="formulario__campo">
        <div class="formulario__contenedor-icono">
        <div class="formulario__icono">
            <i class="fa-brands fa-github"></i></i>
        </div>            
                <input 
                class="formulario__input--sociales" 
                type="text"                
                name="redes[github]"
                placeholder="Github" 
                value="<?php echo $ponente->github ?? ''; ?>">
        </div>
        
    </div>
    
        
    
</fieldset>
