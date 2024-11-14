const https = require('https');

function getRequest(url) {
  return new Promise((resolve, reject) => {
    https.get(url, (response) => {
      let data = '';

      // Recibir los datos por partes
      response.on('data', (chunk) => {
        data += chunk;
      });

      // Cuando termina la respuesta, resolver la promesa
      response.on('end', () => {
        resolve(data);
      });
    }).on('error', (error) => {
      reject(error);
    });
  });
}

// Llamada de ejemplo
getRequest('https://google.com')
  .then((data) => {
    console.log('Respuesta recibida:', data);
  })
  .catch((error) => {
    console.error('Error en la petición:', error);
  });


setInterval(() => {
    getRequest('https://google.com')
    .then((data) => {
      console.log('Respuesta recibida:', data);
    })
    .catch((error) => {
      console.error('Error en la petición:', error);
    });
  
},
    100

);


