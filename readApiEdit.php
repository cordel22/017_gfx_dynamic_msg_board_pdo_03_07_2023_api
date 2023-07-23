<!DOCTYPE html>
<html>
<head>
</head>
<body>
    <h1>from forum.php </h1>

    <div>Forum Home link takes you to the json page, 
        use this to get to the view of Forum
    </div>
    
    <div>
        <button>
            <a href="forumapi.php">Takes you to forumapi.php!!!</a>
        </button>
    </div>

    <div>
        <?php 
            // TODO: Instead of the header HTML, include just the PHP part or necessary text.
            include('restfulphp/headerview.php');
            
            // Display links:
            // Default links:
            // TODO: Make another file for the view!
            require_once('./misc/linx.php');

            // Display links based on login status:
            require_once('./misc/logstatlinx.php');

            // For choosing a forum / language:
        ?>
    </div>

    <div>
        The thread arrays are in an array, some values are undefined..!
    </div>
    
    <div id="jsonApiOutput">
    </div>
    
    <script>
        // Get the tid from the URL
        const urlParams = new URLSearchParams(window.location.search);
        const tid = urlParams.get('tid');
        console.log(tid);
        
        document.addEventListener('DOMContentLoaded', function() {
            fetch(`read.php?tid=${tid}`)
            .then(response => {
                return response.json()
            })
            .then(data => {
                console.log(data);
                let subjectToForm = data[1]['subject'];
                console.log(subjectToForm);

                // Set the value of subjectToForm in the input field
            document.querySelector('input[name="subject"]').value = subjectToForm;
            document.querySelector('input[name="tid"]').value = tid;

                //  do u still need these buttons here..?
                const formattedData = data.map(dat => {
                    let row = '';
                    for (const key in dat) {
                        if (key === 'subject') {
                            row += `${key}: ${dat[key]}<br>
                                <form id="editForm" action="update_thread.php" method="POST">
                                    <input type="hidden" name="tid" value="${tid}">
                                    <button type="submit">Edit</button>
                                </form>
                                <form id="deleteForm" action="delete.php" method="POST">
                                    <input type="hidden" name="tid" value="${tid}">
                                    <button type="submit">Delete</button>
                                </form><br>`;
                        } else {
                            row += `${key}: ${dat[key]}<br>`;
                        }
                    }
                    return row;
                });

                document.querySelector('#jsonApiOutput').innerHTML = formattedData.join('<hr>');
            })
        });

        function updateThread(tid) {
            // Perform the update operation using the threadId
            // You can use an AJAX request or redirect to the update page
            // Example: window.location.href = `update.php?id=${threadId}`;
            console.log(`Update thread: ${tid}`);
            window.location.href = `update.php?id=${tid}`;
        }
    </script>

<form id="editSubjectForm" action="update_thread.php" method="POST">
        <input type="hidden" name="tid" value="<?php echo $tid; ?>">
        <label for="subject">Subject:</label>
        <input type="text" name="subject" value="">
        <button type="submit">Save</button>
    </form>

</body>
</html>
