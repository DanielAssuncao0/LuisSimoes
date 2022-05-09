$(document).ready(() => {
    const pathname = $(location).attr("pathname");
    const search = $(location).attr("search");
    $.ajax({
        url: 'http://localhost:9999/details' + search
    }).done((response) => {
        console.log(response);
        response = JSON.parse(response);
        if(response.data === null || response.data.length === 0)
            return;

        let columns = [];
        const headers = Object.keys(response.data[0]);
        headers.forEach(header => {
            columns.push({title: header, data: header});
        });

        $('#datatables').dataTable( {
            "columns": columns,
            "data": response.data
        });
    })
});