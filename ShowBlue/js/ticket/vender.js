var txtNome = document.querySelector("#txt-nome");
var groupNome = document.querySelector("#group-nome");
var txtCpf = document.querySelector("#txt-cpf");
var groupCpf = document.querySelector("#group-cpf");


var form = document.querySelector("#form");
var alerta = document.querySelector("#alerta");


form.addEventListener("submit", function(e){
    
    
    groupNome.classList.remove("has-error");
    groupCpf.classList.remove("has-error");
    
    if (!txtNome.value){
        mostrarMensagem("Informe o nome do comprador");
        e.preventDefault();
        groupNome.classList.add("has-error")
        return;
    }
    
    if (!txtCpf.value){
        mostrarMensagem("Informe o cpf");
        e.preventDefault();
        groupCpf.classList.add("has-error")        
        return; 
    }
})

function mostrarMensagem(texto) {
    
    alerta.classList.remove("hide");
    alerta.innerText = texto;
}