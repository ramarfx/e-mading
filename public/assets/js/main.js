const toggleButtons = document.querySelectorAll('.delete');

toggleButtons.forEach(function (toggleBtn) {
    toggleBtn.addEventListener('click', function () {
        const deleteBtn = this.parentNode.nextSibling;
        deleteBtn.classList.toggle('show');
    });
});

//bookmark
const bookmarkButtons  = document.querySelectorAll('.fa-bookmark');

bookmarkButtons.forEach((bookmarkBtn) =>{
    bookmarkBtn.addEventListener('click', ()=>{
        bookmarkBtn.classList.toggle('fa-solid');
        bookmarkBtn.classList.toggle('fa-regular');
    })
})
