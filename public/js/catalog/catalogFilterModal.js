const CatalogFilterModal = () => {
    const modalOpen = document.querySelector('.filter_modal-btn');
    if(modalOpen)
    {
        const modal = document.querySelector('.filters_modal');
        const modalClose = document.querySelector('.modalClose');
        const body = document.querySelector('body');

        modalOpen.addEventListener('click', () => {
            console.log('work')
            modal.classList.toggle('active');
            body.classList.toggle('locked');
        });
        modalClose.addEventListener('click', () => {
            modal.classList.remove('active');
            body.classList.remove('locked');
        });
    }
}

const initCatalogFilterModal = () => {
    CatalogFilterModal();
}
document.addEventListener('DOMContentLoaded', initCatalogFilterModal);
