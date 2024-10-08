$(document).ready(() => {
    $.ajax({
        url: 'http://localhost:9999/summary'
    }).done((response) => {
        response = JSON.parse(response);
        if(response.data === null || response.data.length === 0)
            return;

        let columns = [];
        const headers = Object.keys(response.data[0]);
        headers.forEach(header => {
            let data = header;
            if(header === 'ARTICULO')
                data = (data) => {
                    const value = data[header];
                    return '<a href="details.php?id=' + value + '">' + value + '</a>'
                }
            columns.push({title: header, data: data});
        });

        $('#datatables').dataTable( {
            "columns": columns,
            "data": response.data
        });
    })
});