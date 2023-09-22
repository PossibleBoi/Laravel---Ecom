<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title_slot }}</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css" type=text/css>

    <script src="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone-min.js"></script>
    <link href="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone.css" rel="stylesheet" type="text/css" />
</head>

<body>
    {{ $body_slot }}

    <script type="text/javascript">
        var dropzone = new Dropzone('#image-upload', {
            autoProcessQueue: false,
            uploadMultiple: true,
            parallelUploads: 100,
            maxFiles: 5,
            maxFilesize: 1,
            thumbnailWidth: 200,
            acceptedFiles: ".jpeg,.jpg,.png,",
            addRemoveLinks: true,
            success: function(file, response) {
                console.log(response);
                showMessage("Upload Successful");
                file.previewElement.querySelector(".dz-remove").remove();
                setTimeout(function() {
                    window.location.href = "{{ route('vendor.products') }}";
                }, 500);
            },

            error: function(file, response) {
                return false;
            }

        });
        document.querySelector("button[type=button]").addEventListener("click", function(e) {
            // Make sure that the form isn't actually being sent.
            e.preventDefault();
            e.stopPropagation();
            dropzone.processQueue();
        });

        function showMessage(message) {
            // Create and display a pop-up message
            var popup = document.createElement("div");
            popup.innerHTML = message;
            popup.className = "popup";
            document.body.appendChild(popup);

            // Remove the pop-up message after 3 seconds
            setTimeout(function() {
                popup.parentNode.removeChild(popup);
            }, 500);
        }
        this.on("sendingmultiple", function() {
            // Gets triggered when the form is actually being sent.
            // Hide the success button or the complete form.
        });
        this.on("successmultiple", function(files, response) {
            // Gets triggered when the files have successfully been sent.
            // Redirect user or notify of success.
        });
        this.on("errormultiple", function(files, response) {
            // Gets triggered when there was an error sending the files.
            // Maybe show form again, and notify user of error
        });
    </script>

    {{-- <script>
        document.addEventListener("DOMContentLoaded", function() {
            const removeImageButton = document.getElementById("removeImageButton");
            const checkboxes = document.querySelectorAll(".image-checkbox");

            removeImageButton.addEventListener("click", function() {
                const selectedImageIds = [];

                checkboxes.forEach((checkbox) => {
                    if (checkbox.checked) {
                        selectedImageIds.push(checkbox.getAttribute("data-image-id"));
                    }
                });

                // Send the selectedImageIds to your server using AJAX or a form submission
                // Example using AJAX (you may need to adjust this based on your backend)
                if (selectedImageIds.length > 0) {
                    fetch("img/delete", {
                            method: "DELETE",
                            headers: {
                                "Content-Type": "application/json",
                                // Add any additional headers you may need
                            },
                            body: JSON.stringify({
                                selectedImageIds
                            }),
                        })
                        .then((response) => {
                            if (response.ok) {
                                // Handle a successful response here
                                console.log("Images removed successfully");
                                // You can also refresh the page or update the UI as needed
                            } else {
                                // Handle errors if needed
                                console.error("Error removing images");
                            }
                        })
                        .catch((error) => {
                            console.error("Request failed:", error);
                        });
                } else {
                    alert("Please select at least one image to remove.");
                }
            });
        });
    </script> --}}
</body>

</html>
