<template>
    <div>
        <v-app-bar 
            color="amber"
            prominent>
             <v-app-bar-nav-icon variant="text" @click="drawer = !drawer"></v-app-bar-nav-icon>
             <RouterLink to="/">
                <img src="../../assets/handshake.png" width="70px" height="50px"/>
             </RouterLink>
            <v-toolbar-title v-show="$vuetify.display.mdAndUp">
                <RouterLink to="/">
                    Seu E-commerce
                </RouterLink>
            </v-toolbar-title>
            <v-spacer />
            <v-fade-transition>
                <v-col md="3" lg="3" v-show="barraPesquisa && $vuetify.display.mdAndUp">
                    <v-text-field 
                        variant="underlined" 
                        label="Pesquise por produtos..." 
                        class="mt-6" 
                        ref="pesquisaTopo"
                        v-model="pesquisa"
                        append-inner-icon="mdi-close"
                        @click:append-inner="barraPesquisa = !barraPesquisa; pesquisa = ''"
                    ></v-text-field>
                </v-col>
            </v-fade-transition>
            <v-btn @click="mostraBarraPesquisa()" icon="mdi-magnify" variant="text" class="mr-4"></v-btn>
            <v-divider vertical></v-divider>
            <section v-show="$vuetify.display.mdAndUp"> <!-- conteúdo renderizado apenas em desktop -->
                <v-btn v-show="logado" class="rounded-pill">
                    <v-icon icon="mdi-cart-outline"></v-icon>
                    <v-menu activator="parent" width="150px">
                        <v-list>
                            <v-list-item>
                                <v-list-item-title>Meu Carrinho</v-list-item-title>
                            </v-list-item>
                        </v-list>
                        <v-divider></v-divider>
                        <v-list>
                            <v-list-item
                                v-for="(item, index) in carrinhoLista"
                                :key="index"
                                :value="index"
                            >
                                <!-- <v-list-subtitle-item>
                                    <p class="text-caption"><v-img height="40px" width="40px" :src="item.thumbnail"></v-img>{{item.titulo}} - {{filterCurrency(item.preco)}}</p>
                                </v-list-subtitle-item> -->
                            </v-list-item>
                        </v-list>
                    </v-menu>
                </v-btn>
                
                <v-divider vertical></v-divider>

                <RouterLink to="/usuario">
                    <v-btn class="ml-4 mr-6 text-none" variant="flat" color="primary" v-show="logado" elevation="6">
                        {{usuario}} &nbsp; <v-icon icon="mdi-account-circle"></v-icon>
                    </v-btn>
                </RouterLink>
                <v-btn @click="$router.push('/entrar/criarConta')" color="teal" v-show="!logado" variant="flat" class="mr-4 ml-4 text-none">Criar Conta &nbsp; <v-icon icon="mdi-account-circle"></v-icon></v-btn>
                <v-divider v-show="!logado" vertical></v-divider>
                <v-btn @click="$router.push('/entrar/fazerLogin')" color="blue" v-show="!logado" variant="flat" class="ml-4 mr-6 text-none">Entrar &nbsp; <v-icon icon="mdi-login"></v-icon></v-btn>
            </section>
            <section v-show="!$vuetify.display.mdAndUp">
                <v-divider vertical></v-divider>
                <RouterLink to="/usuario">
                    <v-btn class="ml-4 mr-6 text-none" variant="flat" color="primary" v-show="logado" elevation="6">
                        {{usuario}} &nbsp; <v-icon icon="mdi-account-circle"></v-icon>
                    </v-btn>
                </RouterLink>
                <v-btn @click="$router.push('/entrar/criarConta')" color="teal" v-show="!logado" variant="flat" class="mr-4 ml-4 text-none">Criar Conta &nbsp; <v-icon icon="mdi-account-circle"></v-icon></v-btn>
                <v-divider v-show="!logado" vertical></v-divider>
                <v-btn @click="$router.push('/entrar/fazerLogin')" color="blue" v-show="!logado" variant="flat" class="ml-4 mr-6 text-none">Entrar &nbsp; <v-icon icon="mdi-login"></v-icon></v-btn>
            </section>
        </v-app-bar>
        <v-navigation-drawer
            v-model="drawer"
            temporary
            :location="!$vuetify.display.mdAndUp ? 'top' : undefined">
            <RouterLink v-for="(item, index) in links" :key="index" :to="item.url" class="text-decoration-none text-black">
                <v-list-item link>
                    {{item.title}}
                </v-list-item>
            </RouterLink>
        </v-navigation-drawer>
        <!-- modal de pesquisa pra mobile -->
        <v-dialog v-model="dialogMobileBusca">
            <v-card text="Buscar por produtos">
                <v-text-field
                    class="px-4"
                    variant="solo"
                    append-inner-icon="mdi-magnify"
                ></v-text-field>
            </v-card>
        </v-dialog>
        <v-row>
            <v-col md="12" lg="12" sm="12" xs="12">
                <Breadcrumbs />
            </v-col>
        </v-row>
    </div>
</template>
<script>
    import filterCurrency from './../../filters'
    export default {
        data() {
            return {
                pesquisa: '',
                drawer: false,
                links: [
                    {url: '/', title: 'Home'},
                    {url: '/buscar-produtos', title: 'Buscar Produtos'},
                    {url: '/sobre', title: 'Sobre Nós'}
                ],
                logado: false,
                usuario: 'Gustavo',
                barraPesquisa: false,
                dialogMobileBusca: false,
                carrinhoLista: [{
                    titulo: 'Item 1', thumbnail: 'https://cdn.vuetifyjs.com/images/cards/docks.jpg', preco: 250.00,
                    titulo: 'Item 1', thumbnail: 'https://cdn.vuetifyjs.com/images/cards/docks.jpg', preco: 250.00
                }]
            }
        },
        methods: {
            mostraBarraPesquisa() {
                if(this.$vuetify.display.mdAndUp){
                    this.barraPesquisa = true
                    setTimeout(() => {
                        this.$refs.pesquisaTopo.focus()
                    }, 100);
                }else{
                    this.dialogMobileBusca = true
                }
            },
            filterCurrency(value){
                return filterCurrency(value)
            }
        }
    }
</script>