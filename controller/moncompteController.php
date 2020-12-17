<?php

$p = new Personne();
$tabUser = $p->readById($_SESSION['user_id']);
$nom = $tabUser[0]['user_name'];
$prenom = $tabUser[0]['user_firstname'];
$street = $tabUser[0]['user_street'];
$number = $tabUser[0]['user_street_number'];
$box = $tabUser[0]['user_box'];
$citycode = $tabUser[0]['user_citycode'];
$city = $tabUser[0]['user_city'];
$phone = $tabUser[0]['user_phone'];
$email = $tabUser[0]['user_email'];
$description = $tabUser[0]['user_description'];
$pictureUser = $tabUser[0]['user_picture'];

// afficher les infos
$userDescription = ($tabUser[0]['user_description'] === "undefined") ? 'Vous n\'avez pas encore rentré de description' : $tabUser[0]['user_description'];
$infosUser = '<div class="d-flex infos-user w-100">
                <div class="user-pp" style="background-image:url( uploads/' . $tabUser[0]['user_picture'] . ')"><div class="modif-picture-moncompte d-flex">
                <div class="btn-modif-picture-moncompte">Modifier ma photo</div>
            </div></div>
                <div class="infos-container-moncompte">
                    <div class="infos">
                        <div class="mes-infos-mon-compte">
                            <p class="infos-categories-moncompte">Nom</p><p class="infos-moncompte"> ' . $tabUser[0]['user_name'] . '</p>
                        </div><div class="mes-infos-mon-compte">
                            <p class="infos-categories-moncompte">Prénom</p><p class="infos-moncompte"> ' . $tabUser[0]['user_firstname'] . '</p>
                        </div><div class="mes-infos-mon-compte">
                            <p class="infos-categories-moncompte">Adresse</p><p class="infos-moncompte"> ' . $tabUser[0]['user_street'] . ' ' . $tabUser[0]['user_street_number'] . ' ' . $tabUser[0]['user_box'] . ', ' . $tabUser[0]['user_citycode'] . ' ' . $tabUser[0]['user_city'] . '</p>
                        </div><div class="mes-infos-mon-compte">
                            <p class="infos-categories-moncompte">Téléphone</p><p class="infos-moncompte"> ' . $tabUser[0]['user_phone'] . '</p>
                        </div><div class="mes-infos-mon-compte">
                            <p class="infos-categories-moncompte">E-mail</p><p class="infos-moncompte"> ' . $tabUser[0]['user_email'] . '</p>
                        </div><div class="mes-infos-mon-compte">
                            <p class="infos-categories-moncompte">Description</p><p class="infos-moncompte"> ' . $userDescription . '</p>
                        </div>
                    </div>
                    <div class="btn-modif-info-moncompte">
                        <div id="modif-infos-mon-compte">Modifier mes infos</div>
                    </div>
                </div>
                
            </div>';

if (isset($_POST["update"])) {
    $descriptionUser = $_POST["user-description"] === "" ? $description : $_POST["user-description"];
    $p = new Personne();
    $p->updateUser($_POST["update"], $_POST["nom"], $_POST["prenom"], $_POST["rue"], $_POST["numero"], $_POST["boite"], $_POST["codepostal"], $_POST["ville"], $_POST["telephone"], $_POST["email"], $descriptionUser);

    $_SESSION['prenom'] =  trim($_POST["prenom"]);
    $_SESSION['user_city'] = trim($_POST["ville"]);

    header("Location:?section=moncompte");
}
if (isset($_POST["update-picture"])) {
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
}


include("view/page/moncompte.php");
