const axios = require('axios');

axios.defaults.baseURL = 'http://localhost:4001';
axios.defaults.headers.post['Content-Type'] ='application/json';
axios.defaults.headers.post['Access-Control-Allow-Origin'] = '*';

const get = (user = "") => {
  return axios.get(`/user${user ? '/' : ""}${user}`)
  .then(function (response) {
	return response;
  }).catch(function (error) {
	return error;
  });
}

const remove = (user) => {
  return axios.get(`/user/delete/${user}`)
  .then(function (response) {
	return response;
  }).catch(function (error) {
	return error;
  });
}

const add = (user) => {
  return axios.post(`/user/create`, user)
  .then(function (response) {
	return response;
  }).catch(function (error) {
	return error;
  });
}

const update = (user) => {
  return axios.post(`/user/update`, user)
  .then(function (response) {
	return response;
  }).catch(function (error) {
	return error;
  });
}

export default {
    get,
    add,
    update,
    remove
}

