var tag_items = html2.getAll('li.item-tag')
var tags_title = html2.getAll('.tags-title')

for (i=0; i<tag_items.length; i++) {
  if (tag_items[i].innerHTML == '') {
    tag_items[i].style.display = 'none'
    tags_title[i].style.display = 'none'
  }
}