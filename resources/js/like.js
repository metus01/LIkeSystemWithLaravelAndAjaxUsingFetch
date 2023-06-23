const { error } = require("laravel-mix/src/Log");

const forms = document.querySelectorAll('#form-js')
forms.forEach(form => {
    form.addEventListener('submit', (event) => {
        event.preventDefault();
        const url = form.action;
        const token = form._token.value;
        const postId = form.querySelector("#post-id-js").value;
        const count = form.querySelector("#count-js");
        fetch(url,
            {
                headers:
                {
                    'Content-Type': 'application/json',
                    'x-CSRF-TOKEN': token
                },
                method: 'POST',
                body: JSON.stringify(
                    {
                        id: postId
                    }
                )
            }).then(response => {
                response.json().then(data => {
                    count.innerHTML = data.count+ "Like(s)"
                })
            })
            .catch(error => {
                console.log(error);
            })

    })
})
