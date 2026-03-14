async function carregarPosts(){

const response = await fetch('posts/posts.json')

const posts = await response.json()

const container = document.getElementById('posts-container')

posts.forEach(post => {

const card = document.createElement('div')

card.classList.add('card')

card.innerHTML = `

<img src="${post.imagem}">

<h2>${post.titulo}</h2>

<p>${post.data} | ${post.autor}</p>

<p>${post.conteudo.substring(0,120)}...</p>

<a href="post.html?id=${post.id}">Ler mais</a>

`

container.appendChild(card)

})

}

carregarPosts()