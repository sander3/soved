
let address = document.querySelector('address');

address.addEventListener('click', function () {
    let selection = window.getSelection();

    if (selection.rangeCount > 0) {
        selection.removeAllRanges();
    }

    let range = document.createRange();
    range.selectNode(address);
    selection.addRange(range);
});
