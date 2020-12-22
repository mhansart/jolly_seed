<div class="contact-container w-80 d-flex">
    <div class="image-deco-contact w-50">
    </div>
    <div class="w-50 form-contact">
        <h3>Contact</h3>
        <p> Si vous avez le moindre commentaire, la moindre question, ou la moindre proposition,
            nous sommes là pour en prendre de la graine 😉 </p>

        <form method="post">
            <label>Nom:</label>
            <input type="text" name="nom" required>
            <label>Prénom:</label>
            <input type="text" name="prenom" required>
            <label>Email:</label>
            <input type="email" name="email" required>
            <label>Message:</label>
            <textarea rows="7" name="message" required></textarea>
            <span style="color:<?= $colorEtat; ?>"><?= $etat; ?></span>
            <div><button type="submit">Envoyer</button></div>

        </form>
    </div>
</div>
<script src="public/js/script_footer.js"></script>