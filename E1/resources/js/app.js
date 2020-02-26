const app = {

    urlDatos : "../resources/data/autos.json",

    cargarFichas : function(){
        const cont = document.querySelector("#content");
        var html = '';
        fetch(this.urlDatos)
        .then((response) => response.json())
        .then(autos => {
            for(let auto of autos){
                html += `
                <div class="tarjeta">
                    <div class="tarjeta-head">
                        <img src="${auto.imageUrl}" alt="" class="foto" onclick="app.verFoto(this)">
                    </div>
                    <div class="tarjeta-body">
                        <h3>${auto.marca}</h3>
                        <span>${auto.modelo}</span>
                        <span>${auto.anio}</span>
                        <br>
                        <small>${auto.motor.desplazamiento}L</a></small>
                    </div>
                <div>
                `;
                cont.innerHTML = html;
            }
        })
        .catch(error => console.log(error));
    },

    verFoto: function(e){
        const mf = document.querySelector("#modal-foto");
        mf.innerHTML = `
            <img src="${ e.getAttribute("src") }" alt="Foto" onclick="this.parentElement.style = display='none'">
        `;
        mf.style.display = 'block';
    }
        
}

window.onload = function(){
    app.cargarFichas();
}