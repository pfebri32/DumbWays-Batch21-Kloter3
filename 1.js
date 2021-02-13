function checkKalimat (params) {
    let splited = params.split(" ");
    let result = splited.map(str => str.substring(0, 1));
    return result;
}

const defaultParams = "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.";

const OnReset = () => { document.getElementById('params__textarea').value = defaultParams; };

const OnSubmit = () => {
    let params = document.getElementById('params__textarea').value;

    if (params == null) {
        document.getElementById('params').innerHTML = null;
        document.getElementById('result').innerHTML = null;
    }

    document.getElementById('params').innerHTML = params;
    document.getElementById('result').innerHTML = checkKalimat(params);
};
