let decreaseButtons = document.getElementsByClassName("decrease-button");
let increaseButtons = document.getElementsByClassName("increase-button");

const decreaseQuantity = (e) => {
  let button = e.target.closest(".decrease-button");
  let productId = button.getAttribute("data-product-id");
  let quantityElement = document.getElementById("quantity_" + productId);
  let quantity = quantityElement.value;
  if (quantity > 1) {
    quantity--;
    quantityElement.value = quantity;
  }
};
const increaseQuantity = (e) => {
  let button = e.target.closest(".increase-button");
  let productId = button.getAttribute("data-product-id");
  let quantityElement = document.getElementById("quantity_" + productId);
  let quantity = quantityElement.value;
  if (quantity >= 10) {
    return;
  } else {
    quantity++;
    quantityElement.value = quantity;
  }
};
for (let i = 0; i < decreaseButtons.length; i++) {
  decreaseButtons[i].addEventListener("click", decreaseQuantity);
}

for (let i = 0; i < increaseButtons.length; i++) {
  increaseButtons[i].addEventListener("click", increaseQuantity);
}
