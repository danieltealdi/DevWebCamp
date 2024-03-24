(function(){
    const tagsInput = document.querySelector('#tags_input');
    const tagsDiv = document.querySelector('#tags');
    const tagsInputHidden = document.querySelector('[name=tags]');
    let tags=[];
    if(tagsInput){
        tagsInput.addEventListener('keypress', function(e){
            if(e.keyCode===44){
                if(e.target.value.trim()===''||e.target.value.length<1||e.keyCode===13) return;
                e.preventDefault();
                tags=[...tags, e.target.value.trim()];
                e.target.value='';
                mostrarTags(tags);
            };
            
            function mostrarTags(){
                tagsDiv.textContent='';
                tags.forEach(tag=>{
                    const tagElement = document.createElement('LI');
                    tagElement.classList.add('formulario__tag');
                    tagElement.textContent=tag;
                    tagElement.ondblclick=eliminarTag;
                    tagsDiv.appendChild(tagElement);
                })
                actualizarCampoHidden();
            }

            function eliminarTag(e){
                tags=tags.filter(tag=>tag!==e.target.textContent);
                mostrarTags();
            }
            function actualizarCampoHidden(){
                tagsInputHidden.value=tags.join(',');
            }
        })
    }
})()
