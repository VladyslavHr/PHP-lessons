<script>

let { log } = console


let search_input = $('#search_input')

let input_value = search_input.val() // получает содержимое инпута


search_input.val('new value') // задает значение инпута

log(search_input)

let search_button = $('.search-block button')

search_button.html('<b>Search</b>')
search_button.text('Search')

search_button.css('background', 'pink')



</script>