<?php 
// Function to adjust textarea height based on content
                            function adjustTextareaHeight() {
                            const textarea = document.getElementById('myTextarea<?= $index; ?>');
                            textarea.style.height = 'auto'; // Reset height to auto to allow it to shrink
                            textarea.style.height = textarea.scrollHeight + 'px'; // Set the height to match the content
                            }

                            // Function to populate textarea with value and adjust height
                            function populateTextareaAndAdjustHeight(value) {
                            const textarea = document.getElementById('myTextarea<?= $index; ?>');
                            textarea.value = value; // Set the value
                            adjustTextareaHeight(); // Adjust height based on content
                            }

         

                            // Example of fetching value from server (replace this with your actual data fetching mechanism)
                            const fetchedValue<?= $index; ?> = "<?= $comment['comments']; ?>";
                            populateTextareaAndAdjustHeight(fetchedValue<?= $index; ?>);
?>