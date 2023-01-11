import axios from 'axios'
import middleware401 from './middleware401'

/**
 * Initialize Axios instance to call the API
 * @param {string} endpoint either 'web' or 'api' (default)
 * @returns {AxiosInstance}
 */
export const useApi = (endpoint = 'api') => {
    const {API_HOST, API_PATH} = import.meta.env

    let baseURL

    if (endpoint === 'api') {
        baseURL = API_HOST + API_PATH || 'http://wms.test/api'
    } else if (endpoint === 'web') {
        baseURL = API_HOST || 'http://wms.test'
    }

    const axiosInstance = axios.create({
        baseURL,
        headers: {
            'X-Requested-With': 'XMLHttpRequest',
            'Accept': 'application/json',
        },
        withCredentials: true,
    })

    axiosInstance.interceptors.response.use(resp => resp, middleware401)

    return axiosInstance
}
