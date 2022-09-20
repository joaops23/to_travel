const express = require("express")
const routes = express.Router()


//Rota para listar hospedagens
routes.get("/api/hospedagem/:id?", (req,res) => {

})


//Rota para cadastrar hospedagens
routes.post("/api/hospedagem/", (req,res) => {
    
})

//Rota para alterar cadastro de hospedagem
routes.put("/api/hospedagem/:id", (req,res) => {
    
})

//Rota para excluir hospedagem
routes.delete("/api/hospedagem/", (req,res) => {
    
})

module.exports = routes