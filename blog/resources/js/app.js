import './bootstrap';
import Alpine from 'alpinejs';
import 'tinymce/tinymce';
import 'tinymce/skins/ui/oxide/skin.min.css';
import 'tinymce/skins/content/default/content.min.css';
import 'tinymce/skins/content/default/content.css';
import 'tinymce/icons/default/icons';
import 'tinymce/themes/silver/theme';
import 'tinymce/models/dom/model';
import 'tinymce/plugins/code';
import 'tinymce/plugins/lists';
import 'tinymce/plugins/image';
import 'tinymce/plugins/link';
import 'tinymce/plugins/table';
import 'tinymce/plugins/charmap';
import 'tinymce/plugins/media';
import '@fortawesome/fontawesome-free/js/all';




import Prism from 'prismjs';
import 'prismjs/components/prism-markup-templating';
import 'prismjs/components/prism-javascript';
import 'prismjs/components/prism-css';
import 'prismjs/components/prism-yaml';
import 'prismjs/components/prism-php';
import 'prismjs/components/prism-javascript';
import "prismjs/themes/prism-twilight.css";

import AOS from 'aos';
import 'aos/dist/aos.css';

AOS.init();

window.Alpine = Alpine;


tinymce.init({
    selector: '#content, #about',
    setup: function (editor) {
        editor.ui.registry.addButton('customcode', {
          text: 'Custom Code',
          onAction: function () {
            editor.insertContent('<div class="code-block"><div class="code-header"><span class="code-language"><!-- Language --!></span> <button class="copy-code">Copy code</button></div><pre><code class="language-#"></code></pre></div>');
          }
        });
      },
    extended_valid_elements: 'div[class|code-header|code-language|copy-code],code[class|language],pre,script[type|language]',
    custom_elements: 'code',
    skin: false,
    content_css: false,
    plugins: 'code lists link image table charmap media',
    toolbar: 'customcode | formatselect | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | blockquote | undo redo | cut copy paste | table | charmap | fullscreen | media | hr | removeformat | code ',
});

//Prism syntax highlighting
document.addEventListener('DOMContentLoaded', (e) => {
    Prism.highlightAll();

    var imageElement = document.getElementById('image');

    if (imageElement) {
        imageElement.addEventListener('change', function() {
            var file = this.files[0];
            if (file) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('preview-img').src = e.target.result;
                    document.getElementById('image-preview').classList.remove('hidden');
                };
                reader.readAsDataURL(file);
            }
        });
    }

    AOS.init();

});

//copy code
document.querySelectorAll('.copy-code').forEach((button) => {
    button.addEventListener('click', function () {
        const code = this.parentNode.nextElementSibling.querySelector('code').innerText;
        const textarea = document.createElement('textarea');
        textarea.value = code;
        document.body.appendChild(textarea);
        textarea.select();
        document.execCommand('copy');
        textarea.remove();

        // Optional: Show a message that the code was copied
        button.textContent = 'Copied!';
        setTimeout(() => { button.textContent = 'Copy code'; }, 2000);
    });
});

if (document.getElementById('postForm')) {

    document.getElementById('postForm').addEventListener('submit', function () {
        var contentTextarea = document.getElementById('content');
        if (tinymce.get('content').getContent().trim() === '') {
            contentTextarea.style.display = 'block';
        } else {
            contentTextarea.style.display = 'none';
            contentTextarea.value = tinymce.get('content').getContent();
        }
    });
}


