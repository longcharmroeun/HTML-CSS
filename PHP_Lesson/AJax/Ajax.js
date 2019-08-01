var id = 0;
function loadDoc(button) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            if (this.responseText == "id out of rand") {
                alert("Out of rand");
            }
            else {
                document.getElementById("table").innerHTML += this.responseText; 
            }
        }
    };
    xhttp.open("GET", "LoadData.php?start_ID="+id, true);
    xhttp.send();
    id += 5;
}

function insert() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            alert("Bigo");
        }
    };
    xhttp.open("GET", "InsertData.php?name=" + document.getElementById("name").value + "&price=" + document.getElementById("price").value + "&stock=" + document.getElementById("name").value, true);
    xhttp.send();
    id += 5;
}
