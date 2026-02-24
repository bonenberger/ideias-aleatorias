/*function carregar() {
    var msg = window.document.getElementById('msg')
    var img = window.document.getElementById('imagem')
    var data = new Date()
    var hora = data.getHours()
    //var hora = 22
    var res = window.document.getElementById('resultado')
    msg.innerHTML = `agora são ${hora} horas`
    if (hora >= 0 && hora < 12) {
        res.innerHTML = 'bom dia!'
        document.body.style.background = '#E0CA3C'
    }else if (hora >= 12 && hora <= 18) {
        res.innerHTML = 'boa tarde!'
        document.body.style.background = '#0B6E4F'
    }else {
        res.innerHTML = 'boa noite!'
        document.body.style.background = 'black'
    }
}*/



















function carregar () {
    var msg = document.getElementById('msg')
    var res = document.getElementById('resultado')
    var data = new Date()
    //var hora = data.getHours()
    var hora = 19
    msg.innerHTML = `agora são ${hora} horas`
    if (hora > 0 && hora < 12) {
        res.innerHTML = `BOM DIA!`
        document.body.style.background = '#E0CA3C'
    }else if (hora >= 12 && hora <=18) {
        res.innerHTML = `BOA TARDE!`
        document.body.style.background = '#0B6E4F'
    }else {
        res.innerHTML = `BOA NOITE!`
        document.body.style.background = '#412722'
    }
}

