document.querySelector('.sec').style.overflow = "hidden";

/*function onScroll() {
    let distance = window.pageYOffset;
    let target = 200;
    if(distance > target){
        document.querySelector('.img-cloud').style.backgroundPositionx = "20" + "vw";
    }else{
        document.querySelector('.img-cloud').style.backgroundPositionx = "29.8" + "vw";
    }
}
document.addEventListener('scroll', onScroll);*/

//togglemenu
function openMenu() {
    document.querySelector('#side-menu').style.width = '250' + 'px';
    document.querySelector('.nav-open').style.display = 'none';
}

function closeMenu() {
    document.querySelector('#side-menu').style.width = '0' + 'px';
    document.querySelector('.nav-open').style.display = 'block';
}

