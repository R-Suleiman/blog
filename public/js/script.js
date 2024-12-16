// toggle nav
const nav = document.querySelector('.nav')
const openNavBtn = document.querySelector('.open-nav')
const closeNavBtn = document.querySelector('.close-nav')

openNavBtn.addEventListener('click', () => {
    nav.classList.remove('hidden')
    nav.classList.add('block')
    openNavBtn.classList.remove('block')
    openNavBtn.classList.add('hidden')
    closeNavBtn.classList.remove('hidden')
    closeNavBtn.classList.add('block')
})

closeNavBtn.addEventListener('click', () => {
    nav.classList.remove('block')
    nav.classList.add('hidden')
    closeNavBtn.classList.remove('block')
    closeNavBtn.classList.add('hidden')
    openNavBtn.classList.remove('hidden')
    openNavBtn.classList.add('block')
})
