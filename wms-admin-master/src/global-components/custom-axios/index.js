import axios from "axios";

const service = axios.create({
    baseURL:'http://wms.test/api/',
    timeout: 10000,
})

export {Custom}