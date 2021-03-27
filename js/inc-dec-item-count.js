// alert("Hello");

let count = 0;
const plus = (id) => {
  console.log(id);
  count++;
  let plus = document.querySelector("#" + id);
  let parentElem = plus.parentElement;
  console.log(parentElem);
  parentElem.querySelector("#qty").value = count;
};

const minus = (id) => {
  console.log(id);
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
