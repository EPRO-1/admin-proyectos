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

cancelAddUser.addEventListener("click", () => {
    location.reload();
});