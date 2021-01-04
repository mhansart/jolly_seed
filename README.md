# jolly_seed
pour faire fonctionner le scss:
sass --watch public/css/style.scss public/css/style.css

La requete ajax de transformation ne marche que de temps en temps...:
    Blocage d’une requête multiorigines (Cross-Origin Request) : la politique « Same Origin » ne permet pas de consulter la ressource distante située sur https://nominatim.openstreetmap.org/search?q=Bonlez&format=json&addressdetails1&limit=1. Raison : échec de la requête CORS.

    Uncaught (in promise) 
    XMLHttpRequest { onreadystatechange: onreadystatechange(), readyState: 4, timeout: 0, withCredentials: false, upload: XMLHttpRequestUpload, responseURL: "", status: 0, statusText: "", responseType: "", response: "" }
... et de plus bien que la carte se mette bien, le calque se place au dessu du reste et si on lui met un indice z de -1, il n'y plus d'interaction (zoom in/out et clic pour titre).
