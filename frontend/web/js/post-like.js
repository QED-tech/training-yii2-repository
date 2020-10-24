const likeCounter = document.getElementById('like-counter')

document.addEventListener('click', async function (event) {

    const buttonLike = event.target.closest('#button-like')
    if(!buttonLike) return;

    let formData = new FormData
    formData.append('id', buttonLike.dataset['id'])

    let res = await fetch('/post/default/like', {
        method: 'POST',
        body: formData
    })

    let response = await res.json()
    response.success === true ? likeCounter.innerText = response.likeCount : false
    response.success === true ? document.location.reload() : false

})

document.addEventListener('click', async function (event) {

    const buttonDislike = event.target.closest('#button-unlike')
    if(!buttonDislike) return;

    let formData = new FormData
    formData.append('id', buttonDislike.dataset['id'])

    let res = await fetch('/post/default/unlike', {
        method: 'POST',
        body: formData
    })

    let response = await res.json()
    response.success === true ? likeCounter.innerText = response.likeCount : false
    response.success === true ? document.location.reload() : false



})