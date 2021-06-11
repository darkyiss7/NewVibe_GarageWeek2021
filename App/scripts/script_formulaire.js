function form_submit() {
  if(form_validation()){
    document.getElementById('bienvenue').innerHTML= 'Merci !';
    document.getElementById('formulaire').classList.add("slide_back");
    setTimeout(function () {
      document.getElementById('formulaire').hidden=true;
      window.location = "Dashboard_id=.html";
    },1500);
  }
}

function form_validation() {
  return 0;
}
