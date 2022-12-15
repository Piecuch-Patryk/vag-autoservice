(function () {
  'use strict'

  const forms = document.querySelectorAll('.needs-validation')



  if(document.getElementById('alert')) {
    setTimeout(function() {
      document.getElementById('alert').remove();
      // Add some smooth fade out aimation!
    }, 5000);
  }


  Array.prototype.slice.call(forms)
    .forEach(function (form) {
      form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }

        form.classList.add('was-validated')
      }, false)
    })
})()