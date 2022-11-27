// Contraseña incorrecta
function pass_incorrect(){
    Swal.fire({
        icon: 'error',
        title: 'Algo salió mal!',
        text: 'Contraseña incorrecta, por favor verifica los datos introducidos!',
        })
}
let fun_1 = pass_incorrect();
// El numero de documento está vacio
function doc_vacio(){
    Swal.fire({
        icon: 'error',
        title: 'Algo salió mal!',
        text: 'El número de documento está vacío, por favor verifica los datos introducidos!',
            })
}

// Los campos están vacios
function campos_vacios(){
    Swal.fire({
        icon: 'error',
        title: 'Algo salió mal!',
        text: 'Los campos están vacíos!',
            })
}