// Define an Alpine component for the chat
window.chat = () => {
    return {
        message: '',
        messages: [],
        sendMessage() {
            if (this.message.trim() === '') {
                return;
            }

            // Add the message to the messages array
            this.messages.push({ text: this.message, type: 'sent' });

            // Prepare data to be sent in the POST request
            const postData = {
                prompt: this.message,
                _token: document.querySelector('input[name="_token"]').value // CSRF token
            };

            // Reset the message input
            this.message = '';

            // Perform the POST request using fetch
            fetch('/chat', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    // Use the csrf-token meta tag content for CSRF protection
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify(postData)
            })
                .then(response => response.json())
                .then(data => {
                    // Add the received message to the messages array
                    this.messages.push({ text: data.choices[0].text, type: 'received' });
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        }
    };
};

window.dinoGame = () => {
    return {
        score: 0,
        gameInterval: null,
        jumpInterval: null,
        isJumping: false,
        dinoElement: null,
        obstacleElement: null,

        init() {
            this.dinoElement = this.$refs.dino;
            this.obstacleElement = this.$refs.obstacle;
            document.addEventListener('keydown', (e) => {
                if (e.code === 'Space') {
                    this.jump();
                }
            });
        },

        startGame() {
            this.resetGame();
            this.gameInterval = setInterval(() => {
                this.score++;
                this.moveObstacle();
                this.checkCollision();
            }, 50);
        },

        resetGame() {
            this.score = 0;
            this.obstacleElement.style.right = '499px'; // Reset obstacle position
        },

        moveObstacle() {
            let currentRight = parseInt(this.obstacleElement.style.right, 10);
            currentRight += 6; // Fixed obstacle speed
            this.obstacleElement.style.right = `${currentRight}px`;


            const gameAreaWidth = parseInt(window.getComputedStyle(this.dinoElement.parentElement).width, 10);
            if (currentRight >= gameAreaWidth) {
                this.generateObstacle();
            }
        },

        generateObstacle() {
            const minHeight = 1;
            const maxHeight = 3;
            const randomHeight = Math.floor(Math.random() * (maxHeight - minHeight + 1)) + minHeight;

            this.obstacleElement.style.right = '100%';
            this.obstacleElement.style.bottom = `${randomHeight}px`;
        },


        jump() {
            if (this.isJumping) return;
            this.isJumping = true;
            let jumpHeight = 0;
            const jumpPeak = 80; // Adjust for jump height

            this.jumpInterval = setInterval(() => {
                if (jumpHeight < jumpPeak) {
                    jumpHeight += 5; // Adjust for jump speed
                    this.dinoElement.style.bottom = `${jumpHeight}px`;
                } else {
                    clearInterval(this.jumpInterval);
                    this.fallDown();
                }
            }, 20);
        },

        fallDown() {
            let jumpHeight = parseInt(window.getComputedStyle(this.dinoElement).bottom, 10);

            const fallInterval = setInterval(() => {
                if (jumpHeight > 0) {
                    jumpHeight -= 3; // Adjust for fall speed
                    this.dinoElement.style.bottom = `${jumpHeight}px`;
                } else {
                    clearInterval(fallInterval);
                    this.isJumping = false;
                }
            }, 20);
        },

        checkCollision() {
            const dinoRect = this.dinoElement.getBoundingClientRect();
            const obstacleRect = this.obstacleElement.getBoundingClientRect();

            // Adjust for any transparent or non-collision areas
            const dinoCollisionOffset = { right: 20, bottom: 20 }; // Adjust these values as needed
            const obstacleCollisionOffset = { left: 20, top: 20 }; // Adjust these values as needed

            // Check for overlap considering offsets
            const isCollision = (dinoRect.right - dinoCollisionOffset.right) > (obstacleRect.left + obstacleCollisionOffset.left) &&
                (dinoRect.bottom - dinoCollisionOffset.bottom) > (obstacleRect.top + obstacleCollisionOffset.top) &&
                dinoRect.left < obstacleRect.right &&
                dinoRect.top < obstacleRect.bottom;

            if (isCollision) {
                console.log('Collision Detected');
                clearInterval(this.gameInterval);
                this.resetGame();
                alert('Game Over');
                location.reload();
                // this.startGame(); // Reset game or other game over logic
            }
        }

    };
}


function checkFile() {
    var fileInput = document.getElementById('csv_file');
    var uploadButton = document.getElementById('uploadButton');
    if (fileInput.value) {
        uploadButton.classList.remove('hidden');
    } else {
        uploadButton.classList.add('hidden');
    }
}


// Add an event listener to your download button
if (document.getElementById('download')) {
    document.getElementById('download').addEventListener('click', function () {
        downloadCSV('table-data');
    });
}



document.addEventListener('alpine:init', () => {
    Alpine.data('createCsv', () => ({
        showUploadForm: true,
        showTableForm: false,
        rows: 0,
        columns: 0,
        table: [],
        tableGenerated: false,
        hasCsvData: false,
        showDownloadButton: false,

        
        //csv
        downloadCSV() {
            // Select the table
            var table = document.querySelector('table');
            var csvString = '';

            // Initialize variable to track if any data rows are found
            var hasDataRows = false;

            // Loop through each row in the table
            for (var row of table.rows) {
                var rowData = [];

                // Loop through each cell in the row
                for (var cell of row.cells) {
                    // Add the cell data to the rowData array, ensuring to escape any commas or double-quotes
                    rowData.push('"' + cell.innerText.replace(/"/g, '""') + '"');
                }

                // Check if this is a data row (not a header) and has content
                if (table.rows[0] !== row && rowData.join('').replace(/"/g, '').trim() !== '') {
                    hasDataRows = true;
                }

                // Join rowData with commas and add a newline character to form the CSV string
                csvString += rowData.join(',') + '\r\n';
            }

            // Check if there were any data rows
            if (!hasDataRows) {
                alert("There is no data to download.");
                return;
            }

            // Create a Blob from the CSV string
            var blob = new Blob([csvString], { type: 'text/csv' });

            // Create a link element, set the filename, and trigger the download
            var a = document.createElement('a');
            a.href = URL.createObjectURL(blob);
            a.download = "data" + '.csv';
            document.body.appendChild(a);
            a.click();
            document.body.removeChild(a);
        },

        createTable() {
            this.showDownloadButton = true;
            this.adjustTable();
        },


        adjustTable() {


            this.table = Array.from({ length: this.rows }, (_, rowIndex) => {
                // Ensure the row exists or create a new one
                const row = this.table[rowIndex] || [];
                // Adjust the columns, preserving existing data
                return Array.from({ length: this.columns }, (_, colIndex) => row[colIndex] || '');
            });

            

            if (this.checkCsvData()) {
                this.showDownloadButton = true;
            }
        },

        // Call adjustTable whenever rows or columns change
        init() {
            this.$watch('rows', (newRows) => {
                if (newRows > 20) {
                    this.rows = 20; // Set rows to max if exceeded
                    this.$refs.rowsInput.value = 20; // Update input field value
                    this.$refs.rowsInput.dispatchEvent(new Event('input')); // Trigger input event
                }
                this.adjustTable();
            });
        
            this.$watch('columns', (newColumns) => {
                if (newColumns > 10) {
                    this.columns = 10; // Set columns to max if exceeded
                    this.$refs.columnsInput.value = 10; // Update input field value
                    this.$refs.columnsInput.dispatchEvent(new Event('input')); // Trigger input event
                }
                this.adjustTable();
            });
        },

        toggleForms() {
            if (this.showUploadForm) {
                // We're switching to create new CSV form
                this.showTableForm = true;
                this.showUploadForm = false;
                this.showDownloadButton = true;
            } else {
                // We're switching back to upload CSV form, reset the table
                this.showTableForm = false;
                this.showUploadForm = true;
                this.resetTable();
            }
        },

        checkCsvData() {
            // Assume no data initially
            // Loop through each row of the table
            for (let row of this.table) {
                // Check if any cell in the row is not empty
                if (row.some(cell => cell.trim() !== '')) {
                    this.hasCsvData = true;
                    this.showDownloadButton = true;
                    return true;
                }
            }
        },

        resetTable() {
            this.rows = 0;
            this.columns = 0;
            this.table = [];
        },



    }));

    // setInterval(() => {checkCsvData, 2000});


});


Alpine.start();
