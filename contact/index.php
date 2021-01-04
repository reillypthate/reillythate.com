<?php 
    // Before we do anything, we need to initialize a bunch of stuff: namely, 
    // universal constants (for ease of access) and a database connection.
    require_once("../private/initialize.php");
?>
<?php
    // Page Metadata
	$SLUG = "contact";
    array_push($wanted_ext_js, "vendor/wzrd.io.js");
    array_push($wanted_body_js, "page-specific/contact-form-validator.js");
?>
<?php require_once(DOC_PREFIX . SHARED_PATH . "/public-head/index.php"); ?>
		
		<main id="contact-main">

            <article>
                <h2>Let's Connect!</h2>
            </article>
            <form id="contact-form" name="contact-form">

                <label for="cf_first_name" id="cf-label_first-name">First Name<span class="required">*</span></label>
                <input name="cf_first_name" id="cf-field_first-name" type="text" placeholder="Reilly">

                <label for="cf_last_name" id="cf-label_last-name">Last Name<span class="required">*</span></label>
                <input name="cf_last_name" id="cf-field_last-name" type="text" placeholder="Thate">

                <label for="cf_email" id="cf-label_email">Email Address<span class="required">*</span></label>
                <input name="cf_email" id="cf-field_email" type="text" placeholder="email@yahoo.com">

                <label for="cf_subject" id="cf-label_subject">Message Subject<span class="required">*</span></label>
                <input name="cf_subject" id="cf-field_subject" type="text" placeholder="Review">

                <label for="cf_body" id="cf-label_message-body">Message Body<span class="required">*</span></label>
                <textarea name="cf_body" id="cf-field_message-body" placeholder="Your work is amazing!"></textarea>

                <button type="submit" id="cf-button_submit" disabled>Submit</button>
            </form>
            <article>
                <h2>Social Media Links</h2>
<?php $card_table->generateCardSection(array("portfolio", "education", "about"), 2, 3, ""); ?>
            </article>

            <script>
                const scriptURL = 'https://script.google.com/macros/s/AKfycbwSNXVArxB3Vm_FeheUMyL6GpTX0JwazlJfRq7DekShCpQjqt52/exec';
                const form = document.forms['contact-form'];

                form.addEventListener('submit', e => {
                    e.preventDefault()
                    fetch(scriptURL, { method: 'POST', body: new FormData(form)})
                        .then(response => {
                            console.log('Success!', response);
                            form.reset();
                            $('#contact-form').after("<div class=\"success-message\"><p>Your message has been sent!</p><a href=\"<?php echo $directory_table->linkBySlug("contact"); ?>\">Send another?</a></div>");
                            $('#contact-form').remove();
                        })
                        .catch(error => {
                            console.error('Error!', error.message);
                            form.reset();
                            location.reload();
                        });
                });
            </script>
        </main>

<?php require_once(DOC_PREFIX . SHARED_PATH . "/public-foot/index.php"); ?>