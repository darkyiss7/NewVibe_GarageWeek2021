function form_submit() {

    document.getElementById('bienvenue').innerHTML= 'Merci !';
    document.getElementById('formulaire').classList.add("slide_back");
    setTimeout(function () {
      document.getElementById('formulaire').hidden=true;
    },1500);
}
