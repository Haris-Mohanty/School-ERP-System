//SIDE NAV OPEN CLOSE CODE START
$(document).ready(function () {
  $(".toggler").click(function () {
    let position = $(".side-nav").hasClass("side-nav-open");
    if (position) {
      $(".side-nav").removeClass("side-nav-open");
      $(".side-nav").addClass("side-nav-close");
      //page control
      $(".page").removeClass("page-open");
      $(".page").addClass("page-close");
    }
  });
});
//SIDE NAV OPEN CLOSE CODE END
