const { query } = require('express')
const db = require('./../config/database')


//Métodos de usuário

class UserController {

    // Login
    login = async(req, res) => {
        const {email_user, senha_user} = req.body

        let mess
        let response

        let email = email_user.trim()
        let senha = btoa(senha_user)

        let consult = await db.query(`SELECT id_cadastro FROM cadastro_comum WHERE email_user = $1 and senha_user = $2`, [email, senha])

        if(consult.rowCount == 0){
             mess = "faile"
             response = "0"
        } else {
            let dados = consult.rows[0]
             mess = "success"
             response = dados.id_cadastro
        }

        res.status(200).send({
            message: mess,
            response: response
        })
    }

    //método para cadastro
    insert = async (req, res) => {
        const {email_user, senha_user, nome_user, dt_nasc_user, CPF_user, celular_user, end_user, nr_end_user, UF_user, CEP_user} = req.body
        
        let CPF = CPF_user.replace(/\./g, "").replace(/\-/g, "")
        let celular = celular_user.replace(/\(/g , "").replace(/\)/g, "").replace(/\-/g, "")
        let CEP = CEP_user.replace(/\./g, "").replace(/\-/, "")
        let nome = nome_user.replace(/\'/g, "\\'").replace(/\./g, "")

        let consulta = await db.query("SELECT id_cadastro, email_user FROM cadastro_comum WHERE cpf_user = $1 OR email_user = $2", [CPF, email_user])
        if(consulta.rowCount == 0){

            const response = await db.query(
                "INSERT INTO cadastro_comum (email_user, senha_user, nome_user, data_nasc_user, CPF_user, celular_user, end_user, nr_end_user, UF_user, CEP_user) VALUES ($1, $2, $3, $4, $5, $6, $7, $8, $9, $10)",
                [email_user, btoa(senha_user), nome, dt_nasc_user, CPF, celular, end_user, nr_end_user, UF_user, CEP],
            )
            
            if( parseInt(response.rowCount) == 1){
                var resp = "cadastrado!"
            } else {
                var resp = "erro, tente novamente!"
            }

        } else {
            var resp = "Usuário já cadastrado!"
            var resultado = consulta.rows[0]
        }
        
        res.status(201).send({
            message: "success",
            response: resp,
            email: resultado.email_user
            //senha1: atob( btoa(senha_user)) desencriptar a senha atob(...)
        })
    }

    // método para alteração do cadastro
    alter = async (req, res) => {
        const {email_user, senha_user, nome_user, dt_nasc_user, CPF_user, celular_user, end_user, nr_end_user, UF_user, CEP_user} = req.body
        
        let CPF = CPF_user.replace(/\./g, "").replace(/\-/g, "")
        let celular = celular_user.replace(/\(/g , "").replace(/\)/g, "").replace(/\-/g, "")
        let CEP = CEP_user.replace(/\./g, "").replace(/\-/, "")
        let nome = nome_user.replace(/\'/g, "\\'").replace(/\./g, "")

        let consulta = await db.query("SELECT id_cadastro, email_user FROM cadastro_comum WHERE cpf_user = $1 OR email_user = $2", [CPF, email_user])
        if(consulta.rowCount == 0){
                //buscar dados do cadastro e comparar com os dados enviados, atualizar apenas os dados alterados.
                //desemcriptar a senha e validar, encriptar de novo e atualizar

            const response = await db.query(
                "UPDATE cadastro_comum SET email_user = $1, senha_user = $2, nome_user = $3, data_nasc_user = $4, CPF_user = $5, celular_user = $6, end_user = $7, nr_end_user = $8, UF_user = $9, CEP_user = $10",
                [email_user, btoa(senha_user), nome, dt_nasc_user, CPF, celular, end_user, nr_end_user, UF_user, CEP],
            )

            var resp = "Usuário atualizado com sucesso!"

        } else {
            var resp = "Usuário não encontrado"
        }

        
        res.status(301).send({
            message: "success",
            response: resp,
            email: resultado.email_user
        })
    }

    // Método para listagem de cadastros (com ou sem id)
    getDate = async(req, res) => {
        const id = req.params.id

        if(id.empty()){
            const busca = await db.query("SELECT * FROM cadastro_comum")
        } else {
            const busca = await db.query("SELECT * FROM cadastro_comum WHERE id_cadastro = $1", [id])
        }

        if(busca.rowCount > 1){
            let arr = []
            busca.foreach(row => arr.push(row))
        } else {
            let arr = []
            arr.push(busca.rows)
        }

        res.status(201).send({
            message: "success",
            response: arr,
            email: resultado.email_user
            //senha1: atob( btoa(senha_user)) desencriptar a senha atob(...)
        })
    }
}

// método para método para resgate de dados do usuário 

// método para exclusão de usuário

module.exports = new UserController()