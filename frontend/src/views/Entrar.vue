<template>
    <div>
        <v-row class="d-flex justify-center">
            <v-col md="7" lg="7" sm="8" xs="12">
                <v-card>
                    <v-tabs
                        v-model="aba"
                        color="amber"
                    >
                        <v-tab value="1">Entrar</v-tab>
                        <v-tab value="2">Criar Conta</v-tab>
                    </v-tabs>
                    <v-tabs-window v-model="aba">
                        <v-tabs-window-item value="1">
                            <LoginForm />
                        </v-tabs-window-item>
                        <v-tabs-window-item value="2">
                            <CadastroForm />
                        </v-tabs-window-item>
                    </v-tabs-window>
                </v-card>
            </v-col>
        </v-row>
    </div>
</template>
<script>
export default{
    mounted(){
        if(this.$route.params.acao == 'fazerLogin'){
            this.aba = '1'
        }else{
            this.aba = '2'
        }
    },
    data() {
        return {
            aba: '1'
        }
    }
}
</script>
