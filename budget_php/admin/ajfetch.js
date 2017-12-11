
function ajfetch(elementid, file,column,table,id) {

    var xmlhttp = false;

            if (window.XMLHttpRequest) {
                
                xmlhttp = new XMLHttpRequest();
            }
            else {

                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    if (elementid == "divimg") {
                        document.getElementById(elementid).src = "../images/event_logo/"+xmlhttp.responseText;
                    }
                    document.getElementById(elementid).innerHTML = xmlhttp.responseText;
                }
            }
            xmlhttp.open("GET", file +"?id="+ id+"&table="+table+"&column="+column , true);
            xmlhttp.send();
        
    }