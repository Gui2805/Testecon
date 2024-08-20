function buscarCarro(idcarros)  {
    

    const formData = new FormData();
    formData.append('acao', 'pega_um_veiculo');
    formData.append('idcarros', idcarros);
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
            
                document.getElementById("idEdit").value = data.idcarros;              
                document.getElementById("modeloEdit").value = data.modelo;
                document.getElementById("fabricanteEdit").value = data.idfabricante;
                document.getElementById("tipoEdit").value = data.tipoveiculo;
                document.getElementById("anoEdit").value = data.anofabricacao;
                $("#modalVeiculosEditar").modal("show");
                           
        })
        .catch(error => {
            console.error('There was a problem with the fetch operation:', error);
        });

}

function salvarVeiculo(formElement) {
    
    const idcarros = formElement.querySelector("#idEdit");
    const modelo = formElement.querySelector("#modeloEdit");
    const fabricante = formElement.querySelector("#fabricanteEdit");
    const tipo = formElement.querySelector("#tipoEdit");
    const ano = formElement.querySelector("#anoEdit");

    const formData = new FormData();
    formData.append('acao', 'editar_veiculo');
    formData.append('idcarros', idcarros.value);
    formData.append('modelo', modelo.value);
    formData.append('idfabricante', fabricante.value);
    formData.append('tipoveiculo', tipo.value);
    formData.append('anofabricacao', ano.value);
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
                alert("Edição do veículo realizada com sucesso!");
                $("#modalVeiculosEditar").modal("hide")
            }
        })
        .catch(error => {
            console.error('There was a problem with the fetch operation:', error);
        });

}

function desativa_forms() {
    var forms = document.querySelectorAll('form');

    forms.forEach(function (form) {
        form.addEventListener('submit', function (event) {
            event.preventDefault();
        });
    });
}

desativa_forms();