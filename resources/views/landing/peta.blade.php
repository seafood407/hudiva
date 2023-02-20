@extends('landing.layouts.main')
 
@section('content')
    <section class="page-section">
        <div class="container mt-5">
            <!-- map Section Form-->
            <div class="row justify-content-center">
                <div class="col-lg-12 col-xl-12">
                    
                        <div id="mapid"></div>
                    
                </div>
            </div>
        </div>
    </section>
@endsection

@section('leaflet')
    <script type="text/javascript">
        // map.addLayer
        var map = L.map('mapid',{
            minZoom: 8,
            maxZoom: 20,
            zoomControl: false
        }).setView([0.6471127, 122.4337989], 9.49);

        // zoomBar
        var zoom_bar = new L.Control.ZoomBar({position: 'topleft'}).addTo(map);

        var Layerkita = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>',
            attributionControl: false
        }); 

        map.addLayer(Layerkita);

       
        
        // marker
        var markers = L.markerClusterGroup();
        
        
        @foreach($data as $data)
        var popup = L.responsivePopup().setContent("Nama Lokasi : {{ $data->nama_lokasi }}<br>Alamat Lokasi : {{ $data->alamat_lokasi }}<br>kedalamatan : {{ $data->depth }}<br>Jarak Pandang : {{ $data->visibility }}");
        var marker = L.marker([{{ $data->latitude }}, {{ $data->longitude }}])
            .bindPopup(popup);
        markers.addLayer(marker);
        @endforeach
        
        map.addLayer(markers);

        // geojeson
        var kotastyle = {
            "color": "#058cfa",
            "weight": 1,
            "opacity": 0.6
        };
        var bonbolstyle = {
            "color": "#6f03fc",
            "weight": 1,
            "opacity": 0.6
        };
        var pohuatostyle = {
            "color": "#fc8403",
            "weight": 1,
            "opacity": 0.6
        };
        var boalemostyle = {
            "color": "#059c0a",
            "weight": 1,
            "opacity": 0.6
        };
        var gorutstyle = {
            "color": "#663809",
            "weight": 1,
            "opacity": 0.6
        };
        var kabgorstyle = {
            "color": "#f5162c",
            "weight": 1,
            "opacity": 0.6
        };
        var garispantai = {
            "color": "#595621",
            "weight": 2,
            "opacity": 0.9
        };
        var jalan = {
            "color": "#000000",
            "weight": 1,
            "opacity": 0.9
        };
        
        function popUp(f,l){
                var out = [];
                if (f.properties){
                    out.push("Wilayah"+": "+f.properties['WADMKK']);
                    out.push("Kecamatan"+": "+f.properties['NAMOBJ']);
                    l.bindPopup(out.join("<br />"));
                }
            }


        // legend
        
        function iconByName(name) {
            return '<i class="icon icon-'+name+'"></i>';
        }

        function featureToMarker(feature, latlng) {
            return L.marker(latlng, {
                icon: L.divIcon({
                    className: 'marker-'+feature.properties.amenity,
                    html: iconByName(feature.properties.amenity),
                    iconUrl: '../images/markers/'+feature.properties.amenity+'.png',
                    iconSize: [25, 41],
                    iconAnchor: [12, 41],
                    popupAnchor: [1, -34],
                    shadowSize: [41, 41]
                })
            });
        }

        var baseLayers = [
            {
                active: false,
                name: "  OpenStreetMap",
                layer: Layerkita
            }
            ];

        var overLayers = [
            {
                group: "Kota Gorontal",
                collapsed: true,
                active: false,
                layers: [
                    {
                        active: false,
                        name: "Batas Kecamatan",
                        icon: iconByName('bar'),
                        layer: new L.GeoJSON.AJAX(["{{ asset('geojson/KotaGorontalo.geojson') }}"],{onEachFeature:popUp,style: kotastyle,pointToLayer: featureToMarker }).addTo(map)
                    },
                    {
                        active: false,
                        name: "Garis Pantai",
                        icon: iconByName('bar'),
                        layer: new L.GeoJSON.AJAX(["{{ asset('geojson/garispantai_kota.geojson') }}"],{onEachFeature:popUp,style: garispantai,pointToLayer: featureToMarker }).addTo(map)
                    },
                    {
                        active: false,
                        name: "Jalan",
                        icon: iconByName('bar'),
                        layer: new L.GeoJSON.AJAX(["{{ asset('geojson/jalan_kota.geojson') }}"],{onEachFeature:popUp,style: jalan,pointToLayer: featureToMarker }).addTo(map)
                    }
                ]
            },
            {
                group: "Kabupaten Bone Bolango",
                collapsed: true,
                active: false,
                layers: [
                    {
                        active: false,
                        name: "Batas Kecamatan",
                        icon: iconByName('bar'),
                        layer: new L.GeoJSON.AJAX(["{{ asset('geojson/BoneBolango.geojson') }}"],{onEachFeature:popUp,style: bonbolstyle,pointToLayer: featureToMarker }).addTo(map)
                        
                    },
                    {
                        active: false,
                        name: "Garis Pantai",
                        icon: iconByName('bar'),
                        layer: new L.GeoJSON.AJAX(["{{ asset('geojson/garispantai_bonbol.geojson') }}"],{onEachFeature:popUp,style: garispantai,pointToLayer: featureToMarker }).addTo(map)
                    },
                    {
                        active: false,
                        name: "Jalan",
                        icon: iconByName('bar'),
                        layer: new L.GeoJSON.AJAX(["{{ asset('geojson/jalan_bonbol.geojson') }}"],{onEachFeature:popUp,style: jalan,pointToLayer: featureToMarker }).addTo(map)
                    }
                ]
            },
            {
                group: "Kabupaten Gorontalo",
                collapsed: true,
                active: false,
                layers: [
                    {
                        active: false,
                        name: "Batas Kecamatan",
                        icon: iconByName('bar'),
                        layer: new L.GeoJSON.AJAX(["{{ asset('geojson/KabupatenGorontalo.geojson') }}"],{onEachFeature:popUp,style: kabgorstyle,pointToLayer: featureToMarker }).addTo(map)
                    },
                    {
                        active: false,
                        name: "Garis Pantai",
                        icon: iconByName('bar'),
                        layer: new L.GeoJSON.AJAX(["{{ asset('geojson/garispantai_kabgor.geojson') }}"],{onEachFeature:popUp,style: garispantai,pointToLayer: featureToMarker }).addTo(map)
                    },
                    {
                        active: false,
                        name: "Jalan",
                        icon: iconByName('bar'),
                        layer: new L.GeoJSON.AJAX(["{{ asset('geojson/jalan_kabgor.geojson') }}"],{onEachFeature:popUp,style: jalan,pointToLayer: featureToMarker }).addTo(map)
                    }
                ]
            },
            {
                group: "Kabupaten Boalemo",
                collapsed: true,
                active: false,
                layers: [
                    {
                        active: false,
                        name: "Batas Kecamatan",
                        icon: iconByName('bar'),
                        layer: new L.GeoJSON.AJAX(["{{ asset('geojson/Boalemo.geojson') }}"],{onEachFeature:popUp,style: boalemostyle,pointToLayer: featureToMarker }).addTo(map)
                    },
                    {
                        active: false,
                        name: "Garis Pantai",
                        icon: iconByName('bar'),
                        layer: new L.GeoJSON.AJAX(["{{ asset('geojson/garispantai_boalemo.geojson') }}"],{onEachFeature:popUp,style: garispantai,pointToLayer: featureToMarker }).addTo(map)
                    },
                    {
                        active: false,
                        name: "Jalan",
                        icon: iconByName('bar'),
                        layer: new L.GeoJSON.AJAX(["{{ asset('geojson/jalan_boalemo.geojson') }}"],{onEachFeature:popUp,style: jalan,pointToLayer: featureToMarker }).addTo(map)
                    }
                ]
            },
            {
                group: "Kabupaten Pohuato",
                collapsed: true,
                active: false,
                layers: [
                    {
                        active: false,
                        name: "Batas Kecamatan",
                        icon: iconByName('bar'),
                        layer: new L.GeoJSON.AJAX(["{{ asset('geojson/Pohuato.geojson') }}"],{onEachFeature:popUp,style: pohuatostyle,pointToLayer: featureToMarker }).addTo(map)
                    },
                    {
                        active: false,
                        name: "Garis Pantai",
                        icon: iconByName('bar'),
                        layer: new L.GeoJSON.AJAX(["{{ asset('geojson/garispantai_pohuato.geojson') }}"],{onEachFeature:popUp,style: garispantai,pointToLayer: featureToMarker }).addTo(map)
                    },
                    {
                        active: false,
                        name: "Jalan",
                        icon: iconByName('bar'),
                        layer: new L.GeoJSON.AJAX(["{{ asset('geojson/jalan_pohuato.geojson') }}"],{onEachFeature:popUp,style: jalan,pointToLayer: featureToMarker }).addTo(map)
                    }
                ]
            },
            {
                group: "Kabupaten Gorontalo Utara",
                collapsed: true,
                active: false,
                layers: [
                    {
                        active: false,
                        name: "Batas Kecamatana",
                        icon: iconByName('bar'),
                        layer: new L.GeoJSON.AJAX(["{{ asset('geojson/GorontaloUtara.geojson') }}"],{onEachFeature:popUp,style: gorutstyle,pointToLayer: featureToMarker }).addTo(map)
                    },
                    {
                        active: false,
                        name: "Garis Pantai",
                        icon: iconByName('bar'),
                        layer: new L.GeoJSON.AJAX(["{{ asset('geojson/garispantai_gorut.geojson') }}"],{onEachFeature:popUp,style: garispantai,pointToLayer: featureToMarker }).addTo(map)
                    },
                    {
                        active: false,
                        name: "Jalan",
                        icon: iconByName('bar'),
                        layer: new L.GeoJSON.AJAX(["{{ asset('geojson/jalan_gorut.geojson') }}"],{onEachFeature:popUp,style: jalan,pointToLayer: featureToMarker }).addTo(map)
                    }
                ]
            }
            
        ];

        var panelLayers = new L.Control.PanelLayers(baseLayers, overLayers,{
            compact: true,
            collapsed: true,
            selectorGroup: true,
            collapsibleGroups: true,
            active: false
        });

        map.addControl(panelLayers);
    </script>
@endsection