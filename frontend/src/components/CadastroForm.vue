<template>
    <div class="px-6 py-6">
        <v-form v-model="formValido" @submit.prevent="criarConta">
            <v-stepper :items="stepper" elevation="0" complete-icon="mdi-close" next-text="Próximo" prev-text="Voltar" :non-linear="true" theme="amber">
                <template v-slot:item.1>
                    <v-row class="d-flex justify-center"> <!-- nome e sobrenome -->
                        <v-col md="6" lg="6" sm="12" xs="12">
                            <v-text-field 
                                variant="solo" 
                                label="Nome"
                                v-model="usuarioNome"
                                @input="setUsuarioNome()"
                                >
                            </v-text-field>
                        </v-col>
                        <v-col md="6" lg="6" sm="12" xs="12">
                            <v-text-field 
                                variant="solo" 
                                label="Sobrenome"
                                v-model="usuarioSobrenome"
                                @input="setUsuarioNome()"
                                >
                            </v-text-field>
                        </v-col>
                    </v-row>
                    <v-row> <!-- data de nascimento -->
                        <v-col md="6" lg="6" sm="12" xs="12">
                            <v-text-field 
                                variant="solo" 
                                label="Data de Nascimento"
                                v-model="usuario.data_nascimento"
                                placeholder="01/04/1992"
                                maxlength="10"
                                >
                            </v-text-field>
                        </v-col>
                    </v-row>
                    <v-row> <!-- e-mail e telefone -->
                        <v-col md="7" lg="7" sm="12" xs="12">
                            <v-text-field 
                                variant="solo" 
                                label="E-mail"
                                v-model="usuario.email"
                                placeholder="contato@gmail.com"
                                >
                            </v-text-field>
                        </v-col>
                        <v-col md="5" lg="5" sm="12" xs="12">
                            <v-text-field 
                                variant="solo" 
                                label="Telefone"
                                v-model="usuario.telefone"
                                maxlength="15"
                                placeholder="(47) 91111-1111"
                                >
                            </v-text-field>
                        </v-col>
                    </v-row>
                    <v-row> <!-- senha -->
                        <v-col md="6" lg="6" sm="12" xs="12">
                            <v-text-field
                                variant="solo" 
                                label="Senha" 
                                :type="(!mostraSenha ? 'password' : 'text')" 
                                preppend-icon="mdi-lock" 
                                :append-inner-icon="(mostraSenha ? 'mdi-eye-outline' : 'mdi-eye-off-outline')"
                                @click:append-inner="mostraSenha = !mostraSenha"
                                v-model="senha"
                            ></v-text-field>
                        </v-col>
                    </v-row>
                    <v-row> <!-- repete senha -->
                        <v-col md="6" lg="6" sm="12" xs="12">
                            <v-text-field
                                variant="solo" 
                                label="Repetir Senha" 
                                :type="(!mostraSenhaRepete ? 'password' : 'text')" 
                                preppend-icon="mdi-lock" 
                                :append-inner-icon="(mostraSenhaRepete ? 'mdi-eye-outline' : 'mdi-eye-off-outline')"
                                @click:append-inner="mostraSenhaRepete = !mostraSenhaRepete"
                                v-model="senhaRepete"
                            ></v-text-field>
                        </v-col>
                    </v-row>
                </template>
                <template v-slot:item.2>
                    <v-row> <!-- cep e logradouro -->
                        <v-col md="7" lg="7" sm="12" xs="12">
                            <v-text-field 
                                variant="solo" 
                                label="CEP"
                                v-model="usuario.cep_pessoal"
                                @blur="consultaCep"
                                :mask="'##-##'"
                                placeholder="00000-000"
                                maxlength="9"
                                >
                            </v-text-field>
                        </v-col>
                        <v-col md="5" lg="5" sm="12" xs="12">
                            <v-text-field 
                                variant="solo" 
                                label="Endereço"
                                v-model="usuario.logradouro_pessoal"
                                placeholder="Rua Presidente Prudente, 152"
                                >
                            </v-text-field>
                        </v-col>
                    </v-row>
                    <v-row> <!-- UF e Cidade -->
                        <v-col md="3" lg="3" sm="6" xs="6">
                            <v-autocomplete
                                v-model="usuario.uf_pessoal"
                                :loading="loadingUfs"
                                :items="ufs"
                                item-value="sigla"
                                item-title="sigla"
                                label="UF"
                                maxlength="2"
                                @update:modelValue="getCidades"
                                no-data-text="Nenhuma UF encontrada."
                                :append-inner-icon="(usuario.uf_pessoal ? 'mdi-close' : '')"
                                @click:append-inner="usuario.uf_pessoal = null; usuario.cidade_pessoal = null"
                                >
                            </v-autocomplete>
                        </v-col>
                        <v-col md="7" lg="7" sm="6" xs="6">
                            <v-autocomplete
                                v-model="usuario.cidade_pessoal"
                                :items="cidades"
                                label="Cidade"
                                item-value="nome"
                                item-title="nome"
                                :loading="loadingCidades"
                                no-data-text="Nenhuma cidade encontrada."
                                :disabled="!usuario.uf_pessoal"
                                :append-inner-icon="(usuario.cidade_pessoal ? 'mdi-close' : '')"
                                @click:append-inner="usuario.cidade_pessoal = null"
                                >
                            </v-autocomplete>
                        </v-col>
                    </v-row>
                    <v-row> <!-- Bairro e complemeto -->
                        <v-col md="6" lg="6" sm="12" xs="12">
                            <v-text-field 
                                variant="solo" 
                                label="Bairro"
                                placeholder="Atiradores"
                                v-model="usuario.bairro_pessoal"
                                >
                            </v-text-field>
                        </v-col>
                        <v-col md="6" lg="6" sm="12" xs="12">
                            <v-text-field 
                                variant="solo" 
                                label="Complemento"
                                v-model="usuario.complemento_pessoal"
                                placeholder="Apartamento 101-B"
                                >
                            </v-text-field>
                        </v-col>
                    </v-row>
                </template>
                <template v-slot:item.3>
                    Feito!
                </template>
            </v-stepper>
        </v-form>
    </div>
