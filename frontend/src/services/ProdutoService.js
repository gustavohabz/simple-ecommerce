import axios from 'axios'
const BASE_URL = import.meta.env.VITE_BASE_URL


export const getProdutos = () => {
    return axios.get(`${BASE_URL}/produto/get-produtos`)
}

export const getProdutoDetalhe = (rotuloUnico) => {
    return axios.get(`${BASE_URL}/produto/get-produto-detalhe/${rotuloUnico}`)
}

export default { getProdutos, getProdutoDetalhe }