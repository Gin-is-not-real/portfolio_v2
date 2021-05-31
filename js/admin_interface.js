let adminSection = document.querySelector("#admin-section");

let btnAdminMode = document.querySelectorAll(".btn-admin-mode");
btnAdminMode.forEach(btn => {
    btn.addEventListener("click", function() {
        adminSection.hidden = !adminSection.hidden;
    })
})

let btnAdminAdd = document.querySelector("#btn-admin-add");
let hiddenFormDiv = document.querySelector("#container-form-add");

btnAdminAdd.addEventListener("click", function() {
    hiddenFormDiv.hidden = !hiddenFormDiv.hidden;
});

let btnAdminEdit = document.querySelector("#btn-admin-edit");
btnAdminEdit.addEventListener("click", function() {
    console.log(this);
    alert("Veuillez choisir le projet à modifier");
})

let subDelete = document.querySelector("#sub-delete");

let btnAdminValidDelete = document.querySelector("#btn-admin-valid-delete");
btnAdminValidDelete.addEventListener("click", function() {
    let ids = [];
    let idStr = "";

    checkboxes.forEach(check => {
        if(check.checked) {
            let id = check.id.replace("check-to-delete-", "");
            ids.push(id);
            idStr += " " + id;
        }
    })
    let confirmResult = confirm("Vous allez supprimer les entrées" + idStr + ", continuer ?");

    if(confirmResult) {
        console.log(ids);
        let url = "index.php?action=delete-entries&";

        for(let i = 0; i < ids.length; i++) {
            url += "id" + i + "=" + ids[i] + "&";
        }
        url += "length=" + ids.length;
        console.log(url);
        window.location.href = url;

        // deleteCheckedEntries(ids);
    }
})

function deleteCheckedEntries(ids) {
    let count = 0;
    ids.forEach(i => {
        window.location.href = "index.php?action=delete-entries&id=" + i;
    })
}

let btnAdminDelete= document.querySelector("#btn-admin-delete");
btnAdminDelete.addEventListener("click", function() {
    toggleHiddenCheckboxes();
    this.value = this.value == "Supprimer" ? "Annuler" : "Supprimer";
    btnAdminValidDelete.hidden = !btnAdminValidDelete;
});

let formEntry = document.querySelector("#form-add-entry");
let btnAddEntry = document.querySelector("#btn-add-entry");
let subAddEntry = document.querySelector("#sub-add-entry");

let lastMessage = "";

let projectsList = document.querySelector("#projects-list");
let onEditForm = undefined;

let editBtns = document.querySelectorAll("[id*=btn-edit-]");
editBtns.forEach(btn => {
    btn.addEventListener("click", function() {
        toggleEditMode(this);
    })
})

btnAddEntry.addEventListener("click", function() {
    if(this.parentNode.checkValidity()) {
        let entries = getFormInputs(this.parentNode);
        let confirmResult = sumAndAskToConfirm(entries);

        if(confirmResult) {
            subAddEntry.click();
        }
    } 
    else {
        alert("Veuillez renseigner un titre pour le projet ");
    }
})

let checkboxes = document.querySelectorAll("[type=checkbox]");

let validEditBtns = document.querySelectorAll("[id*=btn-valid-edit-]");
validEditBtns.forEach(btn => {

    btn.addEventListener("click", function() {
        let parent = this.parentNode.parentNode;
        
        if(parent.checkValidity()) {
            let entries = getFormInputs(parent);
            let confirmResult = sumAndAskToConfirm(entries);
    
            if(confirmResult) {
                parent.submit();
            }
        } 
        else {
            alert("Veuillez renseigner un titre pour le projet ");
        }
    })
})
function getFormInputs(form) {
    console.log(form);
    let entries = [];
    form.childNodes.forEach(elt => {
        if(elt.id != undefined && elt.type != "submit" && elt.type != "button") {
            entries.push({
                name: elt.name,
                placeholder: elt.placeholder,
                value: elt.value
            });
        }
    })
    return entries;
}

function sumAndAskToConfirm(entries) {
    let message = 'Vous allez enregistrer les données suivantes: ' + '\n';
    let sum = "";

    entries.forEach(elt => {
        console.log(elt);
        if(elt.name != undefined && !elt.name.includes("sum")) {
            let value = elt.value != "" ? elt.value : "vide";
            sum += "\n " + elt.name + " - " + elt.placeholder + ": " + value;
        }
    })
    message += sum;

    if(sum.includes("vide")) {
        message += "\n\n" + "Certains champs sont vides, continuer quand même ?"
    }
    console.log(sum);
    document.querySelector('#sum-message').value = sum;
    document.querySelector('#sum-notice').textContent = "Les données suivantes ont été enregistrées: " + sum;

    return confirm(message);
}


/*

*/

function toggleEditMode(btn) {
    btn.value = btn.value == "editer" ? "annuler" : "editer";
    let validId = btn.id.replace("edit", "valid-edit");
    console.log(document.querySelector("#" + validId).hidden);
    document.querySelector("#" + validId).hidden = !document.querySelector("#" + validId).hidden;
    
    console.log(btn, validId);
}

function ableEditionModeForLine(id) {
    let forms = document.querySelectorAll('[id*="form-line-');
    // console.log(forms);

    forms.forEach(form => {
        if(form.id.includes(id)) {
            if(onEditForm != undefined && onEditForm != form) {
                toggleDisabled(onEditForm, id);
                toggleEditMode(document.querySelector('[id*="btn-edit-'));
            }
            onEditForm = form;
            toggleDisabled(form);
        }
        else {

            // document.querySelector('[id*="btn-edit-' + id).disabled;
        }
    })

}

function toggleDisabled(projectLine) {
    projectLine.childNodes.forEach(elt => {
        if(elt.id != undefined) {
            elt.disabled = !elt.disabled;
        }
    })
}

function toggleHiddenCheckboxes() {
    checkboxes.forEach(c => {
        console.log(c)
        c.hidden = !c.hidden;
    })
}