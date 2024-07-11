<template>
    <div class="imagem-fundo-pagina-principal text-white">
        <v-row>
            <v-col sm="12" lg="12" md="12" xs="12" class="mt-12">
                <h2 class="text-h2 text-center">Tudo que você busca está aqui.</h2>
                <h5 class="text-h5 text-center mt-4">Produtos personalizados e afins.</h5>
            </v-col>
        </v-row>
        <v-row class="d-flex justify-center barra-busca">
            <v-col sm="6" xs="6" lg="4" md="4">
                <v-text-field 
                    label="Pesquise por produtos"
                    variant="outlined"
                    :loading="loading"
                    append-inner-icon="mdi-magnify"
                    @click:append-inner="pesquisar">
                </v-text-field>
            </v-col>
        </v-row>
    </div>
</template>
<script>
export default {
    data(){
        return {
            loading: false
        }
    },
    methods: {
        pesquisar (){
            this.loading = true
            setTimeout(() => {
                this.loading = false
            }, 3000)
        }
    }
}
</script>
<style scoped>
    .imagem-fundo-pagina-principal{
        background: url('./public/temp/plantas.png');
        height: 40em;
    }
    .barra-busca{
        padding-top: 10em;
    }
</style>
