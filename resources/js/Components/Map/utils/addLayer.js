import { router } from "@inertiajs/vue3";
import { map, pathPoints, poi, path, selectedPoi } from "../stores/mapStore";
import { Popup } from "maplibre-gl";

// Constants
const PATH_SOURCE = "path";
const PATH_LAYER = "path";
const POI_SOURCE = "POI";
const POI_LAYER = "POI";
const POI_CLUSTER_LAYER = "POI-cluster";
const POI_LABEL_LAYER = "POI-label";
const POI_SELECTION_SOURCE = "POI-selection-source";
const POI_SELECTION_LAYER = "POI-selection";

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
        clusterProperties: {
            only_path: ["all", ["==", ["get", "type"], "path"], "false"],
            only_poi: ["all", ["==", ["get", "type"], "poi"], "false"],
        },
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
        const popup = new Popup({offset: 25})
            .setLngLat(feature.geometry.coordinates)
            .setHTML(
                `<h3 class='leading-tight bg-purple text-white'>
                    ${feature.properties.name}
                </h3>
                <p>
                    ${feature.properties.description}
                </p>
                <div class="mb-3"><a class="px-4 py-2 outline outline-1 outline-gray-200 rounded-full font-medium" href="/poi/${feature.properties.id}">Plus d'infos</a></div>`
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
        addLayer(
            {
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
            },
            POI_LABEL_LAYER
        );
    }
};

// Add POI layer and handle interactions
export const addPOILayer = async (color = "purple", preventClickEvent = false) => {
    if (poi.value) {
        if(color === "purple"){
            await loadImage("poi", "/assets/icons/poi-purple.png");
            await loadImage("poi-cluster", "/assets/icons/poi-cluster-purple.png");
        } else if (color === "green"){
            await loadImage("poi", "/assets/icons/poi-green.png");
            await loadImage("poi-cluster", "/assets/icons/poi-cluster-green.png");
        }
        await loadImage("path", "/assets/icons/sentier.png");
        await loadImage("path-cluster", "/assets/icons/sentier-cluster.png");

        //to know if we are in the path page or not
        //poi are displayed only when the path is not empty
        if (!path.value) {
            const paths = JSON.stringify(
                {
                    type: "FeatureCollection",
                    features: JSON.parse(poi.value).features.filter((feature) => feature.properties.type === "path"),
                }
            );

            addGeoJSONSource(POI_SOURCE, paths, true, 50);
        }else{
            addGeoJSONSource(POI_SOURCE, poi.value, true, 50);
        }

        // Add POI label layer
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
                "icon-overlap": "cooperative",
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

        // Add POI layer unclustered
        addLayer({
            id: POI_LAYER,
            type: "symbol",
            source: POI_SOURCE,
            filter: ["!", ["has", "point_count"]],
            layout: {
                "icon-image": ["get", "type"],
                "icon-allow-overlap": true,
            },
        });

        // Add POI layer clustered
        addLayer({
            id: POI_CLUSTER_LAYER,
            type: "symbol",
            source: POI_SOURCE,
            filter: ["has", "point_count"],
            layout: {
                "icon-image": [
                    "case",
                    ["get", "only_path"],
                    "path-cluster",
                    "poi-cluster",
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

        if(!preventClickEvent){
            // Handle click events on POI layers
            map.value.on("click", POI_LAYER, async (e) => {
                const feature = e.features[0];
                handleFeatureClick(feature);
            });

            // Handle click events on POI clusters
            map.value.on("click", POI_CLUSTER_LAYER, async (e) => {
                const feature = e.features[0];
                const clusterId = feature.properties.cluster_id;
                await handleClusterClick(
                    POI_SOURCE,
                    clusterId,
                    feature.geometry.coordinates
                );
            });
        }
    }
};

export const addSelectionPOILayer = async () => {

    await loadImage("poi-purple", "/assets/icons/poi-purple.png");

    if(selectedPoi.value){
        addGeoJSONSource(POI_SELECTION_SOURCE, selectedPoi.value);
    } else {
        addGeoJSONSource(POI_SELECTION_SOURCE, JSON.stringify({
            type: "FeatureCollection",
            features: []
        }));
    }

    // Ajouter la couche de POI verts
    addLayer({
        id: POI_SELECTION_LAYER,
        type: "symbol",
        source: POI_SELECTION_SOURCE,
        layout: {
            "icon-image": "poi-purple",
            "icon-allow-overlap": true,
        },
    });

    // Gérer les événements de clic sur la couche de POI verts
    map.value.on("click", (e) => {
        const coordinates = e.lngLat;
        const geojson = createPoiGeoJSON(coordinates.lat, coordinates.lng);
        map.value.getSource(POI_SELECTION_SOURCE).setData(geojson);
        selectedPoi.value = JSON.stringify(geojson);
        map.value.easeTo({
            center: coordinates,
        });
    });
};

export const createPoiGeoJSON = (lat, long, properties = null) => {
    return {
        type: "FeatureCollection",
        features: [{
            type: "Feature",
            geometry: {
                type: "Point",
                coordinates: [long, lat]
            },
            properties: {} // Vous pouvez ajouter d'autres propriétés si nécessaire
        }]
    };
}
