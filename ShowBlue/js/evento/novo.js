var txtNome = document.querySelector("#txt-nome");
var groupNome = document.querySelector("#group-nome");
var txtDescricao = document.querySelector("#txt-descricao");
var groupDescricao = document.querySelector("#group-descricao");
var txtTipo = document.querySelector("#txt-tipo");
var groupTipo = document.querySelector("#group-tipo");
var txtData = document.querySelector("#txt-data");
var groupData = document.querySelector("#group-data");
var txtHora = document.querySelector("#txt-hora");
var groupHora = document.querySelector("#group-hora");
var txtResponsavel = document.querySelector("#txt-responsavel");
var groupResponsavel = document.querySelector("#group-responsavel");
var txtValor = document.querySelector("#txt-valor");
var groupValor = document.querySelector("#group-valor");

var form = document.querySelector("#form");
var alerta = document.querySelector("#alerta");


form.addEventListener("submit", function(e){
    
    
    groupNome.classList.remove("has-error");
    groupDescricao.classList.remove("has-error");
    groupTipo.classList.remove("has-error");
    groupData.classList.remove("has-error");
    groupHora.classList.remove("has-error");
    groupResponsavel.classList.remove("has-error");
    groupValor.classList.remove("has-error");
    
    if (!txtNome.value){
        mostrarMensagem("Informe o título do evento");
        e.preventDefault();
        groupNome.classList.add("has-error")
        return;
    }
    
    if (!txtDescricao.value){
        mostrarMensagem("Informe a descricao");
        e.preventDefault();
        groupDescricao.classList.add("has-error")
        return;
    }
    
    if (txtTipo.selectedIndex < 1){
        mostrarMensagem("Informe um tipo");
        e.preventDefault();
        groupTipo.classList.add("has-error")
        return;
    }
    
    if (!txtData.value){
        mostrarMensagem("Informe a datal");
        e.preventDefault();
        groupData.classList.add("has-error")
        return;
    }
    
    if (!txtHora.value){
        mostrarMensagem("Informe a hora");
        e.preventDefault();
        groupHora.classList.add("has-error")
        return;
    }
    
    if (!txtResponsavel.value){
        mostrarMensagem("Informe o responsável");
        e.preventDefault();
        groupResponsavel.classList.add("has-error")        
        return; 
    }
    
    if (!txtValor.value){
        mostrarMensagem("Informe um valor");
        e.preventDefault();
        groupValor.classList.add("has-error")
        return;
    }
    
})

function mostrarMensagem(texto) {
    
    alerta.classList.remove("hide");
    alerta.innerText = texto;
}