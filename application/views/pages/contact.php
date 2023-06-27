
<div class="page contact">
    <form id="email-form">

        <label for="name">Name</label><br>
        <input id="name" type="text" name="name" maxlength="64" placeholder="Enter name">
        <div id="name_error" class="form_error"></div>

        <label for="email">Email</label>
        <input type="text" id="email" name="email" maxlength="64" placeholder="Enter email">
        <div id="email_error" class="form_error"></div>

        <label for="confirm-email">Confirm email</label>
        <input type="text" id="confirm-email" name="confirm_email" maxlength="64" placeholder="Confirm email">
        <div id="confirm_email_error" class="form_error"></div>

        <label for="subject">Subject</label>
        <input type="text" id="subject" name="subject" maxlength="64" placeholder="Subject">
        <div id="subject_error" class="form_error"></div>

        <label for="message">Message</label>
        <textarea type="text" id="message" name="message" maxlength="1000" placeholder="Message"></textarea>
        <div id="msg_error" class="form_error"></div>

        <div id="msg"></div>

        <button type="button" id="send-btn">Send</button>

        <!--  add the clear form button  -->
        <button type="button" id="clear-btn">Clear form</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="/assets/js/contact.js"></script>

