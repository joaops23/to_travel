const db = require('./../config/database')


//Métodos de usuário

//método para cadastro
class UserController {
    insert = async (req, res) => {
        const {email_user, senha_user, nome_user, dt_nasc_user, CPF_user, celular_user, end_user, nr_end_user, UF_user, CEP_user} = req.body
        

        let CPF = CPF_user.replace(".", "")
        CPF = CPF.replace("-", "")


        const response = await db.query(
            "INSERT INTO (email_user, senha_user, nome_user, dt_nasc_user, CPF_user, celular_user, end_user, nr_end_user, UF_user, CEP_user) VALUES ($1, $2, $3, $4, $5, $6, $7, $8, $9, $10)", 
            [email_user, btoa(senha_user), nome_user, dt_nasc_user, CPF_user, celular_user, end_user, nr_end_user, UF_user, CEP_user]
        )
        
        res.status(200).send({
            messge: "success",
            email: email_user.trim(),
            senha: btoa(senha_user),
            //senha1: atob( btoa(senha_user)) desencriptar a senha atob(...)
        })
    }
}

// método para alteração do cadastro


// Método para listagem de cadastros (com ou sem id)


// método para método para resgate de dados do usuário 

// método para exclusão de usuário

module.exports = new UserController()