function onScroll() {
    let distance = window.pageYOffset;
    let target = 400;
    if(distance > target){
        document.querySelector('.sec').style.filter = "blur(2px)";
    }else{
        document.querySelector('.sec').style.filter = "blur(0px)";
    }
}
document.addEventListener('scroll', onScroll);

//togglemenu
function openMenu() {
    document.querySelector('#side-menu').style.width = '250' + 'px';
    document.querySelector('.nav-open').style.display = 'none';
}

function closeMenu() {
    document.querySelector('#side-menu').style.width = '0' + 'px';
    document.querySelector('.nav-open').style.display = 'block';
}

