const lanzarDadoBtn = document.querySelector('#lanzarDados');

// ** Listeners
document.addEventListener('DOMContentLoaded', () => {
    lanzarDadoBtn.addEventListener('click', function () {
        handleLanzarDado();
    });
});

// ** Functions
const handleLanzarDado = async () => {
    try {
        const response = await fetch("./manejar_turno.php",{
            method: 'POST',
        });

        const data = await response.json();

        console.log(data)
    } catch (error) {
        console.log("error al lanzar el dado")
        console.log(error)
    }
}