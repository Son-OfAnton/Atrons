var check = false;

const cart = $("#cart")[0];


$.getJSON('http://localhost/Atrons/backend/api/cart/read_cart.php', function(data) {
  
  $.each(data, function(index, item) {
    let product = $("<article class='product'>");

    resultHtml = `
        <header>
            <a class="remove" data-isbn=${index}>
                <img src="./assets/newBook.jpg" />
    
                <h3>Remove</h3>
            </a>
        </header>
    
        <div class="content">
            <h1>${item.title}</h1>
    
            ${item.description}
        </div>
    
        <footer class="content">
            <span class="qt-minus">-</span>
            <span class="qt">0</span>
            <span class="qt-plus">+</span>
    
            <h2 class="full-price">0birr</h2>
    
            <h2 class="price">${item.price}birr</h2>
        </footer>`;
    
    product.html(resultHtml);
    cart.append(product[0]);
    
  });

  function changeVal(el) {
    var qt = parseFloat(el.parent().children(".qt").html());
    var price = parseFloat(el.parent().children(".price").html());
    var eq = Math.round(price * qt * 100) / 100;
  
    el.parent()
      .children(".full-price")
      .html(eq + " birr");
  
    changeTotal();
  }
  
  function changeTotal() {
    var price = 0;
  
    $(".full-price").each(function (index) {
      price += parseFloat($(".full-price").eq(index).html());
    });
  
    price = Math.round(price * 100) / 100;
    var tax = Math.round(price * 0.05 * 100) / 100;
    var shipping = parseFloat($(".shipping span").html());
    var fullPrice = Math.round((price + tax + shipping) * 100) / 100;
  
    if (price == 0) {
      fullPrice = 0;
    }
  
    $(".subtotal span").html(price);
    $(".tax span").html(tax);
    $(".total span").html(fullPrice);
  }
  
  $(document).ready(function () {
    $(".remove").click(function () {
      var el = $(this); 
      let isbn = el[0].dataset.isbn
      
      fetch("http://localhost/Atrons/backend/api/cart/remove_from_cart.php?isbn="+isbn)
      // .then(response => response.json())
      // .catch(error => console.error(error));
      el.parent().parent().addClass("removed");
      window.setTimeout(function () {
        el.parent()
          .parent()
          .slideUp("fast", function () {
            el.parent().parent().remove();
            if ($(".product").length == 0) {
              if (check) {
                $("#cart").html("<h1>The shop does not function, yet!</h1>");
              } else {
                $("#cart").html("<h1>No products!</h1>");
              }
            }
            changeTotal();
          });
      }, 200);
    });
    
    $(".qt-plus").click(function () {
      $(this)
        .parent()
        .children(".qt")
        .html(parseInt($(this).parent().children(".qt").html()) + 1);
  
      $(this).parent().children(".full-price").addClass("added");
  
      var el = $(this);
      window.setTimeout(function () {
        el.parent().children(".full-price").removeClass("added");
        changeVal(el);
      }, 150);
    });
  
    $(".qt-minus").click(function () {
      child = $(this).parent().children(".qt");
  
      if (parseInt(child.html()) > 1) {
        child.html(parseInt(child.html()) - 1);
      }
  
      $(this).parent().children(".full-price").addClass("minused");
  
      var el = $(this);
      window.setTimeout(function () {
        el.parent().children(".full-price").removeClass("minused");
        changeVal(el);
      }, 150);
    });
  
    window.setTimeout(function () {
      $(".is-open").removeClass("is-open");
    }, 1200);
  
    $(".btn").click(function () {
      check = true;
      $(".remove").click();
    });
  });
});
console.log($('#cart').is(":empty"))

if ($('#cart').is(":empty")) {
  $("#cart").html("<h1>No cart items found!</h1>");
}    // $('.product')[index].html(resultHtml);




