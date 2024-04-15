const express = require('express');
const { validaCnpj } = require('../controller/valida.controller')

const router = express.Router();

// router.get('/:cnpj', validaCnpj);
router.get('/:cnpj', ()=>{
    console.log('routes')
});


module.exports = router;