<!DOCTYPE html>
<head>

</head>
<body>
    <h1>from index.php </h1>

    <div>Forum Home link takes you to the json page, 
        use this to get to the view of Forum
    </div>
    
    <div>
        <button>
    <a href="forumapi.php">Takes you to forumapi.php!!!</a>
</button>
</div>

<div>
    Following links take you to the api pges, and display the json_decode

    I guess heree comes just the login / logout option according to status 
</div>
<div>
    <?php 

    //  TODO, instead of the header html just the php part of it above
    //  or text when necessary...
include('restfulphp/headerview.php');

    
    
    //  Display links:

    //  Default links:
//  TODO make another file for the view ..!
    require_once('./misc/linx.php');



    //  Display links based upon login status:

    require_once('./misc/logstatlinx.php');


    //  For choosing a forum / language:
 

    ?>
</div>

    <div id="jsonApiOutput1">

    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            fetch('index.php')
            .then(response => {
                return response.json()
            })
            .then(data => {

                console.log(data);

                dataSubject = data.intro

                document.querySelector('#jsonApiOutput1').innerHTML = dataSubject;
            })
            .catch(error => {
                console.log(error);
                document.querySelector('#jsonApiOutput1').innerHTML = 'Error: Failed to fetch JSON data.';
            });
        });


    </script>





<!--     how about putting the export from post.php bout the status of the post input, 
acceptnce, hygiene, or shit???   -->



<div id="jsonApiOutput2">

    </div>

<?php
    require_once('./restfulphp/post_form_indexapi.php');
?>

<script>
    document.getElementById('postForm').addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent the form from submitting

        // Collect form data
        const formData = new FormData(this);

        // Send the AJAX request
        fetch('post.php', {
            method: 'POST',
            body: formData
        })
        .then(response => {
            if (response.ok) {
                return response.json();
            } else {
                throw new Error(response.statusText);
            }
        })
        .then(data => {
            // Update the target element with the desired value from data
            //  document.querySelector('#jsonApiOutput2').innerHTML = data.message;

            if (data.message === 'Your post has been successfully submitted.') {
                // Clear the form inputs
                //  document.querySelector('#postForm').reset();
                // Clear the form inputs
                document.querySelector('input[name="subject"]').value = '';
                document.querySelector('textarea[name="body"]').value = '';

                subjectInput.setAttribute('readonly', 'readonly');
                bodyTextarea.setAttribute('readonly', 'readonly');
                
                subjectInput.value = '';
                bodyTextarea.value = '';
                
                subjectInput.removeAttribute('readonly');
                bodyTextarea.removeAttribute('readonly');

                // Update the reply section with the new reply
                const replySection = document.querySelector('#jsonApiOutput2');
                const newReply = document.createElement('div');
                newReply.innerHTML = data.message/* 'New reply content' */; // Replace with the actual content of the new reply
                replySection.appendChild(newReply);
            } else {
                // Update the target element with the desired value from data
                document.querySelector('#jsonApiOutput2').innerHTML = data.message;
            }

        })
        .catch(error => {
            console.log(error);
            document.querySelector('#jsonApiOutput2').innerHTML = 'Error: Failed to fetch JSON data.';
        });
    });
</script>



</body>
</html>