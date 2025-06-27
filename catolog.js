const discounts = [
  {
    title: "Томаты Рост Фламенко красные сливовидные",
    oldPrice: "279 ₽",
    newPrice: "209 ₽",
    discount: "-25%",
    image: "img/4ereshnya.jpg"
  },
  {
    title: "Картофель ранний Египет",
    oldPrice: "99 ₽",
    newPrice: "84 ₽",
    discount: "-15%",
    image: "images/potatoes.jpg"
  },
  {
    title: "Черешня",
    oldPrice: "79 ₽",
    newPrice: "64 ₽",
    discount: "-18%",
    image: "images/cherries.jpg"
  }
];

const container = document.getElementById("discount-products");

discounts.forEach(product => {
  const div = document.createElement("div");
  div.className = "product";
  div.innerHTML = `
    <span class="badge">${product.discount}</span>
    <img src="${product.image}" alt="${product.title}">
    <p>${product.title}</p>
    <div class="prices">
      <s>${product.oldPrice}</s>
      <span class="price">${product.newPrice}</span>
    </div>
    <button class="add-to-cart">🛒</button>
  `;
  container.appendChild(div);
});
