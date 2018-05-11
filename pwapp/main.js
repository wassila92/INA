'use strict';

var ajaxServer = "http://localhost/geo_quizz/public/solo/solo"; //je recupère le code json avec le lien
  
function getMenuTheme(){
	
	$.get(ajaxServer,
	 function(data){
		if(data.error){
			console.log("ERREUR : "+data.error.message);
		}else{
			updateListeObjet(data['nom']);
		}
	 }, "json");
}

function updateListeObjet(objets){
	//var dd = d3.select("#nbddSourcesListe").selectAll("div").data(objets);
	var dd = d3.select(".vertical-menu").selectAll(".ajout dropdown-item").data(objets);

    dd.enter().append("a")
        .attr('id',function(d, i){
        	return 'nbddObj'+d.doc_id
        	})
		.attr('class','ajout dropdown-item ')
		.style('cursor','pointer')
		.text(function(d, i){
        	return d.titre
    	})
    	.on("click",getSource)
    if(objets.length)getSource(objets[0]);
    else $('#modalWait').modal('hide');
}







function initMap() {
  var map = new google.maps.Map(document.getElementById('map'), {
    center: {lat: -34.397, lng: 150.644},
    zoom: 6
  });
  var infoWindow = new google.maps.InfoWindow({map: map});

  // Try HTML5 geolocation.
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position) {
      var pos = {
        lat: position.coords.latitude,
        lng: position.coords.longitude
      };

      infoWindow.setPosition(pos);
      infoWindow.setContent('Location found.');
      map.setCenter(pos);
    }, function() {
      handleLocationError(true, infoWindow, map.getCenter());
    });
  } else {
    // Browser doesn't support Geolocation
    handleLocationError(false, infoWindow, map.getCenter());
  }
}

function handleLocationError(browserHasGeolocation, infoWindow, pos) {
  infoWindow.setPosition(pos);
  infoWindow.setContent(browserHasGeolocation ?
                        'Error: The Geolocation service failed.' :
                        'Error: Your browser doesn\'t support geolocation.');
}