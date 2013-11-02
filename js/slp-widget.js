
function ask_for_locations_near(here) {
    ajax = new csl.Ajax();
    ajax.send({action: 'csl_ajax_onload', lat: here.lat(), lng: here.lng()}, function(data) { 
        jQuery('#slpw_searching').slideUp();
        console.log(data);
        if (data.success) {
            jQuery('#slpw_results').get(0).innerHTML = '';
            for(loc = 0; loc < data.count && loc < slpWidgets.max_results; loc++) {
                jQuery('#slpw_results').get(0).innerHTML += display_row(data.response[loc], loc);
            }
            jQuery('#slpw_results').slideDown();
        }
    });
}

function display_row(data, number) {
    var div = "<div id ='slpw_result_"+number+"' class='slpw_result'>";
    if (data.sl_pages_url != "") {
        div += "<a href='" + data.sl_pages_url + "'>";
    }
    else if (data.url != "") {
        div += "<a href='" + data.url + "'>";
    }
    div += data.name;
    div += ", ";
    div += Math.round(data.distance);
    div += " ";
    div += slplus.distance_unit;
    if (data.sl_pages_url != '' || data.url != '') {
        div += "</a>";
    }
    div += "</div>";
    
    return div;
}

function search_slp_now() {
    jQuery('#slpw_searching').slideDown();
    jQuery('#slpw_results').slideUp();
    var geocoder = new google.maps.Geocoder();
    geocoder.geocode({'address': jQuery('#address_input').val()}, function (results, status) { if (status == 'OK') { ask_for_locations_near(results[0].geometry.location); } });
}