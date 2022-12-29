(function () {
  'use strict'

  if(document.querySelectorAll('[data-custom-scroll]')) {
    const btns = document.querySelectorAll('[data-custom-scroll]')
    
    btns.forEach(btn => {
      btn.addEventListener('click', handleScroll);
    });

    function handleScroll(e) {
      e.preventDefault();
      const el = document.querySelector(this.attributes['data-custom-scroll'].value);
      const closeBtn = this.closest('#navModal').querySelector('[data-bs-dismiss="modal"]');
      
      closeBtn.click();

      setTimeout(function() {
        el.scrollIntoView();
      }, 500);
    }
  }
})()