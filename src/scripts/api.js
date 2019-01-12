const BASE_API = 'https://westminster-fashion-week-api.herokuapp.com/api/v1/';

const API_ENDPOINTS = {
  events: `${BASE_API}/events`
};

export function favourite(currentStatus, type, id) {
  const endpoint = `https://westminster-fashion-week-api.herokuapp.com/api/v1/events/${id}`;

  const body = {
    favourited: currentStatus ? 'false' : 'true'
  };
  fetch(endpoint, {
    method: 'PATCH',
    body: JSON.stringify(body),
    headers: {
      'Content-Type': 'application/json'
    },
    credentials: 'same-origin'
  }).then(
    function (response) {
      response.status; //= > number 100–599
      response.statusText; //= > String
      response.headers; //= > Headers
      response.url; //= > String

      return response.text();
    },
    function (error) {
      error.message; //= > String
    }
  );
}
