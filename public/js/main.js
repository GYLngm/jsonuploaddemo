

var inputForm = document.getElementById('inputJsonFile01');
$(function(){
	inputForm.onchange = function(){
       // $('#form').submit();
        $.ajax({
            url: '/parseJson',
            type: 'POST',
            cache: false,
            data: new FormData($('#form')[0]),
            processData: false,
            contentType: false
        }).done(function(res) {
            console.log(res);
            var table_body = document.getElementById("tbody");
            for(var x in res){
                var tr = document.createElement("tr");
                appendRows(tr, res[x]);
                table_body.appendChild(tr);
            }
        }).fail(function(res) {});

	}
});

function appendRows(table,row_data){
    var tagsName = ['date','time','longitude','latitude','imei','version','temperature','num_bus'];
    for(var i in row_data){
        var tmp = document.createElement("td");
        tmp.innerHTML = row_data[i];
        table.appendChild(tmp);
    }
}