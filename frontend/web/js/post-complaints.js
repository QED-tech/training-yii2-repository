const reportBtn = document.querySelectorAll('.report-btn')
const reportBtnNode = [...reportBtn]

reportBtnNode.forEach(item => item.addEventListener('click', async function (event) {
    let preloader = event.target.childNodes[1];
    let id = event.target.dataset['id']
    preloader.style.display = ''

    let formData = new FormData
    formData.append('id', id)

    let res = await fetch('/post/default/complaint', {
        method: 'POST',
        body: formData
    })

    let response = await res.json()

    console.log(response)

    if (response.success) {
        preloader.style.display = 'none'
        event.target.innerText = response.message
    } else {
        preloader.style.display = 'none'
        event.target.innerText = 'error'
    }
}))