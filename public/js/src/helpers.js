export function ajaxGet(url) {
  return new Promise(function (resolve, reject) {
    let xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
      if (xmlhttp.readyState == 4) {
        if (xmlhttp.status == 200) {
          resolve(xmlhttp.responseText);
        } else {
          reject(xmlhttp);
        }
      }
    };
    xmlhttp.onerror = function (error) {
      reject(error);
    };
    xmlhttp.open("GET", url, true);
    xmlhttp.send();
  });
}

export function ajaxPost(url, data) {
  return new Promise(function (resolve, reject) {
    let xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
      if (xmlhttp.readyState == 4) {
        if (xmlhttp.status == 200) {
          resolve(xmlhttp.responseText);
        } else {
          reject(xmlhttp);
        }
      }
    };
    xmlhttp.onerror = function (error) {
      reject(error);
    };
    xmlhttp.open("POST", url);
    xmlhttp.send(data);
  });
}

export const today = (needHour) => {
  const thisDate = new Date();
  const thisDay = thisDate.getDate();
  let thisMonth = thisDate.getMonth();
  if (thisMonth == 0) {
    thisMonth = "Janvier";
  }
  if (thisMonth == 1) {
    thisMonth = "Février";
  }
  if (thisMonth == 2) {
    thisMonth = "Mars";
  }
  if (thisMonth == 3) {
    thisMonth = "Avril";
  }
  if (thisMonth == 4) {
    thisMonth = "Mai";
  }
  if (thisMonth == 5) {
    thisMonth = "Juin";
  }
  if (thisMonth == 6) {
    thisMonth = "Juillet";
  }
  if (thisMonth == 7) {
    thisMonth = "Août";
  }
  if (thisMonth == 8) {
    thisMonth = "Septembre";
  }
  if (thisMonth == 9) {
    thisMonth = "Octobre";
  }
  if (thisMonth == 10) {
    thisMonth = "Novembre";
  }
  if (thisMonth == 11) {
    thisMonth = "Décembre";
  }
  const thisYear = thisDate.getFullYear();
  const thisHour = thisDate.getHours();
  const thisMin = thisDate.getMinutes();
  let result = `${thisDay} ${thisMonth} ${thisYear} `;
  if (needHour) result += `${thisHour}h${thisMin}`;
  return result;
};

export const render = (arr1,arr2) => {
  arr2.forEach((elt) => {
    elt.style.display = "none";
  });
  arr1.forEach((elt) => {
    elt.style.display = "block";
  });
};

