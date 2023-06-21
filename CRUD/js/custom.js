const tbody = document.querySelector(".listar-usuarios");
const cadForm = document.getElementById("cad-usuario-form");
const msgAlertaErroCad = document.getElementById("msgAlertaErroCad");
const msgAlerta = document.getElementById("msgAlerta");
const cadModal = new bootstrap.Modal(document.getElementById("cadUsuarioModal"));

const listarUsuarios = async (pagina) => {
    const dados = await fetch("./list.php?pagina=" + pagina);
    const resposta = await dados.text();
    tbody.innerHTML = resposta;
}

listarUsuarios(1);

cadForm.addEventListener("submit", async (e) => {
    e.preventDefault();

    document.getElementById("cad-usuario-btn").value = "Salvando...";

    if (document.getElementById("nome").value === "") {

        msgAlertaErroCad.innerHTML = "<div class='alert alert-danger' role='alert'> Necessário preencher o campo Nome 1! <div>"

    } /*else if (document.getElementById("email").value === "") {

        msgAlertaErroCad.innerHTML = "<div class='alert alert-danger' role='alert'> Necessário preencher o campo E-mail 1! <div>"

    } */else {
        const dadosForm = new FormData(cadForm);
        dadosForm.append("add", 1);

        const dados = await fetch("Cadastrar.php", {
            method: "POST",
            body: dadosForm,
        });

        const resposta = await dados.json();

        if (resposta['erro']) {
            msgAlertaErroCad.innerHTML = resposta['msg'];
        } else {
            msgAlerta.innerHTML = resposta['msg'];
            cadForm.reset();
            cadModal.hide();
            listarUsuarios(1);
        };
    }

    document.getElementById("cad-usuario-btn").value = "Salvar";
});