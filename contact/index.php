<?php 
    // Before we do anything, we need to initialize a bunch of stuff: namely, 
    // universal constants (for ease of access) and a database connection.
    require_once("../private/initialize.php");
?>
<?php
    // Page Metadata
	$SLUG = "contact";
    array_push($wanted_ext_js, "wzrd.io.js");
?>
<?php require_once(DOC_PREFIX . SHARED_PATH . "/public-head/index.php"); ?>
		
		<main>
            <h2>Contact</h2>
            <form id="contact_form" name="contact_form">
                <input name="cf_name" type="text" placeholder="Full Name">
                <input name="cf_email" type="text" placeholder="Email Address">
                <input name="cf_subject" type="text" placeholder="Subject">
                <textarea name="cf_body" placeholder="Message Body"></textarea>
                <button type="submit" id="submit_cf">Submit</button>
            </form>

            <script>
                const scriptURL = 'https://script.google.com/macros/s/AKfycbwSNXVArxB3Vm_FeheUMyL6GpTX0JwazlJfRq7DekShCpQjqt52/exec';
                const form = document.forms['contact_form'];

                form.addEventListener('submit', e => {
                    e.preventDefault()
                    fetch(scriptURL, { method: 'POST', body: new FormData(form)})
                        .then(response => {
                            console.log('Success!', response);
                            form.reset();
                            location.reload();
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