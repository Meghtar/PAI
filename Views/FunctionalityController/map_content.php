<?php
    require_once __DIR__.'/../../Repository/PostRepository.php';
    require_once __DIR__.'/../../Repository/UserRepository.php';
    require_once __DIR__.'/../../Repository/CityRepository.php';
    require_once __DIR__.'/../../Repository/LocationRepository.php';

    $userRepository = new UserRepository();
    $cityRepository = new CityRepository();
    $postRepository = new PostRepository();
    $locationRepository = new LocationRepository();

    $city_id = $userRepository->getUserByEmail($_SESSION['email'])->getDefaultCity();
    $location_id = $cityRepository->getLocationByCityId($city_id);

    $location_gps = $locationRepository->getLocationGPSById($location_id);

    $posts = $postRepository->getAllPostsFromCity($location_id);
?>
<div id="map">
    <script>
    var map = L.map("map").setView([<?= $location_gps ?>], 15);

    L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    map.on("contextmenu", function (event) {
    console.log("user right-clicked on map coordinates: " + event.latlng.toString());
    var url = '/?page=add_post';
    var form = $('<form action="' + url + '" method="post">' +
    '<input type="text" name="position" value="' + event.latlng + '" />' +
    '</form>');
    $('body').append(form);
    form.submit();
    });


    <?php foreach($posts as $post) {

    echo "
            L.marker([".$locationRepository->getLocationGPSById($post->getLocalization())."]).addTo(map).bindPopup(\"".$post->getTitle()."\");
         ";

    } ?>
    </script>
</div>