const html2 = {
  getAll(element) {
    return document.querySelectorAll(element)
  },
  get(element) {
    return document.querySelector(element)
  }
}

var button = html2.getAll('.button-show-more')
var tags = html2.getAll('.tags-download')

for (var i=0; i<button.length; i++) {
  button[i].addEventListener('click', function() {
    var panel = this.parentNode.parentNode.querySelector(".panel");
    if (panel.style.display === 'none' || panel.style.display === "") {
      panel.style.display = 'block'
      this.innerHTML = "Ocultar"
    } else {
      panel.style.display = 'none'
      this.innerHTML = `
        Ver mais
        <span class="material-icons">
          add
        </span>
      `
    }
  })
}

function(d, s, id) {
var js, fjs = d.getElementsByTagName(s)[0];
if (d.getElementById(id)) return;
js = d.createElement(s); js.id = id;
js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));