$(document).ready(function () {
  // LOGIN CODE - START
  $(".login-btn").click(function () {
    let userEl = document.querySelectorAll(".user");
    let i,
      user = "";
    for (i = 0; i < userEl.length; i++) {
      if (userEl[i].checked == true) {
        user = userEl[i].value;
      }
    }
    //
    $.ajax({
      type: "POST",
      url: "pages/login.php",
      data: {
        email: $("#username").val(),
        password: $("#password").val(),
        user: user,
      },
      beforeSend: function () {
        $(this).html("Please Wait....");
      },
      success: function (response) {
        alert(response);
      },
    });
  });
  // LOGIN CODE - END
});
