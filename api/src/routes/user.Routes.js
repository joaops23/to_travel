const express = require("express")
const router = express.Router()


/*
    Padrão para recebimento do body da requisição (adcionar ao readme)

    // Login
    POST: { email: "email@example.com", pass: "password_123"}

    // update/inclusão
    PUT/POST: { email: "email@example.com", pass: "password_123",  }


    //exemplo de uso

    localhost:3000/api/user/login
*/

// Rota de login
router.post('/api/user/login/', (req, res) => {
    
});

//Rota para resgatar dados cadastrais
router.get('/api/user/:id', (req, res) => {
    
});
//Rota para inclusão de novo usuário
router.post('/api/user/insert/', (req, res) => {
    
});
//Rota para alteração de usuários 
router.put('/api/user/alter/', (req, res) => {
    
});
// Rota para exclusão de usuários 
router.delete('/api/user/login/', (req, res) => {
    
});

module.exports = router;