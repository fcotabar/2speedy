'use strict';

const cantidad = document.getElementById('cantidadSelect');
const talla = document.getElementById('tallaSelect');
const isTalla = document.getElementById('isTalla');
const form = document.getElementById('addProduct');
const errorCantidad = document.getElementById('errorCantidad');
const errorTalla = document.getElementById('errorTalla');
const user = document.getElementById('user');
const notUser = document.getElementById('notUser');

// console.log(form);
form.querySelector('.btn').addEventListener('click', function (e) {
    e.preventDefault();
    // console.log('Clicked');

    // console.log(typeof talla.value );



    if (user.value == "") {
        notUser.style.display = 'block';
    } else {

        notUser.style.display = 'none';

        if (cantidad.value == "") {
            console.log("Un error");
            errorCantidad.style.display = 'block';
        } else if (isTalla.value == 1 && talla.value == '') {
            console.log(typeof talla);
            console.log(typeof talla.value);
            console.log(talla.value);
            console.log("Un error2");
            errorCantidad.style.display = 'none';
            errorTalla.style.display = 'block';
        } else {
            console.log("Todo OK");
            form.submit();

        }
    }

});

