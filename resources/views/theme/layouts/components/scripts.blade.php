<!-- JavaScripts
============================================= -->
<script src="{{ asset('theme/js/jquery.js') }}"></script>
<script src="{{ asset('theme/js/slick.js') }}"></script>
<script src="{{ asset('theme/js/plugins.min.js') }}"></script>

<script>
    $(document).ready(function() {
        if(localStorage.getItem('popState') != 'shown'){
            $('#popupPrivacy').delay(1000).fadeIn();
        }
    });

    $('#cookieAcceptBarConfirm').click(function() // You are clicking the close button
    {
        $('#popupPrivacy').fadeOut(); // Now the pop up is hidden.
        localStorage.setItem('popState','shown');
    });
</script>

<!-- Footer Scripts
============================================= -->
@include('theme.layouts.components.banner-scripts')

<script src="{{ asset('theme/js/slick.extension.js') }}"></script>
<script src="{{ asset('theme/js/cookiealert.js') }}"></script>
<script src="{{ asset('theme/js/functions.js') }}"></script>
<script src="{{ asset('js/notify.js') }}"></script>

<script>
	jQuery(document).ready( function($){
		function modeSwitcher( elementCheck, elementParent ) {
			if( elementCheck.filter(':checked').length > 0 ) {
				elementParent.addClass('dark');
				$('.mode-switcher').toggleClass('pts-switch-active');
			} else {
				elementParent.removeClass('dark');
				$('.mode-switcher').toggleClass('pts-switch-active', false);
			}
		}

		$('.pts-switcher').each( function(){
			var element = $(this),
				elementCheck = element.find(':checkbox'),
				elementParent = $('body');

			modeSwitcher( elementCheck, elementParent );

			elementCheck.on( 'change', function(){
				modeSwitcher( elementCheck, elementParent );
			});
		});
	});
</script>



<script>
    $(".show_hide_password a").on('click', function(event) {
        event.preventDefault();
        if($(this).parent().parent().siblings('input').attr("type") == "text"){
            $(this).parent().parent().siblings('input').attr('type', 'password');
            $(this).children('i').addClass( "icon-eye-slash" );
            $(this).children('i').removeClass( "icon-eye" );
        }else if($(this).parent().parent().siblings('input').attr("type") == "password"){
            $(this).parent().parent().siblings('input').attr('type', 'text');
            $(this).children('i').removeClass( "icon-eye-slash" );
            $(this).children('i').addClass( "icon-eye" );
        }
    });

    function top_remove_product(id){
        $('#top-product-id').val(id);
        $('#remove-top-product').submit();
    }
</script>

<script>
    // Select all elements with the class "no-paste"
    var noPasteElements = document.querySelectorAll('.no-paste');

    // Loop through each element and attach event listener
    noPasteElements.forEach(function(element) {
        element.addEventListener('paste', function(event) {
            event.preventDefault();
        });
    });

    // Select all elements with the class "numbers-only"
    var numbersOnlyElements = document.querySelectorAll('.numbers-only');

    // Loop through each element and attach event listener
    numbersOnlyElements.forEach(function(element) {
        element.addEventListener('paste', function(event) {
            event.preventDefault();
        });

        element.addEventListener('input', function(event) {
            this.value = this.value.replace(/\D/g, '');
        });
    });
</script>


<script>
    $(document).ready(function() {
        $('#pageModal').modal('show');

        if(localStorage.getItem('popState') != 'shown'){
            $('#popupPrivacy').delay(1000).fadeIn();
        }
    });

    $('#cookieAcceptBarConfirm').click(function() // You are clicking the close button
    {
        $('#popupPrivacy').fadeOut(); // Now the pop up is hidden.
        localStorage.setItem('popState','shown');
    });
</script>


<script>
    function getEmail(){
        var email = $('#widget-subscribe-form-email').val(); // Get the value of the email input field
        $('#subscriber_email').val(email); // Set the value of the email input field in the modal form
    }
</script>

<script>
    // Shared acceptance utility available globally
    window.acceptPrivacy = function(redirectTo) {
        try {
            localStorage.setItem('privacyAccepted', 'true');
            localStorage.setItem('popState', 'shown');
        } catch (e) {}
        if (typeof jQuery !== 'undefined' && jQuery('#privacyBanner').length) {
            jQuery('#privacyBanner').fadeOut();
        }
        if (redirectTo) {
            window.location.href = redirectTo;
        }
    };

    // Privacy Banner and Unified Modal functionality
    $(document).ready(function() {
        // Show privacy banner if not accepted
        if(localStorage.getItem('privacyAccepted') != 'true'){
            $('#privacyBanner').show();
        }

        // Handle I Agree button click (use shared function) and redirect to Home
        $('#agreeButton').click(function() {
            if (typeof window.acceptPrivacy === 'function') {
                window.acceptPrivacy("{{ route('home') }}");
            } else {
                // Fallback
                $('#privacyBanner').fadeOut();
                try { localStorage.setItem('privacyAccepted', 'true'); } catch(e) {}
                try { localStorage.setItem('popState','shown'); } catch(e) {}
                window.location.href = "{{ route('home') }}";
            }
        });

        // Handle Privacy & Terms link click
        $('#privacyTermsLink').click(function(e) {
            e.preventDefault();
            resetModal();
            $('#privacyTermsModal').show();
        });

        // Handle modal close button
        $('#privacyTermsModalClose').click(function() {
            $('#privacyTermsModal').hide();
        });

        // Handle checkbox change to enable/disable accept button
        $('#unifiedAcceptCheck').change(function() {
            $('#unifiedAcceptButton').prop('disabled', !this.checked);
        });

        // Handle Unified Accept button
        $('#unifiedAcceptButton').click(function() {
            if ($('#unifiedAcceptCheck').is(':checked')) {
                localStorage.setItem('privacyAccepted', 'true');
                $('#privacyTermsModal').hide();
                $('#privacyBanner').fadeOut();

                // Show success message
                if (typeof $.notify !== 'undefined') {
                    $.notify('Privacy Policy and Terms of Use accepted successfully!', 'success');
                } else {
                    alert('Privacy Policy and Terms of Use accepted successfully!');
                }
            }
        });

        // Reset modal state
        function resetModal() {
            $('#unifiedAcceptCheck').prop('checked', false);
            $('#unifiedAcceptButton').prop('disabled', true);
        }

        // Close modal when clicking outside of it
        $(window).click(function(event) {
            if (event.target == document.getElementById('privacyTermsModal')) {
                $('#privacyTermsModal').hide();
            }
        });

        // Close modal with Escape key
        $(document).keydown(function(event) {
            if (event.keyCode == 27) { // Escape key
                $('#privacyTermsModal').hide();
            }
        });
    });
</script>


@yield('pagejs')
