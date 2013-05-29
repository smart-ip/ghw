// JavaScript Document
// Google Map code for the UK green heat watch reports
// Set icons to either heating or insulation
var customIcons = {
    Heating: {
        icon: 'http://130.88.68.64/tellus/ghw/green_heat.png'
    },
    Insulation: {
        icon: 'http://130.88.68.64/tellus/ghw/insulation.png'
    }
};

function load() {

    var map = new google.maps.Map(document.getElementById("map"), {
        center: new google.maps.LatLng(56, -2.25),
        zoom: 5,
        mapTypeId: 'roadmap'
    });

    // Set up the ability to zoom in to a user desfined box.
    map.enableKeyDragZoom({
        visualEnabled: true,
        visualPosition: google.maps.ControlPosition.LEFT,
        visualPositionOffset: new google.maps.Size(35, 0),
        visualPositionIndex: null,
        visualSprite: "http://maps.gstatic.com/mapfiles/ftr/controls/dragzoom_btn.png",
        visualSize: new google.maps.Size(20, 20),
        visualTips: {
            off: "Turn on",
            on: "Turn off"
        }
    });

    var infoWindow = new google.maps.InfoWindow;

    var min = .999999;
    var max = 1.000002;

    // Read review records from xml file
    downloadUrl("phpsqlajax_genxml.php", function(data) {
        var xml = data.responseXML;
        var markers = xml.documentElement.getElementsByTagName("marker");
        for (var i = 0; i < markers.length; i++) {
            // First offset any duplicate postcodes so they are visible
            var offsetLat = markers[i].getAttribute("lat") * (Math.random() * (max - min) + min);
            var offsetLng = markers[i].getAttribute("lng") * (Math.random() * (max - min) + min);

            // Basic user information
            var reviewChoice = markers[i].getAttribute("reviewChoice");
            var username = markers[i].getAttribute("username");
            var postcode = markers[i].getAttribute("postcode");
            var date = markers[i].getAttribute("date");
            var reviewType = markers[i].getAttribute("reviewType");
            var OtherType = markers[i].getAttribute("OtherType");
            // Product Information 
            var ProductMakeAndModel = markers[i].getAttribute("ProductMakeAndModel");
            var ProductYearPurchasedFitted = markers[i].getAttribute("ProductYearPurchasedFitted");
            var ProductIsRecommended = markers[i].getAttribute("ProductIsRecommended");
            var ProductRecommendationExplanation = markers[i].getAttribute("ProductRecommendationExplanation");
            var ProductRating = markers[i].getAttribute("ProductRating");
            var ProductEmphasis = markers[i].getAttribute("ProductEmphasis");
            // Installation / Service information
            var InstalledById = markers[i].getAttribute("InstalledById");
            var CompanyName = markers[i].getAttribute("CompanyName");
            var CompanyIsMCSCertified = markers[i].getAttribute("CompanyIsMCSCertified");
            var CompanyMCS = markers[i].getAttribute("CompanyMCS");
            var CompanyIsRecommended = markers[i].getAttribute("CompanyIsRecommended");
            var CompanyRecommendationExplanation = markers[i].getAttribute("CompanyRecommendationExplanation");
            var CompanyRating = markers[i].getAttribute("CompanyRating");
            // Costs and impact
            var Cost = markers[i].getAttribute("Cost");
            var CostDoNotKnow = markers[i].getAttribute("CostDoNotKnow");
            var GrantType = markers[i].getAttribute("GrantType");
            var ReviewImpact = markers[i].getAttribute("ReviewImpact");
            var ReviewCostEfficiencyAssessmentId = markers[i].getAttribute("ReviewCostEfficiencyAssessmentId");
            // Property information
            var HouseholdPropertyTypeId = markers[i].getAttribute("HouseholdPropertyTypeId");
            var HouseholdPropertyAge = markers[i].getAttribute("HouseholdPropertyAge");
            var HouseholdConstructionType = markers[i].getAttribute("HouseholdConstructionType");
            var HouseholdHasDoubleGlazing = markers[i].getAttribute("HouseholdHasDoubleGlazing");
            var HouseholdHasLoftInsulation = markers[i].getAttribute("HouseholdHasLoftInsulation");
            var HouseholdHasWallInsulation = markers[i].getAttribute("HouseholdHasWallInsulation");
            var HouseholdBedrooms = markers[i].getAttribute("HouseholdBedrooms");
            var HouseholdTenureTypeId = markers[i].getAttribute("HouseholdTenureTypeId");
            var HouseholdMembersNumber = markers[i].getAttribute("HouseholdMembersNumber");
            // More information
            var MoreExperienceHeatingMoreInfo = markers[i].getAttribute("MoreExperienceHeatingMoreInfo");

            var point = new google.maps.LatLng(parseFloat(markers[i].getAttribute("lat")), parseFloat(markers[i].getAttribute("lng")));
            var html = "<div style='width:350px; height:375px;'>" + "<table class='detail-view'; style='width:300px';>" + "<tr>" + "<th colspan='2' style='padding:5px; background-color:rgb(167, 201, 66)'><b><i>" + reviewChoice + " Review</i></b></th>" + "</tr>" + "<tr class='odd'>" + "<th>Username</th>" + "<td>" + username + "</td>" + "</tr>" + "<tr class='even'>" + "<th>Postcode</th>" + "<td>" + postcode + "</td>" + "</tr>" + "<tr class='odd'>" + "<th>Submission Date</th>" + "<td>" + date + "</td>" + "</tr>" + "<tr class='even'>" + "<th>" + reviewChoice + "</th>" + "<td>" + reviewType + "</td>" + "</tr>" + "<tr class='odd'>" + "<th>Other Type</th>" + "<td>" + OtherType + "</td>" + "</tr>" + "<tr>" + "<th colspan='2' style='padding:5px; background-color:rgb(167, 201, 66)'><b><i>Product Information</i></b></th>" + "</tr>" + "<tr class='odd'>" + "<th>Product Make &amp; Model</th>" + "<td>" + ProductMakeAndModel + "</td>" + "</tr>" + "<tr class='even'>" + "<th>Year Purchased Fitted</th>" + "<td>" + ProductYearPurchasedFitted + "</td>" + "</tr>" + "<tr class='odd'>" + "<th>Is this product recommended to others?</th>" + "<td>" + ProductIsRecommended + "</td>" + "</tr>" + "<tr class='even'>" + "<th>Recommendation Explanation</th>" + "<td>" + ProductRecommendationExplanation + "</td>" + "</tr>" + "<tr class='odd'>" + "<th>Rating</th>" + "<td>" + ProductRating + " out of 5</td>" + "</tr>" + "<tr class='even'>" + "<th>More product info depending on reviewer 's experience</th>" + "<td>" + ProductEmphasis + "</td>" + "</tr>" + "<tr>" + "<th colspan='2' style='padding:5px; background-color:rgb(167, 201, 66)'><b><i>Installation &amp; Service information</i></b></th>" + "</tr>" + "<tr class='odd'>" + "<th>Installed By</th>" + "<td>" + InstalledById + "</td>" + "</tr>" + "<tr class='even'>" + "<th>Company Name</th>" + "<td>" + CompanyName + "</td>" + "</tr>" + "<tr class='odd'>" + "<th>Is MCS Certified?</th>" + "<td>" + CompanyIsMCSCertified + "</td>" + "</tr>" + "<tr class='even'>" + "<th>MCS Certificate No.</th>" + "<td>" + CompanyMCS + "</td>" + "</tr>" + "<tr class='odd'>" + "<th>Is Company Recommended?</th>" + "<td>" + CompanyIsRecommended + "</td>" + "</tr>" + "<tr class='even'>" + "<th>Why is it Recommended?</th>" + "<td>" + CompanyRecommendationExplanation + "</td>" + "</tr>" + "<tr class='odd'>" + "<th>Rating</th>" + "<td>" + CompanyRating + " out of 5</td>" + "</tr>" + "<tr>" + "<th colspan='2' style='padding:5px; background-color:rgb(167, 201, 66)'><b><i>Costs &amp; Impact</i></b></th>" + "</tr>" + "<tr class='odd'>" + "<th>Total Cost of Installation &amp; Equipment in &pound;s</th>" + "<td>&pound; " + Cost + CostDoNotKnow + "</td>" + "</tr>" + 
            /**"<tr class='even'>" +
			"<th>Did you access a grant or a government incentive?</th>" +
			"<td>" + Grant + "</td>" +
			"</tr>" +*/
            "<tr class='even'>" + "<th>Grant details</th>" + "<td>" + GrantType + "</td>" + "</tr>" + "<tr class='odd'>" + "<th>Impact in Quality of Life</th>" + "<td>" + ReviewImpact + "</td>" + "</tr>" + "<tr class='even'>" + "<th>Did it help to save Energy?</th>" + "<td>" + ReviewCostEfficiencyAssessmentId + "</td>" + "</tr>" + "<tr>" + "<th colspan='2' style='padding:5px; background-color:rgb(167, 201, 66)'><b><i>Property information<i></b></th>" + "</tr>" + "<tr class='odd'>" + "<th>Property Type</th>" + "<td>" + HouseholdPropertyTypeId + "</td>" + "</tr>" + "<tr class='even'>" + "<th>Property Age</th>" + "<td>" + HouseholdPropertyAge + "</td>" + "</tr>" + "<tr class='odd'>" + "<th>Construction Type</th>" + "<td>" + HouseholdConstructionType + "</td>" + "</tr>" + "<tr class='even'>" + "<th>Has Double Glazing</th>" + "<td>" + HouseholdHasDoubleGlazing + "</td>" + "</tr>" + "<tr class='odd'>" + "<th>Has Loft Insulation</th>" + "<td>" + HouseholdHasLoftInsulation + "</td>" + "</tr>" + "<tr class='even'>" + "<th>Has Wall Insulation</th>" + "<td>" + HouseholdHasWallInsulation + "</td>" + "</tr>" + "<tr class='odd'>" + "<th>Number of Bedrooms</th>" + "<td>" + HouseholdBedrooms + "</td>" + "</tr>" + "<tr class='even'>" + "<th>Type of Tenure</th>" + "<td>" + HouseholdTenureTypeId + "</td>" + "</tr>" + "<tr class='odd'>" + "<th>Number of Members</th>" + "<td>" + HouseholdMembersNumber + "</td>" + "</tr>" + "<tr>" + "<th colspan='2' style='padding:5px; background-color:rgb(167, 201, 66)'><b><i>Tips &amp; Other Information</i></b></th>" + "</tr>" + "<tr class='odd'>" + "<td colspan='2'>" + MoreExperienceHeatingMoreInfo + "</td></tr></table></div>";

            // If there are duplicate postcodes offset the markers
            var point = new google.maps.LatLng(offsetLat, offsetLng);

            // Set icon to either heat or insulation review
            var icon = customIcons[reviewChoice] || {};
            var marker = new google.maps.Marker({
                map: map,
                position: point,
                icon: icon.icon
            });
            bindInfoWindow(marker, map, infoWindow, html);
        }

        var input = document.getElementById('searchTextField');
        var autocomplete = new google.maps.places.Autocomplete(input);

        autocomplete.bindTo('bounds', map);

        var markerSearch = new google.maps.Marker({
            map: map
        });

        google.maps.event.addListener(autocomplete, 'place_changed', function() {
            //infowindow.close();
            markerSearch.setVisible(false);
            input.className = '';
            var place = autocomplete.getPlace();
            if (!place.geometry) {
                // Inform the user that the place was not found and return.
                input.className = 'notfound';
                return;
            }

            // If the place has a geometry, then present it on a map.
            if (place.geometry.viewport) {
                map.fitBounds(place.geometry.viewport);
            } else {
                map.setCenter(place.geometry.location);
                map.setZoom(14);
            }

            var address = '';
            if (place.address_components) {
                address = [(place.address_components[0] && place.address_components[0].short_name || ''), (place.address_components[1] && place.address_components[1].short_name || ''), (place.address_components[2] && place.address_components[2].short_name || '')].join(' ');
            }
        });

    });
}

function bindInfoWindow(marker, map, infoWindow, html) {
    google.maps.event.addListener(marker, 'click', function() {
        infoWindow.setContent(html);
        infoWindow.open(map, marker);
    });
}

function downloadUrl(url, callback) {
    var request = window.ActiveXObject ? new ActiveXObject('Microsoft.XMLHTTP') : new XMLHttpRequest;

    request.onreadystatechange = function() {
        if (request.readyState == 4) {
            request.onreadystatechange = doNothing;
            callback(request, request.status);
        }
    };

    request.open('GET', url, true);
    request.send(null);
}

function doNothing() {}