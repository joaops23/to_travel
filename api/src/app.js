const express = require("express")


const app = express()


//rotas da API
const index = require('./routes/index')
const userRoutes = require('./routes/user.routes')

app.use(express.urlencoded({extended: true}))
app.use(express.json())
app.use(express.json({type: 'application/vdn.api+json'}))

app.use(index)
app.use(userRoutes)
//app.use('/api/', userController)

module.exports = app;