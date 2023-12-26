const arrow=document.getElementById("arrow");

const menu=document.getElementById("stock-menu");

arrow.addEventListener("click",() => {
  if(menu.style.display=="none"){
    menu.style.display="block";
  }else{
    menu.style.display="none";
  }  
});

const arrow1=document.getElementById("arrow2");

const menu1=document.getElementById("stock-menu2");

arrow1.addEventListener("click",() => {
  if(menu1.style.display=="none"){
    menu1.style.display="block";
  }else{
    menu1.style.display="none";
  }  
});

const arrow2=document.getElementById("arrow3");

const menu2=document.getElementById("stock-menu3");

arrow2.addEventListener("click",() => {
  if(menu2.style.display=="none"){
    menu2.style.display="block";
  }else{
    menu2.style.display="none";
  }  
});


const arrow3=document.getElementById("arrow4");

const menu3=document.getElementById("stock-menu4");

arrow3.addEventListener("click",() => {
  if(menu3.style.display=="none"){
    menu3.style.display="block";
  }else{
    menu3.style.display="none";
  }  
});

/* When the user clicks on the button,
toggle between hiding and showing the dropdown content */
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown menu if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}

/* When the user clicks on the button,
toggle between hiding and showing the dropdown content */
function myFunction1() {
  document.getElementById("myDropdown1").classList.toggle("show1");
}

// Close the dropdown menu if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn1')) {
    var dropdowns1 = document.getElementsByClassName("dropdown-content1");
    var i;
    for (i = 0; i < dropdowns1.length; i++) {
      var openDropdown1 = dropdowns1[i];
      if (openDropdown1.classList.contains('show1')) {
        openDropdown1.classList.remove('show1');
      }
    }
  }
}

function changePageSize(pageSize) {
  window.location.href = '/products/' + pageSize;
}
