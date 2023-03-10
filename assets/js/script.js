// js for nav bar
const body = document.querySelector("body"),
    nav = document.querySelector("nav"),
    cartToggle = document.querySelector(".cartToggle"),
    sidebarOpen = document.querySelector(".sidebarOpen"),
    siderbarClose = document.querySelector(".siderbarClose");

// js code to toggle cart box
    cartToggle.addEventListener("click" , () =>{
        cartToggle.classList.toggle("active");

    });

//   js code to toggle sidebar
sidebarOpen.addEventListener("click" , () =>{
nav.classList.add("active");
});

body.addEventListener("click" , e =>{
let clickedElm = e.target;

if(!clickedElm.classList.contains("sidebarOpen") && !clickedElm.classList.contains("menu")){
    nav.classList.remove("active");
}
});
$(document).ready(function () {

    $(".one").click(function () {
        $(this).addClass("active").siblings().removeClass("active");
    });

});
//end js nav bar
$(document).ready(function() {
    $(window).scroll(function() {
      if ($(this).scrollTop() > 20) {
        $('#toTopBtn').fadeIn();
      } else {
        $('#toTopBtn').fadeOut();
      }
    });
  
    $('#toTopBtn').click(function() {
      $("html, body").animate({
        scrollTop: 0
      }, 1000);
      return false;
    });
});
