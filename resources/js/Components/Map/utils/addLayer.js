export const addPathLayer = (map, path) => {
    if (path.value) {
        map.value.addSource("path", {
            type: "geojson",
            data: path.value,
        });

        map.value.addLayer(
            {
                id: "path",
                type: "line",
                source: "path",
                layout: {
                    "line-join": "round",
                    "line-cap": "round",
                },
                paint: {
                    "line-color": "#693AF5",
                    "line-width": 8,
                },
            },
            "point-label"
        );
    }
};

export const addPathPointLayer = async (map, pathPoints, path, poi) => {
    const sentierCluster = await map.value.loadImage(
        "/assets/icons/sentier-cluster.png"
    );
    map.value.addImage("sentier-cluster", sentierCluster.data);

    const sentier = await map.value.loadImage("/assets/icons/sentier.png");
    map.value.addImage("sentier", sentier.data);

    map.value.addSource("pathPoints", {
        type: "geojson",
        data: pathPoints.value,
        cluster: true,
        clusterRadius: 50,
    });

    map.value.addLayer({
        id: "point-label",
        type: "symbol",
        source: "pathPoints",
        filter: ["!", ["has", "point_count"]],
        layout: {
            "text-field": ["get", "Name"], //TODO: changer le champ en fonction de la DB
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

    map.value.addLayer({
        id: "pathPoint",
        type: "symbol",
        source: "pathPoints",
        layout: {
            "icon-image": [
                "case",
                ["has", "point_count"],
                "sentier-cluster",
                "sentier",
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

    map.value.on("click", "pathPoint", async (e) => {
        const feature = e.features[0];
        const clusterId = feature.properties.cluster_id;
        if (clusterId) {
            const zoom = await map.value
                .getSource("pathPoints")
                .getClusterExpansionZoom(clusterId);
            map.value.easeTo({
                center: feature.geometry.coordinates,
                zoom: zoom + 0.5,
            });
        } else {
            console.log(feature.properties.Name);
            console.log(feature.properties.poi);

            //EMIT EVENT ????
            path.value = feature.properties.path;
            poi.value = feature.properties.poi;
            // addPOILayer(map, feature.properties.poi, path);
            // Inertia.visit(`/sentiers/2`, { preserveState: true });
        }
    });
};

export const addPOILayer = async (map, poi, path) => {
    if (poi.value) {
        const sentierCluster = await map.value.loadImage(
            "/assets/icons/sentier-cluster.png"
        );
        map.value.addImage("poi-cluster", sentierCluster.data);

        const sentier = await map.value.loadImage("/assets/icons/sentier.png");
        map.value.addImage("poi", sentier.data);

        map.value.addSource("POI", {
            type: "geojson",
            data: poi.value,
            cluster: true,
            clusterRadius: 50,
        });

        map.value.addLayer({
            id: "POI-label",
            type: "symbol",
            source: "POI",
            filter: ["!", ["has", "point_count"]],
            layout: {
                "text-field": ["get", "Name"], //TODO: changer le champ en fonction de la DB
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

        map.value.addLayer({
            id: "POI",
            type: "symbol",
            source: "POI",
            layout: {
                "icon-image": [
                    "case",
                    ["has", "point_count"],
                    "poi-cluster",
                    "poi",
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

        // map.value.on("click", "pathPoint", async (e) => {
        //     const feature = e.features[0];
        //     const clusterId = feature.properties.cluster_id;
        //     if (clusterId) {
        //         const zoom = await map.value.getSource("pathPoints").getClusterExpansionZoom(clusterId);
        //         map.value.easeTo({
        //             center: feature.geometry.coordinates,
        //             zoom: zoom + 0.5,
        //         });
        //     } else {
        //         console.log(feature.properties.Name);
        //         console.log(feature.properties.poi);
        //         path.value = feature.properties.path;
        //         poi.value = feature.properties.poi;
        //     }
        // });
    }
};
