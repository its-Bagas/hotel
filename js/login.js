let personTest = 0;
let personEtherapy = 0;
let personEkonsul = 0;
let personVisit = 0;

setTimeout(() => {
  setInterval(() => {
    if (personTest < 835) {
      document.getElementById("pertest").innerHTML = personTest++;
    } else if ((personTest = 835)) {
      document.getElementById("pertest").innerHTML = "835+";
    }
  }, 1);
}, 400);

setTimeout(() => {
  setInterval(() => {
    if (personEtherapy < 675) {
      document.getElementById("pertherapy").innerHTML = personEtherapy++;
    } else if ((personEtherapy = 675)) {
      document.getElementById("pertherapy").innerHTML = "675+";
    }
  }, 1);
}, 400);

setTimeout(() => {
  setInterval(() => {
    if (personEkonsul < 756) {
      document.getElementById("perkosul").innerHTML = personEkonsul++;
    } else if ((personEkonsul = 756)) {
      document.getElementById("perkosul").innerHTML = "756+";
    }
  }, 1);
}, 400);

setTimeout(() => {
  setInterval(() => {
    if (personVisit < 1000) {
      document.getElementById("pervisit").innerHTML = personVisit++;
    } else if ((personVisit = 1000)) {
      document.getElementById("pervisit").innerHTML = "1000+";
    }
  }, 1);
}, 400);
