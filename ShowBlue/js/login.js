var txtEmail = document.querySelector("#txt-email");
var groupEmail = document.querySelector("#group-email");
var txtSenha = document.querySelector("#txt-senha");
var groupSenha = document.querySelector("#group-senha");


var form = document.querySelector("#form");
var alerta = document.querySelector("#alerta");


form.addEventListener("submit", function(e){
    
    
    groupSenha.classList.remove("has-error");
    groupEmail.classList.remove("has-error");
    
    if (!txtEmail.value){
        mostrarMensagem("Informe um e-mail");
        e.preventDefault();
        groupEmail.classList.add("has-error")
        return;
    }
    
    if (!txtSenha.value){
        mostrarMensagem("Informe a senha");
        e.preventDefault();
        groupSenha.classList.add("has-error")
        
        return; 
    }
})

function mostrarMensagem(texto) {
    
    alerta.classList.remove("hide");
    alerta.innerText = texto;
}