import { API_URL } from "../utils/constants.js";

const loginForm = document.querySelector("#loginForm");


loginForm.addEventListener("submit", (event) => {
  event.preventDefault();
  const username = document.querySelector("#username").value;
  const password = document.querySelector("#password").value;

  fetch(API_URL + "user/login", {
    method: "POST",
    body: JSON.stringify({
      username,
      password,
    }),
  })
    .then((response) => response.json())
    .then((data) => {
      if (data.success) {
        localStorage.setItem(
          "USER",
          JSON.stringify({ ...data.user, login: true })
        );
        window.location.href = "/";
      } else {
        alert("usuario o contraseña incorrectos");
      }
    })
    .catch((error) => console.error("Error:", error));
});


