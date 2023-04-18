$(document).ready(function () {
  $(".login-btn").click(function () {
    let userEl = document.querySelectorAll(".user");
    let i, user = "";
    for(i=0; i<userEl.length; i++){
        if(userEl[i].checked == true){
            user = userEl[i].value;
        }
    }
    alert(user);
  });
});
