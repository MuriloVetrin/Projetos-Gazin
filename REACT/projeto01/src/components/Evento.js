import Button from './eventos/Buttom'

function Evento() {
    function meuEvento() {
        console.log(`Ativar primeiro evento!`)
    }

    function segundoEvento() {
        console.log(`Àtivar o segundo evento`)
    }

    return (
        <div>
            <p>Clique para disparar um evento:</p>
            <Button event={meuEvento} text="Primeiro Evento" />
            <Button event={segundoEvento} text="Segundo Evento" />
        </div>
    )
}

export default Evento
