const express = require("express")
const router = express.Router()
const UserController = require("./../controllers/user.controller")
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
router.post('/api/user/login/', UserController.login );
//Rota para resgatar dados cadastrais
router.get('/api/user/:id?', UserController.getDate );
//Rota para inclusão de novo usuário
router.post('/api/user/insert/', UserController.insert);
//Rota para alteração de usuários 
router.put('/api/user/alter/', (req, res) => {
    
});
// Rota para exclusão de usuários 
router.delete('/api/user/login/', (req, res) => {
    
});

module.exports = router;