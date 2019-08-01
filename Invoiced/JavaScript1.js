var Counter = 0;
function GetDate() {
    var today = new Date();
    document.getElementById("date").innerHTML = today.getMonth() + '/' + today.getDay() + '/' + today.getFullYear();
}

function ShowDetail() {
    if (document.getElementById('detail').style.display == "none") {
        document.getElementById('detail').style.display = "block";
    }
    else {
        document.getElementById('detail').style.display = "none";
    }
}

function CheckDateFormat(date) {
    if (!validateDate(date.value)) {
        date.style.color = "red";
    }
    else {
        date.style.color = "initial";
    }
}

function validateDate(dateValue) {
    var selectedDate = dateValue;
    if (selectedDate == '')
        return false;

    var regExp = /^(\d{1,2})(\/|-)(\d{1,2})(\/|-)(\d{4})$/; //Declare Regex
    var dateArray = selectedDate.match(regExp); // is format OK?

    if (dateArray == null) {
        return false;
    }

    month = dateArray[1];
    day = dateArray[3];
    year = dateArray[5];

    if (month < 1 || month > 12) {
        return false;
    } else if (day < 1 || day > 31) {
        return false;
    } else if ((month == 4 || month == 6 || month == 9 || month == 11) && day == 31) {
        return false;
    } else if (month == 2) {
        var isLeapYear = (year % 4 == 0 && (year % 100 != 0 || year % 400 == 0));
        if (day > 29 || (day == 29 && !isLeapYear)) {
            return false
        }
    }
    return true;
}

function AddColumn() {
    Counter++;
    var div = document.createElement("div");
    div.className = 'Row';
    div.innerHTML = '<input name="name[]" value="" class="Row Head Name Body" /> <input name="qty[]" list="qty" value="" class="Row Head QTY Body" id="qty' + Counter + '" oninput="Cal(this)"/> <input name="unit-price[]" value="" list="unit-price" class="Row Head Unit-Price Body" id="unit-price' + Counter + '" oninput="Cal(this)"/> <label name="amunt[]" value="" class="Row Head Amount Body" id="amount' + Counter + '"/>';
    document.getElementById("table").appendChild(div);
}

function Cal(ID) {
    var countid = ID.id.match(/\d+/)[0];
    var qty = document.getElementById("qty" + countid).value;
    var unit_price = document.getElementById('unit-price' + countid).value;
    document.getElementById('amount' + countid).innerHTML = qty * unit_price;
    if (countid == Counter && qty != '' && unit_price != '') {
        AddColumn();
    }
    CalTotal();
}

function CalTotal() {
    var total = 0;
    for (var i = 0; i < Counter; i++) {
        total += document.getElementById('qty' + i).value * document.getElementById('unit-price' + i).value;
    }
    document.getElementById("totalvalue").innerHTML = total;
}