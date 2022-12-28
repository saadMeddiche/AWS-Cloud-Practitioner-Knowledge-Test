/* Detect if the user has tried to do something rather than answering the test */
window.addEventListener('blur', function() {
    window.location.href="./Banned/bannedPage.php";
});