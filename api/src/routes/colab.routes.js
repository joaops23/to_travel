const express = require("express")
const routes = express.Routes()

//Rota para listar hospedagens
routes.get("/api/colaborador/:id?", (req,res) => {

})


//Rota para cadastrar hospedagens
routes.post("/api/colaborador/", (req,res) => {
    
})

//Rota para alterar cadastro de hospedagem
routes.put("/api/colaborador/:id", (req,res) => {
    
})

//Rota para excluir hospedagem
routes.delete("/api/colaborador/", (req,res) => {
    
})

module.exports = routes