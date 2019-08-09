var id = 0;
function loadDoc() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var json = JSON.parse(this.responseText);
            for (var i = 0; i < json.length; i++) {

                var div = document.createElement("div");
                div.className = 'Row';

                var label = document.createElement("label");
                label.className = "Row Head QTY Body";
                label.innerHTML = json[i].ID;
                div.appendChild(label);

                var label = document.createElement("label");
                label.className = "link link_animated";
                label.innerHTML = json[i].Pathfile;

                var tmp = document.createElement("div");
                tmp.className = "container";
                tmp.appendChild(label);

                div.appendChild(tmp);

                var label = document.createElement("label");
                label.className = "Row Head Name Body";
                label.innerHTML = json[i].Description;
                div.appendChild(label);

                var label = document.createElement("label");
                label.className = "Row Head Name QTY Body";
                label.innerHTML = json[i].Category;
                div.appendChild(label);

                var label = document.createElement("audio");
                label.setAttribute("controls", "controls");
                var audio = document.createElement("source");
                audio.setAttribute("src", json[i].Pathfile);
                audio.setAttribute("type", "audio/mp3");
                label.appendChild(audio);
                div.appendChild(label);

                document.getElementById("Table").appendChild(div)
            }
            if (json.length < 5) {
                document.getElementById("button").style.display = 'none';
            }
        }
    };
    xhttp.open("POST", "UserUpload.php", true);

    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("Page=" + id);
    id += 5;
}