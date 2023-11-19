document.addEventListener('DOMContentLoaded', function () {
    // Step 3: Handle Popup Opening and Closing
    document.getElementById('openPopupBtn').addEventListener('click', function() {
        document.getElementById('documentPopup').style.display = 'block';
    });

    // Step 4: Handle Form Submission
    document.getElementById('documentForm').addEventListener('submit', function(event) {
        event.preventDefault();

        // Get the selected documents and store their paths in local storage
        const birthCertificatePath = document.querySelector('[name="birth_certificate"]').value;
        localStorage.setItem('birth_certificate', birthCertificatePath);

        // Repeat for other documents

        // Close the popup
        document.getElementById('documentPopup').style.display = 'none';
    });
});