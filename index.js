function openGateInForm() {
    const form = document.getElementById('gateInForm');
    form.classList.toggle('hidden');
}

function submitGateIn() {
    const containerId = document.getElementById('containerId').value;
    if(containerId) {
        alert("Container ID " + containerId + " submitted!");
    } else {
        alert("Please enter a valid Container ID.");
    }
}
