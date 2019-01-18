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

export function updateTask(userID, taskID, taskName) {
  const endpoint = `https://westminster-fashion-week-api.herokuapp.com/api/v1/users/${userID}`;

  fetch(endpoint, {
    method: 'GET',
    mode: 'cors',
    headers: {
      'Content-Type': 'application/json'
    },
    credentials: 'same-origin'
  })
    .then(function (resp) {
      return resp.json();
    })
    .then(function (data) {
      var body = data;
      body.tasks.forEach(task => {
        if (task.id === taskID) {
          if (!task.completed) {
            body.score += 10;
            task.completed = true;
          }
        }
      });

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

      console.log(body);
    });
}
