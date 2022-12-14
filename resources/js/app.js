import './bootstrap';


// Toggle Page Navigation
function toggleNav() {
  const collapsable = document.getElementById('collapsable-nav');

  if(collapsable.classList.contains('opened')) collapsable.classList.remove('opened');
  else collapsable.classList.add('opened');

}

document.addEventListener('DOMContentLoaded', function() {
  document.querySelectorAll('[data-nav-btn="toggle"]').forEach(btn => btn.addEventListener('click', toggleNav));

  document.getElementById('collapsable-nav').classList.add('closed');
});