</template>
<script>
import LocalService from '../services/LocalService';
export default {
    mounted() {
        this.getUfs()
    },
    data() {
        return{
            formValido: false,
            usuarioNome: '',
            usuarioSobrenome: '',
            usuario: {
                nome: '',
                data_nascimento: '',
                email: '',
                telefone: '',
                logradouro_pessoal: '',
                cep_pessoal: '',
                uf_pessoal: '',
                cidade_pessoal: '',
                bairro_pessoal: '',
                logradouro_pessoal: '',
                senha: ''
            },
            stepper: ['Informações Pessoais e de Contato', 'Endereço', 'OK'],
            ufs: [],
            ufSelecionada: {},
            cidades: [],
            senha: '',
            senhaRepete: '',
            mostraSenhaRepete: false,
            mostraSenha: false,
            loadingUfs: false,
            loadingCidades: false,
            loading: false
        }
    },
    methods: {
        criarConta() {
            console.log('conta')
        },
        setUsuarioNome() {
            this.usuario.nome = this.usuarioNome + ' ' + this.usuarioSobrenome
        },
        async getUfs() {
            this.loadingUfs = true
            const response = await LocalService.getUfs()
            this.ufs = response.data
            this.loadingUfs = false
        },
        async getCidades(){
            this.loadingCidades = true
            const response = await LocalService.getCidadeByUf(this.usuario.uf_pessoal)
            this.cidades = response.data
            this.loadingCidades = false
        },
        async consultaCep(){
            this.loading = true
            const response = await LocalService.getEnderecoByCep(this.usuario.cep_pessoal)
            this.usuario.cidade_pessoal = response.data.localidade
            this.usuario.logradouro_pessoal = response.data.logradouro
            this.usuario.uf_pessoal = response.data.uf
            this.usuario.bairro_pessoal = response.data.bairro
            this.usuario.complemento_pessoal = response.data.complemento
            this.getUfs()
            this.getCidades()
            this.loading = false
        }
    }
}
</script>