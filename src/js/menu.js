(function() {
    const bar = document.querySelector('#bar');
    bar.addEventListener('click', navegacion);

    function navegacion() {
        const nav =document.querySelector('#nav');

        if(nav.classList.contains('header__navegacion--mostrar')) {
            nav.classList.remove('header__navegacion--mostrar');
        } else {
            nav.classList.add('header__navegacion--mostrar');
        }
    }
})();