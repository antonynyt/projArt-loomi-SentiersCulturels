import { router } from "@inertiajs/vue3";
import { map, pathPoints, poi, path } from "../stores/mapStore";
import { Popup } from "maplibre-gl";

// Constants
const PATH_SOURCE = "path";
const PATH_LAYER = "path";
const POI_SOURCE = "POI";
const POI_LAYER = "POI";
const POI_LABEL_LAYER = "POI-label";

// Load an image into the map
const loadImage = async (id, url) => {
    const image = await map.value.loadImage(url);
    map.value.addImage(id, image.data);
};

// Add a GeoJSON source to the map
const addGeoJSONSource = (
    sourceId,
    data,
    cluster = false,
    clusterRadius = 50
) => {
    data = JSON.parse(data);
    map.value.addSource(sourceId, {
        type: "geojson",
        data,
        cluster,
        clusterRadius,
    });
};

// Add a layer to the map
const addLayer = (layerConfig, beforeId = null) => {
    map.value.addLayer(layerConfig, beforeId);
};

// Handle click events on clusters
const handleClusterClick = async (sourceId, clusterId, coordinates) => {
    const zoom = await map.value
        .getSource(sourceId)
        .getClusterExpansionZoom(clusterId);
    map.value.easeTo({
        center: coordinates,
        zoom: zoom + 0.5,
    });
};

// Handle click events on features
const handleFeatureClick = (feature) => {
    console.info("CLICKED", feature);
    if (feature.properties.type === "path") {
        router.visit(`/map/${feature.properties.id}`, { preserveState: true });
    } else {
        const popup = new Popup()
            .setLngLat(feature.geometry.coordinates)
            .setHTML(
                `<h3 class='leading-tight bg-purple text-white'>${feature.properties.name}</h3><p><button>Détails</button></p>`
            )
            .addTo(map.value);
    }
    map.value.easeTo({
        center: feature.geometry.coordinates,
    });
};

// Add a path layer to the map
export const addPathLayer = () => {
    if (path.value) {
        addGeoJSONSource(PATH_SOURCE, path.value);
        addLayer({
            id: PATH_LAYER,
            type: "line",
            source: PATH_SOURCE,
            layout: {
                "line-join": "round",
                "line-cap": "round",
            },
            paint: {
                "line-color": "#693AF5",
                "line-width": 8,
            },
        }, POI_LABEL_LAYER);
    }
};

// Add POI layer and handle interactions
export const addPOILayer = async () => {
    if (poi.value) {
        await loadImage("poi", "/assets/icons/poi.png");
        await loadImage("poi-cluster", "/assets/icons/poi-cluster.png");
        await loadImage("path", "/assets/icons/sentier.png");
        await loadImage("path-cluster", "/assets/icons/sentier-cluster.png");

        addGeoJSONSource(POI_SOURCE, poi.value, true, 50);

        addLayer({
            id: POI_LABEL_LAYER,
            type: "symbol",
            source: POI_SOURCE,
            filter: ["!", ["has", "point_count"]],
            layout: {
                "text-field": ["get", "name"],
                "icon-padding": 0,
                "text-padding": 0,
                "text-overlap": "always",
                "icon-overlap": "always",
                "text-size": 12,
                "text-font": ["Roboto Bold", "Noto Bold"],
                "text-offset": [0, 1.8],
                "text-anchor": "top",
            },
            paint: {
                "text-color": "#5C5C5C",
                "text-halo-color": "#FFFFFF",
                "text-halo-width": 1,
            },
        });

        addLayer({
            id: POI_LAYER,
            type: "symbol",
            source: POI_SOURCE,
            layout: {
                "icon-image": [
                    "case", // conditional expression
                    ["has", "point_count"], // check if the feature has the property "point_count" (indicating it's a cluster)
                    [
                        "case", // another conditional expression within the first
                        ["==", ["get", "type"], "path"], // check if the "cluster_type" property equals "path"
                        "path-cluster", // if true, use the "path-cluster" icon
                        "poi-cluster", // if false, use the "poi-cluster" icon
                    ],
                    [
                        "match", // match expression to handle non-cluster features
                        ["get", "type"], // get the "type" property of the feature
                        "path", // if the type is "path"
                        "path", // use the "path" icon
                        "poi", // for any other type, use the "poi" icon
                    ],
                ],
                "text-field": [
                    "step",
                    ["get", "point_count"],
                    "",
                    2,
                    [
                        "step",
                        ["get", "point_count"],
                        ["get", "point_count"],
                        99,
                        "99+",
                    ],
                ],
                "text-size": 12,
                "text-font": ["Roboto Bold", "Noto Bold"],
                "text-anchor": "center",
            },
            paint: {
                "text-color": "#5C5C5C",
                "text-translate": [14, 13],
                "text-translate-anchor": "viewport",
            },
        });

        // addLayer({
        //     id: POI_LAYER,
        //     type: "symbol",
        //     source: POI_SOURCE,
        //     layout: {
        //         "icon-image": [
        //             "case", // conditional expression
        //             ["has", "point_count"], // check if the feature has the property "point_count" (indicating it's a cluster)
        //             [
        //                 "case", // another conditional expression within the first
        //                 ["==", ["get", "type"], "path"], // check if the "cluster_type" property equals "path"
        //                 "path-cluster", // if true, use the "path-cluster" icon
        //                 "poi-cluster" // if false, use the "poi-cluster" icon
        //             ],
        //             [
        //                 "match", // match expression to handle non-cluster features
        //                 ["get", "type"], // get the "type" property of the feature
        //                 "path", // if the type is "path"
        //                 "path", // use the "path" icon
        //                 "poi" // for any other type, use the "poi" icon
        //             ]
        //         ],
        //         "text-field": [
        //             "step",
        //             ["get", "point_count"],
        //             "",
        //             2,
        //             ["step", ["get", "point_count"], ["get", "point_count"], 99, "99+"],
        //         ],
        //         "text-size": 12,
        //         "text-font": ["Roboto Bold", "Noto Bold"],
        //         "text-anchor": "center",
        //     },
        //     paint: {
        //         "text-color": "#5C5C5C",
        //         "text-translate": [14, 13],
        //         "text-translate-anchor": "viewport",
        //     },
        // });

        map.value.on("click", POI_LAYER, async (e) => {
            const feature = e.features[0];
            const clusterId = feature.properties.cluster_id;

            if (clusterId) {
                await handleClusterClick(
                    POI_SOURCE,
                    clusterId,
                    feature.geometry.coordinates
                );
            } else {
                handleFeatureClick(feature);
            }
        });
    }
};
