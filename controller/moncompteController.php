<?php
$infosUser = "";
$p = new Personne();
$tabUser = $p->readById($_SESSION['user_id']);
$image = ($tabUser[0]['user_picture'] === "") ? 'public/image/default.png' : 'uploads/' . $tabUser[0]['user_picture'];
$infosUser = '<div class="d-flex infos-user">
                <div class="user-pp" style="background-image:url(' . $image . ')"></div>
                <div>
                    <p>Nom: ' . $tabUser[0]['user_name'] . '</p>
                    <p>Prénom: ' . $tabUser[0]['user_firstname'] . '</p>
                    <p>Adresse: ' . $tabUser[0]['user_street'] . ' ' . $tabUser[0]['user_street_number'] . ' ' . $tabUser[0]['user_box'] . ', ' . $tabUser[0]['user_citycode'] . ' ' . $tabUser[0]['user_city'] . '</p>
                    <p>N° téléphone: ' . $tabUser[0]['user_phone'] . '</p>
                    <p>E-mail: ' . $tabUser[0]['user_email'] . '</p>
                </div>
            </div>';



if (isset($_FILES["user-picture"])) {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["user-picture"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    $check = filesize($_FILES["user-picture"]["tmp_name"]);

    if ($check !== false) {
        $uploadOk = 1;
    } else {
        $uploadOk = 0;
    }

    // Allow certain file formats
    if (
        $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" && $imageFileType != "mp4" && $imageFileType != "mp3" && $imageFileType != "avi"
    ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
    } else {
        $newName = strtolower($_SESSION['prenom']) . '-' . $_SESSION['user_id'] . '.' . $imageFileType;
        echo $newName;
        if (move_uploaded_file($_FILES["user-picture"]["tmp_name"], $target_dir . $newName)) {
        }
    }
    $message = $newName;
    $p->updatePicture($message, $_SESSION['user_id']);
    header("Location:?section=moncompte");
}
if (isset($_POST["user-description"])) {
    $p->updatePicture($$_POST["user-description"], $_SESSION['user_id']);
    header("Location:?section=moncompte");
}


include("view/page/moncompte.php");
