function mostrarInput() {
    var showmenu = document.getElementById("menuescondido");
    var button = document.getElementById("cntbutton");

           var fname = document.getElementById("fname").value;
           var lname = document.getElementById("lname").value;
           var address = document.getElementById("address").value;
           var pcode = document.getElementById("pcode").value;
           var VillCity = document.getElementById("VillCity").value;
           var ContRegion = document.getElementById("ContRegion").value;
           var email = document.getElementById("email").value;
           var pnumber = document.getElementById("pnumber").value;
   
          /* if (fname === "" || lname === "" || address === "" || pcode === "" || VillCity === "" || ContRegion === "" || email === "" || pnumber === "") {
            //colocar erro se quisermos aqui
           } else {
               showmenu.style.display = "block"
               button.style.display="none"
            
           }*/
           showmenu.style.display = "block"
           button.style.display="none"

}
    const checkbox = document.getElementById('habilitarInput');
    const inputText = document.getElementById('textoInput');

    checkbox.addEventListener('change', function() {
    inputText.disabled = !this.checked;

    if (!this.checked) {
      inputText.value = '';
    }
    });