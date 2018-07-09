import Axios from 'axios';
const hostname = window.location.hostname
const scheme = window.location.scheme || 'http'
const api = Axios.create({
    baseURL: process.env.APP_URL + '/api/'
})
export default api;