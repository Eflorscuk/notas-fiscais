<template>
    <div>
        <h1>Consultar nota:</h1>
        <input v-model="chave" type="text" placeholder="Digite a chave da nota fiscal" required>
        <button @click="consultarNota">Consultar</button>
        <div v-if="notaFiscal">
            <p>Informações da nota fiscal:</p>
            <p>Chave: {{ notaFiscal.chave }}</p>
            <p>CNPJ: {{ notaFiscal.cnpj }}</p>
            <p>Data emissão: {{ notaFiscal.data_emissao }}</p>
            <p>Data recebimento: {{ notaFiscal.data_recebimento }}</p>
        </div>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    data() {
        return {
            chave: '',
            notaFiscal: null
        }
    },
    methods: {
        async consultarNota() {
            try {
                const response = await axios.get(`http://localhost:8081/api/nota-fiscal/${this.chave}`);
                this.notaFiscal = response.data[0];
                this.chave = "";
            } catch(e) {
                console.error('Erro ao consultar a nota-fiscal: ', e)
                alert('Erro ao consultar a nota-fiscal!')
            }
        }
    }
}
</script>

<style scoped>

</style>