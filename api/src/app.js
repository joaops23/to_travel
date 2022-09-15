const express = require("express")


const app = express()


//rotas da API
const index = require('./routes/index')
const userRoutes = require('./routes/user.routes')
const hospRoutes = require('./routes/hosp.routes')
const colabRoutes = require('./routes/colab.routes')

app.use(express.urlencoded({extended: true}))
app.use(express.json())
app.use(express.json({type: 'application/vdn.api+json'}))


//Integrando os endpoints
app.use(index)
app.use(userRoutes)
app.use(hospRoutes)
app.use(colabRoutes)

//app.use('/api/', userController)

module.exports = app;