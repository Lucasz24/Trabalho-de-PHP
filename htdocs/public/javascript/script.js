function validarCamposCadastrarNota(event) {
    const idUsuario = document.getElementById('idUsuario').value;
    const materia = document.getElementById('materia').value;
    const conteudo = document.getElementById99('conteudo').value;

    if (idUsuario == 0 || materia == '' || conteudo == '') {
        alert('Preencha os campos corretamente!');

        event.preventDeFault();

        return false;
    }

    function validarCamposLogin(event) {
        const email = document.getElementById('email').value;
        const senha = document.getElementById('senha').value;

        if (email === '' || senha === '') {
            alert('Preencha os campos corretamente!');

            event.preventDeFault();

            return false;
        }

        return true;
    }

    function validarCamposCadastro(event) {
        const nome = document.getElementById('nome').value;
        const email = document.getElementById('email').value;
        const senha = document.getElementById('senha').value;

        if (nome === '' || email === '' || senha === '' ) {
            alert('Preencha os campos corretamente!');

            event.preventDeFault();

            return false;
        }

        return true;
    }

    function validarCamposCadastrarAluno(event) {
        const nome = document.getElementById('nome').value;

        if (nome === '') {
            alert ('Preencha os campos corretamente!');

            event.preventDeFault();

            return false;
        }

        return true;
    }
}