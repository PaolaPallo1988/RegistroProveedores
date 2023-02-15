
//https://www.youtube.com/watch?v=zBmtmlB5b5g



/*console.log('elementos del');
console.log(document.body);
console.log(document.documentElement);
console.log(document.forms);

document.write("<h2>NO ESTA CORRECTO </h2>");


console.log(document.getElementById("menu"));  
console.log(document.querySelector("#menu"));  // es mas lento xq debe detectar si ingresa un name un id o un classs
console.log(document.querySelectorAll("a"));  
console.log(document.querySelector(".card")); //. para clases # para id*/


//https://developer.mozilla.org/es/docs/Web/API/Element/hasAttribute pagina de atributos de js


// getatribbute te ayuda a traer el valo que esta en las clases o atributos
// getatribute para mostrar lo que tienen los atributos
    /*  console.log(document.documentElement.getAttribute("lang"));
        console.log(document.querySelector(".link-dom").getAttribute("href"));
        console.log(document.querySelector("#ejemplo").getAttribute("class"));
        console.log(document.querySelector("#category").getAttribute("type")); */

//setatribute para poner atributos adicionales
        /*document.documentElement.setAttribute("lang","es");

        console.log(document.querySelector("#document").setAttribute('target','_blank'));

        document.querySelector("#category").setAttribute('disabled','');

        const $linkDOM = document.querySelector(".link-dom")  
        $linkDom.setAttribute('target','_blank');*/


//setatribute para remover atributos
        /*document.querySelector("#category").removeAttribute('name','nombre');*/


//hasAttribute para verificar si el campo contiene el atributo
       /* var $foo = document.getElementById("document");
        if ($foo.hasAttribute("rel")) {
            console.log("LO TIENE");
        }else{
            console.log(" NO LO TIENE");
        }*/


//data-atributes imprime todos los data-atributes existentes
      /*  const $linkDOM = document.querySelector(".link-dom")  
        console.log($linkDOM.dataset);
        console.log($linkDOM.dataset.description);*/

//TRABAJAR CON STILOS

     /*   const $linkDOM=document.querySelector('.link-dom')

        console.log($linkDOM.getAttribute('style'));
        console.log(window.getComputedStyle($linkDOM));
        console.log(getComputedStyle($linkDOM).getPropertyValue("color"))


        $linkDOM.style.width="50%"
        $linkDOM.style.textAlign= "center" */


//clases css

       /* const $card= document.querySelector(".card")

        console.log($card);
        console.log($card.classList);
        console.log($card.classList.contains("rotate-45")); // pregunta si la clase contiene algun objeto

        $card.classList.add("rotate-45"); // agregar una clase que no existe
        console.log($card.classList.contains("rotate-45"));

        $card.classList.remove("rotate-45");// quita una clase que no existe

        $card.classList.toggle("rotate-45"); //verifica si tiene la clase especifica si no tiene la agrega y si tiene la borra

        $card.classList.replace("rotate-45","rotate-135");// cambiar uno a uno las clases
        $card.classList.add("opacity-80","sepia"); //agrega clases adicionales a las ya agregadas*/

//TEXTO Y HTML

        /*const $queDOM =document.getElementById("que-es");
        let text='el modelo de objetos';

        //$queDOM.innerText=text;  //reemplaza el texto del contenedor señalado por el id
        $queDOM.innerHTML=text; //reemplaza el texto del contenedor señalado por el id, pero lo reconoce si esta escrito con contenido html
        $queDOM.textContent=text; 
        $queDOM.outerHTML=text; //reemplaza el contenido internamente en diferentes parrafos*/

        
/*const ano = () =>{ 
	const fecha =  document.getElementById("estado_decurrente").value;
	let actual = new Date();
	let antes = new Date();
        antes.setMonth(antes.getMonth()-24); //PARA PODER RESTAR DOS AÑOS A LA FECHA
	console.log(antes);
	if ((fecha > antes.getFullYear()) && (fecha < actual.getFullYear())) { //getFullYear: captura el año de una fecha 
			alert('El año es correcto, continúe llenando el formulario ');
			//document.getElementById("guardacalificacion").removeAttribute("disabled","");
			//document.getElementById("estado_balance").removeAttribute("disabled","");
			//document.getElementById("estado_balance").focus();
			
	} else {
			alert('¡¡ Los estados financieros deben ser del año inmediato anterior. La información NO PODRÁ SER GENERADA!! ');
			//document.getElementById("guardacalificacion").setAttribute("disabled","");
			//document.getElementById("estado_balance").setAttribute("disabled","");
			
	}
}


const vigencia_legal =() =>{

        const vigencia_legal = document.getElementById('vigencia_legal').value;
        const Factual =new Date();
        const Ffutura= new Date();
        Ffutura.setMonth(Ffutura.getMonth()+60);
        
       if ((Date.parse(vigencia_legal) > Factual.getTime()) ){  //gettime se utiliza para comprar fechas inicializadas con Date
                alert("VIGENCIA CORRECTA");
        }else{
                alert("VIGENCIA_INCORRECTA");
        }

}*/


/*function numeroCampos()
  {
    var numero = document.getElementById("campos").value;
    var padre = document.getElementById("inputs");
    while (padre.firstChild) {    padre.removeChild(padre.lastChild);  }
    //padre.innerHtml = "";

    for(var i=1; i<=numero; i++)
    {

      //aquí agregamos el componente de tipo input
      var input = document.createElement("INPUT");

      //aquí indicamos que es un input de tipo text
      input.type = 'text';
      input.name = 'campos[]';
      input.required = 'true';

      //y por ultimo agreamos el componente creado al padre
      padre.appendChild(input);
    }

  }*/



   const valida = () => {
        if(document.myform.empresa.value.lehgth() == 0 ){
                alert("Tiene que escribir su nombre")
      		document.myform.empresa.focus();
      		return 0;

        }
   }





