function buscar() {
    let x = document.getElementById("buscador");
    let s = document.getElementById("select");
    let l = document.getElementById('log');
    x.value = x.value.toUpperCase();

    if (x.value != '') {
        if (s.value == 1) {
            let URL = createURL(x.value, s.value);
            fetch(URL)
                .then(response => response.json())
                .then(data => {
                    info = '';
                    if (data[0].length == 0) {
                        info = 'No hay resultados en la busqueda';
                    }
                    for (let index = 0; index < data[0].length; index++) {
                        let nombre = data[0][index].nombre;
                        let playlist = data[0][index].playlist;
                        info = info + createCardLista(playlist, nombre);
                    }
                    l.innerHTML = `${info}`;
                });
        }
        if (s.value == 2) {
            let URL = createURL(x.value, s.value);
            fetch(URL)
                .then(response => response.json())
                .then(data => {
                    console.log(data)
                    info = '';
                    if (data[0].length == 0) {
                        info = 'No hay resultados en la busqueda';
                    }
                    for (let index = 0; index < data[0].length; index++) {
                        console.log(data[0].length)
                        let titulo = data[0][index].nombre;
                        let imagen = data[0][index].imagen;
                        let id = data[0][index].id;
                        info = info + createCardGeneric(titulo, imagen, id);
                    }
                    l.innerHTML = `${info}`;
                    console.log(data)
                });

        }
        if (s.value == 3) {
            let URL = createURL(x.value, s.value);
            fetch(URL)
                .then(response => response.json())
                .then(data => {
                    console.log(data)
                    info = '';
                    if (data[0].length == 0) {
                        info = 'No hay resultados en la busqueda';
                    }
                    for (let index = 0; index < data[0].length; index++) {
                        console.log(data[0].length)
                        let titulo = data[0][index].nombre;
                        let imagen = data[0][index].imagen;
                        let id = data[0][index].id;
                        info = info + createCardGeneric(titulo, imagen, id);
                    }
                    l.innerHTML = `${info}`;
                    console.log(data)
                });

        }

    }
}

function createCardLista(playlist, titulo) {

    return `<div class="col mb-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"> <strong>${titulo}</strong></h5>
                        <iframe src="https://open.spotify.com/embed/playlist/${playlist}" width="100%" height="320" frameborder="0" allowtransparency="true" allow="encrypted-media"></iframe>

                    </div>
                </div>
            </div>`;
}

function createCardGeneric(titulo, imagen, id) {

    return ` <div class="col mb-4">
                <div class="card">
                    <img src="${imagen}" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">${titulo}</h5>
                        <a href="artista.php?artista=${id}">
                            <button class="btn btn-primary btn-sm text-justify">Ver mas</button>
                        </a>
                    </div>
                </div>
            </div>`;
}

function createURL(parametro, tipo) {
    const URL = `http://localhost/r/proyecto-radio/radio/views/buscador.php?parametro=${parametro}&tipo=${tipo}`;
    return URL;
}