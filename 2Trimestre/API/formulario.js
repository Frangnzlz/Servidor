
    
        document.getElementById("metodo").onchange = function(){
            switch ($(this.val())){
                case 'GET':
                    get()
                    break;
                case 'PUT':
                    put();
                    break;
                case 'POST':
                    post();
                    break;
                case 'DELETE':
                    DELETE();
                    break;
                default:
                    let parent = $(this).parent;

                    parent.append($('<p>').text("No ha introducido un metodo"))
            }
        }






        function put(){
            console.log("jeje")
            let form = $("form");
            let campos = ["id_videojuego", "titulo", "nombre_desarrolladora", "anno-lanzamiento", "porcentaje_reseñas", "horas_duracion"]

            for(let i = 0; i < campos.length; i++){
                $(form).append(
                    $("<input>")
                    .attr("name", campos[i])
                    .attr("placeholder", campos[i])
                    .val("introduce " + campos[i])
                )

            }

        }
