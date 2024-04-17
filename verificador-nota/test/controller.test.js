const { validaCnpj } = require('../src/controller/valida.controller.js');

test('validaCnpj deve retornar isValid true para CNPJ válido', () => {
  // Simule a requisição e a resposta
const req = { params: { cnpj: '10490181000569' } };
const res = { 
    json: jest.fn(),
    status: jest.fn().mockReturnThis()
};


validaCnpj(req, res);

expect(res.json).toHaveBeenCalledWith({ isValid: true });
});

test('validaCnpj deve retornar isValid false para CNPJ inválido', () => {
    const req = { params: { cnpj: '12345678901234' } };
    const res = { 
        json: jest.fn(),
        status: jest.fn().mockReturnThis()
    };

    validaCnpj(req, res);

    expect(res.json).toHaveBeenCalledWith({ isValid: false });
});

test('validaCnpj deve retornar erro 400 se o CNPJ não for fornecido na URL', () => {
    const req = { params: {} };
    const res = { 
        json: jest.fn(),
        status: jest.fn().mockReturnThis()
    };

    validaCnpj(req, res);

    expect(res.status).toHaveBeenCalledWith(400);
    expect(res.json).toHaveBeenCalledWith({ error: 'CNPJ não fornecido na URL' });
});
