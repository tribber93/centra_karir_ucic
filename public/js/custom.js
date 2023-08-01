const checkbox = document.getElementById("tracerCheckbox");
const formInputs = document.querySelectorAll(".form-input");

function toggleOtherInput() {
    var otherRadio = document.getElementById("other");
    var otherInput = document.getElementById("otherInput");

    if (!otherRadio.checked) {
        otherInput.style.display = "none";
    } else {
        otherInput.style.display = "";
    }
}

if (!checkbox.checked) {
    formInputs.forEach((input) => {
        if (input.dataset.target === "tracerCheckbox") {
            input.style.display = "none";
        }
    });
}

checkbox.addEventListener("change", function () {
    const isChecked = checkbox.checked;
    formInputs.forEach((input) => {
        if (input.dataset.target === "tracerCheckbox") {
            input.style.display = isChecked ? "" : "none";
        }
    });
});
