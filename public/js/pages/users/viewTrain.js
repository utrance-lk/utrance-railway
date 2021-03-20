
	mapboxgl.accessToken = 'pk.eyJ1IjoiYXNoaWthMTk5NyIsImEiOiJja2wyY2NwcHQwbmR4Mm50N2cyemFkNDU2In0.ozASrBbcCNFVS_hVqfUnVg';
    var map = new mapboxgl.Map({
    container: 'map',
    style: 'mapbox://styles/ashika1997/ckmfx043r2snj17pfe5z589em',
    
    zoom: 4
    });
     
   

    var locations=JSON.parse(document.getElementById('map').dataset.locations);
    var bounds=new mapboxgl.LngLatBounds();
   
   
   locations.forEach(function (loc){
           new mapboxgl.Marker({
               anchor:'bottom'
           }).setLngLat([loc.longitude,loc.latitude]).addTo(map);
           bounds.extend([loc.longitude,loc.latitude])
   });
   map.fitBounds(bounds, {
    padding: {
      top: 200,
      bottom: 200,
      left: 100,
      right: 100,
    },
  });
    
    