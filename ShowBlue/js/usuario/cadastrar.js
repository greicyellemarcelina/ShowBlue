var txtNome = document.querySelector("#txt-nome");
var groupNome = document.querySelector("#group-nome");
var txtEmail = document.querySelector("#txt-email");
var groupEmail = document.querySelector("#group-email");
var txtSenha = document.querySelector("#txt-senha");
var groupSenha = document.querySelector("#group-senha");
var alerta = document.querySelector("#alerta");

var form = document.querySelector("#form");

form.addEventListener("submit", function(e){
    
    groupNome.classList.remove("has-error");
    groupEmail.classList.remove("has-error");
    groupSenha.classList.remove("has-error");
    
     
    if (!txtNome.value){
        mostrarMensagem("Informe o nome");
        e.preventDefault();//impede que o evento prossiga, impede que o formulario seja enviado
        groupNome.classList.add("has-error")
        return;
    }
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
    
  
    
});
function mostrarMensagem(texto) {
    
    alerta.classList.remove("hide");
    alerta.innerText = texto;
}