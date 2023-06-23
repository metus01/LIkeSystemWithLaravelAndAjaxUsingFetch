const { default: axios } = require("axios");
const { error } = require("laravel-mix/src/Log");

const handleUploadFile = (form) => {

    const data = new FormData(form);
    axios.post(form.action, data)
        .then((res) => console.log(res))
        .catch((err) => {
            //reception des erreurs et traitement
            //conversion de l'objet obtenu sous forme de tableau
            const errors = Object.entries(err.response.data.errors);
            //parcours des erreurs
            for (let index = 0; index < errors.length; index++) {
                // reception de chaque ligne de chaque tableau sous forme de ptits tableau format :clé-valeur
                [key, errorMessage] = errors[index];
                //insertion de l'erreur sous la champs récupéré au préalable à l'aide de l'identifiant.
                document.getElementById(key).insertAdjacentHTML('afterend', `<div style="color:red;">${errorMessage[0]}</div>`)
            }
        })
}

const form = document.getElementById('uploadForm');
form.addEventListener('submit', (event) => {
    event.preventDefault();
    handleUploadFile(form);
})


