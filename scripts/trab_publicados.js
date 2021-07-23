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
    var panel = this.previousElementSibling
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
