console.log(5 / 2);

function cekMedian(params) {
    let median = null;
    let isOdd = params.length % 2;
    let sorted = params.sort();

    if (isOdd == 1) {
        median = sorted[Math.floor(params.length / 2)];
    } else {
        let index = params.length / 2;
        median = sorted[index - 1];
        median += sorted[index];
        median /= 2;
    }

    return "Median dari array tersebut adalah " + median + ".";
}

const refresh = () => {
    document.getElementById('params__list').innerHTML = "";
    params.map(p => {
        document.getElementById('params__list').innerHTML += "<div>" + p + "<div>";
    });
};

const defaultParams = [0, 1, 2, 4 , 6, 5, 3];
var params = [...defaultParams];
refresh();

const OnAdd = () => {
    let input = document.getElementById("input").value;

    if (!isNaN(parseInt(input))) { 
        params.push(parseInt(input)); 
        document.getElementById("input").value = null;
        refresh();
    }
};

const OnRemove = () => {
    params.pop();
    refresh();
};

const OnRemoveAll = () => {
    params = [];
    refresh();
};

const OnReset = () => {
    params = [...defaultParams];
    refresh();
};

const OnSubmit = () => {
    document.getElementById('output').innerHTML = cekMedian(params);
};