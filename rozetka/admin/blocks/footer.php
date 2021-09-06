</div> 
<!-- admin-main-content -->


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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="
sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>