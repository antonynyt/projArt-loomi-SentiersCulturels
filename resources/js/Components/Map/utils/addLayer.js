// Constants
const PATH_SOURCE = "path";
const PATH_LAYER = "path";
const PATH_POINTS_SOURCE = "pathPoints";
const PATH_POINT_LAYER = "pathPoint";
const PATH_POINT_LABEL_LAYER = "point-label";
const POI_SOURCE = "POI";
const POI_LAYER = "POI";
const POI_LABEL_LAYER = "POI-label";

// load an image into the map
const loadImage = async (map, id, url) => {
    const image = await map.value.loadImage(url);
    map.value.addImage(id, image.data);
};

// add a GeoJSON source to the map
const addGeoJSONSource = (map, sourceId, data, cluster = false, clusterRadius = 50) => {
    map.value.addSource(sourceId, {
        type: "geojson",
        data,
        cluster,
        clusterRadius,
    });
};

// add a layer to the map
const addLayer = (map, layerConfig, beforeId = null) => {
    map.value.addLayer(layerConfig, beforeId);
};

// handle click events on clusters
const handleClusterClick = async (map, sourceId, clusterId, coordinates) => {
    const zoom = await map.value.getSource(sourceId).getClusterExpansionZoom(clusterId);
    map.value.easeTo({
        center: coordinates,
        zoom: zoom + 0.5,
    });
};

// handle click events on features
const handleFeatureClick = (feature, path, poi) => {
    // console.info("CLICKED", feature)
    if (path && poi) {
        path.value = feature.properties.path;
        poi.value = feature.properties.poi;
    }
    //add to hash
    window.location.hash = feature.properties.Name;
    

};

// add a path layer to the map
export const addPathLayer = (map, path) => {
    if (path.value) {
        addGeoJSONSource(map, PATH_SOURCE, path.value);
        addLayer(map, {
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
        }, PATH_POINT_LABEL_LAYER);
    }
};

// add path points layer and handle interactions
export const addPathPointLayer = async (map, pathPoints, path, poi) => {
    await loadImage(map, "sentier-cluster", "/assets/icons/sentier-cluster.png");
    await loadImage(map, "sentier", "/assets/icons/sentier.png");

    addGeoJSONSource(map, PATH_POINTS_SOURCE, pathPoints.value, true, 50);

    addLayer(map, {
        id: PATH_POINT_LABEL_LAYER,
        type: "symbol",
        source: PATH_POINTS_SOURCE,
        filter: ["!", ["has", "point_count"]],
        layout: {
            "text-field": ["get", "Name"], // TODO: Update field name as in DB GEOJSON
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

    addLayer(map, {
        id: PATH_POINT_LAYER,
        type: "symbol",
        source: PATH_POINTS_SOURCE,
        layout: {
            "icon-image": ["case", ["has", "point_count"], "sentier-cluster", "sentier"],
            "text-field": [
                "step",
                ["get", "point_count"],
                "",
                2,
                ["step", ["get", "point_count"], ["get", "point_count"], 99, "99+"],
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

    map.value.on("click", PATH_POINT_LAYER, async (e) => {
        const feature = e.features[0];
        const clusterId = feature.properties.cluster_id;

        if (clusterId) {
            await handleClusterClick(map, PATH_POINTS_SOURCE, clusterId, feature.geometry.coordinates);
        } else {
            handleFeatureClick(feature, path, poi);
        }
    });
};

// add POI layer and handle interactions
export const addPOILayer = async (map, poi, path) => {
    if (poi.value) {
        await loadImage(map, "poi-cluster", "/assets/icons/sentier-cluster.png");
        await loadImage(map, "poi", "/assets/icons/sentier.png");

        addGeoJSONSource(map, POI_SOURCE, poi.value, true, 50);

        addLayer(map, {
            id: POI_LABEL_LAYER,
            type: "symbol",
            source: POI_SOURCE,
            filter: ["!", ["has", "point_count"]],
            layout: {
                "text-field": ["get", "Name"], // TODO: Update field name as in DB GEOJSON
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

        addLayer(map, {
            id: POI_LAYER,
            type: "symbol",
            source: POI_SOURCE,
            layout: {
                "icon-image": ["case", ["has", "point_count"], "poi-cluster", "poi"],
                "text-field": [
                    "step",
                    ["get", "point_count"],
                    "",
                    2,
                    ["step", ["get", "point_count"], ["get", "point_count"], 99, "99+"],
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

        map.value.on("click", POI_LAYER, async (e) => {
            const feature = e.features[0];
            const clusterId = feature.properties.cluster_id;
    
            if (clusterId) {
                await handleClusterClick(map, POI_SOURCE, clusterId, feature.geometry.coordinates);
            } else {
                handleFeatureClick(feature);
            }
        });
    }
};
