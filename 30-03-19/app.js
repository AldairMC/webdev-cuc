let pais = [
    {
        codigo : 1,
        nombre : 'Colombia'
    }
];

let departamento = [
    {
        codigo: '0001',
        nombre: 'Atlantico',
        pais: 1
    },
    {
        codigo: '0002',
        nombre: 'Magdalena',
        pais: 1
    },
    {
        codigo: '0003',
        nombre: 'Cesar',
        pais: 1
    }
];

let ciudad = [
    {
        codigo: '0001-1',
        nombre: 'Barranquilla',
        departamento: '0001',
        pais: 1
    },

    {
        codigo: '0001-2',
        nombre: 'Pivijay',
        departamento: '0002',
        pais: 1
    },

    {
        codigo: '0001-3',
        nombre: 'valledupar',
        departamento: '0003',
        pais: 1
    },

    {
        codigo: '0001-4',
        nombre: 'santa marta',
        departamento: '0002',
        pais: 1
    }
];

function cargarDep (codPais, element){
    element.innerHTML = '<option value="">[SELECCIONE UNA DEPARTAMENTO]</option>';
    for(i = 0; i < departamento.length; i++){
        if(departamento[i].pais == codPais){
            element.innerHTML += `<option value="${departamento[i].codigo}"> ${departamento[i].nombre} </option>`;
        }
    }
}

function cargarCiudad (codPais, codDep, element) {
    element.innerHTML = '<option value="">[SELECCIONE UNA CIUDADES]</option>';
    for(i = 0; i < ciudad.length; i++){
        if((ciudad[i].pais == codPais) && (ciudad[i].departamento == codDep)){
            element.innerHTML += `<option value="${ciudad[i].codigo}"> ${ciudad[i].nombre} </option>`;
        }
    }
}

function appenResulado(mensaje){
    let result = document.getElementById('result');
    result.value += mensaje;
}


document.addEventListener('DOMContentLoaded', () => {

    let selPais = document.getElementById('pais');
    let selDepartamento = document.getElementById('departamento');
    let selcuidad = document.getElementById('ciudad');

    if(selPais && selDepartamento && selcuidad){
        selPais.addEventListener('change', (e) => {
            cargarDep(e.target.value, document.getElementById('departamento'));
        });

        selDepartamento.addEventListener('change', (e) => {
            cargarCiudad(document.getElementById('pais').value, e.target.value,
            document.getElementById('ciudad'));
        })

        selPais.innerHTML='<option value="">[SELECCIONE UN PAIS]</option>';
        for(i = 0;  i < pais.length; i++){
            console.log(pais[i].nombre);
            selPais.innerHTML += `<option value="${pais[i].codigo}"> ${pais[i].nombre} </option>`;  
        }
    }
});

let generar = document.getElementById('generar');
   generar.addEventListener('click', function() {
    let selcuidad = document.getElementById('ciudad');
   if(selcuidad){
    ciudad.forEach((element, idx) => {
        if(element.codigo == selcuidad.value){
            appenResulado(JSON.stringify(element));
        }        
    });  
   } 
});

let analizar = document.getElementById('analizar').addEventListener('click', () => {
    try {
        let resultado=document.getElementById('result');
        let obj = JSON.parse(resultado.value);
        console.log(obj);
        alert('proceso terminado revise la consola');
    } catch (error) {
        appenResulado(error.message);
    }
});