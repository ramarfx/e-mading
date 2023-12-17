//dropdown
const dropdownButtons = document.getElementById('dropdownBtn');
const dropdownContent = document.getElementById('dropdownContent');

dropdownButtons.addEventListener('click', () => {
    dropdownContent.classList.toggle('show');
})

//bookmark
const bookmarkButtons = document.querySelectorAll('.fa-bookmark');

bookmarkButtons.forEach((bookmarkBtn) => {
    bookmarkBtn.addEventListener('click', () => {
        bookmarkBtn.classList.toggle('fa-solid');
        bookmarkBtn.classList.toggle('fa-regular');
    })
})

//search bar
const searchBtn = document.getElementById('searchBtn');
const searchBy = document.getElementById('searchBy');

searchBtn.addEventListener('click', () => {
    searchBy.classList.toggle('hidden');
})


//modal
function toggleModal(id) {
    const modal = document.getElementById(`userRoleModal-${ id }`);
    modal.classList.toggle('hidden');
}
