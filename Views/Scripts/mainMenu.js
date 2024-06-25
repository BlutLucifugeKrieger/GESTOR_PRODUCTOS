

function menu() {
    document.addEventListener("DOMContentLoaded", () => {


        



        var user_name = document.getElementById("user_name");
        var name = localStorage.getItem("nombre_usuario");
        user_name.textContent = name;
        var ID_USUARIO = localStorage.getItem("id_usuario");
        var a = {ID_USUARIO};

        var js = JSON.stringify(a);

        fetch('http://localhost/prueba_tecnica_juanCastro/Controllers/usersController.php/actualUserMoney',{


                method:'POST',
                body: js,
                headers:{

                    'Content-Type':'application/json'
                }

        }).then((data)=>{


            return data.json();

        }).then((ds)=>{

            var res = ds.result[0];

            user_name.textContent = res.NOMBRE_USUARIO;

        })


        fetch("http://localhost/prueba_tecnica_juanCastro/Controllers/productsController.php")
        .then(response => {
            if (!response.ok) {
                throw new Error('Error en la solicitud al servidor');
            }
            return response.json();
        })
        .then(data => {
            const products = data.results;
            const productsContainer = document.querySelector('.products');
            localStorage.setItem("ID",products.ID);

            products.forEach(product => {
                const card = document.createElement('div');
                card.classList.add('card', 'mb-3', 'transparent-card', `text-${getRandomColor()}`);
                card.style.maxWidth = '18rem';
    
                card.innerHTML = `
                    <div class="card-header">CATEGORIA: ${product.CATEGORIA}</div>
                    <div class="card-body">
                        <h5 class="card-title">PRODUCTO: ${product.NOMBRE_PRODUCTO}</h5>
                        <p class="card-text">REFERENCIA: ${product.REFERENCIA}</p>
                        <p class="card-text">PRECIO: ${product.PRECIO} COP</p>
                        <p class="card-text">PESO: ${product.PESO} KG</p>
                        <p class="card-text">STOCK: ${product.STOCK} UNIDAD/UNIDADES</p>
                        <p class="card-text">ULTIMA VENTA: ${product.FECHA_ULTIMA_VENTA} </p>
                        <button class="btn btn-primary comprar-but">COMPRAR</button>
                    </div>
                `;
                
                
                const comprarButton = card.querySelector('.comprar-but');
                comprarButton.addEventListener('click', () => {

                    var ID_USUARIO = localStorage.getItem("id_usuario");
                    var ar = {ID_USUARIO};
                    var jj = JSON.stringify(ar)




                        
                        var ID = product.ID;
                        var NOMBRE_PRODUCTO = product.NOMBRE_PRODUCTO; 
                        var REFERENCIA = product.REFERENCIA;
                        var PRECIO = product.PRECIO;
                        var CATEGORIA = product.CATEGORIA;
                        var STOCK = product.STOCK;
                        var DINERO = localStorage.getItem("dinero");

                        var array = {ID_USUARIO,ID,NOMBRE_PRODUCTO,REFERENCIA,PRECIO,CATEGORIA,STOCK,DINERO}

                        console.log(array)
                        var js = JSON.stringify(array);


                    fetch("http://localhost/prueba_tecnica_juanCastro/Controllers/boughtItemsController.php",{


                        method:'POST',
                        body:js,
                        headers:{

                            'Content-Type':'application/json'
                        }
                    }).then((data)=>{

                        return data.json();

                    }).then((res)=>{

                        console.log(res.result)

                        if(res.result === "Compra realizada correctamente"){

                            window.alert("Compra realizada con exito");
                            location.reload();

                        }else if(res.result === "Error, no tienes suficiente dinero"){

                            window.alert("No tienes el suficiente dinero");

                        }else if(res.result === "Error, no hay suficiente stock disponible para este producto"){

                            window.alert("No hay stock del producto que deseas comprar");

                        }else if(res.result === "Error, por favor, rellena todos los campos"){

                            window.alert("No tienes el suficiente dinero");
                        }
                    })

                });
    
                productsContainer.appendChild(card);
            });
        })
        .catch(error => {
            console.error('Error al obtener productos:', error);
        });
})

function getRandomColor() {
    const colors = ['primary', 'secondary', 'success', 'danger', 'warning', 'info', 'light'];
    const randomIndex = Math.floor(Math.random() * colors.length);
    return colors[randomIndex];
}

document.addEventListener('DOMContentLoaded', function() {
    const reloadLink = document.getElementById('reloadLink');

    reloadLink.addEventListener('click', function(e) {
        e.preventDefault();
        const myModal = new bootstrap.Modal(document.getElementById('confirmModal'), {
            keyboard: false
        });
        myModal.show();
    });

    document.getElementById('confirmReload').addEventListener('click', function() {
        

        var DINERO = document.getElementById("saldo_aumentar").value;
        var ID_USUARIO = localStorage.getItem("id_usuario");

        var array = {DINERO,ID_USUARIO};
        var json_s = JSON.stringify(array);

        fetch("http://localhost/prueba_tecnica_juanCastro/Controllers/usersController.php/money",{

            method:'POST',
            body:json_s,
            Headers:{

                'Content-Type':'application/json'
            }


        }).then((data)=>{

            return data.json();


        }).then(()=>{

            
            var saldo = document.getElementById("saldo_aumentar").value;


            if(saldo > 0){
        

            window.alert("Saldo actualizado");
            location.reload();

            }else{

                window.alert("Accion invalida, vuelva a intentarlo");
            }


        }).catch((e)=>console.error({error:e}));


        myModal.hide();
    });
});
}



