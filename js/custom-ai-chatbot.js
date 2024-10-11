jQuery(document).ready(function($) {
    function sendQuery() {
        var userInput = $('#user-input').val().trim();

        // Client-side validation
        if (userInput === '') {
            alert('Please enter a question.');
            return;
        }

        $.ajax({
            url: chatbot_ajax_object.ajax_url,
            type: 'POST',
            data: {
                action: 'process_chatbot_request',
                user_input: userInput
            },
            success: function(response) {
                $('#chatbot-response').html(response);
            },
            error: function() {
                alert('An error occurred while processing your request. Please try again.');
            }
        });
    }

    // Send query on button click
    $('#send-btn').on('click', sendQuery);

    // Send query on Enter key press
    $('#user-input').on('keypress', function(e) {
        if (e.which == 13) {
            sendQuery();
            e.preventDefault();
        }
    });

    // Handle default question clicks
    $('.default-question').on('click', function() {
        var question = $(this).data('question');
        $('#user-input').val(question);
        sendQuery();
    });

    // Show/hide chatbot when the icon is clicked
    $('#chatbot-icon').on('click', function() {
        $('#chatbot-container').slideToggle();
    });

    // Close chatbot when the close icon is clicked
    $('#close-chatbox').on('click', function() {
        $('#chatbot-container').slideUp();
    });
});