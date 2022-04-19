window.addEventListener('resize', function() { 
    if (window.innerWidth < 600) {
        let list = document.getElementsByClassName('nav-list');
        for (t = 0; t < list.length; t++) {
            let elem = list[t];
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
            }
        }
        if (list.length !== 0) {
            this.document.getElementById('global-ul-text').style.display = 'inline';
        }
    } else {
        let list = document.getElementsByClassName('collapse-list');
        for (t = 0; t < list.length; t++) {
            let elem = list[t];
            elem.className = 'nav-list';
            if (elem.nodeName.toLowerCase() === 'ul') {
                elem.setAttribute('onclick', '');
            }
        }
        if (list.length !== 0) {
            this.document.getElementById('global-ul-text').style.display = 'none';
        }
    }
});// switches between menu and nav items depending on window width