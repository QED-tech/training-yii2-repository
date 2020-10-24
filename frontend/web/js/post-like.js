

document.addEventListener('click', async function (event) {

    const buttonLike = event.target.closest('#button-like')
    if(!buttonLike) return;

    let formData = new FormData
    let postId = buttonLike.dataset['id']
    formData.append('id', postId)

    const likeCounter = document.getElementById(`like-counter-${postId}`)

    let res = await fetch('/post/default/like', {
        method: 'POST',
        body: formData
    })

    let response = await res.json()


    if(response.success) {
        likeCounter.innerText = response.likeCount
        buttonLike.previousElementSibling.classList.remove('hidden')
        buttonLike.classList.add('hidden')
    }

})

document.addEventListener('click', async function (event) {

    const buttonDislike = event.target.closest('#button-unlike')
    if(!buttonDislike) return;

    let formData = new FormData
    let postId = buttonDislike.dataset['id']
    formData.append('id', postId)

    const likeCounter = document.getElementById(`like-counter-${postId}`)

    let res = await fetch('/post/default/unlike', {
        method: 'POST',
        body: formData
    })

    let response = await res.json()

    if(response.success) {
        likeCounter.innerText = response.likeCount
        buttonDislike.nextElementSibling.classList.remove('hidden')
        buttonDislike.classList.add('hidden')
    }





})