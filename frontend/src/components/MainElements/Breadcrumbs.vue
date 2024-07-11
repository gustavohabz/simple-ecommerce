<template>
    <div>
        <v-breadcrumbs :items="breadcrumbs">
            <template v-slot:divider>
                <v-icon icon="mdi-chevron-right"></v-icon>
            </template>
        </v-breadcrumbs>
    </div>
</template>
<script>
export default{
    data() {
        return {
            breadcrumbs: []
        }
    },
    watch: {
        $route (to, from){
            switch(to.name){
                case 'home':
                    this.breadcrumbs = [
                        {title: 'Home', disabled: true}
                    ]
                    break;
                case 'produtoDetalhe':
                    this.breadcrumbs = [
                        {title: 'Home', disabled: false, to: '/'},
                        {title: 'Produto', disabled: true}
                    ]
                    break;
                case 'buscarProdutos':
                    this.breadcrumbs = [
                        {title: 'Home', disabled: false, to: '/'},
                        {title: 'Buscar Produtos', disabled: true}
                    ]
                    break;
                case 'sobre':
                    this.breadcrumbs = [
                        {title: 'Home', disabled: false, to: '/'},
                        {title: 'Sobre Nós', disabled: true}
                    ]
                    break;
                case 'usuario':
                    this.breadcrumbs = [
                        {title: 'Home', disabled: false, to: '/'},
                        {title: 'Perfil de Usuário', disabled: true}
                    ]
                    break;
                case 'loginCadastro':
                    this.breadcrumbs = [
                        {title: 'Home', disabled: false, to: '/'},
                        {title: 'Login/Cadastro', disabled: true}
                    ]
                    break;
            }
        }
    }
}
</script>
