const toggleButtons = document.querySelectorAll('.delete');

toggleButtons.forEach(function (toggleBtn) {
    toggleBtn.addEventListener('click', function () {
        const deleteBtn = this.parentNode.nextSibling;
        deleteBtn.classList.toggle('show');
    });
});

//bookmark
const bookmarkButtons = document.querySelectorAll('.fa-bookmark');

bookmarkButtons.forEach((bookmarkBtn) => {
    bookmarkBtn.addEventListener('click', () => {
        bookmarkBtn.classList.toggle('fa-solid');
        bookmarkBtn.classList.toggle('fa-regular');
    })
})

//dropdown
const dropdownButtons = document.getElementById('dropdownBtn');
const dropdownContent = document.getElementById('dropdownContent');

dropdownButtons.addEventListener('click', () => {
    dropdownContent.classList.toggle('show');
})

// Fungsi untuk menampilkan/sembunyikan modal
function toggleModal(id) {
    const modal = document.getElementById(`userRoleModal-${ id }`);
    modal.classList.toggle('hidden');
}
