const lanzarDadoBtn = document.querySelector('#lanzarDados');

// ** Listeners
document.addEventListener('DOMContentLoaded', () => {
    lanzarDadoBtn.addEventListener('click', function () {
        handleLanzarDado();
    });
});

// ** Functions
const handleLanzarDado = async () => {
    let result

    try {
        result = await fetch("./manejar_turno.php");

        console.log(result)
    } catch (error) {
        console.log("error al lanzar el dado")
    }
}