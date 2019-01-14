export function favourite(currentStatus, type, id) {
  const endpoint = `https://westminster-fashion-week-api.herokuapp.com/api/v1/${type}/${id}`;

  const body = {
    favourited: currentStatus ? 'false' : 'true'
  };
  fetch(endpoint, {
    method: 'PATCH',
    mode: 'cors',
    body: JSON.stringify(body),
    headers: {
      'Content-Type': 'application/json'
    },
    credentials: 'same-origin'
  }).then(
    response => {
      console.log(response);
    },
    error => {
      console.log(error);
    }
  );
}
