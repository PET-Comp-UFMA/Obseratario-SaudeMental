var data = document.querySelectorAll('#paginate .list .item')
data = Array.from(data)

const html = {
  get(element) {
    return document.querySelector(element)
    //retorna primeiro elemento com a classe de "element"
  }
}

let perPage = 5

//- correção botão de paginação
//------------------------------------------------------
//recebe section "paginate"
let paginate = document.getElementById("paginate");


let items = document.querySelectorAll(".item");
let pagination = document.querySelector(".pagination");

if (items.length == 0){
  pagination.style.display = "none";
}
//-------------------------------------------------------

const state = {
  page: 1,
  perPage,
  totalPages: Math.ceil(data.length / perPage),
  maxVisibleButtons: 3
}

const controls = {
  next() {
    state.page++

    const lastPage = state.page > state.totalPages
    if(lastPage) {
      state.page--
    }
  },
  prev() {
    state.page--

    if (state.page < 1) {
      state.page++
    }
  },
  goTo(page) {
    if (page < 1) {
      page = 1
    }

    state.page = +page

    if (page > state.totalPages) {
      state.page = state.totalPages
    }
  },
  createListeners() {
    html.get('.prev').addEventListener('click', () => {
      controls.prev()
      update()
    })

    html.get('.next').addEventListener('click', () => {
      controls.next()
      update()
    })
  }
}

const list = {
  create(item) {
    // const div = document.createElement('div')
    // div.classList.add('item')
    // div.innerHTML = item

    html.get('.list').appendChild(item)
  },
  update() {
    html.get('.list').innerHTML = ""

    let page = state.page - 1
    let start = page * state.perPage
    let end = start + state.perPage
    
    const paginatedItems = data.slice(start, end)

    paginatedItems.forEach(list.create)
  }
}

const buttons = {
  element: html.get('.pagination .numbers'),
  create(number) {
    const button = document.createElement('div')

    button.innerHTML = number;

    if (state.page == number) {
      button.classList.add('active')
    }

    button.addEventListener('click', (e) => {
      const page = e.target.innerText

      controls.goTo(page)
      update()
    })

    buttons.element.appendChild(button)
  },
  update() {
    buttons.element.innerHTML = ""
    const { maxLeft, maxRight } = buttons.calculateMaxVisible()

    for (let page = maxLeft; page <= maxRight; page++) {
      buttons.create(page)
    }
  },
  calculateMaxVisible() {
    const { maxVisibleButtons } = state
    let maxLeft = (state.page - Math.floor(state.maxVisibleButtons/2))
    let maxRight = (state.page + Math.floor(maxVisibleButtons/2))

    if (maxLeft < 1) {
      maxLeft = 1
      maxRight = maxVisibleButtons
    }

    if (maxRight > state.totalPages) {
      maxLeft = state.totalPages - (maxVisibleButtons-1)
      maxRight = state.totalPages

      if(maxLeft<1) maxLeft = 1 
    }

    return { maxLeft, maxRight }
  }
}

function update() {
  list.update()
  buttons.update()
}

function init() {
  update()
  controls.createListeners()
}

init()

