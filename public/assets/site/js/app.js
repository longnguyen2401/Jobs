function windowScroll() {
    var t = document.getElementById("navbar");
    50 <= document.body.scrollTop || 50 <= document.documentElement.scrollTop
        ? t.classList.add("nav-sticky")
        : t.classList.remove("nav-sticky");
}
window.addEventListener("scroll", function (t) {
    t.preventDefault(), windowScroll();
});
var tooltipTriggerList = [].slice.call(
        document.querySelectorAll('[data-bs-toggle="tooltip"]')
    ),
    tooltipList = tooltipTriggerList.map(function (t) {
        return new bootstrap.Tooltip(t);
    });


// Get references to all textareas and character count elements
const textareas = document.querySelectorAll('.textarea-count');
const charCounts = document.querySelectorAll('.textarea-display');

// Add event listeners to each textarea
textareas.forEach(function(textarea, index) {
    const charCount = charCounts[index];
    
    const textLength = textarea.value.length;
    charCount.textContent = textLength + '/' + textarea.maxLength;

    textarea.addEventListener('input', function() {
        const textLength = textarea.value.length;
        charCount.textContent = textLength + '/' + textarea.maxLength;

        if (textLength > textarea.maxLength) {
            textarea.value = textarea.value.slice(0, textarea.maxLength);
        }
    });
});



// Handle string "-" "e" enter into input type number
var lastText = '';
function validateNumberInput(input) {
    const value = input.value;
    if (value != '') {
        lastText = value;
    }
    console.log(input.value);
    const valid = /^\d*\.?\d+$/.test(value);
    if (!valid) {
        alert('Vui lòng chỉ nhập số.');
        input.value = lastText;
    }
}