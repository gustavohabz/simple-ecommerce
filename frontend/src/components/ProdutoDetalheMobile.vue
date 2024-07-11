<template>
    <section>
        <v-row class="mt-12">
            <v-col xs="12" sm="12" height="500px">
                <v-carousel 
                    show-arrows="hover"
                >
                    <v-carousel-item v-for="(item, index) in produto.imagens" :key="index" cover :src="item.url"></v-carousel-item>
                </v-carousel>
            </v-col>
        </v-row>
        <v-row>
            <v-col xs="12" sm="12">
                <v-card elevation="6">
                    <v-card-title class="text-right">
                        <v-rating color="amber" readonly v-model="produto.avaliacaoMedia"/>
                    </v-card-title>
                    <h2 class="text-h2 text-center mt-6">{{produto.titulo}} </h2>
                    <v-row class="mt-12">
                        <v-col md="12" lg="12" xs="12" sm="12">
                            <h5 class="text-h5 text-center">{{produto.descricao}}</h5>
                            <v-row class="mb-4 px-4 mt-4">
                                <v-col md="4" lg="4" xs="12" sm="12">
                                    Tamanho:
                                    <v-select 
                                        :items="produto.tamanhosDisponiveis"
                                        item-title="label"
                                        item-value="id"
                                        variant="solo-filled"
                                    />
                                </v-col>
                            </v-row>
                            <v-row class="mb-4 px-4 mt-4">
                                <v-col md="6" lg="6" xs="6" sm="6">
                                    <v-chip color="primary" variant="flat" class="mr-2" v-for="(item, index) in produto.detalhesRelevantes" :key="index">
                                        {{item}}
                                    </v-chip>
                                </v-col>
                                <v-col md="6" lg="6" xs="6" sm="6">
                                    <v-btn color="teal" block class="text-none"> <v-icon icon="mdi-cart-outline"></v-icon> Comprar</v-btn>
                                </v-col>
                            </v-row>
                        </v-col>
                    </v-row>
                </v-card>
            </v-col>
        </v-row>
        <v-row>
            <v-col xs="12" sm="12">
                <v-card elevation="6" height="500px" class="text-center">
                    <h4 class="text-h4 mt-6">Detalhes do Produto</h4>
                    <v-container>
                        <v-table>
                            <tbody>
                                <tr v-for="(item, index) in produto.detalhesProduto" :key="index">
                                    <td>{{item.label}}</td>
                                    <td>{{item.valor}}</td>
                                </tr>
                            </tbody>
                        </v-table>
                    </v-container>
                </v-card>
            </v-col>
        </v-row>
    </section>
</template>
<script>

export default{
    props: ['produto']
}
</script>

