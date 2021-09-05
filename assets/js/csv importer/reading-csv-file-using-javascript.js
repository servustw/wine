
var data;
var order_end = 1;
function buildTable(results) {
    var markup = "<table class='table'>";
    var markup_sql ="INSERT INTO ordered (order_date,product_id, product_num, product_buy_price,user_id,sell,selled_price,selled_time) VALUES ";
    data = results.data;
    for (i = 0; i < data.length; i++) {
        markup += "<tr>";
        if(i==0){

        }else{
            markup_sql+="(";
        }
        var row = data[i];
        var cells = row.join(",").split(",");
        for (j = 0; j < cells.length; j++) {
            if(!cells[j]){
                order_end
            }else if(i==0){
                markup += "<td>";
                console.log(cells[j]);
                markup += cells[j];
                markup += "</td>";
            }else if(j==3){
                markup += "<td>";
                console.log(cells[j]);
                markup_sql +="'";
                markup_sql+=cells[j];
                markup += cells[j];
                markup_sql +="'";
                markup += "</td>";
                
                markup_sql +=",";
                cells[j] = ":userid";

                console.log(cells[j]);
                markup_sql +="'";
                markup_sql+=cells[j];
                markup_sql +="'";

            }else if(j==4){
                if(!cells[j]){
                    console.log(cells[j]);
                    cells[j]=0;
                    console.log(cells[j]);
                }else{
                    console.log(cells[j]);
                }
                markup += "<td>";
                console.log(cells[j]);
                markup_sql +="'";
                markup_sql+=cells[j];
                markup += cells[j];
                markup_sql +="'";
                markup += "</td>";
            }else{
                markup += "<td>";
                console.log(cells[j]);
                markup_sql +="'";
                markup_sql+=cells[j];
                markup += cells[j];
                markup_sql +="'";
                markup += "</td>";
            }
            
            if((j+1)== cells.length || i==0){
            }else{
                markup_sql +=",";
            }
        }
        if(i==0){

        }else{
            markup_sql+=")";
        }

        markup += "</tr>";
        if((i== data.length-1) || i==1){
        }else{
            markup_sql +=",";
        }
    }
    console.log(markup_sql);
    markup += "</table>";
    var sql_show = "<textarea class='form-control' rows='5' name='user_description' id='connectmap_sql'>";
    sql_show+= markup_sql;
    sql_show+=" </textarea>";
    $("#appsql").html(sql_show);
	$("#app").html(markup);
	document.getElementById('connectnote').style.display = 'block';
    document.getElementById('connectmap_sql').value = markup_sql;
}

function buildJsonTable(results) {
    var markup = "<table class='table'>";
    var markup_sql ="INSERT INTO ordered (order_id, order_date, product_num, product_buy_price,product_id,user_id,sell,selled_price) VALUES ";
    data = results.data;
    for (i = 0; i < data.length; i++) {
        markup += "<tr>";
        markup_sql+="(";
        var row = data[i];
        var cells = row.join(",").split(",");
        for (j = 0; j < cells.length; j++) {
            markup_sql +="'";
            markup += "<td>";
            console.log(cells[j]);
            markup_sql+=cells[j];
            markup += cells[j];
            markup_sql +="'";
            markup += "</td>";
            if((j+1)== cells.length){
            }else{
                markup_sql +=",";
            }
        }
        markup_sql+=")";
        markup += "</tr>";
        if((i+1)== data.length){
        }else{
            markup_sql +=",";
        }
    }
    markup += "</table>";
    $("#app").html(markup_sql);
    $('#connectnote').attr("style", "display: block");
    $('#ToCheckJsonType').attr("style", "display: block");
    $('#connectmap').attr("style", "display: block");
    $('#JsonType')[0].selectedIndex = 0;
    $("#propName").html('');
}

function SentToMap() {
    parent.SentToMap(data);
}
function SentToMap2() {
    parent.SentToMap2(data, $('#coorid').val());
}
function SentToMapCNT() {
    parent.SentToMapCNT(data);
}
function SentToMapCOA() {
    parent.SentToMapCOA(data);
}
function SentToMapB21() {
    parent.SentToMapB21(data);
}


$(document).ready(function(){
		$('#submit').on("click",function(e){
			e.preventDefault();
			if (!$('#files')[0].files.length){
				alert("請選擇至少一個檔案進行讀取");
            }
            
            var fname = '';
            fname = $('#files')[0].files["0"].name;
            if (fname.includes('.kml')) {
                $('#files').parse({
                    config: {
                        delimiter: "auto",
                        complete: SentToMap3
                    },
                    before: function (file, inputElem) {
                        //console.log("Parsing file...", file);
                    },
                    error: function (err, file) {
                        console.log("發生錯誤:", err, file);
                    },
                    complete: function () {
                        //console.log("Done with all files");
                    }
                });
            }
            else if (fname.includes('.json')) {
                $('#files').parse({
                    config: {
                        delimiter: "auto",
                        complete: buildJsonTable
                    },
                    before: function (file, inputElem) {
                        //console.log("Parsing file...", file);
                    },
                    error: function (err, file) {
                        console.log("發生錯誤:", err, file);
                    },
                    complete: function () {
                        //console.log("Done with all files");
                    }
                });
            }
            else {
                $('#files').parse({
                    config: {
                        delimiter: "auto",
                        complete: buildTable,
                    },
                    before: function (file, inputElem) {
                        //console.log("Parsing file...", file);
                    },
                    error: function (err, file) {
                        console.log("發生錯誤:", err, file);
                    },
                    complete: function () {
                        //console.log("Done with all files");
                    }
                });
            }
		});
});