<template>
    <v-row class="mt-12">
        <v-col md="7" lg="7" xs="12" sm="12">
            <v-card v-show="carregando" elevation="6" class="text-center" height="30em">
                <Spinner style="margin-top: 12em" />
            </v-card>
            <v-card elevation="6"  class="text-center" v-show="!carregando">
                <v-container>
                    <v-row>
                        <v-col md="7" lg="7" xs="12" sm="12">
                            <v-carousel 
                                show-arrows="hover"
                            >
                                <v-carousel-item v-for="(item, index) in produto.imagens" :key="index" :alt="label" cover :src="item.url"></v-carousel-item>
                            </v-carousel>
                        </v-col>
                        <v-col md="5" lg="5" xs="12" sm="12">
                            <h4 class="text-h4 mt-6">Detalhes do Produto</h4>
                            <v-container>
                                <v-table>
                                    <tbody>
                                        <tr v-for="(item, index) in produto.detalhes" :key="index">
                                            <td>{{item.titulo}}</td>
                                            <td>{{item.label}}</td>
                                        </tr>
                                    </tbody>
                                </v-table>
                            </v-container>
                        </v-col>
                    </v-row>
                </v-container>
            </v-card>
        </v-col>
        <v-col md="5" lg="5" xs="12" sm="12">
            <v-card v-show="carregando" elevation="6" class="text-center" height="30em">
                <Spinner style="margin-top: 12em" />
            </v-card>
            <v-card elevation="6" v-show="!carregando">
                <v-card-title class="text-right" v-show="produto.mediaAvaliacoes &gt; 0">
                    <v-rating color="amber" readonly v-model="produto.mediaAvaliacoes"/>
                </v-card-title>
                <v-row>
                    <v-col md="12" lg="12">
                        <h3 class="text-h3 ml-12 mt-6">{{produto.produto.titulo}}</h3>
                        <h4 class="text-h4 ml-12">{{filterCurrency(produto.produto.preco)}}</h4>
                    </v-col>
                </v-row>
                <v-row class="mt-12 mb-1">
                    <v-col md="12" lg="12" xs="12" sm="12">
                        <h5 class="text-h5 text-center">{{produto.produto.descricao}}</h5>
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
                            <v-col md="6" lg="6" xs="6" sm="6" offset="2">
                                <v-btn color="primary" block class="text-none"> Comprar</v-btn>
                            </v-col>
                            <v-col md="6" lg="6" xs="6" sm="6">
                                <p>Em estoque: {{produto.produto.quantidadeEmEstoque}}</p>
                            </v-col>
                            <v-col md="6" lg="6" xs="6" sm="6">
                                <v-btn color="teal" block class="text-none"> <v-icon icon="mdi-cart-outline"></v-icon> Adicionar ao carrinho</v-btn>
                            </v-col>
                        </v-row>
                    </v-col>
                </v-row>
            </v-card>
        </v-col>
    </v-row>
</template>
<script>
import filterCurrency from './../filters'
export default{
    props: ['produto', 'carregando'],
    methods: {
        filterCurrency(value){
            return filterCurrency(value)
        }
    }
}
</script>
