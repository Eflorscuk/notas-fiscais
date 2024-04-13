const express = require('express');
const { validaCnpj } = require('../controller/valida.controller')

const router = express.Router();

router.get('/:cnpj', validaCnpj);

module.exports = router;