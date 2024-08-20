function cadastroVeiculo(formElement) {
    
    const modelo = formElement.querySelector("#modelo");
    const fabricante = formElement.querySelector("#fabricante");
    const tipo = formElement.querySelector("#tipo");
    const ano = formElement.querySelector("#ano");

    const formData = new FormData();
    formData.append('acao', 'insere_veiculo');
    formData.append('modelo', modelo.value);
    formData.append('fabricante', fabricante.value);
    formData.append('tipo', tipo.value);
    formData.append('ano', ano.value);
    fetch('control.php', {
        method: 'POST',
        body: formData
    })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            if (data.status == 200) {
                listagem_carros();
                alert("Cadastro do veículo realizado com sucesso!");
                $("#modalVeiculos").modal("hide")
                modelo.value = "";
                fabricante.value = "";
                tipo.value = "";
                ano.value = "";

            }
        })
        .catch(error => {
            console.error('There was a problem with the fetch operation:', error);
        });

}

function listagem_carros() {


    const formData = new FormData();
    formData.append('acao', 'lista_veiculos');
    fetch('control.php', {
        method: 'POST',
        body: formData
    })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            let html = "";
            data.forEach(element => {
                html += `   <tr>
                                <td class="py-2 text-start align-middle fs--1">${element.modelo}</td>
                                <td class="py-2 text-start align-middle fs--1">${element.idfabricante}</td>
                                <td class="py-2 text-start align-middle fs--1">${element.tipoveiculo}</td>
                                <td class="py-2 text-start align-middle fs--1">${element.anofabricacao}</td>
                                <td class="py-2 text-start align-middle">
                                    <div class="dropdown font-sans-serif ms-2 text-end">
                                        <button class="btn btn-sm bg-200 hover-bg-300" type="button"
                                            data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true"
                                            aria-expanded="false">
                                            <span class="fas fa-ellipsis-h fs--1"></span>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-end py-2">
                                            <a class="dropdown-item cursor-pointer" onclick="buscarCarro(${element.idcarros})">Editar</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item cursor-pointer text-danger" onclick="deletarVeiculo(${element.idcarros})">Excluir</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>`
            }) 

            document.getElementById("listagem").innerHTML = html;
        })
        .catch(error => {
            console.error('There was a problem with the fetch operation:', error);
        });


}

listagem_carros();


function desativa_forms() {
    var forms = document.querySelectorAll('form');

    forms.forEach(function (form) {
        form.addEventListener('submit', function (event) {
            event.preventDefault();
        });
    });
}

desativa_forms();
