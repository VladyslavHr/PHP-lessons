<footer>


</footer>
<pre>
<?php
// print_r($_GET);
if(isset($_GET['open-modal'])){
    $show_modal = 'active';
}else{
    $show_modal = '';
}

?>

<?php include 'blocks/modal-login.php' ?>

<a href="#" class="arrow-up">🠑</a>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>


<script>
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
</script>

</body>
</html>