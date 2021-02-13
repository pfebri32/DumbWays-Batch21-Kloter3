const heightPascal = 6;
const dict = {
    1: 'X',
    2: 'Y',
    3: 'Z',
    4: 'A',
    5: 'B',
    6: 'C',
    10: 'C',
};

function cetakPolaSegitigaPascalCustom () {
    var result = [];

    for (var i = 0; i < heightPascal; i++) {
        if (i !== 0) { 
            var newRow = [];
            for (var j = 0; j < i + 1; j++) {
                if (!(j == 0 || j == i)) {
                    newRow.push(result[i - 1][j] + result[i - 1][j - 1]);
                }
                else { newRow.push(1); }
            }
            result.push(newRow);
        } else { result.push([1]); }
    }

    for (var i = 0; i < result.length; i++) {
        var div = "<div class='row'>"
        for (var j = 0; j < result[i].length; j++) {
            if (dict.hasOwnProperty(result[i][j])) {
                div += "<div>" + dict[result[i][j]] + "</div>";
            } else {
                div += "<div>" + result[i][j] + "</div>";
            }
        }
        div += "</div>";
        document.getElementById('output').innerHTML += div;
    }
}

cetakPolaSegitigaPascalCustom();