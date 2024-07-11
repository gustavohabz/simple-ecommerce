<template>
    <div>
        <v-container v-if="$vuetify.display.mdAndUp">
            <ProdutoDetalheDesktop :produto="produto"/>
        </v-container>
        <v-container v-if="!$vuetify.display.mdAndUp">
            <ProdutoDetalheMobile :produto="produto"/>
        </v-container>
        <v-container>
            <v-row>
                <v-col md="8" lg="8" sm="12" xs="12">
                    <v-card elevation="6">
                        <v-container>
                            <h4 class="text-h4 text-center mb-6">Avaliações <v-icon icon="mdi-star-shooting"></v-icon> </h4>
                            <v-row v-for="(item, index) in avaliacoes" :key="index" class="px-12">
                                <img src="https://cdn.vuetifyjs.com/images/cards/docks.jpg" height="30px" width="30px" class="rounded-pill">
                                <v-col md="10" lg="10" sm="12" xs="12">
                                    <v-card elevation="6" class="px-12 py-6">
                                        <template v-slot:prepend>
                                            <p class="text-caption">{{item.usuario.nome}}</p>
                                        </template>
                                        <template v-slot:append>
                                            <v-rating density="compact" color="amber" readonly v-model="item.avaliacao"/>
                                        </template>
                                        <v-card-text>
                                            {{item.comentario}}
                                        </v-card-text>
                                    </v-card>
                                </v-col>
                            </v-row>
                        </v-container>
                    </v-card>
                </v-col>
            </v-row>
        </v-container>
    </div>
</template>
<script>
export default{
    data(){
        return{
            produto: {
                titulo: 'Item Mágico Voador',
                descricao: 'Este produto trás a tona todas as suas necessidades mágicas',
                imagens: [
                    {nome: 'blabla', url: 'https://cdn.vuetifyjs.com/images/cards/docks.jpg'},
                    {nome: 'xzczxc', url: 'https://cdn.vuetifyjs.com/images/cards/hotel.jpg'},
                    {nome: 'asdasdasd', url: 'https://cdn.vuetifyjs.com/images/cards/sunshine.jpg'},
                ],
                detalhesProduto: [
                    {label: 'Marca', valor: 'Xyz'},
                    {label: 'Cor', valor: 'Branco'},
                    {label: 'Tamanhos Disponíveis', valor: 'M, G e GG'},
                ],
                detalhesRelevantes: [
                    'Bla bla bla',
                    'pipipi',
                    'po po po'
                ],
                avaliacaoMedia: 4,
                tamanhosDisponiveis: [
                    {id: 1, label: 'P'},
                    {id: 2, label: 'M'},
                    {id: 3, label: 'G'},
                    {id: 4, label: 'GG'},
                ],
                preco: 150.00
            },
            avaliacoes: [
                {usuario: {nome: 'Juquinha'}, comentario: 'Esse produto é muito bom.', avaliacao: 5},
                {usuario: {nome: 'Zézinho'}, comentario: 'Esse produto até que é ok.', avaliacao: 3},
                {usuario: {nome: 'Luizinho'}, comentario: 'Horrivel.', avaliacao: 1}
            ]
        }
    }
}
</script>
