import * as request from 'axios'

const axios = request.create({
  baseURL: Builder.basePath + '/api',
  timeout: 10000
})

axios.interceptors.request.use(
  config => {
    config.headers['X-Requested-With'] = 'XMLHttpRequest'

    let token = document.head.querySelector('meta[name="csrf-token"]');
    if (token) {
      config.headers['X-CSRF-TOKEN'] = token.content;
    }

    return config
  },
  error => {
    return Promise.reject(error)
  }
)

axios.interceptors.response.use(
  response => {
    return response.data
  },
  error => {
    if (!error['response']) {
      return Promise.reject(error)
    }

    switch (error.response.status) {
      case 401:
        console.info(401, error)
        break;
      case 422: {
        console.info(422, error)
        break;
      }
      default:
        console.info(error)
        break;
    }

    return Promise.reject(error.response)
  }
)

export default axios
