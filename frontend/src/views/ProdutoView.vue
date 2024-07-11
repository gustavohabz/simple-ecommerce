<template>
    <div>
        <v-container v-if="$vuetify.display.mdAndUp">
            <ProdutoDetalheDesktop :produto="produto" :carregando="carregando"/>
        </v-container>
        <v-container v-if="$vuetify.display.mdAndUp">
            <ProdutoDetalheAvaliacoesDesktop :produto="produto" :carregando="carregando"/>
        </v-container>
        <v-container v-if="!$vuetify.display.mdAndUp">
            <ProdutoDetalheMobile :produto="produto" :carregando="carregando"/>
        </v-container>
        <v-container v-if="!$vuetify.display.mdAndUp">
            <ProdutoDetalheAvaliacoesMobile :produto="produto" :carregando="carregando"/>
        </v-container>
    </div>
</template>
<script>
import ProdutoService from '../services/ProdutoService.js'
export default{
    mounted() {
        this.getProduto()
    },
    methods: {
        async getProduto(){
            this.carregando = true;
            const rotuloUnico = this.$route.params.rotuloUnico
            const response = await ProdutoService.getProdutoDetalhe(rotuloUnico)
            this.produto = response.data
            this.carregando = false;
        }
    },
    data(){
        return{
            produto: {
                produto: {
                    mediaAvaliacoes: 0,
                    titulo: '',
                    descricao: ''
                },
                avaliacoes: []
            },
            carregando: false
        }
    }
}
</script>
