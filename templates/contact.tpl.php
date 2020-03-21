<span class="form-alert">Minden mező kitöltése kötelező!</span>
<form>
    <label for="name">Név:</label>
    <input type="text" name="name" placeholder="Név" required>
    <label for="phone">Telefon:</label>
    <input type="tel" name="phone" placeholder="+36 (12) 111-2222" pattern="/^[\/+][36]{1,2}[ ][\/(][1-9]{1,2}[\/)][ ][1-9]{3}[-][1-9]{3,4}$/" required>
    <label for="email">E-mail:</label>
    <input type="email" name="email" placeholder="E-mail" required>
    <label for="message">Üzenet:</label>
    <textarea placeholder="Üzenet..." required></textarea>
    <input type="submit" value="Küldés">
</form>