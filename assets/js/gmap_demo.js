

let map;

async function initMap() {
    alert("Try typing 'Hotels near me' and hit enter");
    document.getElementById("gmap-search").style.display = "block";
    const { Map } = await google.maps.importLibrary("maps");
    map = new Map(document.getElementById("map"), {
        center: {lat: 30.266666, lng: -97.733330},
        zoom: 14,
    });
    let markers = [];
    const input = document.getElementById("gmap-search");
    const searchBox = new google.maps.places.SearchBox(input);
    // $('#gmap-search').val("Austin Landmarks");
    window.sb = searchBox;
    let results_container = document.getElementById("results");
    searchBox.addListener("places_changed", () => {
        $(results_container).empty();
        const places = searchBox.getPlaces();
        const bounds = new google.maps.LatLngBounds();
        markers.forEach((marker) => {
            marker.setMap(null);
        });
        markers = [];
        if (places.length > 0) {
            results_container.style.display = "block";
            places.forEach(place => {
                console.log(place)
                if (!place.geometry || !place.geometry.location) {
                    return;
                } else {
                    const icon = {
                        url: place.icon,
                        size: new google.maps.Size(100, 100),
                        origin: new google.maps.Point(0, 0),
                        anchor: new google.maps.Point(17, 34),
                        scaledSize: new google.maps.Size(25, 25),
                    };

                    let place_row = document.createElement("div");
                    place_row.className = "place-row";

                    let address = document.createElement("span");
                    address.className = "place-address";
                    address.innerText = place.name;

                    place_row.appendChild(address);
                    results_container.appendChild(place_row);

                    place_row.onclick = function() {
                        $('#place-modal').modal('show');
                        $('#place-name').text(place.name)
                        $("#address").text(place.formatted_address);
                        $("#status").text(place.business_status);
                        $("#num-user-ratings").text(place.user_ratings_total);
                    }

                    markers.push(
                        new google.maps.Marker({
                            map,
                            icon,
                            title: place.name,
                            position: place.geometry.location,
                        })
                    );
                    if (place.geometry.viewport) {
                        // Only geocodes have viewport.
                        bounds.union(place.geometry.viewport);
                    } else {
                        bounds.extend(place.geometry.location);
                    }
                }
            })
            map.fitBounds(bounds);

        } else {
            results_container.style.display = "none";
        }
    });
}


