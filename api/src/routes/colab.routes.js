const express = require("express")
const routes = express.Router()

//Rota para listar Colaboradores
routes.get("/api/colaborador/:id?", (req,res) => {

})


//Rota para cadastrar Colaboradores
routes.post("/api/colaborador/", (req,res) => {
    
})

//Rota para alterar cadastro de Colaboradores
routes.put("/api/colaborador/:id", (req,res) => {
    
})

//Rota para excluir Colaboradores
routes.delete("/api/colaborador/", (req,res) => {
    
})

module.exports = routes