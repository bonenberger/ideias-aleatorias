function verificar() {
    const idade = document.getElementById('idade').value
    const mensagem = document.getElementById('rtex')
    const sexo = document.querySelector('input[name="sexo"]:checked').value
    const imagem = document.querySelector('img')
    if (idade.value === '' || idade < 0 || idade > 112) {
        window.alert('digite uma idade válida')
    }else {
        if (sexo === "masculino") {
            if (idade >= 0 && idade < 12) {
                mensagem.innerHTML = `você é um menino de ${idade} anos`
                imagem.src = 'menino.jpeg'
            }else if (idade < 18) {
                mensagem.innerHTML = `você é um adolescente de ${idade} anos`
                imagem.src = 'adolescente.jpe'
            }else if (idade < 65) {
                mensagem.innerHTML = `você é um adulto de ${idade} anos`
            }else {
                mensagem.innerHTML = `você é um idoso de ${idade} anos`
            }
        }else {
           if (idade >= 0 && idade < 12) {
                mensagem.innerHTML = `você é uma menina de ${idade} anos`
                imagem.src = 'f-criança.jpg'
                imagem.style.display = 'block'
            }else if (idade < 18) {
                mensagem.innerHTML = `você é uma adolescente de ${idade} anos`
                imagem.src = 'f-adolescente.jpg'
                imagem.style.display = 'block'
            }else if (idade < 65) {
                mensagem.innerHTML = `você é uma adulta de ${idade} anos`
                imagem.src = 'f-adulta.jpg'
                imagem.style.display = 'block'
            }else {
                mensagem.innerHTML = `você é uma idosa de ${idade} anos`
                imagem.src = 'f-idosa.jpg'
                imagem.style.display = 'block'
            } 
        }
    }
}