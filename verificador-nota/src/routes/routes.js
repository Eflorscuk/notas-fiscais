const express = require('express');
const { validaCnpj } = require('../controller/valida.controller')

const router = express.Router();

router.get('/:cnpj', validaCnpj);
// router.get('/:cnpj', (req)=> {console.log('estou na rota ')})

module.exports = router;