var pass = document.getElementById("contraseña");
var pass1 = document.getElementById("contraseña1");


var registro = document.getElementById("registro");

        
var form = document.getElementById("form");

registro.onclick = function(){
    if(pass.value != pass1.value){
        alert("LAS CONTRASEÑAS NO COINCIDEN");
    }
}
