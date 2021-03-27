// alert("Hello");

let minusBtn = document.querySelector("#minus");
let plusBtn = document.querySelector("#plus");

minusBtn.addEventListener("click", minus);
plusBtn.addEventListener("click", plus);

const plus = (id) => {
  let count = 0;
  console.log(id);
  count++;
  let plus = document.querySelector("#" + id);
  let parentElem = plus.parentElement.parentElement;
  console.log(parentElem);
  console.log(parentElem.querySelector("#qty"));
  parentElem.querySelector("#qty").value = count;
};

const minus = (id) => {
  let count = 0;
  console.log(id);
  count--;
  let minus = document.querySelector("#" + id);
  let parentElem = minus.parentElement.parentElement;
  console.log(parentElem);
  console.log(parentElem.querySelector("#qty"));
  parentElem.querySelector("#qty").value = count;
};

/* let qty = document.querySelector("#qty");
let add = document.querySelector("#add");
let remove = document.querySelector("#remove");

console.log(qty, add, remove);
let count = 0;
add.addEventListener("click", () => {
  count = count + 1;
  qty.value = count;
});

remove.addEventListener("click", () => {
  count = count - 1;
  if (count <= 0) {
    count = 0;
  }

  qty.value = count;
});
 */
