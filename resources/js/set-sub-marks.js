// document.getElementById("addFieldBtn").addEventListener("click", function() {
//     // Clone the first field element
//     var fieldContainer = document.querySelector(".field-container");
//     var clonedField = fieldContainer.cloneNode(true);
//
//     // Clear the value in the cloned field
//     var clonedInput = clonedField.querySelector("input");
//     clonedInput.value = "";
//
//     // Append the cloned field to the fieldWrapper div
//     var fieldWrapper = document.getElementById("fieldWrapper");
//     fieldWrapper.appendChild(clonedField);
// });

document.getElementById("addFieldBtn").addEventListener("click", function() {
    // Clone the first field element
    var fieldContainer = document.querySelector(".field-container1");
    var clonedField = fieldContainer.cloneNode(true);

    // Clear the value in the cloned field
    var clonedInput = clonedField.querySelector("input");
    clonedInput.value = "";

    // Append the cloned field to the fieldWrapper div
    var fieldWrapper = document.getElementById("fieldWrapper");
    fieldWrapper.appendChild(clonedField);
});document.getElementById("addFieldBtn").addEventListener("click", function() {
    // Clone the first field element
    var fieldContainer = document.querySelector(".field-container2");
    var clonedField = fieldContainer.cloneNode(true);

    // Clear the value in the cloned field
    var clonedInput = clonedField.querySelector("input");
    clonedInput.value = "";

    // Append the cloned field to the fieldWrapper div
    var fieldWrapper = document.getElementById("fieldWrapper");
    fieldWrapper.appendChild(clonedField);
});

function goBackToPrevious(anchor) {
    window.location.href = document.referrer + anchor;
}
