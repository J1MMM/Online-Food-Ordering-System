"use strict";

var KEY = 'AIzaSyB3ZvvzmSRtiajtGrXIbjlXloiDS-QF9X8';
fetch("https://mail.google.com/mail/u/0/#search/jimuelbaraero00").then(function (res) {
  return res.json();
}).then(function (data) {
  return console.log(data);
})["catch"](function (err) {
  return console.log(err);
});