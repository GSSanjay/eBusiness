const submitOrder = (id) => {
  // console.log(id);
  let orderBtn = document.querySelector("#" + id);
  // console.log(orderBtn);
  let parentElem = orderBtn.parentElement.parentElement;
  // console.log(parentElem);
  let item_name = parentElem.querySelector("#item_name").innerHTML;
  let restaurant_name = parentElem.querySelector("#restaurant_name").innerHTML;
  let item_price = parentElem.querySelector("#item_price").innerHTML;
  let qty = parentElem.querySelector("#qty").value;

  console.log(item_name, restaurant_name, qty);

  window.location.href = `order.php?item_name=${item_name}&item_price=${item_price}&restaurant_name=${restaurant_name}&qty=${qty}`;
};
