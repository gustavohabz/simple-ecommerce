/*
    Agregador das regras globais de validação usando o modelo do v-form do vuetify
*/
const regrasEmail = [
    value => {
        if (value) return true
        return 'E-mail é obrigatório'
    },
    value => {
        if (/.+@.+\..+/.test(value)) return true
        return 'Insira um e-mail válido'
    }
]

const regrasSenha = [
    value => {
        if (value) return true
        return 'Senha é obrigatória'
    },
    value => {
        if (value.length > 3) return true
        return 'A senha deve conter no mínimo 3 caracteres'
    }
    // inserir mais validações de senhas fortes aqui
]

export { regrasEmail, regrasSenha }