import mapboxgl from "mapbox-gl";
import React, { useEffect, useRef, useState } from "react";
import ReactDOM from "react-dom";
import "mapbox-gl/dist/mapbox-gl.css";

mapboxgl.accessToken =
    "pk.eyJ1Ijoia2FsdWpqYSIsImEiOiJjbGpyNGFhbzQwMGU2M2VvaDNubjFhNnppIn0.mpz17Jy5Eue59jCM-ReiZQ";

const Marker = ({ onClick, children, fpo }) => {
    const _onClick = () => {
        onClick(fpo.fpo_name);
    };

    return (
        <button
            title={fpo?.fpo_name}
            //onClick={_onClick}
            className="text-secondary rounded-full bg-transparent p-1 text-center no-underline inline-block"
        >
            {children}
        </button>
    );
};

const Map = ({ fpoData }) => {
    const mapContainerRef = useRef(null);
    const [lng, setLng] = useState(32.5457);
    const [lat, setLat] = useState(1.3316);
    const [zoom, setZoom] = useState(6.2);

    // Initialize map when component mounts
    useEffect(() => {
        const map = new mapboxgl.Map({
            container: mapContainerRef.current,
            style: "mapbox://styles/mapbox/streets-v11",
            center: [lng, lat],
            zoom: zoom,
        });

        // Render custom marker components
        fpoData?.forEach((fpo) => {
            if (!fpo?.fpo_cordinates) return;
            let coordinates = fpo.fpo_cordinates
                ?.split(",")
                ?.map((coordinate) => parseFloat(coordinate));
            let latitude = coordinates[0];
            let longitude = coordinates[1];
            if (isNaN(longitude)) return;
            if (isNaN(latitude)) return;
            // Create a React ref
            const ref = React.createRef();
            // Create a new DOM node and save it to the React ref
            ref.current = document.createElement("div");
            // Render a Marker Component on our new DOM node
            ReactDOM.render(
                <Marker onClick={markerClicked} fpo={fpo}>
                    <svg
                    className="w-4 h-4"
                        fill="none"
                        stroke="currentColor"
                        strokeWidth={1.5}
                        viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg"
                        aria-hidden="true"
                    >
                        <path
                            strokeLinecap="round"
                            strokeLinejoin="round"
                            d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z"
                        />
                        <path
                            strokeLinecap="round"
                            strokeLinejoin="round"
                            d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z"
                        />
                    </svg>
                </Marker>,
                ref.current
            );

            // Create a Mapbox Marker at our new DOM node
            new mapboxgl.Marker(ref.current)
                .setLngLat([longitude, latitude])
                .addTo(map);
        });

        // Add navigation control (the +/- zoom buttons)
        map.addControl(new mapboxgl.NavigationControl(), "top-right");

        // Clean up on unmount
        return () => map.remove();
    }, []);

    const markerClicked = (title) => {
        window.alert(title);
    };

    return <div className=" h-full w-full relative" ref={mapContainerRef} />;
};

export default Map;
