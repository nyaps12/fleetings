@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Dashboard')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add Map</title>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <style>
        #map {
            height: 400px; /* The height is 400 pixels */
            width: 50%; /* The width is the width of the web page */
        }
    </style>
</head>

<body>
    <h3></h3>

    <!--The div element for the map -->
    <div id="map"></div>

    <!-- prettier-ignore -->
    <script>(g=>{var h,a,k,p="The Google Maps JavaScript API",c="google",l="importLibrary",q="__ib__",m=document,b=window;b=b[c]||(b[c]={});var d=b.maps||(b.maps={}),r=new Set,e=new URLSearchParams,u=()=>h||(h=new Promise(async(f,n)=>{await (a=m.createElement("script"));e.set("libraries",[...r]+"");for(k in g)e.set(k.replace(/[A-Z]/g,t=>"_"+t[0].toLowerCase()),g[k]);e.set("callback",c+".maps."+q);a.src=`https://maps.${c}apis.com/maps/api/js?`+e;d[q]=f;a.onerror=()=>h=n(Error(p+" could not load."));a.nonce=m.querySelector("script[nonce]")?.nonce||"";m.head.append(a)}));d[l]?console.warn(p+" only loads once. Ignoring:",g):d[l]=(f,...n)=>r.add(f)&&u().then(()=>d[l](f,...n))})
        ({key: "AIzaSyDQ7i1-nzWroLzQFBJlFvSypqXhXoc3kGU", v: "weekly"});</script>

    <script>
        // Initialize and add the map
        let map;

        async function initMap() {
            // The location of Quezon City
            const position = { lat: 14.6760, lng: 121.0437 };

            // Request needed libraries.
            //@ts-ignore
            const { Map } = await google.maps.importLibrary("maps");
            const { AdvancedMarkerElement } = await google.maps.importLibrary("marker");

            // The map, centered at Quezon City
            map = new Map(document.getElementById("map"), {
                zoom: 12,
                center: position,
                mapId: "DEMO_MAP_ID",
            });

            // The marker, positioned at Quezon City
            const marker = new AdvancedMarkerElement({
                map: map,
                position: position,
                title: "Quezon City",
            });
        }

        initMap();
    </script>
</body>
</html> 



@endsection