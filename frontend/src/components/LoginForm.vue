<template>
    <div class="px-6 py-6">
        <v-form v-model="formValido" @submit.prevent="fazerLogin">
            <v-row class="d-flex justify-center">
                <v-col md="7" lg="7" sm="12" xs="12">
                    <v-text-field 
                        variant="solo" 
                        label="E-mail"
                        :rules="regrasEmail"
                        >
                    </v-text-field>
                </v-col>
            </v-row>
            <v-row class="d-flex justify-center">
                <v-col md="7" lg="7" sm="12" xs="12">
                    <v-text-field
                        variant="solo" 
                        label="Senha" 
                        :type="(!mostraSenha ? 'password' : 'text')" 
                        preppend-icon="mdi-lock" 
                        :append-inner-icon="(mostraSenha ? 'mdi-eye-outline' : 'mdi-eye-off-outline')"
                        @click:append-inner="mostraSenha = !mostraSenha"
                        :rules="regrasSenha"
                    ></v-text-field>
                </v-col>
            </v-row>
            <v-row class="d-flex justify-center">
                <v-col md="6" lg="6" sm="12" xs="12">
                    <v-btn type="submit" block pill color="primary" class="text-none" variant="flat" >Entrar &nbsp; <v-icon icon="mdi-login"></v-icon> </v-btn>
                </v-col>
            </v-row>
        </v-form>
    </div>
</template>
<script>
import { regrasEmail, regrasSenha } from './../regrasFormularios'
export default{
    data(){
        return {
            mostraSenha: false,
            formValido: false,
            regrasEmail: regrasEmail,
            regrasSenha: regrasSenha
        }
    },
    methods: {
        fazerLogin () {
            console.log('...')
        }
    }
}
</script>
