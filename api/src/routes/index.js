const express = require('express')
const router = express.Router()

router.patch('/api', (req,res) => {
    res.status(200).send({
        success: 'true',
        message: "Aplicação feita para o projeto integrador do curso de SI, 4° semestre - FAM",
        version: "1.0.0",
    })
});




module.exports = router