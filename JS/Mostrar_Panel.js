 function mostraPanel(idPanel,checkbox){
            const panel=document.getElementById(idPanel);
            panel.style.display=checkbox.checked ? 'block' : 'none';
        }