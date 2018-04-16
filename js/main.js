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

        window.scrollTo(0, window.scrollMaxY)
        
    });

    let asignProject_btns = [...document.getElementsByClassName('asignProject_btn')],
        memberDetails_links = [...document.getElementsByClassName('memberDetails_link')],
        asignarProyectoSubmits = [...document.getElementsByClassName('asignarProyectoSubmit')];

    for (let i = 0; i < asignProject_btns.length; i++) {
        asignProject_btns[i].addEventListener('click', () => {
            console.log('Boton' + i);
            memberDetails_links[i].setAttribute('class', 'hidden');
            asignarProyectoSubmits[i].setAttribute('class', 'asignarProyectoSubmit');
        });
    }

} else if (tituloPagigna == 'Registrar proyecto') {
    //..
    let tipoProyectoField = document.getElementById('tipoProyecto'),
        extProyectoField = document.getElementById('extProyectoField');
    
    tipoProyectoField.addEventListener('change', () => {
        let extProyectoSelect = document.getElementById('extProyectoSelect');
        if (tipoProyectoField.value == 2) {
            extProyectoField.setAttribute('class', 'field');
            extProyectoSelect.setAttribute('required', '');
        } else if (tipoProyectoField.value == 1) {
            extProyectoField.setAttribute('class', 'field_hidden');
            extProyectoSelect.removeAttribute('required', '');
        }
    });
}

