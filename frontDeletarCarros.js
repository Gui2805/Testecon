function deletarVeiculo(idcarros) {

    const formData = new FormData();
    formData.append('acao', 'deleta_veiculo');
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
            listagem_carros();

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