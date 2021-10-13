let { log } = console

// js open modal
document.querySelectorAll('.js-open-modal').forEach(function(el){
    el.addEventListener('click', function(e){
    	if(e.target !== this) return false
        var modal = document.getElementById(this.dataset.target)
    	
    	if(modal.classList.contains('active')){
    		setTimeout(function(){modal.classList.remove('active')}, 400)
    		modal.classList.add('fade')
    	}else{
    		modal.classList.remove('fade')
    		modal.classList.add('active')
    	}
    })
})



//show-more-btn
function show_more_products(current_button, offset, limit){
    console.log(offset)
    console.log(limit)
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
      console.log(event.currentTarget)
      console.log(action)
      console.log(userId)
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
    log(product_id)
  }