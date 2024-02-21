let popUpModal = document.querySelector('#modal');
let modalDiv = document.querySelector('#modal-ctn');
let btnLink = document.querySelector('.btn-link--sub-components-manajemen-materi')
let linkCrud = document.querySelector('.link-crud')

function closeModal()
{
    popUpModal.classList.add('show')
}

btnLink.addEventListener("click", (e) => {
    e.stopPropagation();
    e.preventDefault();

})


window.addEventListener("click", (e) => {
    if( modalDiv.contains(e.target)){
        
    }else{
        closeModal();
        window.history.back()
    }
})

function onlyOne(checkbox) {
    var checkboxes = document.getElementsByName('check')
    checkboxes.forEach((item) => {
        if (item !== checkbox) item.checked = false
    })
}