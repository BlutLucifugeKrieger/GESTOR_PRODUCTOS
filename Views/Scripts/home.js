

function logIn(){

    document.getElementById("form_login").addEventListener("submit",(event)=>{

        event.preventDefault();


        var NOMBRE_USUARIO = document.getElementById("user_input").value;
        var CONTRASEÑA = document.getElementById("pass_input").value;

        var array = {NOMBRE_USUARIO,CONTRASEÑA};

        var jsonArray = JSON.stringify(array);

        fetch("http://localhost/prueba_tecnica_juanCastro/Controllers/usersController.php/userLogin",{


            method: 'POST',
            body: jsonArray,
            headers:{

                'Content-Type':'application/json'
            }
        }).then((data)=>{

            return data.json();

        }).then((res)=>{



            if(res.result.length >= 1){
                
                var val = res.result[0];

                localStorage.setItem("id_usuario",val.ID_USUARIO);
                localStorage.setItem("nombre_usuario",val.NOMBRE_USUARIO);
                localStorage.setItem("contraseña",val.CONTRASEÑA);
                localStorage.setItem("dinero",val.DINERO);

                window.location.href = "../Templates/mainMenu.html";

                
            }else{

                window.alert("Usuario incorrecto, vuelva a intentarlo");
            }

            

        }).catch((e)=> console.error({error:e}));

    })    


}




function init(){

    document.addEventListener("DOMContentLoaded",()=>{

        logIn();

    });

}



document.getElementById("crea").addEventListener("click",(event)=>{

    event.preventDefault();

        var NOMBRE_USUARIO = document.getElementById("register_input").value;
        var CONTRASEÑA = document.getElementById("regs_pass").value;

        var arr = {NOMBRE_USUARIO,CONTRASEÑA};

        var js = JSON.stringify(arr);

        fetch("http://localhost/prueba_tecnica_juanCastro/Controllers/usersController.php",{


            method:'POST',
            body: js,
            headers:{

                'Content-Type':'application/json'
            }
        }).then((data)=>{

            return data.json();

        }).then((res)=>{

            if(res.result === "Usuario creado correctamente!!!"){

                window.alert("Cuenta registrada correctamente, ya puedes Iniciar sesion");

            }else{

                window.alert("Error, vuelve a intentarlo");

            }
        })



});




init()