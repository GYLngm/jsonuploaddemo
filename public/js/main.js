

var inputForm = document.getElementById('inputJsonFile01');
var reset = document.getElementById('reset');
$(function(){
    reset.onclick = function(){
        location.href = "";
    }

	inputForm.onchange = function(){
       // $('#form').submit();
        $.ajax({
            url: '/parseJson',
            type: 'POST',
            cache: true,
            data: new FormData($('#form')[0]),
            processData: false,
            contentType: false
        }).done(function(res) {
            if(res === 'Bad request') {
                document.getElementById("http_response").innerHTML = res;
            } else {
                document.getElementById("http_response").innerHTML = '200 OK';
                var table_body = document.getElementById("tbody");
                for (var x in res) {
                    var tr = document.createElement("tr");
                    appendRows(tr, res[x]);
                    table_body.appendChild(tr);
                }
            }
            this.value = '';
        }).fail(function(res) {
            document.getElementById("http_response").innerHTML = res;
            this.value = '';
        });
	}

});

function appendRows(table,row_data){
    for(var i in row_data){
        var tmp = document.createElement("td");
        tmp.innerHTML = row_data[i];
        table.appendChild(tmp);
    }
}