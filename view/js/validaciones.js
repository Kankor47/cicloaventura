

function ValidarCedula(cedula, boton)
{
    var cedula = cedula;
    array = cedula.split("");
    num = array.length;
    if (num == 10)
    {
        total = 0;
        digito = (array[9] * 1);
        for (i = 0; i < (num - 1); i++)
        {
            mult = 0;
            if ((i % 2) != 0) {
                total = total + (array[i] * 1);
            } else
            {
                mult = array[i] * 2;
                if (mult > 9)
                    total = total + (mult - 9);
                else
                    total = total + mult;
            }
        }
        decena = total / 10;
        decena = Math.floor(decena);
        decena = (decena + 1) * 10;
        final = (decena - total);
        if ((final == 10 && digito == 0) || (final == digito)) {
            boton.disabled = false;
            return true;
        } else
        {
            alert("La c\xe9dula NO es v\xe1lida!!!");
            boton.disabled = true;
            return false;
        }
    } else {
        alert("La c\xe9dula no puede tener menos de 10 d\xedgitos");
        boton.disabled = true;
        return false;
    }
}

function validar() {
        var cad = document.getElementById("ced").value.trim();
        var total = 0;
        var longitud = cad.length;
        var longcheck = longitud - 1;

        if (cad !== "" && longitud === 10){
          for(i = 0; i < longcheck; i++){
            if (i%2 === 0) {
              var aux = cad.charAt(i) * 2;
              if (aux > 9) aux -= 9;
              total += aux;
            } else {
              total += parseInt(cad.charAt(i)); // parseInt o concatenará en lugar de sumar
            }
          }

          total = total % 10 ? 10 - total % 10 : 0;

          if (cad.charAt(longitud-1) == total) {
            document.getElementById("salida").innerHTML = ("Cedula Válida");
          }else{
            document.getElementById("salida").innerHTML = ("Cedula Inválida");
          }
        }
      }


function numeroCaracteres(campo,limite){
if(campo.value.length>=limite){
campo.value=campo.value.substring(0,limite);
}
}
function soloNumeros(e)
{
    var keynum = window.event ? window.event.keyCode : e.which;
    if ((keynum == 8) || (keynum == 46))
        return true;
    return /\d/.test(String.fromCharCode(keynum));
}

function SoloLetras(e)
{
    key = e.keyCode || e.which;
       tecla = String.fromCharCode(key).toLowerCase();
       letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
       especiales = "8-37-39-46";

       tecla_especial = false
       for(var i in especiales){
            if(key == especiales[i]){
                tecla_especial = true;
                break;
            }
        }

        if(letras.indexOf(tecla)==-1 && !tecla_especial){
            return false;
        }
}

