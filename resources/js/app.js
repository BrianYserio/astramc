import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();


document.addEventListener("DOMContentLoaded", function () {
      document.querySelectorAll(".collapsible-toggle").forEach((toggle) => {
        toggle.addEventListener("click", function () {
          let menu = this.nextElementSibling; // The submenu <ul>
          let arrowIcon = this.querySelector(".arrow");
  
          if (menu.offsetHeight !== 0) {
            menu.style.maxHeight = '0px';
            arrowIcon.classList.remove("rotate-90");
          } else {
            menu.style.maxHeight = menu.scrollHeight + "px";
            arrowIcon.classList.add("rotate-90");
          }
        });
      });
    });