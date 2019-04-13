  var agregar_U = document.getElementById('submit').addEventListener('click', () => {
  let id = document.getElementById('id');
    let name = document.getElementById('nombre');
    let email = document.getElementById('email');
    let date = document.getElementById('f_nacimiento');
    let cargo =document.getElementById('cargo');
    var html = `
      <tr>
        <td>${id.value}</td>
        <td>${name.value}</td>
        <td>${email.value}</td>
        <td>${date.value}</td>
        <td>${cargo.value}</td>
      </tr>
    `;
    var btn = document.createElement("TR");
   	btn.innerHTML=html;
    document.getElementById("tabla").appendChild(btn);
  });  

