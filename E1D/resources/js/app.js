const app = {

    urlDatos : "/resources/data/autos.json",

    filtro : "todos",

    cargarFichas : function(){
        const cont = document.querySelector("#content");
        var html = '';
     
        fetch(this.urlDatos)
            .then( response => response.json())
             .then( autos => { 
                for( let auto of autos){
                    if(auto.tipo == app.filtro || app.filtro == "todos"){
                        html +=`
                        <div class="tarjeta">
                            <div class="tarjeta-head">
                                <img src="${ auto.imagenUrl }" alt="${auto.marca}" class="foto" onclick="app.verFoto(this)">
                            </div>
                            <div class="tarjeta-body">
                                <h3>${auto.marca}</h3>
                                <span>${auto.modelo}</span>
                                <span>${auto.anio}</span>
                                <br>
                                <small>  
                                    ${auto.motor.desplazamiento }L, 
                                    ${auto.motor.potencia } HP, 
                                    ${auto.motor.rendimiento } K/l</small>
                            </div>
                        </div>
                        `;
                    }
                }                    
                cont.innerHTML = html;
            })
            .catch( error => console.log(error));
    },

    verFoto : function(e){
                const mf = document.querySelector("#modal-foto");            
                mf.innerHTML = `
                        <img src="${ e.getAttribute("src") }" alt="Foto" onclick="this.parentElement.style.display = 'none'">
                `; 
                mf.style.display = 'block';
                console.log(mf.innerHTML);          
            }
};

window.onload = function(){
    app.cargarFichas();
    
    //**Analizar el siguiente código y prepararse para explicarlo */
    
    const amenu = document.querySelectorAll("a.menu");          //Qué es a.menu
    amenu.forEach( menuItem => {                                //Qué representa menuItem
        menuItem.addEventListener("click",function( event ){
            event.preventDefault();
            app.filtro = menuItem.getAttribute("data-filtro");  //Que valor se le está asignando a app.filtro
            app.cargarFichas();                                 //por qué se vuelve a ejecutar este método
        });
    });

};


