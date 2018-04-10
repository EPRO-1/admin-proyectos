let tituloPagigna = document.title;

if (tituloPagigna == 'Equipo') {
    //...
    let addUserCard = document.getElementById("addUserCard"),
    cancelAddUser = document.getElementById("cancelAddUser");
    
    addUserCard.addEventListener("click", () => {
        let addUserIcon = document.getElementById('newUserIcon'),
        addingMember = document.getElementById('addingMember'),
        headerEquipo = document.getElementById('headerEquipo');
        
        headerEquipo.innerText = "Registrar un nuevo miembro del equipo";
        addUserIcon.setAttribute("class", "addUserIcon hidden");
        addUserCard.setAttribute('class', 'addFirstMember active');
        addingMember.setAttribute('class', 'addMember');
        
    });
} else if (tituloPagigna == 'Registrar proyecto') {
    //..
    let tipoProyectoField = document.getElementById('tipoProyecto'),
        extProyectoField = document.getElementById('extProyectoField');
    
    tipoProyectoField.addEventListener('change', () => {
        if (tipoProyectoField.value == 2) {
            extProyectoField.setAttribute('class', 'field');
        } else if (tipoProyectoField.value == 1) {
            extProyectoField.setAttribute('class', 'field_hidden');
        }
    });
}

