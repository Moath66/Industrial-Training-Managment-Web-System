  document.addEventListener('DOMContentLoaded', function() {
    // Get the form element
    var form = document.getElementById('adminForm');

    // Add event listener for form submission
    form.addEventListener('submit', function(event) {
      // Prevent the default form submission
      event.preventDefault();

      // Validate the reason field
      var reasonField = document.querySelector('textarea[name="reason"]');
      var reason = reasonField.value.trim();

      if (reason === '') {
        alert('Please provide a reason');
        reasonField.focus();
        return;
      }

      // Submit the form if validation passes
      form.submit();
    });
  });
