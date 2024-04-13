const CNPJ_MADEIRA = '10490181000569';

function validaCnpj(req, res){
    try {
        const { cnpj } = req.params;

        if(!cnpj) {
            throw new Error('CNPJ não fornecido na URL');
        }

        const isValid = cnpj === CNPJ_MADEIRA;

        if(!isValid) {
            const horaAtual = new Date().toLocaleString();
            console.log(`CNPJ inválido ${cnpj} inserido em ${horaAtual}`);
        }

        res.json({ isValid });

    } catch (error) {
        res.status(400).json({ error: error.message });
    }
}

module.exports = {
    validaCnpj
};
