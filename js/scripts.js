var dropdown = document.getElementsByClassName("dropdown");

if (dropdown.length >= 1) {
  for (let i = 0; i < dropdown.length; i++) {
    const item = dropdown[i];

    var menu, btn, overflow;

    item.addEventListener("click", function () {
      for (let i = 0; i < this.children.length; i++) {
        const e = this.children[i];
        

        if (e.classList.contains("menu")) {
          menu = e;
        } else if (e.classList.contains("menu-btn")) {
          btn = e;
        } else if (e.classList.contains("menu-overflow")) {
          overflow = e;
        }
      }

      if (menu.classList.contains("hidden")) {
        // show the menushi
        showMenu();
      } else {
        // hide the menu
        hideMenu();
      }
    });

    var showMenu = function () {
      menu.classList.remove("hidden");
      menu.classList.add("fadeIn");
      overflow.classList.remove("hidden");
    };

    var hideMenu = function () {
      menu.classList.add("hidden");
      overflow.classList.add("hidden");
      menu.classList.remove("fadeIn");
    };
  }
}


var tambah = document.getElementsByClassName("tambah")
var tambahBtn = document.getElementById("tambahBtn")

tambahBtn.addEventListener("click", function(){

  var openTambah= function(){
    tambah.classList.remove("hidden");
  };

  var closeTambah = function() {
    tambah.classList.add("hidden")
  };

  for(var i = 0; i < tambah.length; i++){
    if (tambah.classList.contains("hidden")) {
      openTambah();
    } else {
      closeTambah();
    };
  
  };
  
})