document.addEventListener('DOMContentLoaded', function() {
    const saldo = document.getElementById('saldo_cartera');

    saldo.addEventListener('click', function(e) {
        e.preventDefault();
        const myModal = new bootstrap.Modal(document.getElementById('carteraModal'), {
            keyboard: false
        });
        myModal.show();
    });

    var ID_USUARIO = localStorage.getItem("id_usuario");
    var array = {ID_USUARIO};
    var jsn = JSON.stringify(array);

    fetch("http://localhost/prueba_tecnica_juanCastro/Controllers/usersController.php/actualUserMoney",{

        method:'POST',
        body:jsn,
        headers:{

            'Content-Type':'application/json'
        }


    }).then((data)=>{

        return data.json();

    }).then((res)=>{

        var value = res.result[0];

        var label = document.getElementById("saldo_actual");
        label.textContent = value.DINERO;

    })
})



document.getElementById("desconec").addEventListener("click",()=>{
    
    window.location.href = "../Templates/home.html";

})


document.getElementById("actu_botom").addEventListener('click',()=>{


    var NOMBRE_USUARIO = document.getElementById("nombre_us").value;
    var CONTRASEÑA = document.getElementById("Contraseñas").value;
    var ID_USUARIO = localStorage.getItem("id_usuario");
    var DINERO = localStorage.getItem("dinero");
    var array = {NOMBRE_USUARIO,CONTRASEÑA,DINERO,ID_USUARIO};
    var jsn = JSON.stringify(array);

    

    fetch("http://localhost/prueba_tecnica_juanCastro/Controllers/usersController.php",{

        method:'PUT',
        body:jsn,
        headers:{

            'Content-Type':'application/json'
        }


    }).then((data)=>{

        
        return data.json();

    }).then((res)=>{
        

        
       if(res.result === "Usuario actualizado correctamente!!!"){

            window.alert("Usuario actualizado correctamente!!!");
            window.location.reload();
       }else{

        window.alert("Error, por favor diligencie todos los campos");
       }

    })





})










document.addEventListener('DOMContentLoaded', function() {
    const actuas = document.getElementById('actua');

    actuas.addEventListener('click', function(e) {
        e.preventDefault();
        const myModal = new bootstrap.Modal(document.getElementById('actualizarModal'), {
            keyboard: false
        });
        myModal.show();
    });


    
    
})



document.getElementById("hyst").addEventListener("click", () => {

    const hysts = document.getElementById('hyst');

    var ID_USUARIO = localStorage.getItem("id_usuario");
    var a = { ID_USUARIO };
    var js = JSON.stringify(a);

    hysts.addEventListener('click', function (e) {
        e.preventDefault();
        const myModal = new bootstrap.Modal(document.getElementById('historyModal'), {
            keyboard: false
        });
        myModal.show();
    });

    fetch("http://localhost/prueba_tecnica_juanCastro/Controllers/boughtItemsController.php/allFromID", {

        method: 'POST',
        body: js,
        headers: {
            'Content-Type': 'application/json'
        }

    }).then((data) => {

        return data.json();

    }).then((res) => {

        const historyTable = document.getElementById('historyTable'); 
        historyTable.innerHTML = '';

        
        const thead = document.createElement('thead');
        thead.innerHTML = `
            <tr>
                <th>ID_ITEMS</th>
                <th>PRECIO</th>
                <th>NOMBRE_PRODUCTO</th>
                <th>REFERENCIA</th>
                <th>CATEGORIA</th>
                <th>FECHA_VENTA</th>
            </tr>
        `;
        historyTable.appendChild(thead);

       
        const tbody = document.createElement('tbody');
        res.forEach(items => {

            const row = document.createElement('tr');
            row.innerHTML = `
                <td>${items.ID_ITEMS}</td>
                <td>${items.PRECIO}</td>
                <td>${items.NOMBRE_PRODUCTO}</td>
                <td>${items.REFERENCIA}</td>
                <td>${items.CATEGORIA}</td>
                <td>${items.FECHA_VENTA}</td>
            `;
            tbody.appendChild(row);

        });
        historyTable.appendChild(tbody);

    })

});









menu();
