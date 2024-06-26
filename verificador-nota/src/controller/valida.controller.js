const CNPJ_MADEIRA = '10490181000569';

function validaCnpj(req, res){
    try {
        let cnpj = Object.values(req.params)[0];
        if(!cnpj){
            throw new Error('CNPJ não fornecido na URL');
        }

        const isValid = cnpj === CNPJ_MADEIRA;
        
        if(!isValid) {
            const horaAtual = new Date().toLocaleString();
            console.log(`CNPJ inválido ${cnpj ? cnpj : ""} inserido em ${horaAtual}`);
        }

        res.json({ isValid });
        
    } catch (error) {
        res.status(400).json({ error: error.message });
    }
}

module.exports = {
    validaCnpj
};
