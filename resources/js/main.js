var mobileMenu = function() {
    if(document.getElementsByClassName('nav-main active').length < 1) {
        document.getElementById('nav-main').classList.add('active');
    }
    else {
        document.getElementById('nav-main').classList.remove('active');
    };
};