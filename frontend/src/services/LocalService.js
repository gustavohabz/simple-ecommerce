import axios from 'axios'
const BASE_URL = import.meta.env.VITE_BASE_URL

export const getUfs = () => {
    return axios.get(`${BASE_URL}/local/get-ufs`)
}

export const getCidadeByUf = (uf) => {
    return axios.get(`${BASE_URL}/local/get-cidade-by-uf/${uf}`)
}

export const getEnderecoByCep = (cep) => {
    return axios.get(`${BASE_URL}/local/get-endereco-by-cep/${cep}`)
}

export default { getUfs, getCidadeByUf, getEnderecoByCep }