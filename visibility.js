if (window.location.pathname.includes("index.php")) {
  document.addEventListener("DOMContentLoaded", function () {
    const menuIcon = document.getElementById("menu-icon");
    const adminMenu = document.getElementById("admin-menu");
    const searchIcon = document.getElementById("search-icon");

    if (isLoggedIn) {
      document.getElementById("logout-link").style.display = "inline-block";
      if (isAdmin) {
        document.getElementById("menu-icon").style.display = "inline-block";
        document.getElementById("contact-icon").style.display = "none";
      }
    }

    menuIcon.addEventListener("click", function () {
      if (adminMenu.style.display === "none") {
        adminMenu.style.display = "block";
      } else {
        adminMenu.style.display = "none";
      }
    });

    searchIcon.addEventListener("click", function () {
      if (document.getElementById("search-input").style.display === "none") {
        document.getElementById("search-input").style.display = "block";
      } else {
        document.getElementById("search-input").style.display = "none";
      }
    });
  });
}

if (window.location.pathname.includes("contact.php")) {
  document.addEventListener("DOMContentLoaded", function () {
    if (!isLoggedIn) {
      document.getElementById("name-label").style.display = "inline-block";
      document.getElementById("name").style.display = "inline-block";
      document.getElementById("email-label").style.display = "inline-block";
      document.getElementById("email").style.display = "inline-block";
      document.getElementById("phone-label").style.display = "inline-block";
      document.getElementById("phone").style.display = "inline-block";
    }
  });
}
