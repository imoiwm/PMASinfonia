function detect() {
    if (window.innerWidth < 600) {
        let list = document.getElementsByClassName('nav-list');
        let check = false;
        while (list.length !== 0) {
            check = true;
            let elem = list[0];
            elem.className = 'collapse-list';
            if (elem.nodeName.toLowerCase() === 'ul') {
                elem.onclick = function() {
                    let lis = document.getElementsByClassName('collapse-list');
                    for(k = 0; k < lis.length; k++) {
                        if (lis[k].nodeName.toLowerCase() === 'li') {
                            let prop = lis[k].style.display;
                            lis[k].style.display = (prop === 'none' || prop === '') ? 'block' : 'none';
                        } 
                    }
                };
            } else {
                elem.style.display = 'none';
            }
        }
        if (check) {
            this.document.getElementById('global-ul-text').style.display = 'inline';
        }
    } else {
        let list = document.getElementsByClassName('collapse-list');
        let check = false;
        while (list.length !== 0) {
            check = true;
            let elem = list[0];
            elem.className = 'nav-list';
            if (elem.nodeName.toLowerCase() === 'ul') {
                elem.setAttribute('onclick', '');
            } else {
                elem.style.display = 'inline';
            }
        }
        if (check) {
            this.document.getElementById('global-ul-text').style.display = 'none';
        }
    }
}// switches between menu and nav items depending on window width

window.addEventListener('resize', detect);