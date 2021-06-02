/*
    gestion des events d'aministration des projets

    les btn interceptent la requete pour effectuer un traitement, puis simulent un click sur le submit correspondant à l'action initiale
*/

let btn_add = document.querySelector('#btn-add');
btn_add.targetedSubmit = document.querySelector('#sub-add');

btn_add.addEventListener("click", function() {
    // console.log(this, this.targetedSubmit);
    interceptActionAndClickSumit(this.targetedSubmit);
})


let btns_suppr = document.querySelectorAll('[id*=btn-suppr]');
let subs_suppr = document.querySelectorAll('[id*=sub-suppr]');
for(let i = 0; i < btns_suppr.length; i++) {
    btns_suppr[i].targetedSubmit = subs_suppr[i];
    // console.log(btns_suppr[i].id, btns_suppr[i].targetedSubmit.id)

    btns_suppr[i].addEventListener("click", function() {
        console.log(this, this.targetedSubmit);
        interceptActionAndClickSumit(this.targetedSubmit);
    })
}

let btns_edit = document.querySelectorAll('[id*=btn-edit]');
let subs_edit = document.querySelectorAll('[id*=sub-edit]');
let btns_cancel = document.querySelectorAll('[id*=btn-cancel');
let lines = document.querySelectorAll('[id*=form-line]');
// console.log(lines)

for(let i = 0; i < btns_edit.length; i++) {
    //on relie le bouton au submit et au btn cancel correspondant
    btns_edit[i].targetedSubmit = subs_edit[i];
    btns_edit[i].cancel = btns_edit[i].nextElementSibling;
    // console.log(btns_edit[i], btns_edit[i].targetedSubmit, btns_edit[i].cancel)
    
    btns_edit[i].addEventListener("click", function() {
        let btnId = this.id.replace("btn-edit-", "");

        subs_edit.forEach(sub => {
            if(sub.id.includes(btnId)) {
                if(sub.hidden) {
                    sub.hidden = false;
                }
            }
            else {
                if(!sub.hidden) {
                    sub.hidden = true;
                }
            }
        })
        btns_cancel.forEach(btn => {
            if(btn.id.includes(btnId)) {
                if(btn.hidden) {
                    btn.hidden = false;
                }
            }
            else {
                if(!btn.hidden) {
                    btn.hidden = true;
                }
            }
        })
        //formulaire de la liste
        lines.forEach(line => {
            console.log(line)

            if(line.id.includes(btnId)) {
                line.childNodes.forEach(child => {
                    // console.log(child.id);

                    child.childNodes.forEach(c => {
                        console.log("c:" + c.tagName, c.id, c.disabled);

                        if(c.disabled) {
                            c.oldValue = c.value;
                            c.disabled = false;
                        }
                    })
                })
            }
            else {
                line.childNodes.forEach(child => {
                    child.childNodes.forEach(c => {
                        console.log("c:" + c.tagName, c.id, c.disabled);

                        if(!c.disabled) {
                            c.oldValue = c.value;
                            c.disabled = true;
                        }
                    })
                })
            }
        })
        // interceptActionAndClickSumit(this.targetedSubmit);
    })
}

btns_cancel.forEach(btn => {
    btn.addEventListener("click", function() {

        this.hidden = !this.hidden;
        let id = this.id.replace('btn-cancel-edit-', '');
        
        lines.forEach(line => {

            if(line.id.includes(id)) {
                line.childNodes.forEach(c => {
                    console.log("c:", c, c.disabled)

                    c.childNodes.forEach(child => {
                        console.log(child.tagName, child.disabled)

                        if(child.tagName = "input" && child.id != undefined) {
                            if(!child.disabled) {
                                child.disabled = true;
                                if(child.oldValue != undefined) {
                                    child.value = child.oldValue;
                                }
                            }
                        }
                    })
                })
            }
        })
        btns_edit.forEach(btn => {
            btn.disabled = false;
        })
        subs_edit.forEach(sub => {
            if(sub.id.includes(id)) {
                if(!sub.hidden) {
                    sub.hidden = true;
                }
            }
            else {
                if(sub.hidden) {
                    sub.hidden = true;
                }
            }
        })
    })
})

subs_edit.forEach(sub => {
    sub.addEventListener("click", function() {
        if(confirm('valider ?')) {
            this.parentNode.parentNode.submit();
        }
    })
})

function interceptActionAndClickSumit(sub) {
    if(confirm('valider ?')) {
        sub.click();
    }
}

