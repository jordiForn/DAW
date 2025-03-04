let cart = JSON.parse(localStorage.getItem("cart")) || [];
updateTooltip();
function addToCart(name, price) {
  let existingItem = cart.find((item) => item.name === name);

  if (existingItem) {
    existingItem.quantity += 1;
  } else {
    cart.push({ name, price, quantity: 1 });
  }

  localStorage.setItem("cart", JSON.stringify(cart));

  updateTooltip();
  alert(name + " s'ha afegit al carret.");
}

document.addEventListener("DOMContentLoaded", () => {
  if (window.location.pathname.includes("cart.html")) {
    loadCart();
  }

  const productLists = document.querySelectorAll(".product-list");
  productLists.forEach(
    (list, index) => (list.style.display = index === 0 ? "flex" : "none")
  );
});

document.addEventListener("DOMContentLoaded", () => {
  document.querySelectorAll(".toggle-button").forEach((button) => {
    button.addEventListener("click", () => {
      const productList = button.nextElementSibling;
      if (productList)
        productList.style.display =
          productList.style.display === "flex" ? "none" : "flex";
    });
  });
});

function loadCart() {
  const cartContainer = document.getElementById("cart-items");
  const totalElement = document.getElementById("cart-total");

  cart = JSON.parse(localStorage.getItem("cart")) || [];
  cartContainer.innerHTML = "";
  let total = 0;

  cart.forEach((item, index) => {
    total += item.price * item.quantity;
    let itemElement = document.createElement("div");
    itemElement.classList.add("cart-item");
    itemElement.innerHTML = `
      <span>${item.name} (x${item.quantity})</span>
      <span>${(item.price * item.quantity).toFixed(2)}€</span>
      <button class="remove-btn" data-index="${index}">X</button>
    `;
    cartContainer.appendChild(itemElement);
  });

  totalElement.innerText = total.toFixed(2) + "€";
  setupCartListeners();
}

function setupCartListeners() {
  document.querySelectorAll(".remove-btn").forEach((button) => {
    button.addEventListener("click", function () {
      let index = this.getAttribute("data-index");
      removeFromCart(index);
    });
  });
}

function getTotal() {
  const hiddenTotalInput = document.getElementById("cart-total-hidden");
  let total = 0;
  cart.forEach((item) => {
    total += item.price * item.quantity;
  });
  hiddenTotalInput.value = total.toFixed(2);
}

function updateTooltip() {
  let totalItems = 0;
  let totalPrice = 0;

  cart.forEach((item) => {
    totalItems += item.quantity;
    totalPrice += item.price * item.quantity;
  });

  const formattedPrice = totalPrice.toFixed(2).replace(".", ",");

  const tooltips = document.querySelectorAll(".tooltip-text");
  tooltips.forEach((tooltip) => {
    tooltip.innerText = `${totalItems} ítems - ${formattedPrice}€`;
  });
}

function removeFromCart(index) {
  index = parseInt(index);
  if (cart[index].quantity > 1) {
    cart[index].quantity -= 1;
  } else {
    cart.splice(index, 1);
  }

  localStorage.setItem("cart", JSON.stringify(cart));
  loadCart();
  updateTooltip();
}

document.addEventListener("DOMContentLoaded", function () {
  let searchInput = document.getElementById("search-input");
  let productCards = document.querySelectorAll(".product-card");

  searchInput.addEventListener("input", function () {
    let searchTerm = searchInput.value.toLowerCase();

    productCards.forEach(function (card) {
      let productName = card.querySelector("h3").innerText.toLowerCase();
      if (productName.includes(searchTerm)) {
        card.style.display = "block";
      } else {
        card.style.display = "none";
      }
    });
  });
});
