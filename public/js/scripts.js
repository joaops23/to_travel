function validate()
{
    with(newHosp){
        if(titulo.value == ''){
            alert("Informe o título da hospedagem!")
            titulo.focus()
            return
        }
        if(descricao.value == ''){
            alert("Informe a Descrição da hospedagem corretamente!")
            descricao.focus()
            return
        }
        if(cep.value == ''){
            alert("Informe o CEP hospedagem corretamente!")
            cep.focus()
            return
        }
        if(endereco.value == '' || numEndereco.value == '' || complemento.value == '' || bairroEnd.value == '' || cidadeEnd.value == '' || ufEnd.value == ''){
            alert("Endereço da hospedagem incorreto, favor revisar!")
            cep.focus()
            return
        }
        
        submit()
    }
}

function validaCep(cep = '')
{
    if(cep == ''){
        cep = document.getElementById('cep').value.replace('-', '').replace('\.','');
    }
    let endereco = buscaCep(cep)    
    console.log(endereco)
    setaCamposHosp(endereco)
}

function setaCamposHosp(dados) {
    dados.logradouro != '' ? document.getElementById('endereco').value = dados.logradouro : ""
    dados.bairro  != '' ? document.getElementById('bairroEnd').value = dados.bairro : ""
    dados.localidade != '' ? document.getElementById('cidadeEnd').value = dados.localidade : ""
    dados.uf  != '' ? document.getElementById('ufEnd').value = dados.uf : ""
    dados.complemento != '' ? document.getElementById('complemento').value = dados.complemento : ""
}


function buscaCep(cep)
{
    let url = 'http://viacep.com.br/ws/' + cep + '/json/'
    let endereco = ''
    let xhttp = new XMLHttpRequest()
    xhttp.open('GET', url, false)
    xhttp.onload = function () {
        endereco = JSON.parse(this.responseText)
    }

    xhttp.onerror = function () {
        alert('erro ao executar requisição')
    }
    xhttp.send()
    console.log(cep)

    return endereco
}

function exibeHosp(id)
{
    let url =  "http://" + window.location.host +'/api/getHospedagem/' + id
    let hosp = ''
    let xhttp = new XMLHttpRequest()
    xhttp.open('get', url, true)
    xhttp.onload = function () {
        hosp = JSON.parse(this.responseText)
        var cep = String(hosp[0]['cep'])
        cep = (cep.length < 8) ? '0' + cep : cep
        validaCep(cep)

        document.getElementById('titulo').value = hosp[0]['titulo']
        document.getElementById('descricao').value = hosp[0]['descricao']
        document.getElementById('cep').value = hosp[0]['cep']

        //cria um campo escondido adicionando o id da hospedagem
        let idHosp = document.getElementById('idHosp')

        if(idHosp === null){
            let input = document.createElement("INPUT")
            input.setAttribute('type', 'hidden')
            input.setAttribute('name', 'idHosp')
            input.setAttribute('id', 'idHosp')
            input.setAttribute('value', hosp[0]['id'])
            document.getElementById('newHosp').appendChild(input)
        } else {
            idHosp.value = hosp[0]['id']
        }

    }

    xhttp.send()
}

function limpaForm()
{
    document.getElementById('newHosp').reset()
}