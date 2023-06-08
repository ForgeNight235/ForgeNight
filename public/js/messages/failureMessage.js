const failureMessage = () => {

const failureMessage = document.getElementById('success-message');

if (failureMessage)
{
setTimeout(function() {
var failureMessage = document.getElementById('failure-message');
if (failureMessage) {
    failureMessage.classList.remove('show');
}
}, 5000);
}

}

const initFailureMessage = () => {
    failureMessage();
}

document.addEventListener('DOMContentLoaded', initFailureMessage);
