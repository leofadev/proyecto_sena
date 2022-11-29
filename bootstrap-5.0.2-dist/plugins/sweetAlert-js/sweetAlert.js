// Contraseña incorrecta
function pass_incorrect(){
    Swal.fire({
        icon: 'error',
        title: 'Algo salió mal!',
        text: 'Contraseña incorrecta, por favor verifica los datos introducidos!',
        })
}
let fun_pass_incorrect = pass_incorrect();
// El numero de documento está vacio
function doc_vacio(){
    Swal.fire({
        icon: 'error',
        title: 'Algo salió mal!',
        text: 'El número de documento está vacío, por favor verifica los datos introducidos!',
            })
}
let fun_docvacio = doc_vacio();
// Los campos están vacios
function campos_vacios(){
    Swal.fire({
        icon: 'error',
        title: 'Algo salió mal!',
        text: 'Los campos están vacíos!',
            })
}
let fun_campos_vacios = campos_vacios();

function eliminar(){
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire(
            'Deleted!',
            'Your file has been deleted.',
            'success'
            )
        }
        })
}
let fun_eliminar = eliminar();