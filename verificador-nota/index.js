const express = require('express');
const routes = require('./src/routes/routes')

const app = express();

app.use(express.json());
app.use('/valida/:cnpj', routes);

// const CNPJ_MADEIRA = '10490181000569';

// app.get('/valida/:cnpj', (req, res) => {
//     try {
//         const { cnpj } = req.params;
    
//         if (!cnpj) {
//             throw new Error('CNPJ não fornecido na URL');
//         }

//         const isValid = cnpj === CNPJ_MADEIRA;

//         if (!isValid) {
//             const horaAtual = new Date().toLocaleString();
//             console.log(`CNPJ inválido ${cnpj} inserido em ${horaAtual}`);
//         }

//         res.json({ isValid });
//     } catch (error) {
//         res.status(400).json({ error: error.message });
//     }
// });



const PORT = process.env.PORT || 3000;
app.listen(PORT, () => {
    console.log(`Servidor rodando na porta ${PORT}`);
});
