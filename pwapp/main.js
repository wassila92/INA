'use strict';

var ajaxServer = "http://localhost/geo_quizz/public/solo/solo", uti; //je recupère le code json avec le lien
  
function getUtiInfos(providerData){
	var p = {'login':providerData.displayName,'flux':providerData.providerId};
	$.get(ajaxServer+"/uti", p,
	 function(data){
		if(data.error){
			console.log("ERREUR : "+data.error.message);
		}else{
			uti = data['uti'];
			updateListeObjet(data['nom']);
		}
	 }, "json")
	  .fail(function(r) {
		  console.log("Une erreur s'est produite :"+r);
	  });				
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