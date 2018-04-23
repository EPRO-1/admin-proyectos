let tituloPagigna = document.title;

if (tituloPagigna == 'Equipo') {
    //...
    let asignProject_btns = [...document.getElementsByClassName('asignProject_btn')],
        asignProject_a = [...document.querySelectorAll('.asignProject_btn a')],
        selectProyectToAsign = [...document.getElementsByClassName('selectProyectToAsign')],
        memberDetails_links = [...document.getElementsByClassName('memberDetails_link')],
        asignarProyectoSubmits = [...document.getElementsByClassName('asignarProyectoSubmit')],
        cancelAsign_btns = [...document.getElementsByClassName('cancelAsign')];

    for (let i = 0; i < asignProject_btns.length; i++) {
        asignProject_btns[i].addEventListener('click', () => {
            // console.log('Boton' + i);
            asignProject_a[i].innerHTML = '->';
            memberDetails_links[i].setAttribute('class', 'hidden');
            selectProyectToAsign[i].setAttribute('class', 'selectProyectToAsign');
            asignarProyectoSubmits[i].setAttribute('class', 'asignarProyectoSubmit');
            cancelAsign_btns[i].setAttribute('class', 'cancelAsign');
        });
        
        selectProyectToAsign[i].addEventListener('change', () => {
            asignarProyectoSubmits[i].removeAttribute('disabled');
            
            // No se cambiaba con setAttribute >:v
            asignarProyectoSubmits[i].style.background = '#05581e';
            asignarProyectoSubmits[i].style.cursor = 'pointer';
            asignarProyectoSubmits[i].style.transition = 'all ease 0.3s';

        });

        cancelAsign_btns[i].addEventListener('click', () => {
            // console.log('lol');
            location.reload();
        });

        let deleteMemberSubmits = [...document.getElementsByClassName('deleteMemberSubmit')];

        if (deleteMemberSubmits.length > 0) {
            deleteMemberSubmits[i].addEventListener('click', function confirmarEliminar(e) {
                if (!confirm('El Miembro de equipo ya no estará disponible')) {
                    e.preventDefault();
                }
            });
        }
    }


    let addUserCard = document.getElementById("addUserCard"),
    cancelAddUser = document.getElementById("cancelAddUser");
    
    if (addUserCard != null) {
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
    }


} else if (tituloPagigna == 'Detalles :: Equipo') {

    let editInfoBtn = document.getElementById('editInfoBtn'),
        deleteAsignationSubmits = [...document.getElementsByClassName('deleteAsignationLabel')];

    for (let j = 0; j < deleteAsignationSubmits.length; j++) {
        deleteAsignationSubmits[j].addEventListener('click', function confirmarDesasignacion (e) {
            if (!confirm('Se eliminará la asignación')) {
                e.preventDefault();
            }
        });
    }

    editInfoBtn.addEventListener('click', () => {
        let submitChanges = document.getElementById('sendChanges'),
            cancelChanges = document.getElementById('cancelChanges'),
            memberInputs = document.querySelectorAll('.detallesMember .memberData form div input'),
            nivelUserInput = document.getElementById('nivelUsuario'),
            statusUserInput = document.getElementById('status'),
            selectNivelUsuario = document.getElementById('selectNivelUsuario'),
            selectStatusUsuario = document.getElementById('selectStatusUsuario');
            
            editInfoBtn.setAttribute('class', 'hidden');
            submitChanges.removeAttribute('class');
            cancelChanges.setAttribute('class', 'cancelChanges');
            nivelUserInput.setAttribute('class', 'hidden');
            statusUserInput.setAttribute('class', 'hidden');
            selectNivelUsuario.removeAttribute('class');
            selectStatusUsuario.removeAttribute('class');

            for (let i = 0; i < memberInputs.length; i++) {
                memberInputs[i].removeAttribute('disabled');
            }

            cancelChanges.addEventListener('click', () => {
                location.reload();
            });
    });

} else if (tituloPagigna == 'Detalles :: Proyecto') {
    //..
    let desasignarSubmits = [...document.getElementsByClassName('desasignarEquipo')],
        asignarPresupuesto = document.getElementById('asignBudget'),
        asignarPresupuestoForm = document.getElementById('asignBudget_form'),
        presupuestoInput = document.getElementById('budgetInput'),
        enviarPresupuesto = document.getElementById('sendBudgetLbl');

    for (let i = 0; i < desasignarSubmits.length; i++) {
        desasignarSubmits[i].addEventListener('click', function confirmDesasignar (e) {
            if (!confirm('Se desasignara del proyecto')) {
                e.preventDefault();
            }
        });
    }

    asignarPresupuesto.addEventListener('click', () => {
        asignarPresupuesto.setAttribute('class', 'value hidden');
        asignarPresupuestoForm.setAttribute('class', 'value');
    });

    presupuestoInput.addEventListener('keyup', () => {
        enviarPresupuesto.removeAttribute('class');
    });
    

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

