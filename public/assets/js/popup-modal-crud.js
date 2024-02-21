let crudLink = document.querySelector('.link-crud')
let divCrud = document.querySelector('#modal-ctn-crud');

function closeModal()
{
    divCrud.classList.add('show')
}

crudLink.addEventListener("click", (e) => {
    e.stopPropagation();
    e.preventDefault();
})


window.addEventListener("click", (e) => {
    if( divCrud.contains(e.target)){
        
    }else{
        // closeModal();
        window.history.back()
    }
})