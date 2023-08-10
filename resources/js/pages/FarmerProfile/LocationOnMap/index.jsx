import mapboxgl from "mapbox-gl";
import React, { useEffect, useRef, useState } from "react";
import ReactDOM from "react-dom";
import "mapbox-gl/dist/mapbox-gl.css";
import {MAP_BOX_PUBLIC_KEY} from "../../../env";

mapboxgl.accessToken = MAP_BOX_PUBLIC_KEY;

const Marker = ({ onClick, children, data }) => {
    const _onClick = () => {
        // 
    };

    return (
        <button
            title={data?.title}
            //onClick={_onClick}
            className="text-secondary rounded-full bg-transparent p-1 text-center no-underline inline-block"
        >
            {children}
        </button>
    );
};

const LocationOnMap = ({ data }) => {
    const mapContainerRef = useRef(null);
    const [lng, setLng] = useState(32.5457);
    const [lat, setLat] = useState(1.3316);
    const [zoom, setZoom] = useState(4.5);

    // Initialize map when component mounts
    useEffect(() => {
        const map = new mapboxgl.Map({
            container: mapContainerRef.current,
            style: "mapbox://styles/mapbox/streets-v11",
            center: [data?.longitude, data?.latitude],
            zoom: zoom,
        });

        // Create a React ref
        const ref = React.createRef();
        // Create a new DOM node and save it to the React ref
        ref.current = document.createElement("div");
        // Render a Marker Component on our new DOM node
        ReactDOM.render(
            <Marker onClick={markerClicked} data={data}>
                <svg
                className="w-10 h-10"
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
            .setLngLat([data?.longitude, data?.latitude])
            .addTo(map);
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

export default LocationOnMap;
