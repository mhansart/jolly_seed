<h2>Supprimer une personne</h2>
<p>Etes vous sûr(e) de vouloir supprimer <?= $nom; ?> <?= $prenom ?> ?</p>
<form action="#" method="post">
    <input type="hidden" name="id" value="<?= $id; ?>">
    <input type="submit" value="Oui">
    <a href="?section=read">Non</a>
</form>

