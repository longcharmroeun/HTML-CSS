function CounterClick() {

    for (var i = 1; i <= 100; i++) {
        if (i % 2 == 0 && i % 3 == 0 && i % 5 == 0) {
            var div = document.createElement("div");
            div.className = 'Row';

            var label = document.createElement("label");
            label.className = "Row Head QTY Body";
            label.innerHTML = i;
            div.appendChild(label);

            var label = document.createElement("label");
            label.className = "Row Head QTY Body";
            label.innerHTML = i;
            div.appendChild(label);

            var label = document.createElement("label");
            label.className = "Row Head QTY Body";
            label.innerHTML = i;
            div.appendChild(label);


            document.getElementById("table").appendChild(div);
        }
        else if (i % 2 == 0 && i % 3 == 0) {
            var div = document.createElement("div");
            div.className = 'Row';

            var label = document.createElement("label");
            label.className = "Row Head QTY Body";
            label.innerHTML = i;
            div.appendChild(label);

            var label = document.createElement("label");
            label.className = "Row Head QTY Body";
            label.innerHTML = i;
            div.appendChild(label);

            var label = document.createElement("label");
            label.className = "Row Head QTY Body";
            label.innerHTML = "";
            div.appendChild(label);


            document.getElementById("table").appendChild(div);
        }
        else if (i % 2 == 0 && i % 5 == 0) {
            var div = document.createElement("div");
            div.className = 'Row';

            var label = document.createElement("label");
            label.className = "Row Head QTY Body";
            label.innerHTML = i;
            div.appendChild(label);

            var label = document.createElement("label");
            label.className = "Row Head QTY Body";
            label.innerHTML = "";
            div.appendChild(label);

            var label = document.createElement("label");
            label.className = "Row Head QTY Body";
            label.innerHTML = i;
            div.appendChild(label);


            document.getElementById("table").appendChild(div);
        }
        else if (i % 5 == 0 && i % 3 == 0) {
            var div = document.createElement("div");
            div.className = 'Row';

            var label = document.createElement("label");
            label.className = "Row Head QTY Body";
            label.innerHTML = "";
            div.appendChild(label);

            var label = document.createElement("label");
            label.className = "Row Head QTY Body";
            label.innerHTML = i;
            div.appendChild(label);

            var label = document.createElement("label");
            label.className = "Row Head QTY Body";
            label.innerHTML = i;
            div.appendChild(label);

            document.getElementById("table").appendChild(div);
        }
        else if (i % 2 == 0) {
            var div = document.createElement("div");
            div.className = 'Row';

            var label = document.createElement("label");
            label.className = "Row Head QTY Body";
            label.innerHTML = i;
            div.appendChild(label);

            var label = document.createElement("label");
            label.className = "Row Head QTY Body";
            label.innerHTML = "";
            div.appendChild(label);

            var label = document.createElement("label");
            label.className = "Row Head QTY Body";
            label.innerHTML = "";
            div.appendChild(label);


            document.getElementById("table").appendChild(div);
        }
        else if (i % 3 == 0) {
            var div = document.createElement("div");
            div.className = 'Row';

            var label = document.createElement("label");
            label.className = "Row Head QTY Body";
            label.innerHTML = "";
            div.appendChild(label);

            var label = document.createElement("label");
            label.className = "Row Head QTY Body";
            label.innerHTML = i;
            div.appendChild(label);

            var label = document.createElement("label");
            label.className = "Row Head QTY Body";
            label.innerHTML = "";
            div.appendChild(label);


            document.getElementById("table").appendChild(div);
        }
        else if (i % 5 == 0) {
            var div = document.createElement("div");
            div.className = 'Row';

            var label = document.createElement("label");
            label.className = "Row Head QTY Body";
            label.innerHTML = "";
            div.appendChild(label);

            var label = document.createElement("label");
            label.className = "Row Head QTY Body";
            label.innerHTML = "";
            div.appendChild(label);

            var label = document.createElement("label");
            label.className = "Row Head QTY Body";
            label.innerHTML = i;
            div.appendChild(label);

            document.getElementById("table").appendChild(div);
        }
    }
}
function myfunction(i) {
    
}