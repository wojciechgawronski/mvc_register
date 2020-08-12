/**
 * Show / hide password
 * https://codepen.io/Wellington-Roth/pen/rNNVBBy
 */
const PassBtn = document.querySelector('#showHidePass');
PassBtn.addEventListener('click', () => {

      const input = document.querySelector('#password');
      input.getAttribute('type') === 'password' ? input.setAttribute('type', 'text') : input.setAttribute('type', 'password');
});