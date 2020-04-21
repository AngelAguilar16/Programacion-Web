const app = {

    urlPosts: "/resources/json/posts.json",
    //urlPosts : "https://jsonplaceholder.typicode.com/posts",
    //urlComments : "https://jsonplaceholder.typicode.com/comments",
    urlComments: "/resources/json/comments.json",
    // urlUsers : "https://jsonplaceholder.typicode.com/users",
    urlUsers: "/resources/json/users.json", 
    
    userId : '',

    cargarPosts : function(){
        const cont = document.querySelector("#content");
        cont.style.width = '100%';
        cont.classList.add(['mx-auto'],['mt-5']);
        var html = '';
     
        fetch(this.urlPosts)
            .then( response => response.json())
             .then( posts => { 
                for( let post of posts){
                   
                    if(post.userId === this.userId || this.userId === ''){
                        html +=`
                        <div class="card mb-2">                            
                            <div class="card-body">
                                <h3>${ post.title }</h3>
                                <p>${ post.body }</p>
                            </div>
                            <div class="card-footer">
                                <button type="button" id="btn-ver-com${ post.id }" class="btn btn-link" onclick="app.verComentarios(${ post.id })">Ver comentarios</button>
                                <div class="spinner-border spinner-border-sm text-primary d-none" id="cargando${ post.id }" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>
                                <button type="button" id="btn-cerrar-com${ post.id }" class="btn btn-link d-none" onclick="app.cerrarComentarios(${ post.id })">Ocultar comentarios</button>
                                <div class="card" style="display:none;">
                                    <ul class="list-group list-group-flush" id="comments${ post.id }">
                                    </ul>                                    
                                </div>
                            </div>
                        </div>
                        `;
                    }
                }                    
                cont.innerHTML = html + '</div>';
            })
            .catch( error => console.log(error));
    },
    verComentarios : function(postId){
        $("#cargando"+postId).toggleClass('d-none',false);
        const listaCom = $("#comments"+postId);//sin jquery sería así: document.querySelector("#comments"+postId);    
        var html = ``;
        listaCom.html(html);       
        fetch(this.urlComments+"?postId="+postId)
            .then( response => response.json())
            .then( comentarios => { 
                for( let c of comentarios){                    
                    html += `<li class="list-group-item">De:<b> ${ c.email }</b> <br> ${ c.body } </li>`;                    
                }                
                listaCom.html(html);//sin jquery sería asi: listaCom-innerHTML = html;
                listaCom.parent().css("display","block");
                $("#btn-ver-com"+postId).toggleClass('d-none',true);
                $("#btn-cerrar-com"+postId).toggleClass('d-none',false);
            }).catch(error => console.log(error))
            .finally( () => $("#cargando"+postId).toggleClass('d-none',true));
    },
    cerrarComentarios :function(postId){
        const listaCom = $("#comments"+postId);        
        listaCom.html('');
        listaCom.parent().css("display","none");
        $("#btn-ver-com"+postId).toggleClass('d-none',false);
        $("#btn-cerrar-com"+postId).toggleClass('d-none',true);
    },
    cargarUsuarios : function(){
        const users = $("#usuarios");
        var html = '';
        users.html(html);
        fetch(this.urlUsers)
            .then( respuesta => respuesta.json())
            .then( usuarios => {
                for( let usuario of usuarios){
                    html += `
                        <button type="button" class="list-group-item list-group-item-action" id="uc${ usuario.id }" onclick="app.userComments(${ usuario.id })">
                            ${ usuario.name } <br><small> ${ usuario.email } </small>
                        </button>
                    `;
                }
                users.html(html);
            }).catch( error => console.log(error));
        
    },
    userComments : function(uId){
        this.userId = uId;
        $(".list-group-item").removeClass('active');
        $("#uc"+uId).addClass('active');
        this.cargarPosts();
    },
    buscarPosts : function(){
        const cont = document.querySelector("#content");
        cont.style.width = '100%';
        cont.classList.add(['mx-auto'],['mt-5']);
        $(".list-group-item").removeClass('active');
        var search = document.getElementById("buscar-post").value;
        var expression = new RegExp(search, "i");
        var conteo = 0;

        var html = '';
     
        fetch(this.urlPosts)
            .then( response => response.json())
             .then( posts => { 
                for( let post of posts){
                   
                    if(post.body.match(expression)){
                        html +=`
                        <div class="card mb-2">                            
                            <div class="card-body">
                                <h3>${ post.title }</h3>
                                <p>${ post.body }</p>
                            </div>
                            <div class="card-footer">
                                <button type="button" id="btn-ver-com${ post.id }" class="btn btn-link" onclick="app.verComentarios(${ post.id })">Ver comentarios</button>
                                <div class="spinner-border spinner-border-sm text-primary d-none" id="cargando${ post.id }" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>
                                <button type="button" id="btn-cerrar-com${ post.id }" class="btn btn-link d-none" onclick="app.cerrarComentarios(${ post.id })">Ocultar comentarios</button>
                                <div class="card" style="display:none;">
                                    <ul class="list-group list-group-flush" id="comments${ post.id }">
                                    </ul>                                    
                                </div>
                            </div>
                        </div>
                        `;
                    }
                    if(!post.body.match(expression)){
                        conteo = 1;
                    }
                }    
                if(conteo == 1){
                    html += `
                        <div class="alert alert-danger" role="alert">
                            No se encuentra ninguna otra publicacion con tal termino de busqueda.
                        </div>
                        `;
                }                
                cont.innerHTML = html + '</div>';
            })
            .catch( error => console.log(error));
    }

};

window.onload = function(){
    app.cargarPosts();
    app.cargarUsuarios();
};


