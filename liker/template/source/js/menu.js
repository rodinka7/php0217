module.exports = (function () {
    let btn = document.getElementById('menu-btn'),
        sidebarInner  = document.getElementById('sidebarInner'),
        sidebarTitle = document.getElementById('sidebar__title'),
        sidebar  = document.getElementById('sidebar');

    function init () {
        _setUpListners();
    }

    function _setUpListners () {
        btn.addEventListener('click', _toggleMenu);
    }

    function _toggleMenu() {
        this.classList.toggle('sidebar__btn--active');
        sidebarInner.classList.toggle('sidebar__inner--open');
        sidebar.classList.toggle('sidebar--open');
        if (sidebar.classList.contains('sidebar--open')) {
            sidebarTitle.textContent = 'Cкрыть';
        } else {
            sidebarTitle.textContent = 'Посмотреть всех';
        }
    }

    return {
        init: init
    };

})();
