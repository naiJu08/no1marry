function openEditor() {
    document.getElementById('openButton').style.display = 'none';
    document.getElementById('editor').style.display = 'block';
}

function saveText() {
    const textareaValue = document.getElementById('textarea').value;
    document.getElementById('displayText').textContent =  textareaValue;
    document.getElementById('displayText').style.display = 'block';

    // Hide the textarea, Save, and Back buttons
    document.getElementById('editor').style.display = 'none';
    document.getElementById('openButton').style.display = 'block';
}

function goBack() {
    document.getElementById('editor').style.display = 'none';
    document.getElementById('openButton').style.display = 'block';
    document.getElementById('displayText').style.display = 'none';
}
// select frofile
function informationEditor() {
    document.getElementById('openButton1').style.display = 'none';
    document.getElementById('basiceditor').style.display = 'block';
    document.getElementById('maritaleditor').style.display = 'block';
    document.getElementById('Religioneditor').style.display = 'block';
}

function infosaveText() {
    const textareaValue = document.getElementById('textarea_basicinfo').value;
    document.getElementById('BasicInformation').textContent =  textareaValue;
    document.getElementById('BasicInformation').style.display = 'block';

    // Hide the textarea, Save, and Back buttons
    document.getElementById('basiceditor').style.display = 'none';
    document.getElementById('openButton1').style.display = 'block';
}

function infoBack() {
    document.getElementById('basiceditor').style.display = 'none';
    document.getElementById('openButton1').style.display = 'block';
    document.getElementById('BasicInformation').style.display = 'none';
}


// MARITAL STATUS


function maritalsaveText() {
    const textareaValue = document.getElementById('textarea_maritalinfo').value;
    document.getElementById('maritalInformation').textContent =  textareaValue;
    document.getElementById('maritalInformation').style.display = 'block';

    // Hide the textarea, Save, and Back buttons
    document.getElementById('maritaleditor').style.display = 'none';
    document.getElementById('openButton1').style.display = 'block';
}

function maritalBack() {
    document.getElementById('maritaleditor').style.display = 'none';
    document.getElementById('openButton1').style.display = 'block';
    document.getElementById('maritalInformation').style.display = 'none';
}
// religion


function ReligionsaveText() {
    const textareaValue = document.getElementById('textarea_Religioninfo').value;
    document.getElementById('ReligionInformation').textContent =  textareaValue;
    document.getElementById('ReligionInformation').style.display = 'block';

    // Hide the textarea, Save, and Back buttons
    document.getElementById('Religioneditor').style.display = 'none';
    document.getElementById('openButton1').style.display = 'block';
}

function ReligionBack() {
    document.getElementById('Religioneditor').style.display = 'none';
    document.getElementById('openButton1').style.display = 'block';
    document.getElementById('ReligionInformation').style.display = 'none';
}