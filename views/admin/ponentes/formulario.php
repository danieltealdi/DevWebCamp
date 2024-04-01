<button type="submit" disabled hidden aria-hidden="true"></button>
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
    <?php if(isset($ponente->imagen_actual)) { ?>
        <p class="formulario__texto">Imagen actual</p>
        <div class="formulario__imagen">
            <picture>
            <source srcset="<?php echo $_ENV['HOST'] . '/public/img/ponentes/' . $ponente->imagen; ?>.webp" type="image/webp">
            <source srcset="<?php echo $_ENV['HOST'] . '/public/img/ponentes/' . $ponente->imagen; ?>.png" type="image/png">
            <img src="<?php echo $_ENV['HOST'] . '/public/img/ponentes/' . $ponente->imagen; ?>.png" alt="Imagen Ponente">
            </picture>
        </div>
    <?php } ?>

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
    </div>
    <input type="hidden" name="tags" value="<?php echo $ponente->tags ?? ''; ?>">
</fieldset>

<!--************** 
    Redes Sociales

    **************-->
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
                value="<?php echo $redes->facebook ?? ''; ?>">
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
                value="<?php echo $redes->twitter ?? ''; ?>">
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
                value="<?php echo $redes->youtube ?? ''; ?>">
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
                value="<?php echo $redes->instagram ?? ''; ?>">
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
                value="<?php echo $redes->tiktok ?? ''; ?>">
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
                value="<?php echo $redes->github ?? ''; ?>">
        </div>
        
    </div>
    
        
    
</fieldset>
