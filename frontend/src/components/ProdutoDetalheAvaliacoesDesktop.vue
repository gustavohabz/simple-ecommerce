<template>
    <v-row>
        <v-col md="8" lg="8" sm="12" xs="12">
            <v-card v-show="carregando" elevation="6" class="text-center" height="10em">
                <Spinner style="margin-top: 2em" />
            </v-card>
            <v-card elevation="6" v-show="!carregando">
                <v-container v-show="produto.avaliacoes.length &gt; 0">
                    <h4 class="text-h4 text-center mb-6">Avaliações </h4>
                    <v-row v-for="(item, index) in produto.avaliacoes" :key="index" class="px-12">
                        <img src="https://cdn.vuetifyjs.com/images/cards/docks.jpg" height="30px" width="30px" class="rounded-pill">
                        <v-col md="10" lg="10" sm="12" xs="12">
                            <v-card elevation="6" class="px-12 py-6">
                                <template v-slot:prepend>
                                    <p class="text-caption">{{item.nome}}</p>
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
                <v-container v-show="produto.avaliacoes.length == 0">
                    <h4 class="text-h4 text-center mb-6">Nenhuma avaliação até o momento. </h4>
                </v-container>
            </v-card>
        </v-col>
    </v-row>
</template>
<script>
export default {
    props: ['produto', 'carregando']
}
</script>