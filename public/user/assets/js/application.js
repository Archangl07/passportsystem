// document.addEventListener('DOMContentLoaded', function () {
//     // Step 3: Handle Popup Opening
//     document.getElementById('openPopupBtn').addEventListener('click', function () {
//         // Open a new window with the document form
//         var popupWindow = window.open('', '_blank', 'width=400,height=400');

//         // Write the form HTML to the new window
//         popupWindow.document.write(`
//         <html>
//         <head>
//             <title>Document Form</title>
//             <style>
//                 body {
//                     font-family: Arial, sans-serif;
//                     padding: 20px;
//                 }
//                 label {
//                     display: block;
//                     margin-bottom: 10px;
//                 }
//                 input[type="file"] {
//                     margin-bottom: 15px;
//                 }
//                 button {
//                     padding: 10px;
//                     background-color: #4CAF50;
//                     color: white;
//                     border: none;
//                     border-radius: 4px;
//                     cursor: pointer;
//                 }
//             </style>
//         </head>
//         <body>
//             <form id="documentForm" enctype="multipart/form-data">
            
//                 <div>
//                     <label for="birth_certificate">Birth Certificate</label>
//                     <input type="file" name="birth_certificate" id="birth_certificate">
//                 </div>
//                 <!-- Add more file inputs for other documents -->

//                 <div>
//                     <label for="NIC">NIC</label>
//                     <input type="file" name="nic" id="nic">
//                 </div>

//                 <div>
//                     <label for="Medical_certificate">Medical certificate</label>
//                     <input type="file" name="Medical_certificate" id="Medical_certificate">
//                 </div>

//                 <div>
//                     <label for="Fingerprint">Finger print</label>
//                     <input type="file" name="Fingerprint" id="Fingerprint">
//                 </div>

//                 <div>
//                     <label for="Digitalphoto">Digital photo</label>
//                     <input type="file" name="Digitalphoto" id="Digitalphoto">
//                 </div>
//                 <button type="submit">Save Documents</button>
//             </form>


//             <script>
//             document.addEventListener('DOMContentLoaded', function () {
//                 document.getElementById('documentForm').addEventListener('submit', function (event) {
//                     event.preventDefault(); // Prevent the default form submission behavior
            
//                     // Get the selected documents and store their paths in local storage
//                         const birthCertificatePath = document.querySelector('[name="birth_certificate"]').value;
//                         const nicPath = document.querySelector('[name="NIC"]').value;
//                         const medicalCertificatePath = document.querySelector('[name="Medical_certificate"]').value;
//                         const fingerprintPath = document.querySelector('[name="Fingerprint"]').value;
//                         const digitalPhotoPath = document.querySelector('[name="Digitalphoto"]').value;

//                         localStorage.setItem('birth_certificate', birthCertificatePath);
//                         localStorage.setItem('NIC', nicPath);
//                         localStorage.setItem('Medical_certificate', medicalCertificatePath);
//                         localStorage.setItem('Fingerprint', fingerprintPath);
//                         localStorage.setItem('Digitalphoto', digitalPhotoPath);
            
        
//                     // Perform an AJAX request to save the documents
//                     $.ajax({
//                         url: '/save-documents', // Adjust the route accordingly
//                         type: 'POST',
//                         data: {
//                             _token: $('meta[name="csrf-token"]').attr('content'),
//                             birth_certificate: birthCertificatePath,
//                             NIC: nicPath,
//                             Medical_certificate: medicalCertificatePath,
//                             Fingerprint: fingerprintPath,
//                             Digitalphoto: digitalPhotoPath,

//                         },
//                         success: function (data) {
//                             console.log(data);
//                             alert('Success: ' + data.message);
//                             // You can handle success, e.g., show a success message to the user
//                         },
//                         error: function (error) {
//                             console.error('Error saving documents:', error);
//                         }
//                     });
            
//                     // Close the popup
//                     window.close();
//                 });
//             });
            
//             </script>
//             </body>
//             </html>
//         `);
//     });
// });
