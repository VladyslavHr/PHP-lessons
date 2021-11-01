let { log } = console

// js open modal
document.querySelectorAll('.js-open-modal').forEach(function(el){
    el.addEventListener('click', function(e){
    	if(e.target !== this) return false
      js_open_modal(this)
    })
})


// js open modal-nocheck
document.querySelectorAll('.js-open-modal-nocheck').forEach(function(el){
  el.addEventListener('click', function(e){
    js_open_modal(this)
  })
})

function js_open_modal(element) {
  var modal = document.getElementById(element.dataset.target)	
  if(modal.classList.contains('active')){
    setTimeout(function(){modal.classList.remove('active')}, 400)
    modal.classList.add('fade')
  }else{
    modal.classList.remove('fade')
    modal.classList.add('active')
  }
}


//show-more-btn
function show_more_products(current_button, offset, limit){
    $.post(location.href, 
      {show_more_products: 1, offset: offset, limit: limit}, 
      function(data){
        current_button.remove()
      // console.log(data)
      $('.products').append(data)
    })
  }




  function add_to_favorites(event)
  {
      event.preventDefault() //отменяет действие по умолчанию
      var heart_wrapper =  $(event.currentTarget)
      if(heart_wrapper.find('.heart').hasClass('heart-empty')){
        var action = 'add'
      }else{
        var action = 'remove'
      }
      var userId = $('body').data('userid')
      var product_id = $(event.currentTarget).data('productid')
      $.get(location.href,  
        {favorite: action, userId: userId, product_id: product_id, ajax: 1},
        function(data){
            // heart_wrapper.html(data)
            heart_wrapper.find('.heart').toggleClass('heart-empty')
      })
  }


  function add_to_cart(event)
  {
    event.preventDefault()
    let add_to_cart_link = $(event.currentTarget)
    let product_id = add_to_cart_link.data('productid')
    $.get(location.href,
      {add_to_cart: 1, ajax: 1, product_id: product_id },
      function(data){
        add_to_cart_link.find('.in-the-cart-count').html(data.cart_item_count)
        add_to_cart_link.find('.in-the-cart-desc').html(data.in_the_cart)
        $('.cart-count').html(data.cart_items_count)
    }, 'json')
  }


  
  $('#search_input').on('keyup', function(){
    if(this.value.length < 2) return false
    var search_input = $(this)
    $.post(location.href,
      {ajax_search: 1, query: this.value},
      function(data){
        log(data.results)
        if(data.results && data.results.length) {
          search_input.addClass('has-results')
          var results_html = data.results.map(function(el){
            return '<li><a href="'+el.link+'">' + el.title.substr(0,80) + '</a></li>'
          })
          $('#result_list').html(results_html)
        }
      }, 'json')
  })