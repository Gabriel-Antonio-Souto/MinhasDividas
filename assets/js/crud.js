const tbody = document.querySelector(".listar-dividas");
const cadForm = document.getElementById("cad-form");
const editForm = document.getElementById("edit-divida-form");
const msgAlertaErroCad = document.getElementById("msgAlertaErroCad");
const editModal = new bootstrap.Modal(document.getElementById("visualizar"));
const msgAlerta = document.getElementById("msgAlerta");
const cadModal = new bootstrap.Modal(document.getElementById("cad"));

const listardividas = async (pagina) => {
    const dados = await fetch("./dividas/pendentes.php");
    const resposta = await dados.text();
    tbody.innerHTML = resposta;
}

listardividas(1);

cadForm.addEventListener("submit", async (e) => {
    e.preventDefault();

    document.getElementById("cad-usuario-btn").value = "Salvando...";

    if (document.getElementById("opcao").value === "") {
        Swal.fire({
          text: 'Erro: Necessário preencher o campo mês!',
          icon: 'error',
          showCancelButton: false,
          confirmButtonColor: '#3085d6',
          confirmButtonText: 'Fechar'
        });
    } else if (document.getElementById("desc").value === "") {
        Swal.fire({
          text: 'Erro: Necessário preencher o campo descrição!',
          icon: 'error',
          showCancelButton: false,
          confirmButtonColor: '#3085d6',
          confirmButtonText: 'Fechar'
        });
    } else if (document.getElementById("valor").value === "") {
        Swal.fire({
          text: 'Erro: Necessário preencher o campo valor!',
          icon: 'error',
          showCancelButton: false,
          confirmButtonColor: '#3085d6',
          confirmButtonText: 'Fechar'
        });
    } else {
        const dadosForm = new FormData(cadForm);
        dadosForm.append("add", 1);

        const dados = await fetch("proc/cadastrar.php", {
            method: "POST",
            body: dadosForm,
        });

        const resposta = await dados.json();

        Swal.fire({
            text: resposta['msg'],
            icon: 'success',
            showCancelButton: false,
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Fechar'
        });   
        
        cadModal.hide();
        
        cadForm.reset();

        listardividas(1);
    
    }

    document.getElementById("cad-usuario-btn").value = "Cadastrar";
});

async function apagar(id) {

    const dados = await fetch('proc/excluir.php?id=' + id);

    const resposta = await dados.json();

    Swal.fire({
        text: resposta['msg'],
        icon: 'success',
        showCancelButton: false,
        confirmButtonColor: '#3085d6',
        confirmButtonText: 'Fechar'
    });

    listardividas(1);

}

async function editDados(id) {

    const dados = await fetch('proc/listar.php?id=' + id);
    const resposta = await dados.json();
    console.log(resposta);
    editModal.show();
    document.getElementById("editText").value = resposta['dados'].desc_divida;
    document.getElementById("option").value = resposta['dados'].mes_divida;
    document.getElementById("editValor").value = resposta['dados'].valor_divida;
    document.getElementById("id").value = resposta['dados'].id_divida;

}

editForm.addEventListener("submit", async (e) => {
    e.preventDefault();

    const dadosForm = new FormData(editForm);

    const dados = await fetch('proc/alterar.php', {
        method: "POST",
        body: dadosForm
    });

    const resposta = await dados.json();

    Swal.fire({
        text: resposta['msg'],
        icon: 'success',
        showCancelButton: false,
        confirmButtonColor: '#3085d6',
        confirmButtonText: 'Fechar'
    });

    editModal.hide();

    listardividas(1);
});

async function marcar(id) {

    const dados = await fetch('proc/pagar.php?id=' +id);

    const resposta = await dados.json();

    Swal.fire({
        text: resposta['msg'],
        icon: 'success',
        showCancelButton: false,
        confirmButtonColor: '#3085d6',
        confirmButtonText: 'Fechar'
    });

    listardividas(1);

}
