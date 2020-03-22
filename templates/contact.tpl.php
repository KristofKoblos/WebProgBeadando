<span class="form-alert">Minden mező kitöltése kötelező!</span>
<form method="post" id="contact-form">
    <label for="name">Név:</label>
    <input type="text" name="name" placeholder="Név" reg="^(?!\s*$).+" required>
    <label for="phone">Telefon:</label>
    <input type="tel" name="phone" placeholder="+36(99)123-456" reg="[\+]36[\(]\d{1,2}[\)]\d{3}[\-]\d{3,4}" pattern="[\+]36[\(]\d{1,2}[\)]\d{3}[\-]\d{3,4}" required>
    <label for="email">E-mail:</label>
    <input type="email" name="email" placeholder="E-mail" reg="^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$" required>
    <label for="message">Üzenet:</label>
    <textarea placeholder="Üzenet..." required></textarea>
    <input type="submit" value="Küldés">
</form>