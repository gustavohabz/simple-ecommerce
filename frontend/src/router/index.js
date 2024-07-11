import { createWebHistory, createRouter } from 'vue-router'

import Home from './../views/PaginaPrincipal.vue'
import ProdutoView from './../views/ProdutoView.vue'
import BuscarProdutos from './../views/BuscarProdutos.vue'
import Sobre from './../views/Sobre.vue'
import Usuario from './../views/Usuario.vue'
import Entrar from './../views/Entrar.vue'

const routes = [
    { path: '/', component: Home, name: 'home' },
    { path: '/produto/:rotuloUnico', component: ProdutoView, name: 'produtoDetalhe' },
    { path: '/buscar-produtos', component: BuscarProdutos , name: 'buscarProdutos'},
    { path: '/sobre', component: Sobre, name: 'sobre' },
    { path: '/usuario/:idUsuario', component: Usuario, name: 'usuario' },
    { path: '/entrar/:acao', component: Entrar, name: 'loginCadastro' }
]

const router = createRouter({
    history: createWebHistory(),
    routes
})

export default router;