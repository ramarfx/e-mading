//period filter
const periodBtn = document.getElementById('periodBtn');
const periodContent = document.getElementById('periodContent');

if (periodBtn) {
    periodBtn.addEventListener('click', () => {
        periodContent.classList.toggle('show');
    })

    const period = document.getElementById('period');
    period.addEventListener('change', function () {
        this.parentElement.submit()
    })
}

