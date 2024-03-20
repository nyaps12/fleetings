@php
    $configData = Helper::appClasses();
@endphp

@extends('layouts/contentNavbarLayout')

@section('title', 'Map')

@section('content')



    <!doctype html>
    <!--
                 @license
                 Copyright 2019 Google LLC. All Rights Reserved.
                 SPDX-License-Identifier: Apache-2.0
                -->
    <html>

    <head>
        <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDQ7i1-nzWroLzQFBJlFvSypqXhXoc3kGUY&callback=initMap"
            async defer></script>
        <style>
            #map {
                height: 400px;
                /* The height is 400 pixels */
                width: 100%;
                /* The width is the width of the web page */
            }
        </style>

        <!-- jsFiddle will insert css and js -->
    </head>

    <body>

        <h3>Map</h3>
        <!--The div element for the map -->
        <div id="map"></div>

        <!-- prettier-ignore -->
    <script>(g=>{var h,a,k,p="The Google Maps JavaScript API",c="google",l="importLibrary",q="__ib__",m=document,b=window;b=b[c]||(b[c]={});var d=b.maps||(b.maps={}),r=new Set,e=new URLSearchParams,u=()=>h||(h=new Promise(async(f,n)=>{await (a=m.createElement("script"));e.set("libraries",[...r]+"");for(k in g)e.set(k.replace(/[A-Z]/g,t=>"_"+t[0].toLowerCase()),g[k]);e.set("callback",c+".maps."+q);a.src=`https://maps.${c}apis.com/maps/api/js?`+e;d[q]=f;a.onerror=()=>h=n(Error(p+" could not load."));a.nonce=m.querySelector("script[nonce]")?.nonce||"";m.head.append(a)}));d[l]?console.warn(p+" only loads once. Ignoring:",g):d[l]=(f,...n)=>r.add(f)&&u().then(()=>d[l](f,...n))})
        ({key: "AIzaSyDQ7i1-nzWroLzQFBJlFvSypqXhXoc3kGU", v: "weekly"}); </script>

        <script>
            // Initialize and add the map
            let map;

            async function initMap() {
                // The location of Uluru
                const position = {
                    lat: 14.7266118,
                    lng: 121.0346469
                };
                // Request needed libraries.
                //@ts-ignore
                const {
                    Map
                } = await google.maps.importLibrary("maps");
                const {
                    AdvancedMarkerElement
                } = await google.maps.importLibrary("marker");

                // The map, centered at Uluru
                map = new Map(document.getElementById("map"), {
                    zoom: 10,
                    center: position,
                    mapId: "DEMO_MAP_ID",
                });

                // The marker, positioned at Uluru
                const marker = new AdvancedMarkerElement({
                    map: map,
                    position: position,
                    title: "Uluru",
                });
            }

            initMap();
        </script>

    </body>

    </html>
@endsection
