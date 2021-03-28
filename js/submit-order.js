const submitOrder = (id) => {
  // console.log(id);
  let successMsg = document.querySelector("#success-msg");
  let orderBtn = document.querySelector("#" + id);
  // console.log(orderBtn);
  let parentElem = orderBtn.parentElement.parentElement;
  // console.log(parentElem);
  let item_name = parentElem.querySelector("#item_name").innerHTML;
  let restaurant_name = parentElem.querySelector("#restaurant_name").innerHTML;
  let item_price = parentElem.querySelector("#item_price").innerHTML;
  let qty = parentElem.querySelector("#qty").value;

  if (qty <= 0) {
    alert("Please choose quantity at least 1");
  } else if (qty >= 100) {
    alert("Please choose up to 100 quantity.");
  } else {
    console.log(item_name, restaurant_name, qty);
    // alert("Order placed");
    window.location.href = `order.php?item_name=${item_name}&item_price=${item_price}&restaurant_name=${restaurant_name}&qty=${qty}`;
    successMsg.innerHTML = "Order placed";
  }
};
