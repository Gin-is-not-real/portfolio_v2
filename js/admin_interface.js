/*
    gestion des events liés aux comptes
*/

const main_accounts = document.getElementById("main-accounts");
const btn_deconnection = document.getElementById("btn-deconnection");

const btn_home = document.getElementById("btn-home");
btn_home.targetSection = document.getElementById("main-login");

/*
    les boutons suivant ont une prop targetSection, c'est elle qui sera display dans sa fonction displaySection(btn)
*/
const btn_connection = document.getElementById("btn-connection");
btn_connection.targetSection = document.getElementById("sec-connection");
btn_connection.targetSection.style.display = "none";

const btn_registration = document.getElementById("btn-registration");
btn_registration.targetSection = document.getElementById("sec-registration");
btn_registration.targetSection.style.display = "none";


const btns_displayers = [btn_connection, btn_registration];
btns_displayers.forEach(btn => {
    btn.addEventListener("click", function() {
        // console.log(this);
        displaySection(this);
    })
})

/*
    switche entre flex/none pour la proprietée display de la prop targetSection du btn qui appelle la fonction
*/
function displaySection(btn) {
    btns_displayers.forEach(b => {
        if(b === btn) {
            console.log(b.targetSection);

            main_accounts.style.display = "flex";
            b.targetSection.style.display = "flex";
        }
        else {
            b.targetSection.style.display = "none";
        }
    })
}