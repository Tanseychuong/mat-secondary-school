/* =========================================================
   Mat Secondary School Website - Client-side Scripts
   Uses plain JavaScript for the mobile nav toggle and
   jQuery for contact form validation and feedback.
   ========================================================= */

// --- Mobile navigation toggle (vanilla JavaScript) ----------------------
document.addEventListener('DOMContentLoaded', function () {
    var navToggle = document.getElementById('navToggle');
    var siteNav = document.getElementById('siteNav');

    if (navToggle && siteNav) {
        navToggle.addEventListener('click', function () {
            var isOpen = siteNav.classList.toggle('open');
            navToggle.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
        });

        // Close the mobile menu when a link is clicked.
        siteNav.querySelectorAll('a').forEach(function (link) {
            link.addEventListener('click', function () {
                siteNav.classList.remove('open');
                navToggle.setAttribute('aria-expanded', 'false');
            });
        });
    }
});

// --- Contact form validation (jQuery) -----------------------------------
$(function () {
    var $form = $('#contactForm');

    if ($form.length === 0) {
        return;
    }

    var $name = $('#name');
    var $email = $('#email');
    var $subject = $('#subject');
    var $message = $('#message');

    /**
     * Validates a single required text field.
     * Returns an error message string, or an empty string if valid.
     */
    function validateRequired($field, label) {
        var value = $.trim($field.val());
        if (value === '') {
            return label + ' cannot be empty.';
        }
        return '';
    }

    /**
     * Validates the email field: required + basic format check.
     */
    function validateEmail($field) {
        var value = $.trim($field.val());
        var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        if (value === '') {
            return 'Email address cannot be empty.';
        }
        if (!emailPattern.test(value)) {
            return 'Please enter a valid email address.';
        }
        return '';
    }

    /**
     * Shows or clears an error message for a given field/error element pair.
     */
    function showFieldError($field, $errorEl, message) {
        if (message) {
            $field.addClass('input-error');
            $errorEl.text(message);
        } else {
            $field.removeClass('input-error');
            $errorEl.text('');
        }
    }

    // Live feedback as the user types/leaves a field.
    $name.on('blur input', function () {
        showFieldError($name, $('#nameError'), validateRequired($name, 'Name'));
    });

    $email.on('blur input', function () {
        showFieldError($email, $('#emailError'), validateEmail($email));
    });

    $subject.on('blur input', function () {
        showFieldError($subject, $('#subjectError'), validateRequired($subject, 'Subject'));
    });

    $message.on('blur input', function () {
        showFieldError($message, $('#messageError'), validateRequired($message, 'Message'));
    });

    // Full validation on submit; prevents submission if anything fails.
    // Note: this is a convenience check only — the server (PHP) always
    // re-validates every field before touching the database.
    $form.on('submit', function (event) {
        var nameError = validateRequired($name, 'Name');
        var emailError = validateEmail($email);
        var subjectError = validateRequired($subject, 'Subject');
        var messageError = validateRequired($message, 'Message');

        showFieldError($name, $('#nameError'), nameError);
        showFieldError($email, $('#emailError'), emailError);
        showFieldError($subject, $('#subjectError'), subjectError);
        showFieldError($message, $('#messageError'), messageError);

        if (nameError || emailError || subjectError || messageError) {
            event.preventDefault();

            // Scroll to and focus the first invalid field for good UX.
            var $firstInvalid = $form.find('.input-error').first();
            if ($firstInvalid.length) {
                $('html, body').animate({ scrollTop: $firstInvalid.offset().top - 100 }, 300);
                $firstInvalid.focus();
            }
        }
    });
});
