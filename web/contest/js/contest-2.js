function get_rank(page_name, container_id){
    $.ajax({
        type: "GET",
        url: page_name,
        async: false,
        dataType: 'json'
    }).complete(function(data){
        $('#'+container_id+' tbody').html(data.responseText);
        setTimeout(function(){get_rank(page_name, container_id);}, 30000);
    });
}


