const textarea = document.getElementById('textarea_secondary');
const fileList = document.getElementById('file_list');

fileList.addEventListener('click', (e) => {
if (e.target && e.target.tagName === 'LI') {
const value = e.target.getAttribute('data-value');
const ext = value.split('.').pop().toLowerCase();

let tag = '';

if (['jpg', 'jpeg', 'png'].includes(ext)) {
tag = `[IMG]${value}[/IMG]`;
} else if (['rar', 'zip'].includes(ext)) {
tag = `[FILE]${value}[/FILE]`;
}

if (tag) {
insertAtCursor(textarea, tag);
}
}
});

function insertAtCursor(myField, myValue) {
if (myField.selectionStart || myField.selectionStart === 0) {
const startPos = myField.selectionStart;
const endPos = myField.selectionEnd;
const scrollTop = myField.scrollTop;

myField.value =
myField.value.substring(0, startPos) +
myValue +
myField.value.substring(endPos, myField.value.length);

myField.focus();
myField.selectionStart = myField.selectionEnd = startPos + myValue.length;
myField.scrollTop = scrollTop;
} else {
myField.value += myValue;
myField.focus();
}
}
