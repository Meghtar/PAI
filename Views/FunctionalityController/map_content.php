<!--<script src="https://cdn.jsdelivr.net/gh/openlayers/openlayers.github.io@master/en/v6.1.1/build/ol.js"></script>
<div id="map" class="map"></div>
<script src="../Public/js/map.js"></script>-->

<div id="mapid" style=" height: 100%;">
    <script>
        var mymap = L.map('mapid').setView([51.505, -0.09], 13);
        L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        maxZoom: 18,
        id: 'mapbox/streets-v11',
        accessToken: 'pk.eyJ1IjoibWVnaHRhciIsImEiOiJjazVsaGltNzAwbXZzM25vNGV1MWtvcmdtIn0.jkW9voRhWkHhryyT6C36Fg'
        }).addTo(mymap);
    </script>
</div>