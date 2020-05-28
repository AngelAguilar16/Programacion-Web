const app = {
    routes : {
        'inisesion' : '/resources/views/auth/inisesion.php', 
        'login' : '/app/app.php',
    },
    view : function(route){
        location.replace(this.routes[route])
    }
}