import { NavigationControl, GeolocateControl } from "maplibre-gl";

export const addControls = (map, options) => {
    if (options.controls) {
        map.value.addControl(new NavigationControl(), "top-right");
    }

    const geoLocation = new GeolocateControl({
        positionOptions: {
            enableHighAccuracy: true,
        },
        trackUserLocation: true
    });

    map.value.addControl(geoLocation, "top-right");

    if (options.flyToUserLocation) {
        setTimeout(() => {
            geoLocation.trigger();
            geoLocation.on("geolocate", function (e) {
                map.value.flyTo({
                    center: [e.coords.longitude, e.coords.latitude],
                    zoom: 10, //set zoom
                });
            });
        }, 200);
    }
};
