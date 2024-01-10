function mostrarInput() {
    let showmenu = document.getElementById("menuescondido");
    let button = document.getElementById("cntbutton");

          //  let fname = document.getElementById("fname").value;
          //  let lname = document.getElementById("lname").value;
          //  let address = document.getElementById("address").value;
          //  let pcode = document.getElementById("pcode").value;
          //  let VillCity = document.getElementById("VillCity").value;
          //  let ContRegion = document.getElementById("ContRegion").value;
          //  let email = document.getElementById("email").value;
          //  let pnumber = document.getElementById("pnumber").value;
   
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