function ejecutarAJAX() {
  var ajaxRequest;
  // Identificar el tipo de navegador web para crear el objeto XMLHttpRequest en caso de navegadores modernos.
  if (window.XMLHttpRequest) { // Chrome, Firefox, Internet Explorer 7 +, Edge, Safari, Opera.
    // XMLHttpRequest se utiliza para intercambiar datos con un servidor en segundo plano.
    ajaxRequest = new XMLHttpRequest();
  } else { //En caso de que sea un navegador antiguo usar el objeto ActiveXObject.
    // Las versiones antiguas de Internet Explorer (IE5 e IE6) utilizan un objeto ActiveX en lugar del objeto XMLHttpRequest.
    ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
  }
  //valor de ajaxRequest.readyState
  // 0 Peticion no ha sido inicializada
  // 1 Peticion ha sido establecida
  // 2 Peticion ha sido enviada
  // 3 Peticion esta siendo procesada
  // 4 Peticion ha sido finalizada
  // ajaxRequest.status ==200 ha sido exitosa

  /* Especificar que pasara despues de recibir la respuesta del servidor a la peticion enviada.
   *onreadystatechange se va encargar de procesar la respuesta enviada por el servidor*/
  ajaxRequest.onreadystatechange = function() {
    /*si la peticion ha sido finalizada y exitosa entonces procesa la respuesta.*/
    if (ajaxRequest.readyState === 4 && ajaxRequest.status === 200) {
      //responseText retorna los datos de respuesta como un string.
      document.getElementById("info").innerHTML = ajaxRequest.responseText;
    }
  }

  /*Después de especificar qué pasará al recibir la respuesta es necesario hacer la petición.
   *open(method, url, async) especifica el tipo de peticion.
   *send() envia la peticion al servidor.
   *true significa que la peticion sera asincrona (la pantalla no sera recargada)*/
  ajaxRequest.open("GET", "mensaje.txt", true);
  ajaxRequest.send();

}
