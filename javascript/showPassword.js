

function show() {
    var p = document.getElementById('password');
    p.setAttribute('type', 'text');
}

function hide() {
    var p = document.getElementById('password');
    p.setAttribute('type', 'password');
}

function showHide()
{
  var input = document.getElementById("password");
  if (input.getAttribute("type") === "password") {
    show();
  } else {
    hide();
  }
}