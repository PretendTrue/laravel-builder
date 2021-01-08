import axios from "../plugins/axios";

export function store(params) {
  return axios.post('scaffold', params);
}
