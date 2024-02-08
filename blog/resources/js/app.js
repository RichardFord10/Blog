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
    selector: '#content, #about, #description',
    setup: function (editor) {
        editor.ui.registry.addButton('customcode', {
          text: 'Custom Code',
          onAction: function () {
            editor.insertContent('<div class="code-block"><div class="code-header"><span class="code-language"><!-- Language --!></span> <button class="copy-code">Copy code</button></div><pre><code class="language-#"></code></pre></div>');
          }
        }),
        editor.ui.registry.addButton('customheader', {
            text: 'Custom Header',
            onAction: function () {
              editor.insertContent('<h1 class="mb-1 text-center text-3xl font-heading font-bold text-gray-800 dark:text-white"></h1>');
            }
          });
      },
    extended_valid_elements: 'div[class|code-header|code-language|copy-code],code[class|language],pre,script[type|language]',
    custom_elements: 'code',
    skin: false,
    content_css: false,
    plugins: 'code lists link image table charmap media',
    toolbar: 'customcode | customheader | formatselect | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | blockquote | undo redo | cut copy paste | table | charmap | fullscreen | media | hr | removeformat | code ',
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


Alpine.start();
