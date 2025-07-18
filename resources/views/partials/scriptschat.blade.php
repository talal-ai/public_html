<script src="{{ asset('public/assets/js/alpine-collaspe.min.js') }}"></script>
<script src="{{ asset('public/assets/js/alpine-persist.min.js') }}"></script>
<script src="{{ asset('public/assets/js/alpine.min.js') }}"></script>
<script src="{{ asset('public/assets/js/custom.js') }}"></script>
<script src="{{ asset('public/build/assets/app-ClxcITQn.js') }}"></script>
@yield('script')
<!-- <script>
   document.addEventListener('livewire:load', function () {
      // Initialize Alpine after Livewire has loaded
      Alpine.start();
   });
</script> -->
<!-- <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Function to scroll to the bottom of the conversation
        function scrollToBottom() {
            const chatContainer = document.getElementById('conversation');
            if (chatContainer) {
                chatContainer.scrollTop = chatContainer.scrollHeight;
            }
        }

        // Scroll to the bottom on page load
        scrollToBottom();
    });
</script> -->
<!-- <script>
    document.addEventListener('DOMContentLoaded', () => {
        Livewire.on('scrollToBottom', () => {
            const chatContainer = document.getElementById('conversation');
            if (chatContainer) {
                chatContainer.scrollTop = chatContainer.scrollHeight;
            }
        });
    });
</script> -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Get the conversation ID from the URL
        const url = new URL(window.location.href);
        const conversationId = url.pathname.split('/').pop();

        // Find the corresponding conversation element
        const conversationElement = document.getElementById('conversation-' + conversationId);

        if (conversationElement) {
            // Scroll to the conversation element
            conversationElement.scrollIntoView({ behavior: 'smooth', block: 'start' });

            // Optionally highlight the element
            conversationElement.style.backgroundColor = '#d1e7f3';
        }
    });
</script>
<script>
    function toggleButton() {
        const input = document.getElementById('messageInput');
        const button = document.getElementById('sendButton');
        button.disabled = input.value.trim() === '';
    }
</script>
<script>
    document.querySelectorAll('.positive-only').forEach(function (input) {
        input.addEventListener('input', function () {
            if (this.value < 0) {
                this.value = 0;
            }
        });
    });
</script>

