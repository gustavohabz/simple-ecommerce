<template>
    <v-container>
        <v-row>
            <v-col sm="12" lg="12" md="12" xs="12" class="mt-12">
                <h2 class="text-h2 text-center">Produtos Disponíveis na Loja:</h2>
            </v-col>
        </v-row>
        <v-row>
            <v-col  sm="4" lg="2" md="2" xs="4" class="mt-12" v-for="(item, index) in produtos" :key="index" clas="custom-sheet">
                <v-hover v-slot="{ isHovering, props }">
                    <RouterLink :to="'/produto/'+item.rotuloUnico" class="text-indigo-darken-4">
                        <v-card 
                            v-bind="props"
                            :elevation="isHovering ? 12 : 4 "
                            >
                            <v-img max-height="200" :src="item.thumbnail" :alt="item.titulo"/>
                        </v-card>
                    </RouterLink>
                    <RouterLink :to="'/produto/'+item.rotuloUnico" class="text-indigo-darken-4">
                        <h4 class="text-center text-h4 mt-2">{{item.titulo}}</h4>
                    </RouterLink>
                    <p class="text-center">{{item.preco}}</p>
                </v-hover>
            </v-col>
        </v-row>
    </v-container>
</template>
<script>
export default {
    data() {
        return {
            produtos: [
                {id: 0, rotuloUnico: 'caneca-branca-mto-foda', titulo: 'Caneca', preco: 45.00, thumbnail: 'https://cdn.awsli.com.br/2500x2500/238/238483/produto/46949036/0588180f94.jpg'},
                {id: 1, rotuloUnico: 'camisa-branca-chatona', titulo: 'Camisa', preco: 45.00, thumbnail: 'https://images.tcdn.com.br/img/img_prod/275189/camisa_azul_royal_100_poliester_para_sublimacao_m_2701_1_20200722153204.jpg'},
                {id: 2, rotuloUnico: 'blusa-dahora', titulo: 'Blusa', preco: 45.00, thumbnail: 'https://static.netshoes.com.br/produtos/blusa-moletom-algodao-aberto-mooboo-c-bolso-e-capuz/06/38B-0000-006/38B-0000-006_zoom1.jpg?ts=1630917620?ims=1088x'}
            ]
        }
    }    
}
</script>
<style>
    .custom-sheet:hover{
        transform: scale(1, 2);
    }
</style>